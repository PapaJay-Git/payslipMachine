<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps(['status', 'employee_number']);

const form = useForm({
    employee_number: props.employee_number,
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="mb-3 flex items-center justify-end">
                <SecondaryButton type="button" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="$inertia.visit('/')">
                    Back
                </SecondaryButton>
            </div>
            <div>
                <InputLabel for="employee_number" value="Employee Number" />

                <TextInput
                    id="employee_number"
                    type="number"
                    class="mt-1 block w-full bg-gray-300 text-black"
                    v-model="form.employee_number"
                    required
                    disabled
                    autocomplete="off"
                />

                <InputError class="mt-2" :message="form.errors.employee_number" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="PIN" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="off"
                    autofocus="on"
                />

                <InputError class="mt-2" :message="form.errors.password" />
                <input type="hidden" name="remember">
            </div>

            <div class="flex items-center justify-center mt-4">
                <PrimaryButton  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
