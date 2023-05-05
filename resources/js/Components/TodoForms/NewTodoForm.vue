<template>
    <form>

        <div class="pb-12">
            <div class="mt-10 grid gap-x-6 gap-y-8">
                <div>
                    <label for="title"
                           class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input type="text" name="title" id="title" required v-model="form.title"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                    </div>
                </div>

                <div>
                    <label for="description"
                           class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <input type="text" name="description" id="description" required
                               v-model="form.description"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                    </div>
                </div>

                <div>
                    <label for="deadline"
                           class="block text-sm font-medium leading-6 text-gray-900">Deadline</label>
                    <div class="mt-2">
                        <input id="deadline" name="deadline" type="date" required v-model="form.deadline"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                    </div>
                </div>
            </div>

            <div
                class="text-sm text-gray-900 hover:bg-gray-500 bg-gray-300 rounded-lg  m-4 text-center">
                <button @click="addTodo" class="w-full h-full p-2">Submit</button>
            </div>
        </div>


    </form>
</template>
<script>
import axios from "axios";

export default {
    name: 'NewTodoForm',
    data() {
        return {
            form: {
                'title': '',
                'description': '',
                'deadline': ''
            }
        };
    },
    methods: {
        addTodo() {
            axios.post('/dashboard/todos', this.form);
        }
    }
}
</script>
