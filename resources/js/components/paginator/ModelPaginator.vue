<template>
    <div class="bg-white px-4 py-3 shadow-xl flex items-center justify-between border-t border-gray-200">
        <nav class="relative z-0 inline-flex -space-x-px" aria-label="Pagination">
            <span v-for="link in model.links" :key="link.id">
                <inertia-link
                    :href="link.url != null ? link.url : '#'"
                    :class="pages(link.active)"
                    class="transition duration-150 ease-in-out focus:outline-none inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5"
                    preserve-state
                    as="button"
                    type="button"
                    >{{ link.label }}</inertia-link
                >
            </span>
        </nav>
        <p class="text-xs text-gray-400">
            Mostrando <span class="font-medium">{{ model.from }}</span> a <span class="font-medium">{{ model.to }}</span> de
            <span class="font-medium">{{ model.total }}</span> resultados
        </p>
    </div>
</template>

<script>
export default {
    props: {
        model: Object
    },

    methods: {
        pages(active) {
            return active
                ? 'border-yellow-200 text-gray-900 focus:border-yellow-400'
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300'
        }
    }
}
</script>
