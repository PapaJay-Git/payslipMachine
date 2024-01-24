<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    data : {
        type : Object,
    }
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">No Data</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="shadow-xl grid grid-cols-1 gap-4 bg-white overflow-hidden shadow-sm p-5 sm:rounded-lg sm:px-10 sm:pe-7 ps-2 md:px-8 py-10">

                    <div class="w-full flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900">No Data</h2>

                        <div >
                            <SecondaryButton type="button" @click="$inertia.visit('/dashboard')">
                                Back
                            </SecondaryButton>
                        </div>
                    </div>
                    <div class="text-center text-gray-800 text-lg my-20 font-mono font-bold">
                        You currently have no data for this cut off.
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
