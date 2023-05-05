<template>
    <div class="flex gap-x-4 w-3/4">
        <div class="min-w-0 flex-auto">
            <p class="text-lg font-semibold leading-6 text-gray-900">{{ todo.title }}</p>
            <p class="mt-1 text-xs leading-5 text-gray-500">{{ todo.description }}</p>
        </div>
    </div>
    <div class="hidden sm:flex sm:flex-col sm:items-end">
        <form>
            <button @click="deleteTodo(todo)"
                    class="text-sm leading-6 text-gray-900 bg-gray-300 hover:bg-red-500 p-2 rounded-lg">
                Mark Complete
            </button>
        </form>

        <p class="mt-1 text-xs leading-5 text-gray-500">
            Deadline:
            <time>{{ todo.deadline }}</time>
        </p>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: 'TodoLayout',
    props: {
        todo: {}
    },
    emits: ['deleted'],
    methods: {
        async deleteTodo(todo) {
            await axios.delete(`/dashboard/todos/${todo.id}/delete`);
            this.$emit('deleted', todo);
        }
    }
}
</script>
