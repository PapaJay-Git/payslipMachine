<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const props = defineProps({
    message: {
        type: String,
        default: '',
    },
});

const isVanishedText = ref(false);
const isVanishedContainer = ref(false);

onMounted(() => {

    setTimeout(() => {
        isVanishedText.value = true;
    }, 5000);

    setTimeout(() => {
        isVanishedContainer.value = true;
    }, 5750);
});

const form = useForm({
    employee_number: "",
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

        <div v-if="props.message !== ''" class="mb-4 font-medium text-md text-blue-600 text-center animate-pulse" :class="{'transition-all duration-700 ease-linear hidden': isVanishedContainer}">
            <span :class="{ 'opacity-0 transition-opacity duration-700 ease-linear': isVanishedText }">{{ props.message }}</span>
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="employee_number" value="Employee Number" />

                <TextInput
                    id="employee_number"
                    type="text"
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

<style scoped>
.vanish-text {
  opacity: 0;
  transition: opacity 0.5s ease-in-out;
}
</style>
