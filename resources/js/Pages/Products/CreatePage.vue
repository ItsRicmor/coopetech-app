<template functional>
    <app-layout>
        <template #header v-once>
            <div>
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 mr-2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                        />
                    </svg>
                    <span>Creación de Usuarios</span>
                </h2>
            </div>
        </template>

        <div class="flex flex-col">
            <div
                class="lg:flex md:flex items-end justify-center min-h-screen pt-4 px-4 text-center sm:block sm:p-0"
            >
                <div
                    class="lg:inline-block align-top bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                >
                    <div class="form-inline mb-5">
                        <inertia-link
                            :href="route('products.index')"
                            class="ml-3 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 rounded inline-flex items-center"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                />
                            </svg>
                            <span>Volver</span>
                        </inertia-link>
                        <button
                            wire:click.prevent="store()"
                            @click="save(product)"
                            class="ml-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded inline-flex items-center"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"
                                />
                            </svg>
                            <span>Guardar</span>
                        </button>
                    </div>

                    <form class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <input-form
                            id="code_id"
                            title="Codigo"
                            :error="$page.props.errors.code_id"
                            v-model:modelValue="product.code_id"
                            placeholder="Ingrese el código del producto"
                            legend="Solo letras y números, sin puntuación ni caracteres especiales"
                        />
                        <input-form
                            id="display_name"
                            title="Nombre"
                            :error="$page.props.errors.display_name"
                            v-model:modelValue="product.display_name"
                            placeholder="Ingrese el nombre del producto"
                            legend="Solo letras y números, sin puntuación ni caracteres especiales"
                        />
                        <input-form
                            id="description"
                            title="Descripción"
                            :error="$page.props.errors.description"
                            v-model:modelValue="product.description"
                            placeholder="Ingrese el descripción del producto"
                            legend="Solo letras y números, sin puntuación ni caracteres especiales"
                        />
                        <input-form
                            id="quantity"
                            title="Cantidad"
                            :error="$page.props.errors.quantity"
                            v-model:modelValue="product.quantity"
                            placeholder="Ingrese la cantidad del producto"
                            legend="Solo números, sin letras, ni puntuación ni caracteres especiales"
                        />
                        <input-form
                            id="price"
                            title="Precio"
                            :error="$page.props.errors.price"
                            v-model:modelValue="product.price"
                            placeholder="Ingrese el precio del producto"
                            legend="Solo números, sin letras, ni puntuación ni caracteres especiales"
                        />
                        <select-form
                            id="brand_id"
                            title="Marca"
                            :error="$page.props.errors.brand_id"
                            v-model:modelValue="product.brand_id"
                            legend="Seleccionar de la lista de marcas"
                        >
                            <option :value="null" class="text-gray-400">
                                Seleccione una marca
                            </option>
                            <option
                                v-for="brand in brands"
                                :key="brand.id"
                                :value="brand.id"
                            >
                                {{ brand.display_name }}
                            </option>
                        </select-form>
                        <select-form
                            id="category_id"
                            title="Categoría"
                            :error="$page.props.errors.category_id"
                            v-model:modelValue="product.category_id"
                            legend="Seleccionar de la lista de categorías"
                        >
                            <option :value="null" class="text-gray-400">
                                Seleccione una categoria
                            </option>
                            <option
                                v-for="category in categories"
                                :key="category.id"
                                :value="category.id"
                            >
                                {{ category.display_name }}
                            </option>
                        </select-form>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import InputForm from "@/components/inputs/InputForm";
import SelectForm from "@/components/inputs/SelectForm";
export default {
    props: {
        brands: Array,
        categories: Array,
    },
    components: {
        AppLayout,
        InputForm,
        SelectForm,
    },

    data() {
        return {
            product: {
                code_id: null,
                display_name: null,
                description: null,
                quantity: null,
                price: null,
                brand_id: null,
                category_id: null,
            },
        };
    },
    watch: {
        code_id: function (val) {
            console.log(val);
        },
    },
    methods: {
        save(product) {
            product.name_slug = product.display_name
                ? product.display_name.replace(/ /g, "_").toLowerCase()
                : "";
            this.$inertia.post(route("products.index"), product);
        },
    },
};
</script>
