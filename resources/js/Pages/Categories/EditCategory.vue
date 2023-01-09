<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head ,useForm, Link} from "@inertiajs/inertia-vue3";

const props = defineProps({
    category: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm({
   
    title:props.category.title,
    
});

const submit = () => {
    form.put(route('categories.update', props.category.id));
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
                    <InputLabel for="title" value="Title" />
    
                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.title"
                        required
                        autofocus
                        autocomplete="Title"
                    />
    
                    <InputError class="mt-2" :message="form.errors.title" />
                </div>
    
    
                <div class="flex items-center justify-center mt-4">
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Update Category
                    </PrimaryButton>
                </div>
            </form>
                </div>
            </div>    
        </div>
    </AuthenticatedLayout>
    </template>


