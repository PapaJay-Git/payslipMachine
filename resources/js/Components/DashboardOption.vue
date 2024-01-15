<script setup>

const props = defineProps({
    href: {
        type: String,
        required: true,
    }
});

</script>

<template>
    <div class="transition-all flex items-center justify-center font-bold bg-gray-200 border-l-8 border-gray-800 w-full h-60 shadow-2xl hover:bg-gray-300 cursor-pointer text-2xl font-mono tracking-widest" @click="$inertia.visit(href)">
        <slot></slot>
    </div>
</template>
