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

const calculateData = (data) => {
    // BASIC PAY
    basic.value = data.days - data.slvl_hrs - data.holiday_hrs - data.offdays;
    basicPay.value = data.pay_rate * basic.value;
    basicHrs.value = basicPay.value / ((basicPay.value / basic.value) / 8);
    basicDays.value = basicHrs.value / 8;

    // HOLIDAYS
    holidayHrs.value =  (data.holiday_amount / data.pay_rate) * 8;
    holidayDA.value = data.holiday_hrs != 0 ? data.holiday_amount / data.holiday_hrs : 0;

    //SLVL
    slvlHrs.value =  (data.slvl_amount / data.pay_rate) * 8;
    slvlDays.value = data.slvl_hrs != 0 ? data.pay_rate / data.slvl_amount : 0;

    //OVERTIME
    overtimeHrs.value =  (data.slvl_amount / data.pay_rate) * 8;
    overtimeDA.value = data.ot_hrs != 0 ? (data.pay_rate / 8) * 1.25 * 1 : 0;

    //OVERALL DAYS
    overallDays.value = (slvlDays.value + basicDays.value + ((data.offdays * 8) / 8) + parseInt(data.holiday_hrs));

    //TOTAL FOR ALL FOOTER
    totalcontri.value = parseFloat(data.sss_loan) + parseFloat(data.sss_prem) + parseFloat(data.pag_ibig_loan) + parseFloat(data.pag_ibig_prem) + parseFloat(data.philhealth);
    totaldeduc.value = parseFloat(data.advance) + parseFloat(data.charge) + parseFloat(data.uniform) + parseFloat(data.bond_deposit) + parseFloat(data.meal) + parseFloat(data.misc) + parseFloat(data.mutual_charge);
    totalearnings.value = (basicPay.value + parseFloat(data.ot_amount) + parseFloat(data.holiday_amount) + parseFloat(data.nightdif_amount) + parseFloat(data.offdays_amount) + parseFloat(data.slvl_amount) + parseFloat(data.late_amount) + parseFloat(data.udt_amount) + parseFloat(data.ctlate_amount));
    otherdeduc.value = parseFloat(data.late_amount) + parseFloat(data.udt_amount) + parseFloat(data.ctlate_amount);
    net.value = parseFloat(totalearnings.value - (otherdeduc.value + totalcontri.value + totaldeduc.value));
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
                                            {{ data.pay_rate }}
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
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.pay_rate }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ basicHrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ basicDays }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ basicPay }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">UNIFORM</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.uniform }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">SSS LOAN</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.sss_loan }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">RESTSDAYS</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ (data.pay_rate / 8) * 1.30 * (data.offdays * 8) }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.offdays * 8 }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ (data.offdays * 8) / 8 }}</td>
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
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.holiday_hrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.holiday_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">BOND DEPOSIT</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.bond_deposit }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">SSS PREM</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.sss_prem }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">SLVL</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.pay_rate }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ slvlHrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ slvlDays }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.slvl_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">CHARGE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.charge }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1"></td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">MUTUAL LOAN</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.mutual_loan }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">OVERTIME</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ overtimeDA }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.ot_hrs }}</td>
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
