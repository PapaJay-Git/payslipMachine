<script setup>
import { ref } from "vue";

const showModal = ref(false);

const showModalFunction = () => {
    showModal.value = ! showModal.value;
};

</script>

<template>
    <div class="fixed top-0 left-0 h-full w-full flex items-center justify-center" v-show="showModal">
        <div class="absolute w-full h-full bg-black bg-opacity-50"  @click="showModalFunction()"></div>
        <div class="z-50 w-1/2 bg-white p-6 rounded shadow-lg">
            <div class="flex items-center justify-end">
                <button class="bg-gray-200 px-2 py-1 border border-gray-300 rounded shadow-sm hover:bg-gray-300" @click="showModalFunction()">
                    &times;
                </button>
            </div>
            <h1>MODAL</h1>
        </div>
    </div>
    <button class="bg-blue-500 text-white px-4 py-1 rounded shadow-sm hover:bg-blue-700 active:bg-blue-700" @click="showModalFunction()">Show Modal</button>
</template>
