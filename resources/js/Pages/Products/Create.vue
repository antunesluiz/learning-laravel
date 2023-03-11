<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';

defineProps({
    categories: Object,
    colors: Object,
});

const form = useForm({
    name: '',
    colorId: '',
    price: '',
    categoryId: ''
});

const submitForm = async () => {
    form.post(route('products.store'));
}

</script>

<template>
    <Head title="Create Product" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Adicionar produtos</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto p-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Adicionar produtos</h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Preencha o formulário abaixo para adicionar um novo produto.
                            </p>
                        </header>

                        <form @submit.prevent="submitForm" class="mt-6 space-y-6">
                            <div>
                                <InputLabel for="name" value="Name" />

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />

                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div>
                                <InputLabel for="color" value="Color" />

                                <SelectInput
                                    v-model="form.colorId"
                                    id="colorId"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="colorId"
                                    :options="colors"
                                />

                                <InputError class="mt-2" :message="form.errors.color_id" />
                            </div>

                            <div>
                                <InputLabel for="price" value="Price" />

                                <TextInput
                                    id="price"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.price"
                                    required
                                    autofocus
                                    autocomplete="price"
                                />

                                <InputError class="mt-2" :message="form.errors.price" />
                            </div>

                            <div>
                                <InputLabel for="categoryId" value="Categoria" />

                                <SelectInput
                                    v-model="form.categoryId"
                                    id="categoryId"
                                    class="mt-1 block w-full"
                                    required
                                    autofocus
                                    autocomplete="categoryId"
                                    :options="categories"
                                />

                                <InputError class="mt-2" :message="form.errors.category_id" />
                            </div>


                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
