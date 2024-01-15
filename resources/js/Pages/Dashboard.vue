<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import DashboardOption from '@/Components/DashboardOption.vue';
import GridParent from '@/Components/GridParent.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <GridParent>
                    <DashboardOption href="/payslip">
                        Check Payslip
                    </DashboardOption>
                    <DashboardOption href="/pin">
                        Change PIN
                    </DashboardOption>
                </GridParent>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
