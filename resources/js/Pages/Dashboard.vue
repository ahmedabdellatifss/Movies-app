<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import NavLink from '@/Components/NavLink.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Manage Movies & Admins</div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                Dashboard
                            </NavLink>
                            <NavLink :href="route('movies.index')" :active="route().current('movies.index')">
                                Movies
                            </NavLink>
                            <NavLink :href="route('categories.index')" :active="route().current('categories.index')">
                                Categories
                            </NavLink>
                            <NavLink :href="route('users.index')" :active="route().current('users.index')">
                                Users
                            </NavLink>                       
                        </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default{
    props: {
        NewMovies: Object
    }
}
</script>
