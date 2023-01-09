<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    movie: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm({
    id: props.movie.id,
    title: props.movie.title,
    description: props.movie.description,
    rate: props.movie.rate,
    image: props.movie.image_path,
    category: props.movie.category_id,
});

const submit = () => {
    form.put(route('movies.update', props.movie.id));
};
</script>

<template #header>

<Head title="Edit Movie" />
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
                    autofocus
                    autocomplete="Title"
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div class="mt-4">
                <InputLabel for="description" value="Description" />

                <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full py-7"
                    v-model="form.description"
                    autocomplete="Enter description"
                />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>
            
            <div class="mt-4">
                <InputLabel for="rate" value="Rate" />

                <TextInput
                    id="rate"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.rate"
                    autocomplete="Rate"
                />

                <InputError class="mt-2" :message="form.errors.rate" />
            </div>
            <div class="mt-4">
                <InputLabel for="image" value="Image" />

                <TextInput
                    id="image"
                    name="image"
                    type="file"
                    @input="form.image = $event.target.files[0]" 
                    class="mt-1 block w-full"
                    v-model="form.image"
                    autocomplete="image"
                />
                <InputError class="mt-2" :message="form.errors.image" />
            </div>
            <div class="mt-4">
                <InputLabel for="category" value="Category" />
                <TextInput
                    id="category"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.category"
                    autocomplete="category id"
                />

                <InputError class="mt-2" :message="form.errors.image" />
            </div>
            <div class="flex items-center justify-center mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update Movie
                </PrimaryButton>
            </div>
        </form>
            </div>
        </div>    
    </div>
</AuthenticatedLayout>
</template>
