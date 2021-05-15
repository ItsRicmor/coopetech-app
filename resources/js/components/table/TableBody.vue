<template>
    <tbody class="bg-white divide-y divide-gray-200">
        <slot />
    </tbody>
</template>

<script>
import TableBodyItem from "./TableBodyItem";

export default {
    name: "TableBody",
    components: {
        TableBodyItem,
    },
};
</script>
