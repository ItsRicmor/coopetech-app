<template>
    <app-layout>
        <template #header>
            <div>
                <button
                    @click="create()"
                    class="float-right bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center ml-1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Crear</span>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Usuarios</span>
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table-container>
                        <template #header>
                            <table-header-item class="sr-only" hidden>Action</table-header-item>
                            <table-header-item v-for="header in headers" :key="header.id">{{ header }}</table-header-item>
                        </template>
                        <template #body>
                            <tr v-for="user in users.data" :key="user.id">
                                <table-body-item class="text-indigo-600 hover:text-indigo-900">
                                    <a href="#">Edit</a>
                                </table-body-item>

                                <table-body-item class="text-sm text-gray-900">{{ user.name }}</table-body-item>
                                <table-body-item class="text-sm text-gray-900">{{ user.email }}</table-body-item>
                            </tr>
                        </template>
                    </table-container>
                    <model-paginator :model="users" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import TableContainer from '@/components/table/TableContainer'
import TableHeaderItem from '@/components/table/TableHeaderItem'
import TableBodyItem from '@/components/table/TableBodyItem'
import ModelPaginator from '@/components/paginator/ModelPaginator'

export default {
    props: {
        users: Array
    },
    components: {
        AppLayout,
        TableContainer,
        TableHeaderItem,
        TableBodyItem,
        ModelPaginator
    },

    data() {
        return {
            headers: ['Nombre', 'email']
        }
    },

    methods: {
        create() {
            this.$inertia.visit(route('users.create'))
        },
        pages(active) {
            return active
                ? 'border-yellow-200 text-gray-900 focus:border-yellow-400'
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300'
        }
    }
}
</script>
