<script setup>
import InputError from "@/Components/InputError.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import axios from "axios";

import { ref, watch } from "vue";
defineProps({
    classes: {
        type: Object,
        required: true,
    },
});

let sections = ref({});

const form = useForm({
    name: "",
    email: "",
    class_id: "",
    section_id: "",
});

watch(
    () => form.class_id,
    (value) => {
        getSections(value);
    }
);

const getSections = (classId) => {
    axios.get(`/api/sections/class?class_id=${classId}`).then((response) => {
        sections.value = response.data;
    });
};

const createStudent = () => {
    form.post(route("students.store"));
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Student
            </h2>
            <!-- <pre>{{ classes }}</pre> -->
            <div>
                <form @submit.prevent="createStudent">
                    <div>
                        <label
                            for="name"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Name
                        </label>
                        <div class="mt-1">
                            <input
                                type="text"
                                v-model="form.name"
                                id="name"
                                autocomplete="name"
                                class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                :class="{ 'border-red-500': form.errors.name }"
                            />
                            <InputError :message="form.errors.name" />
                        </div>
                    </div>
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Email
                        </label>
                        <div class="mt-1">
                            <input
                                type="email"
                                v-model="form.email"
                                id="email"
                                autocomplete="email"
                                class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                :class="{ 'border-red-500': form.errors.email }"
                            />
                            <InputError :message="form.errors.email" />
                        </div>
                    </div>
                    <div>
                        <label
                            for="class"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Class
                        </label>
                        <div class="mt-1">
                            <select
                                v-model="form.class_id"
                                id="class_id"
                                class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                :class="{
                                    'border-red-500': form.errors.class_id,
                                }"
                            >
                                <option value="">Select Class</option>
                                <option
                                    v-for="cl in classes.data"
                                    :key="cl.id"
                                    :value="cl.id"
                                >
                                    {{ cl.name }}
                                </option>
                            </select>
                            <InputError :message="form.errors.class_id" />
                        </div>
                    </div>
                    <div>
                        <label
                            for="section"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Section
                        </label>
                        <div class="mt-1">
                            <select
                                type="text"
                                v-model="form.section_id"
                                id="section_id"
                                class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                :class="{
                                    'border-red-500': form.errors.section_id,
                                }"
                            >
                                <option value="">Select Section</option>
                                <option
                                    v-for="section in sections.data"
                                    :key="section.id"
                                    :value="section.id"
                                >
                                    {{ section.name }}
                                </option>
                            </select>
                            <InputError :message="form.errors.section_id" />
                        </div>
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </template>
        <div></div>
    </AppLayout>
</template>
