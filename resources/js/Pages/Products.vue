<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Productos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table-container>
                        <template #header>
                            <table-header-item>Nombre</table-header-item>
                            <table-header-item>Descriptión</table-header-item>
                            <table-header-item>Cantidad</table-header-item>
                            <table-header-item>Marca</table-header-item>
                            <table-header-item>Categoria</table-header-item>
                            <table-header-item hidden>
                                <span class="sr-only">Edit</span>
                            </table-header-item>
                        </template>
                        <template #body>
                            <tr>
                                <table-body-item>
                                    <div class="text-sm text-gray-900">
                                        Lapíz
                                    </div>
                                </table-body-item>
                                <table-body-item>
                                    <div class="text-sm text-gray-900">
                                        Un lapíz fabuloso
                                    </div>
                                </table-body-item>
                                <table-body-item>
                                    <div class="text-sm text-gray-900">1</div>
                                </table-body-item>
                                <table-body-item>
                                    <div class="text-sm text-gray-900">
                                        Faber Castell
                                    </div>
                                </table-body-item>
                                <table-body-item>
                                    <div class="text-sm text-gray-900">
                                        Utiles
                                    </div>
                                </table-body-item>
                                <table-body-item>
                                    <a
                                        href="#"
                                        class="text-indigo-600 hover:text-indigo-900"
                                        >Edit</a
                                    >
                                </table-body-item>
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
    components: {
        AppLayout,
        TableContainer,
        TableHeaderItem,
        TableBodyItem,
    },
};
</script>
