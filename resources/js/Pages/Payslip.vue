<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    data : {
        type : Object,
    }
});

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

        // newWindow.print();
    } catch (error) {
        console.error('Error generating PDF:', error);
    } finally {
        // setTimeout(() => {
        //     newWindow.close();
        // }, 1000);

        // await router.visit('logoutPrint', { method: 'post' });
    }
};

const calculateTotalDeductions = () => {
    const advance = parseInt(props.data.advance) || 0;
    const charge = parseInt(props.data.charge) || 0;
    const canteen = parseInt(props.data.canteen) || 0;
    const misc = parseInt(props.data.misc) || 0;
    const uniform = parseInt(props.data.uniform) || 0;
    const bondDeposit = parseInt(props.data.bond_deposit) || 0;
    const mutualCharge = parseInt(props.data.mutual_charge) || 0;

    const total = advance + charge + canteen + misc + uniform + bondDeposit + mutualCharge;

    return total;
}

const calculateGrossEarnings = () => {
    const basic_pay = parseInt(props.data.no_days_sched*props.data.pay_rate) || 0;
    const ot_amount = parseInt(props.data.ot_amount) || 0;
    const holiday_amount = parseInt(props.data.holiday_amount) || 0;
    const nightdif_amount = parseInt(props.data.nightdif_amount) || 0;
    const late_amount = parseInt(props.data.late_amount) || 0;
    const slvl_amount = parseInt(props.data.slvl_amount) || 0;
    const udt_amount = parseInt(props.data.udt_amount) || 0;

    const total = (basic_pay + ot_amount + holiday_amount + nightdif_amount + slvl_amount + udt_amount) - late_amount;

    return total;
}

const calculateTotalContributions = () => {
    const sss_loan = parseInt(props.data.sss_loan) || 0;
    const pag_ibig_loan = parseInt(props.data.pag_ibig_loan) || 0;
    const mutual_loan = parseInt(props.data.mutual_loan) || 0;
    const sss_prem = parseInt(props.data.sss_prem) || 0;
    const pag_ibig_prem = parseInt(props.data.pag_ibig_prem) || 0;
    const philhealth = parseInt(props.data.philhealth) || 0;

    const total = sss_loan + pag_ibig_loan + mutual_loan + sss_prem + pag_ibig_prem + philhealth;

    return total;
}
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
                        <table class="min-w-full font-mono whitespace-nowrap" >
                            <thead class="pb-4">
                                <tr>
                                    <th class="px-1 font-bold text-2xl text-center" colspan="11">ELJIN CORP</th>
                                </tr>
                                <tr>
                                    <th class="px-1 font-bold text-xs text-center" colspan="11">Zone 2 Sta. Rosa Road Brgy Maliwalo Tarlac, City</th>
                                </tr>
                                <tr>
                                    <th class="px-1 py-1 font-bold text-[11px] text-start" colspan="4">
                                        <span class="min-w-24 inline-block pe-1">
                                            EMPLOYEE NAME:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.employee_name }}
                                        </span>
                                    </th>
                                    <th class="px-1 py-1 font-bold text-[11px] text-start" colspan="2">
                                        <span class="min-w-20 inline-block pe-1">
                                            JOB STATUS:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{  data.job_status }}
                                        </span>
                                    </th>
                                    <th class="px-1 py-1 font-bold text-[11px] text-start" colspan="3">
                                        <span class="min-w-16 inline-block pe-1">
                                            PAY RATE:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.pay_rate }}
                                        </span>
                                    </th>
                                    <th class=" px-1 py-1 font-bold text-[11px] text-start" colspan="2">
                                        <span class="min-w-12 inline-block pe-1">
                                            PERIOD:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.period+" - "+data.month+" "+data.year }}
                                        </span>
                                    </th>
                                </tr>
                                <tr >
                                    <th class="px-1 pt-1 pb-3 font-bold text-[11px] text-start" colspan="4">
                                        <span class="min-w-24 inline-block pe-1">
                                            DEPARTMENT:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.department }}
                                        </span>
                                    </th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-[11px] text-start" colspan="2">
                                        <span class="min-w-20 inline-block pe-1">
                                            RANK FILE:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.rank_file }}
                                        </span>
                                    </th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-[11px] text-start" colspan="3">
                                        <span class="min-w-16 inline-block pe-1">
                                            POSITION:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.job_title }}
                                        </span>
                                    </th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-[11px] text-start" colspan="2">
                                        <span class="min-w-12 inline-block pe-1">
                                            DAYS:
                                        </span>
                                        <span class="inline-block pe-1">
                                            {{ data.offdays }}
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <table class="w-full font-mono whitespace-nowrap" >

                            <thead class="bg-gray-200 border-2 border-black">
                                <tr>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">EARNINGS</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">HOUR(S)</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="2">AMOUNT</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">DEDUCTIONS</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="2">AMOUNT</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="1">CONTRIBUTIONS</th>
                                    <th class="pe-7 ps-2 py-1 font-bold text-[11px] text-start" colspan="3">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">BASIC PAY</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.totalhrsearned }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.basic_pay }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">ADVANCE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.advance }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">SSS LOAN</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.sss_loan }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">OVERTIME</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.ot_hrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.ot_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">CHARGE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.charge }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">SSS PREM</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.sss_prem }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">HOLIDAYS</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.holiday_hrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.holiday_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">MEAL</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.canteen }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">PAGIBIG LOAN</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.pag_ibig_loan }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">NIGHT DIFF</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.nightdif }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.nightdif_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">UNIFORM</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.uniform }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">PHIL HEALTH</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.philhealth }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">OFFDAYS</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.offdays }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">0</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">BOND DEPOSIT</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.bond_deposit }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">MUTUAL LOAN</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.mutual_loan }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">LATE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.minutes_late }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.late_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">MUTUAL CHARGE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.mutual_charge }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">PAGIBIG PREM</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">{{ data.pag_ibig_prem }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">SLVL</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.slvl_hrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.slvl_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">MISC</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.misc }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">-</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">PER TRIP</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.per_trip }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">0</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">-</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">UDT/HDY</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.udt_hrs }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">{{ data.udt_amount }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">-</td>
                                </tr>
                                <tr>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">CT LATE</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">{{ data.ctlate }}</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">0</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="1">-</td>
                                    <td class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">-</td>
                                </tr>
                            </tbody>
                            <thead class="bg-gray-200 border-2 border-black">
                                <tr>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">GROSS EARNINGS: {{ calculateGrossEarnings() }}</th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">RETRO: {{ data.retro }}</th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">TOTAL DEDUCTIONS: {{ calculateTotalDeductions() }}</th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="3">TOTAL CONTRIBUTIONS: {{ calculateTotalContributions() }}</th>
                                    <th class="pe-7 ps-2 py-1 text-[11px] text-start" colspan="2">NET PAY: {{ calculateGrossEarnings() - (calculateTotalDeductions() + calculateTotalContributions()) }}</th>
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
