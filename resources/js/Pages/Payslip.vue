<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const print = () => {
      // Your printing code here
      const prtHtml = document.getElementById('printJS-Table').innerHTML;
      let stylesHtml = '';
      for (const node of [...document.querySelectorAll('link[rel="stylesheet"], style')]) {
        stylesHtml += node.outerHTML;
      }

      const WinPrint = window.open('', '', 'left=0,top=0,width=3000,height=1000,toolbar=0,scrollbars=0,status=0,fullscreen=1');

      WinPrint.document.write(`<!DOCTYPE html>
        <html>
          <head>
            ${stylesHtml}
            <style>
            @media print {
                @page {
                    size: portrait;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    padding-left: 20px;
                    padding-right: 20px;
                }
            }
            </style>
          </head>
          <body>
            ${prtHtml}
          </body>
        </html>`);

      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
};

const generatePDF = () => {
    const pdfUrl = '/generate-pdf';

    const newWindow = window.open(pdfUrl, '_blank');

    newWindow.onload = () => {
        newWindow.print();

        setTimeout(() => {
            newWindow.close();
        }, 1000);
    };
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
                                    <th class="px-1 py-1 font-bold text-xs text-start">EMPLOYEE NAME:</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="3">LIWANAG JULIUS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">JOB STATUS:</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">REGULAR</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">PAY RATE:</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start" colspan="2">450.00</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">NO OFF DAYS</th>
                                </tr>
                                <tr >
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start">DEPARTMENT:</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="3">Logistics and Warehouse Department</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start">RANK FILE:</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start">STAFF</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start">POSITION:</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start" colspan="2">Delivery Driver</th>
                                    <th class="px-1 pt-1 pb-3 font-bold text-xs text-start">5</th>
                                </tr>
                            </thead>
                            <thead class="bg-gray-200 border-2 border-black">
                                <tr>
                                    <th class="px-1 py-1 font-bold text-xs text-start">EARNINGS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">HOUR(S)</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">DEDUCTIONS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">DEDUCTIONS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">CONTRIBUTIONS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">CONTRIBUTIONS</th>
                                    <th class="px-1 py-1 font-bold text-xs text-start">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">BASIC PAY</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">2300</td>
                                    <td class="px-1 py-1 text-xs text-start">ADVANCE</td>
                                    <td class="px-1 py-1 text-xs text-start">.00</td>
                                    <td class="px-1 py-1 text-xs text-start">BOND DEPOSIT</td>
                                    <td class="px-1 py-1 text-xs text-start">.00</td>
                                    <td class="px-1 py-1 text-xs text-start">SSS LOAN</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                    <td class="px-1 py-1 text-xs text-start">PHIL HEALTH</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">OVERTIME</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                    <td class="px-1 py-1 text-xs text-start">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start">CHARGE</td>
                                    <td class="px-1 py-1 text-xs text-start">.00</td>
                                    <td class="px-1 py-1 text-xs text-start">MISC</td>
                                    <td class="px-1 py-1 text-xs text-start">.00</td>
                                    <td class="px-1 py-1 text-xs text-start">SSS PREM</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">MUTUAL LOAN</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">OVERTIME</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                    <td class="px-1 py-1 text-xs text-start">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start">CHARGE</td>
                                    <td class="px-1 py-1 text-xs text-start">.00</td>
                                    <td class="px-1 py-1 text-xs text-start">MISC</td>
                                    <td class="px-1 py-1 text-xs text-start">.00</td>
                                    <td class="px-1 py-1 text-xs text-start">SSS PREM</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">MUTUAL LOAN</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">OFFSET</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                    <td class="px-1 py-1 text-xs text-start">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start">MEAL</td>
                                    <td class="px-1 py-1 text-xs text-start">.00</td>
                                    <td class="px-1 py-1 text-xs text-start">MUTUAL CHARGE</td>
                                    <td class="px-1 py-1 text-xs text-start">.00</td>
                                    <td class="px-1 py-1 text-xs text-start">PAGIBIG LOAN</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                    <td class="px-1 py-1 text-xs text-start">PAGIBIG PREM</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">NIGHT DIFF</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                    <td class="px-1 py-1 text-xs text-start">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start">UNIFORM</td>
                                    <td class="px-1 py-1 text-xs text-start">.00</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">OFFDAYS</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">HOLIDAY</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">SLVL</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">LATE</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                    <td class="px-1 py-1 text-xs text-start">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="px-1 py-1 text-xs text-start">UDT/HDY</td>
                                    <td class="px-1 py-1 text-xs text-start">0</td>
                                    <td class="px-1 py-1 text-xs text-start">0.00</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
                                    <td class="px-1 py-1 text-xs text-start">-</td>
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
                                    <th class="px-1 py-1 text-xs text-start" colspan="9"></th>
                                    <th class="px-1 py-1 text-xs text-center">SIGNATURE</th>
                                    <th class="px-1 py-1 text-xs text-center"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
