<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    user: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm({
    name:props.user.name,
    email:props.user.email,
    birthdate:props.user.birthdate,
    password:props.user.password,
    
});

const submit = () => {
    form.put(route('users.update', props.user.id));
};
</script>

<template #header>

<Head title="Edit User" />
<AuthenticatedLayout>  
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form @submit.prevent="submit" >
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="Name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div>
                <label for="userType">UserType</label>
                <select id="userType" name="cars">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                <InputLabel for="birthdate" value="Birth date:" />

                <TextInput
                    id="birthdate"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.userType"
                    required
                    autofocus
                    autocomplete="Birthdate"
                />

                <InputError class="mt-2" :message="form.errors.birthdate" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update User
                </PrimaryButton>
            </div>
        </form>
            </div>
        </div>    
    </div>
</AuthenticatedLayout>
</template>