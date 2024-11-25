<script setup>
/**
 * Import necessary components and libraries
 */
import Modal from '@/Components/Modal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/app/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { nextTick, ref } from 'vue';

/**
 * Define the component's props
 */
const props = defineProps({
    /**
     * Whether the modal is visible
     */
    isVisible: Boolean,
});

/**
 * Define the component's emits
 */
const emit = defineEmits(['update:isVisible']);

/**
 * Initialize the form with a single field: folderName
 */
const form = useForm({
    folderName: '',
});

/**
 * Create a reference to the folder name input field
 */
const folderNameInputRef = ref(null);

/**
 * Close the modal and reset the form
 */
function close() {
    // Emit an event to update the isVisible prop
    emit('update:isVisible', false);
    // Clear any form errors
    form.clearErrors();
    // Reset the form fields
    form.reset();
}

/**
 * Create a new folder
 */
function create() {
    // Post the form data to the folder.create route
    form.post(route('folder.create'), {
        // Preserve the current scroll position
        preserveScroll: true,
        /**
         * Handle the successful creation of a new folder
         */
        onSuccess: () => {
            // Close the modal
            close();
            // Reset the form fields
            form.reset();
        },
        /**
         * Handle any errors that occur during folder creation
         */
        onError: () => {
            // Focus the folder name input field
            folderNameInputRef.value.focus();
        },
    });
}

/**
 * Focus the folder name input field when the modal is shown
 */
function onModalShow() {
    // Use nextTick to ensure the input field is focused after the modal is shown
    nextTick(() => folderNameInputRef.value.focus());
}
</script>

<template>
    <!-- Render the modal component -->
    <Modal
        :show="props.isVisible"
        @show="onModalShow"
        @close="close"
        maxWidth="sm"
    >
        <div class="p-6">
            <!-- Display the modal title -->
            <h2 class="text-lg font-medium text-gray-900">Create New Folder</h2>
            <div class="mt-6">
                <!-- Render the folder name input field -->
                <InputLabel
                    for="folderName"
                    value="Folder Name"
                    class="sr-only"
                />
                <TextInput
                    type="text"
                    ref="folderNameInputRef"
                    id="folderName"
                    v-model="form.folderName"
                    class="mt-1 block w-full"
                    :class="form.errors.folderName ? 'border-red-600' : ''"
                    placeholder="Folder Name"
                    @keyup.enter="create"
                />
                <!-- Display any errors for the folder name field -->
                <InputError :message="form.errors.folderName" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <!-- Render the cancel button -->
                <SecondaryButton @click="close">Cancel</SecondaryButton>
                <!-- Render the submit button -->
                <PrimaryButton
                    class="ms-4"
                    @click="create"
                    :disabled="form.processing"
                    :class="form.processing ? 'opacity-25' : ''"
                >
                    Submit
                </PrimaryButton>
            </div>
        </div>
    </Modal>
</template>

<style scoped>
/* Add any scoped styles here */
</style>
