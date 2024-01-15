<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    employee_number: '',
});

const submit = () => {
    form.post(route('loginEmployeeNumber'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Enter Employee Number" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="employee_number" value="Employee Number" />

                <TextInput
                    id="employee_number"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.employee_number"
                    required
                    autofocus
                    autocomplete="off"
                />

                <InputError class="mt-2" :message="form.errors.employee_number" />
            </div>

            <div class="flex items-center justify-center mt-4">

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    PROCEED
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
