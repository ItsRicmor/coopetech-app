<template functional>
    <app-layout>
        <template #header v-once>
             <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Creación de Usuarios</span>
                </h2>
            </div>
        </template>

        <div class="flex flex-col">
            <div class="lg:flex md:flex items-end justify-center min-h-screen pt-4 px-4 text-center sm:block sm:p-0">
                <div class="lg:inline-block align-top bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="form-inline mb-5">
                        <inertia-link :href="route('products.index')" class="ml-3 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 rounded inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span>Volver</span>
                        </inertia-link>
                        <button wire:click.prevent="store()" @click="save(product)" class="ml-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <span>Guardar</span>
                        </button>
                    </div>

                    <form class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label for="code_id" class="block text-gray-700 text-sm font-bold mb-2">Código: <span v-if="$page.props.errors.code_id" class="text-red-500 text-xs">{{ $page.props.errors.code_id }}</span></label>
                            <input v-model="product.code_id" type="text" id="code_id" placeholder="Ingrese el código del producto" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <span class="text-gray-400 text-xs">Solo letras y números, sin puntuación ni caracteres especiales</span>
                        </div>
                        <div class="mb-4">
                            <label for="display_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre: <span v-if="$page.props.errors.display_name" class="text-red-500 text-xs">{{ $page.props.errors.display_name }}</span></label>
                            <input v-model="product.display_name" type="text" id="display_name" placeholder="Ingrese el nombre del producto" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <span class="text-gray-400 text-xs">Solo letras y números, sin puntuación ni caracteres especiales</span>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción: <span v-if="$page.props.errors.description" class="text-red-500 text-xs">{{ $page.props.errors.description }}</span></label>
                            <textarea v-model="product.description" id="description" placeholder="Ingrese el descripción del producto" class="smt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            <span class="text-gray-400 text-xs">Solo letras, sin números, ni puntuación ni caracteres especiales</span>
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Cantidad: <span v-if="$page.props.errors.quantity" class="text-red-500 text-xs">{{ $page.props.errors.quantity }}</span></label>
                            <input v-model="product.quantity" type="number" id="quantity" placeholder="Ingrese la cantidad del producto" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <span class="text-gray-400 text-xs">Solo números, sin letras, ni puntuación ni caracteres especiales</span>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio: <span v-if="$page.props.errors.price" class="text-red-500 text-xs">{{ $page.props.errors.price }}</span></label>
                            <input v-model="product.price" type="number" id="price" placeholder="Ingrese el precio del producto" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <span class="text-gray-400 text-xs">Solo números, sin letras, ni puntuación ni caracteres especiales</span>
                        </div>
                        <div class="mb-4">
                            <label for="brand_id" class="block text-gray-700 text-sm font-bold mb-2">Marca: <span v-if="$page.props.errors.brand_id" class="text-red-500 text-xs">{{ $page.props.errors.brand_id }}</span></label>
                            <select v-model="product.brand_id" id="brand_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option :value="null" class="text-gray-400">Seleccione una marca</option>
                                <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{brand.display_name}}</option>
                            </select>
                            <span class="text-gray-400 text-xs">Seleccionar de la lista de marcas</span>
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Categoria: <span v-if="$page.props.errors.category_id" class="text-red-500 text-xs">{{ $page.props.errors.category_id }}</span></label>
                            <select v-model="product.category_id" id="category_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option :value="null" class="text-gray-400">Seleccione una categoria</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">{{category.display_name}}</option>
                            </select>
                            <span class="text-gray-400 text-xs">Seleccionar de la lista de categorias</span>
                        </div>
                    </form>
                </div>   
            </div>   
        </div> 
 
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout"
export default {
    props: {
        brands: Array,
        categories: Array,
    },
    components: {
        AppLayout,
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
        }
    },

    methods: {
        save(product) {
            product.name_slug = product.display_name ? product.display_name.replace(/ /g,"_").toLowerCase() : ''
            this.$inertia.post(route('products.index'), product)
        }
    }
}
</script>
