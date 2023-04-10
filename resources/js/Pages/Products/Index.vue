<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Pagination from '@/Components/Pagination.vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import TextInput from '@/Components/TextInput.vue';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    products: Object,
    filter: String
});

let search = ref(props.filter);

watch(search, value => {
    Inertia.get(route('products.index'), {
        term: value,
    }, { 
        preserveState: true 
    });
});

</script>

<template>

    <Head title="Produtos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Produtos</h2>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-right">
                <Link :href="route('products.create')">
                    <PrimaryButton >
                        Cadastrar produto
                    </PrimaryButton>
                </Link>
                <div class="relative float-left w-1/4">
                    <TextInput type="text" 
                        class="py-2 pl-10 pr-4 block w-full rounded-lg bg-gray-200 border-transparent focus:bg-white focus:border-gray-300 focus:ring-0" 
                        placeholder="Search"
                        v-model="search"
                    />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-6 h-6 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M10 18a8 8 0 1 1 4.93-2.17l5.28 5.28a1 1 0 0 1-1.41 1.41l-5.28-5.28A7.96 7.96 0 0 1 10 18zm0-14a6 6 0 1 0 6 6 6 6 0 0 0-6-6z"/>
                        </svg>
                    </div>
                </div>
                <div class="my-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Categoria
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Preço
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    v-for="product in products.data">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ product.name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ product.color.name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ product.category.name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ product.price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <Pagination :meta="products.meta" :search="search" class="mb-2"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
