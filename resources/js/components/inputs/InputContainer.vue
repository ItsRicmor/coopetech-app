<template>
    <div class="mb-4">
        <label :for="id" class="block text-gray-700 text-sm font-bold mb-2"
            >{{ title }}:
            <span v-if="!!error" class="text-red-500 text-xs">{{
                error
            }}</span></label
        >
        <slot />
        <span class="text-gray-400 text-xs">{{ legend }}</span>
    </div>
</template>

<script>
export default {
    name: "InputContainer",
    props: {
        id: [Number, String],
        error: [Boolean, String],
        legend: String,
        title: String,
    },
};
</script>
