<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import NewTodoForm from "@/Components/TodoForms/NewTodoForm.vue";
import TodoLayout from "@/Components/TodoForms/TodoLayout.vue";
import {Head} from '@inertiajs/vue3';

defineProps({
    todos: {}
});

</script>

<template>
    <Head title="Dashboard"></Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">List of Todos</h2>
        </template>

        <div class="p-6 bg-gray-300 rounded-lg w-4/5 m-auto mt-6">
            <div class="bg-gray-100 p-6 rounded-lg m-auto">
                <NewTodoForm/>
            </div>

            <div v-if="todos.length">
                <div class="bg-gray-100 p-6 rounded-lg m-auto mt-6">
                    <ul role="list" class="divide-y divide-gray-100">
                        <li v-for="todo in todos" class="flex justify-between gap-x-6 py-5">
                            <TodoLayout :todo="todo"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
