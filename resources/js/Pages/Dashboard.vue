<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit" >
                            <div id="todoInput">
                                <Input :name="'todo'" v-model="newTodo" />
                                <Button>Add</Button>
                            </div>
                        </form>
                        <table>
                            <tr>
                                <th>Todo</th>
                                <th colspan="2"></th>
                            </tr>
                            <tr v-for="todo in todos" :key="todo.id">
                                <td>
                                    <label :class="!!todo.done && 'done'">
                                        <Checkbox @update:checked="check" :value="todo.id" :checked="!!todo.done"/> {{ todo.description }}
                                    </label>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";
import Checkbox from '@/Components/Checkbox.vue';
import Button from '@/Components/Button.vue';
import Input from '@/Components/Input.vue';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Checkbox,
        Button,
        Input
    },
    props: {
        todos: {
            type: [Array],
        },
    },
    methods: {
        submit() {
            Inertia.post('/todo', {"description": this.newTodo});
        },
        check(checkboxInfo){
            Inertia.post('/check', checkboxInfo);
        },
        delete(id){
            console.log(id);
        }
    },
    data() {
        return {
            newTodo: null
        }
    }
}
</script>

<style>
    .done{
        text-decoration: line-through;
    }
    table {
        width: 100%;
    }
    table tr:nth-child(even) {
        background: #f3f4f6;
    }
    table tr td:first-child{
        width:0.1%;
        white-space: nowrap;
        padding-right: 20px;
    }
    table tr td:first-child input[type='checkbox']{
        margin-right: 10px;
    }
</style>
