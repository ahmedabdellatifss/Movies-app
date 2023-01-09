<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import {Head , Link} from "@inertiajs/inertia-vue3";

defineProps({
    movies: {
        type: Object,
        default: () => ({}),
    },
});
function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        Inertia.delete(route("movies.destroy", id));
    }
}
</script>

<template #header>

<Head title="Movies List" />
<AuthenticatedLayout>  
    <div class="py-12">
        <div v-if="$page.props.flash.message" class="text-blue-600 mb-4">
            {{ $page.props.flash.message }}
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <Link :href="route('movies.create')" class="inline-block px-4 py-3 bg-blue-500 text-white rounded mb-4">Create New Movie</Link>
                <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100 px-4">
                    <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Movie Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rate
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="movie in movies" class="bg-blue-500 border-b border-blue-400">
                            <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                {{movie.title}}
                            </th>
                            <td class="px-6 py-4">
                                {{movie.description}}
                            </td>
                            <td class="px-6 py-4">
                                {{movie.category_id}}
                            </td>
                            <td class="px-6 py-4">
                                {{movie.rate}}
                            </td>
                            <td class="px-6 py-4">
                                {{movie.created_at}}
                            </td>
                            <td class="px-6 py-4">
                                
                                <img :src="`http://127.0.0.1:8000/storage/app/${movie.image_path}`" alt="image" />
                            </td>
                            <td class="px-6 py-4">
                                <Link :href="route('movies.edit', movie.id )" class="px-4 py-2 text-white bg-green-600 rounded-lg mr-2">Edit</Link>
                                <button type="button" @click="destroy(movie.id)" class="inline-block  px-2 py-1 bg-red-500 text-white rounded "> Delete</button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
</AuthenticatedLayout>
</template>

