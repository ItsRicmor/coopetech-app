<template>
    <td class="px-6 py-4 whitespace-nowrap" :class="custom_class">
        <slot />
    </td>
</template>

<script>
export default {
    name: "TableBodyItem",
    props: ["custom_class"],
};
</script>
