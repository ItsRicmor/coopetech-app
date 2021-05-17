<template>
    <app-layout>
        <template #header>
             <div>
                <button @click="create()" class="float-right bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Crear</span>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Productos</span>
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table-container>
                        <template #header>
                            <table-header-item class="sr-only" hidden>Action</table-header-item>
                            <table-header-item v-for="header in headers" :key="header.id">{{header}}</table-header-item>
                        </template>
                        <template #body>
                            <tr v-for="product in products" :key="product.id" class="hover:bg-gray-100" @dblclick="edit(product)">
                                <table-body-item class="text-indigo-600 hover:text-indigo-900">
                                    <a @click="edit(product)" href="#">Edit</a>
                                </table-body-item>

                                <table-body-item class="text-sm text-gray-900">{{ product.display_name }}</table-body-item>
                                <table-body-item class="text-sm text-gray-900">{{ product.quantity }}</table-body-item>
                                <table-body-item class="text-sm text-gray-900">{{ product.brand.display_name }}</table-body-item>
                                <table-body-item class="text-sm text-gray-900">{{ product.category.display_name }}</table-body-item>
                            </tr>
                        </template>
                    </table-container>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import TableContainer from "@/components/table/TableContainer";
import TableHeaderItem from "@/components/table/TableHeaderItem";
import TableBodyItem from "@/components/table/TableBodyItem";

export default {
    props: {
        products: Array,
    },
    components: {
        AppLayout,
        TableContainer,
        TableHeaderItem,
        TableBodyItem,
    },

    data() {
        return { 
            headers:['Nombre','Cantidad','Marca','Categoria'],
        };
    },

    created: function () {
        // `this` hace referencia a la instancia vm
        console.log("a es: ", this.products);
    },

    methods: {
        create () {
            this.$inertia.visit(route('products.create'));
        },
        edit(product){
            this.$inertia.visit('/products/' + product.name_slug + '/edit')
        },
    },
};
</script>
