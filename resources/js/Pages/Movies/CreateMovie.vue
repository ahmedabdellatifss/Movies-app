<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


const form = useForm({
    title:'',
    description:'',
    rate:'',
    image:'',
    category:'',
});

const submit = () => {
    form.post(route('movies.store'),{
        forceFormData: true,
    }
    );
};
</script>

<template #header>

<Head title="Create Movie" />
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

            <div class="mt-4">
                <InputLabel for="description" value="Description" />

                <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full py-7"
                    v-model="form.description"
                    required
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
                    required
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
                    required
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
                    required
                    autocomplete="category id"
                />

                <InputError class="mt-2" :message="form.errors.image" />
            </div>
            <div class="flex items-center justify-center mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save Movie
                </PrimaryButton>
            </div>
        </form>
            </div>
        </div>    
    </div>
</AuthenticatedLayout>
</template>

<script>

</script>
<!-- const form = useForm({
    title:'',
    description:'',
    rate,
    image_path,
    category_id,
}) -->