<script setup>
import Navigation from '@/Components/app/Navigation.vue';
import SearchForm from '@/Components/app/SearchForm.vue';
import UserSettingsDropdown from '@/Components/app/UserSettingsDropdown.vue';
</script>

<template>
    <div class="flex h-screen w-full gap-4 bg-gray-50">
        <Navigation />

        <main class="flex flex-1 flex-col overflow-hidden px-4">
            <div class="flex w-full items-center justify-between">
                <SearchForm />
                <UserSettingsDropdown />
            </div>

            <div class="flex flex-1 flex-col overflow-hidden">
                <slot />
            </div>
        </main>
    </div>
</template>
