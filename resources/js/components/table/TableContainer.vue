<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
                class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
            >
                <div
                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                >
                    <table class="min-w-full divide-y divide-gray-200">
                        <table-header>
                            <slot name="header"></slot>
                        </table-header>
                        <table-body>
                            <slot name="body"></slot>
                        </table-body>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TableHeader from "./TableHeader";
import TableBody from "./TableBody";

export default {
    name: "TableContainer",
    components: {
        TableHeader,
        TableBody,
    },
};
</script>
