<template>
    <th
        scope="col"
        :class="
            hidden
                ? 'relative px-6 py-3'
                : 'px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'
        "
    >
        <slot />
    </th>
</template>

<script>
export default {
    props: ["hidden"],
    name: "TableHeaderItem",
};
</script>
