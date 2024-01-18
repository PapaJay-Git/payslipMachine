<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';

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
        setTimeout(() => {
            newWindow.close();
        }, 1000);

        await router.visit('logoutPrint', { method: 'post' });
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
                <div class="shadow-xl grid grid-cols-1 gap-4 bg-white overflow-hidden shadow-sm p-5 sm:rounded-lg sm:px-10 sm:px-5 md:px-8 py-10">

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
                                    <th class="px-1 pt-3 font-bold text-xs text-center" colspan="11">Zone 2 Sta. Rosa Road Brgy Maliwalo Tarlac, City</th>
                                </tr>
                                <tr>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="1">EMPLOYEE NAME:</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="3">LIWANAG JULIUS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="1">JOB STATUS:</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="1">REGULAR</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="1">PAY RATE:</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="2">450.00</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="2">NO OFF DAYS</th>
                                </tr>
                                <tr >
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="1">DEPARTMENT:</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="3">Logistics and Warehouse Department</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="1">RANK FILE:</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="1">STAFF</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="1">POSITION:</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="2">Delivery Driver</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="2">5</th>
                                </tr>
                            </thead>
                            <thead class="bg-gray-200 border-2 border-black">
                                <tr>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="1">EARNINGS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="1">HOUR(S)</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="2">AMOUNT</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="1">DEDUCTIONS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="2">AMOUNT</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="1">CONTRIBUTIONS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="3">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">BASIC PAY</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">2300</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">ADVANCE</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">SSS LOAN</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">0.00</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">OVERTIME</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">CHARGE</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">SSS PREM</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">0.00</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">HOLIDAYS</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">MEAL</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">PAGIBIG LOAN</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">0.00</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">NIGHT DIFF</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">UNIFORM</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">PHIL HEALTH</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">0.00</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">OFFDAYS</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">BOND DEPOSIT</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">MUTUAL LOAN</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">0.00</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">LATE</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">MUTUAL CHARGE</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">PAGIBIG PREM</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">0.00</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">SLVL</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">MISC</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">PER TRIP</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">UDT/HDY</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">CT LATE</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">0</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="2">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="1">-</td>
                                    <td class="px-1 py-1 text-xs text-start" colspan="3">-</td>
                                </tr>
                            </tbody>
                            <thead class="bg-gray-200 border-2 border-black">
                                <tr>
                                    <th class="px-1 py-1 text-xs text-start" colspan="2">GROSS EARNINGS: 2300</th>
                                    <th class="px-1 py-1 text-xs text-start" colspan="2">RETRO: 0</th>
                                    <th class="px-1 py-1 text-xs text-start" colspan="2">TOTAL DEDUCTIONS: 0</th>
                                    <th class="px-1 py-1 text-xs text-start" colspan="3">TOTAL CONTRIBUTIONS: 0</th>
                                    <th class="px-1 py-1 text-xs text-start" colspan="2">NET PAY: 2300</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="px-1 pt-5 text-xs text-start" colspan="8"></th>
                                    <th class="px-1 pt-5 text-xs text-start border-b-2 border-black" colspan="3"></th>
                                </tr>
                                <tr>
                                    <th class="px-1 py-1 text-xs text-start" colspan="8"></th>
                                    <th class="px-1 py-1 text-xs text-center" colspan="3">SIGNATURE</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
