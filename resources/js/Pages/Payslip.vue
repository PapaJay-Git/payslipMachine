<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Check Payslip</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="shadow-xl grid grid-cols-1 gap-4 bg-white overflow-hidden shadow-sm p-5 sm:rounded-lg sm:px-10 sm:px-5 md:px-8 py-10">

                    <div class="w-full flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900">Payslip</h2>

                        <SecondaryButton type="button" @click="$inertia.visit('/dashboard')">
                            Back
                        </SecondaryButton>
                    </div>
                    <div class="w-full mx-auto overflow-x-scroll mt-3 py-10 rounded-md">
                        <table class="min-w-full">
                            <thead class="bg-gray-200 border-2 border-black">
                                <tr>
                                    <th class="p-2 font-bold text-xs text-start">EARNINGS</th>
                                    <th class="p-2 font-bold text-xs text-start">HOUR(S)</th>
                                    <th class="p-2 font-bold text-xs text-start">AMOUNT</th>
                                    <th class="p-2 font-bold text-xs text-start">DEDUCTIONS</th>
                                    <th class="p-2 font-bold text-xs text-start">AMOUNT</th>
                                    <th class="p-2 font-bold text-xs text-start">DEDUCTIONS</th>
                                    <th class="p-2 font-bold text-xs text-start">AMOUNT</th>
                                    <th class="p-2 font-bold text-xs text-start">CONTRIBUTIONS</th>
                                    <th class="p-2 font-bold text-xs text-start">AMOUNT</th>
                                    <th class="p-2 font-bold text-xs text-start">CONTRIBUTIONS</th>
                                    <th class="p-2 font-bold text-xs text-start">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2 text-xs text-start">BASIC PAY</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">2300</td>
                                    <td class="p-2 text-xs text-start">ADVANCE</td>
                                    <td class="p-2 text-xs text-start">.00</td>
                                    <td class="p-2 text-xs text-start">BOND DEPOSIT</td>
                                    <td class="p-2 text-xs text-start">.00</td>
                                    <td class="p-2 text-xs text-start">SSS LOAN</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                    <td class="p-2 text-xs text-start">PHIL HEALTH</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-xs text-start">OVERTIME</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                    <td class="p-2 text-xs text-start">0.00</td>
                                    <td class="p-2 text-xs text-start">CHARGE</td>
                                    <td class="p-2 text-xs text-start">.00</td>
                                    <td class="p-2 text-xs text-start">MISC</td>
                                    <td class="p-2 text-xs text-start">.00</td>
                                    <td class="p-2 text-xs text-start">SSS PREM</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">MUTUAL LOAN</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-xs text-start">OVERTIME</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                    <td class="p-2 text-xs text-start">0.00</td>
                                    <td class="p-2 text-xs text-start">CHARGE</td>
                                    <td class="p-2 text-xs text-start">.00</td>
                                    <td class="p-2 text-xs text-start">MISC</td>
                                    <td class="p-2 text-xs text-start">.00</td>
                                    <td class="p-2 text-xs text-start">SSS PREM</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">MUTUAL LOAN</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-xs text-start">OFFSET</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                    <td class="p-2 text-xs text-start">0.00</td>
                                    <td class="p-2 text-xs text-start">MEAL</td>
                                    <td class="p-2 text-xs text-start">.00</td>
                                    <td class="p-2 text-xs text-start">MUTUAL CHARGE</td>
                                    <td class="p-2 text-xs text-start">.00</td>
                                    <td class="p-2 text-xs text-start">PAGIBIG LOAN</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                    <td class="p-2 text-xs text-start">PAGIBIG PREM</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-xs text-start">NIGHT DIFF</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                    <td class="p-2 text-xs text-start">0.00</td>
                                    <td class="p-2 text-xs text-start">UNIFORM</td>
                                    <td class="p-2 text-xs text-start">.00</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-xs text-start">OFFDAYS</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">0.00</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-xs text-start">HOLIDAY</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">0.00</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-xs text-start">SLVL</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">0.00</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-xs text-start">LATE</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                    <td class="p-2 text-xs text-start">0.00</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                </tr>
                                <tr>
                                    <td class="p-2 text-xs text-start">UDT/HDY</td>
                                    <td class="p-2 text-xs text-start">0</td>
                                    <td class="p-2 text-xs text-start">0.00</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                    <td class="p-2 text-xs text-start">-</td>
                                </tr>
                            </tbody>
                            <thead class="bg-gray-200 border-2 border-black">
                                <tr>
                                    <th class="p-2 text-xs text-start" colspan="2">GROSS EARNINGS: 2300</th>
                                    <th class="p-2 text-xs text-start" colspan="2">RETRO: 0</th>
                                    <th class="p-2 text-xs text-start" colspan="2">TOTAL DEDUCTIONS: 0</th>
                                    <th class="p-2 text-xs text-start" colspan="3">TOTAL CONTRIBUTIONS: 0</th>
                                    <th class="p-2 text-xs text-start" colspan="2">NET PAY: 2300</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="p-2 pt-5 text-xs text-start" colspan="8"></th>
                                    <th class="p-2 pt-5 text-xs text-start border-b-2 border-black" colspan="3"></th>
                                </tr>
                                <tr>
                                    <th class="p-2 text-xs text-start" colspan="9"></th>
                                    <th class="p-2 text-xs text-center">SIGNATURE</th>
                                    <th class="p-2 text-xs text-center"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
