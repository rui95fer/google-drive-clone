<script setup>
import TextInput from '@/Components/app/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    search: '',
});
</script>

<template>
    <form class="flex h-20 w-[600px] items-center">
        <TextInput
            type="text"
            class="mr-2 block w-full"
            v-model="form.search"
            autocomplete
            placeholder="Search for files and folders"
        ></TextInput>
    </form>
</template>

<style scoped></style>
