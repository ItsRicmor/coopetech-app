<template>
    <input-container :id="id" :title="title" :error="error" :legend="legend">
        <input
            v-bind="{ id, type, placeholder }"
            :value="modelValue"
            @input="updateValue($event.target.value)"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        />
    </input-container>
</template>

<script>
import InputContainer from "./InputContainer";

export default {
    name: "InputForm",
    props: {
        modelValue: [Number, String],
        id: [Number, String],
        error: [Boolean, String],
        legend: String,
        placeholder: String,
        title: String,
        type: {
            type: String,
            validator: (prop) =>
                ["number", "text", "email", "search"].includes(prop),
            default: "text",
        },
    },
    components: {
        InputContainer,
    },
    methods: {
        updateValue(val) {
            this.$emit("update:modelValue", val);
        },
    },
};
</script>
