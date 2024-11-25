<script setup>
// Import necessary components and libraries
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import CreateFolderModal from '@/Components/app/CreateFolderModal.vue';
import { ref } from 'vue';

/**
 * Flag to track whether the create folder modal is open
 */
const isCreateFolderModalOpen = ref(false);

/**
 * Function to open the create folder modal
 */
function openCreateFolderModal() {
    isCreateFolderModalOpen.value = true;
}
</script>

<template>
    <!-- Dropdown menu container -->
    <Menu as="div" class="relative inline-block text-left">
        <!-- Dropdown menu button -->
        <MenuButton
            class="flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
        >
            Create New
        </MenuButton>

        <!-- Transition effect for the dropdown menu -->
        <transition
            enter-active-class="transition duration-100 ease-out"
            enter-from-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-in"
            leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0"
        >
            <!-- Dropdown menu items -->
            <MenuItems
                class="absolute left-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
            >
                <!-- New folder menu item -->
                <div class="px-1 py-1">
                    <MenuItem>
                        <a
                            href="#"
                            @click.prevent="openCreateFolderModal"
                            class="block px-4 py-2 text-sm text-gray-700"
                        >
                            New Folder
                        </a>
                    </MenuItem>
                </div>
                <!-- Upload files and folder menu items -->
                <div class="px-1 py-1">
                    <MenuItem>
                        <a class="block px-4 py-2 text-sm text-gray-700">
                            Upload Files
                        </a>
                    </MenuItem>
                    <MenuItem>
                        <a class="block px-4 py-2 text-sm text-gray-700">
                            Upload Folder
                        </a>
                    </MenuItem>
                </div>
            </MenuItems>
        </transition>
    </Menu>

    <!-- Create folder modal -->
    <CreateFolderModal v-model:isVisible="isCreateFolderModalOpen" />
</template>

<style scoped>
/* Add styles here */
</style>
