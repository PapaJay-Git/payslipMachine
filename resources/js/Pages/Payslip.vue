<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { onMounted, watch, ref } from 'vue';

var basic = ref(0);
var basicPay = ref(0);
var basicHrs = ref(0);
var basicDays = ref(0);
var holidayHrs = ref(0);
var holidayDA = ref(0);
var slvlHrs = ref(0);
var slvlDays = ref(0);
var overtimeHrs= ref(0);
var overtimeDA= ref(0);
var overallDays = ref(0);
var totalcontri = ref(0);
var totaldeduc = ref(0);
var totalearnings = ref(0);
var otherdeduc = ref(0);
var net = ref(0);


const props = defineProps({
    data : {
        type : Object,
        required : true
    }
});
onMounted(() => {
    calculateData(props.data);
});

watch(() => props.data, (newData, oldData) => {
    calculateData(newData);
});

const parseFloatIsNaN = (value) => {
   return isNaN(parseFloat(value)) ? 0 : parseFloat(value);
};

const parseIntIsNaN = (value) => {
   return isNaN(parseInt(value)) ? 0 : parseInt(value);
};

const calculateData = (data) => {
    // BASIC PAY
    basic.value = parseIntIsNaN(data.days) - parseIntIsNaN(data.slvl_hrs) - parseIntIsNaN(data.holiday_hrs) - parseIntIsNaN(data.offdays) ;
    basicPay.value = parseFloatIsNaN(data.pay_rate) * basic.value;
    basicHrs.value = basicPay.value / ((basicPay.value / basic.value) / 8);
    basicDays.value = basicHrs.value / 8;

    if (parseFloatIsNaN(data.basic_pay) > 0 && data.department != "Logistics and Warehouse Department") {
        basicPay.value = parseFloatIsNaN(data.pay_rate) * basic.value;
        basicHrs.value = basicPay.value / ((basicPay.value / basic.value) / 8);
        basicDays.value = basicHrs.value / 8;

    } else if (parseFloatIsNaN(data.basic_pay) > 0 && data.department == "Logistics and Warehouse Department") {
        basicPay.value = parseFloatIsNaN(data.pertrip_amount);
        basicHrs.value = parseFloatIsNaN(data.per_trip);
        basicDays.value = parseFloatIsNaN(data.per_trip);
    }

    // HOLIDAYS
    holidayHrs.value =  (parseFloatIsNaN(data.holiday_amount) / parseFloatIsNaN(data.pay_rate)) * 8;
    holidayDA.value = parseIntIsNaN(data.holiday_hrs) != 0 ? parseFloatIsNaN(data.holiday_amount) / parseIntIsNaN(data.holiday_hrs) : 0;

    //SLVL
    slvlHrs.value =  (parseFloatIsNaN(data.slvl_amount) / parseFloatIsNaN(data.pay_rate)) * 8;
    slvlDays.value = parseIntIsNaN(data.slvl_hrs) != 0 ? parseFloatIsNaN(data.pay_rate) / parseFloatIsNaN(data.slvl_amount) : 0;

    //OVERTIME
    overtimeHrs.value =  (parseFloatIsNaN(data.slvl_amount) / parseFloatIsNaN(data.pay_rate)) * 8;
    overtimeDA.value = parseIntIsNaN(data.ot_hrs) != 0 ? (parseFloatIsNaN(data.pay_rate) / 8) * 1.25 * 1 : 0;

    //OVERALL DAYS
    overallDays.value = (slvlDays.value + basicDays.value + ((parseIntIsNaN(data.offdays) * 8) / 8) + parseIntIsNaN(data.holiday_hrs));

    //TOTAL FOR ALL FOOTER
    totalcontri.value = parseFloatIsNaN(data.sss_loan) + parseFloatIsNaN(data.sss_prem) + parseFloatIsNaN(data.pag_ibig_loan) + parseFloatIsNaN(data.pag_ibig_prem) + parseFloatIsNaN(data.philhealth);
    totaldeduc.value = parseFloatIsNaN(data.advance) + parseFloatIsNaN(data.charge) + parseFloatIsNaN(data.uniform) + parseFloatIsNaN(data.bond_deposit) + parseFloatIsNaN(data.meal) + parseFloatIsNaN(data.misc) + parseFloatIsNaN(data.mutual_charge);
    totalearnings.value = (basicPay.value + parseFloatIsNaN(data.ot_amount) + parseFloatIsNaN(data.holiday_amount) + parseFloatIsNaN(data.nightdif_amount) + parseFloatIsNaN(data.offdays_amount) + parseFloatIsNaN(data.slvl_amount) + parseFloatIsNaN(data.late_amount) + parseFloatIsNaN(data.udt_amount) + parseFloatIsNaN(data.ctlate_amount));
    otherdeduc.value = parseFloatIsNaN(data.late_amount) + parseFloatIsNaN(data.udt_amount) + parseFloatIsNaN(data.ctlate_amount);
    net.value = parseFloatIsNaN(totalearnings.value - (otherdeduc.value + totalcontri.value + totaldeduc.value));



};

const generatePDF = async () => {

    const pdfUrl = '/generate-pdf';

    const newWindow = window.open(pdfUrl, '_blank');

    const waitForPDF = () => new Promise(resolve => {
        newWindow.onload = () => {
            resolve();
        };
    });

    try {
        await waitForPDF();

        newWindow.print();
    } catch (error) {
        console.error('Error generating PDF:', error);
    } finally {
        // setTimeout(() => {
        //     newWindow.close();
        // }, 1000);

        // await router.visit('logoutPrint', { method: 'post' });
    }
};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Payslip</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="shadow-xl grid grid-cols-1 gap-4 bg-white overflow-hidden shadow-sm p-5 sm:rounded-lg sm:px-10 sm:pe-7 ps-2 md:px-8 py-10">

                    <div class="w-full flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900">Payslip</h2>

                        <div >
                            <SecondaryButton class="me-2" type="button" @click="generatePDF">
                            Print
                            </SecondaryButton>
                            <SecondaryButton type="button" @click="$inertia.visit('/dashboard')">
                                Back
                            </SecondaryButton>
                        </div>
                    </div>
                    <div class="w-full mx-auto overflow-x-scroll mt-3 py-10 rounded-md" id="printJS-Table">
                        <table class="w-full font-mono whitespace-nowrap" >
                            <thead class="pb-4">
                                <tr>
                                    <th class="font-bold text-2xl text-center" colspan="12">ELJIN CORP</th>
                                </tr>
                                <tr>
                                    <th class="font-bold text-xs text-center pb-3" colspan="12">Zone 2 Sta. Rosa Road Brgy Maliwalo Tarlac, City</th>
                                </tr>
                                <tr>
                                    <th class="font-bold text-[11px] text-start" colspan="4">
                                        <span class="min-w-24 inline-block pe-1">
                                            EMPLOYEE NAME:
                                        </span>
                                        <span class="min-w-32 inline-block pe-1">
                                            {{ data.fullname }}
                                        </span>
                                    </th>
                                    <th class="font-bold text-[11px] text-start" colspan="2">
                                        <span class="min-w-20 inline-block pe-1">
                                            JOB STATUS:
                                        </span>
                                        <span class=" inline-block pe-1">
                                            {{  data.job_status }}
                                        </span>
                                    </th>
                                    <th class="font-bold text-[11px] text-start" colspan="2">
                                        <span class="min-w-16 inline-block pe-1">
                                            PAY RATE:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ parseFloatIsNaN(data.pay_rate) }}
                                        </span>
                                    </th>
                                    <th class="font-bold text-[11px] text-start" colspan="4">
                                        <span class="min-w-12 inline-block pe-1">
                                            NO OF DAYS:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ overallDays }}
                                        </span>
                                    </th>
                                </tr>
                                <tr >
                                    <th class="pb-3 font-bold text-[11px] text-start" colspan="4">
                                        <span class="min-w-24 inline-block pe-1">
                                            DEPARTMENT:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.department }}
                                        </span>
                                    </th>
                                    <th class="pb-3 font-bold text-[11px] text-start" colspan="2">
                                        <span class="min-w-20 inline-block pe-1">
                                            RANK FILE:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.rank_file }}
                                        </span>
                                    </th>
                                    <th class="pb-3 font-bold text-[11px] text-start" colspan="2">
                                        <span class="min-w-16 inline-block pe-1">
                                            POSITION:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.job_title }}
                                        </span>
                                    </th>
                                    <th class="text-[11px] pb-3  text-start" colspan="4">
                                        <span class="min-w-12 inline-block pe-1 font-extrabold">
                                            DATE PERIOD:
                                        </span>
                                        <span class="inline-block pe-1 font-extrabold">
                                            {{ data.month+" "+data.year+"/"+data.period}}
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <thead class="bg-gray-200 border-2 border-black">
                                <tr>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">EARNINGS</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">D.A</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">HOUR(S)</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">DAY(S)</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">AMOUNT</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">DEDUCTIONS</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">AMOUNT</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1"></th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">CONTRIBUTIONS</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="3">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">BASIC PAY</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ parseFloatIsNaN(data.pay_rate) }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ basicHrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ basicDays }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ basicPay }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">UNIFORM</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.uniform }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">SSS LOAN</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ parseFloatIsNaN(data.sss_loan) }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">RESTSDAYS</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ (parseFloatIsNaN(data.pay_rate) / 8) * 1.30 * (parseIntIsNaN(data.offdays) * 8) }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ parseIntIsNaN(data.offdays) * 8 }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ (parseIntIsNaN(data.offdays) * 8) / 8 }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.offdays_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">ADVANCE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.advance }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">PHIL HEALTH</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.philhealth }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">HOLIDAYS</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ holidayDA }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ holidayHrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ parseIntIsNaN(data.holiday_hrs) }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ parseFloatIsNaN(data.holiday_amount) }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">BOND DEPOSIT</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.bond_deposit }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">SSS PREM</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ parseFloatIsNaN(data.sss_prem) }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">SLVL</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ parseFloatIsNaN(data.pay_rate) }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ slvlHrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ slvlDays }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ parseFloatIsNaN(data.slvl_amount) }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">CHARGE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.charge }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">MUTUAL LOAN</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.mutual_loan }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">OVERTIME</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ overtimeDA }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ parseIntIsNaN(data.ot_hrs) }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start border border-gray-700" colspan="1">{{ overallDays }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.ot_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">MISC</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.misc }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">PAGIBIG LOAN</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.pag_ibig_loan }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">NIGHT DIFF</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.nightdif_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.nightdif }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{  }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.nightdif_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">MEAL</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.meal }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">PAGIBIG PREM</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.pag_ibig_prem }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">LATE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.late_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.minutes_late+" min" }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{  }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.late_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">MUTUAL CHARGE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.mutual_charge }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3"></td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">UDT/HDY</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.udt_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.udt_hrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{  }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.udt_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3"></td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">CT LATE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.ctlate_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.ctlate+" min" }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{  }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.ctlate_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3"></td>
                                </tr>
                            </tbody>
                            <thead class="bg-gray-200 border-2 border-black">
                                <tr>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">GROSS EARNINGS: {{ totalearnings.toFixed(2) }}</th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">RETRO: {{ data.retro }}</th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">OTHER DEDUCTIONS: {{ otherdeduc.toFixed(2) }}</th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">TOTAL DEDUCTIONS: {{ totaldeduc.toFixed(2) }}</th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">TOTAL CONTRIBUTIONS: {{ totalcontri.toFixed(2) }}</th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">NET PAY: {{ net.toFixed(2) }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="pe-7 ps-2 pt-5 text-[11px] text-start" colspan="8"></th>
                                    <th class="pe-7 ps-2 pt-5 text-[11px] text-start border-b-2 border-black" colspan="3"></th>
                                </tr>
                                <tr>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="8"></th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-center" colspan="3">SIGNATURE</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
