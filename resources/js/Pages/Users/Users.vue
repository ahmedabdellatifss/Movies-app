<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import {Head , Link} from "@inertiajs/inertia-vue3";

defineProps({
    users: {
        type: Object,
        default: () => ({}),
    },
});
function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        Inertia.delete(route("users.destroy", id));
    }
}
</script>

<template #header>

<Head title="Users List" />
<AuthenticatedLayout>  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <Link :href="route('users.create')" class="inline-block px-4 py-3 bg-blue-500 text-white rounded mb-4">Create New User</Link>
                <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
                    <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                BirthDate
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" class="bg-blue-500 border-b border-blue-400">
                        
                            <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                {{user.id}}
                            </th>
                            <td class="px-6 py-4">
                                {{user.name}}
                            </td>
                            <td class="px-6 py-4">
                                {{user.email}}
                            </td>
                            <td class="px-6 py-4">
                                {{user.birthdate}}
                            </td>
                            <td class="px-6 py-4">
                                <Link :href="route('users.edit', user.id )" class="px-4 py-2 text-white bg-green-600 rounded-lg mr-2">Edit</Link>
                                <button type="button" @click="destroy(user.id)" class="inline-block  px-2 py-1 bg-red-500 text-white rounded "> Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
</AuthenticatedLayout>
</template>


