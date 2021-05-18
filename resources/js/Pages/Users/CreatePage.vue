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
            <div class="lg:flex md:flex items-end justify-center pt-4 px-4 text-center sm:block sm:p-0">
                <div
                    class="lg:inline-block align-top bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full md:w-4/5"
                >
                    <form class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 grid gap-4 grid-cols-1 sm:grid-cols-2">
                        <input-form
                            id="name"
                            title="Nombre"
                            :error="$page.props.errors.name"
                            v-model:modelValue="user.name"
                            placeholder="Ingrese el nombre del usuario"
                            legend="Solo letras y números, sin puntuación ni caracteres especiales"
                        />
                        <input-form
                            id="email"
                            title="Email"
                            type="email"
                            :error="$page.props.errors.email"
                            v-model:modelValue="user.email"
                            placeholder="Ingrese el email"
                            legend="Solo letras y números, sin puntuación ni caracteres especiales"
                        />
                        <input-form
                            id="password"
                            title="Contraseña"
                            type="password"
                            :error="$page.props.errors.password"
                            v-model:modelValue="user.password"
                            placeholder="Ingrese la contraseña"
                            legend="Solo letras y números, sin puntuación ni caracteres especiales"
                        />
                        <input-form
                            id="password_confirmation"
                            title="Confirmar Contraseña"
                            type="password"
                            :error="$page.props.errors.password_confirmation"
                            v-model:modelValue="user.password_confirmation"
                            placeholder="Ingrese la contraseña de nuevo"
                            legend="Solo letras y números, sin puntuación ni caracteres especiales"
                        />
                    </form>
                    <div class="mb-5 flex justify-items-end">
                        <inertia-link
                            :href="route('users.index')"
                            class="ml-3 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-3 rounded inline-flex items-center"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span>Volver</span>
                        </inertia-link>
                        <button
                            wire:click.prevent="store()"
                            @click="save(user)"
                            class="ml-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded inline-flex items-center"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import InputForm from '@/components/inputs/InputForm'
export default {
    props: {
        brands: Array,
        categories: Array
    },
    components: {
        AppLayout,
        InputForm
    },

    data() {
        return {
            user: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            }
        }
    },
    methods: {
        save(user) {
            this.$inertia.post(route('users.index'), user)
        }
    }
}
</script>
