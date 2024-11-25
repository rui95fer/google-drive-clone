<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import CreateNewDropdown from '@/Components/app/CreateNewDropdown.vue';
import NavLink from '@/Components/app/NavLink.vue';
</script>

<template>
    <nav class="min-w-52">
        <Link
            class="flex h-20 items-center gap-3 px-3"
            :href="route('myFiles')"
        >
            <ApplicationLogo
                class="block h-9 w-auto fill-current text-gray-800"
            />
            LaraStorage
        </Link>

        <div class="px-3">
            <CreateNewDropdown />

            <div class="py-3">
                <NavLink
                    :href="route('myFiles')"
                    :active="route().current('myFiles')"
                    >My Files
                </NavLink>
                <NavLink href="/">Shared With Me</NavLink>
                <NavLink href="/">Shared By Me</NavLink>
                <NavLink href="/">Trash</NavLink>
            </div>
        </div>
    </nav>
</template>

<style scoped></style>
