<script setup>
import Pagination from "@/Components/Pagination.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm, usePage } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";
import { paginationProps } from "naive-ui";

defineProps({
    students: {
        type: Object,
        required: true,
    },
});
const page = ref(1);

const columns = [
    {
        title: "ID",
        dataIndex: "id",
        key: "id",
    },
    {
        title: "Name",
        dataIndex: "name",
        key: "name",
    },
    {
        title: "Email",
        dataIndex: "email",
        key: "email",
    },
    {
        title: "Class",
        dataIndex: "class.name",
        key: "class",
    },
    {
        title: "Section",
        dataIndex: "section.name",
        key: "section",
    },
    {
        title: "Created At",
        dataIndex: "created_at",
        key: "created_at",
    },
    {
        title: "Actions",
        key: "actions",
        scopedSlots: { customRender: "actions" },
    },
];
const form = useForm({
    name: "",
    email: "",
    class_id: "",
    section_id: "",
});

const setStudent = (student) => {
    form.name = student.name;
    form.email = student.email;
    form.class_id = student.class_id;
    form.section_id = student.section_id;
};
const show = ref(false);
let search = ref(usePage().props.search),
    pageNumber = ref(1);

let studentsUrl = computed(() => {
    let url = new URL(route("students.index"));
    url.searchParams.append("page", pageNumber.value);
    if (search.value) {
        url.searchParams.append("search", search.value);
    }
    return url;
});

watch(
    () => studentsUrl.value,
    (updatedStudentsUrl) => {
        router.visit(updatedStudentsUrl, {
            preserveScroll: true,
            preserveState: true,
            replace: true,
        });
    }
);

const deleteForm = useForm({});

const deleteStudent = (studentId) => {
    if (confirm("Are you sure you want to delete this student?")) {
        deleteForm.delete(route("students.destroy", studentId));
    }
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Students
            </h2>
        </template>
        <div>
            <h1>Students</h1>
            <!-- <pre>{{ students }}</pre> -->
            <div class="flex justify-end">
                <div>
                    <label for="search" class="sr-only">Search</label>
                    <input
                        type="text"
                        v-model="search"
                        id="search"
                        class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Search..."
                    />
                </div>
                <Link
                    :href="route('students.create')"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Add Student
                </Link>
            </div>

            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="student in students.data" :key="student.id">
                        <td>{{ student.id }}</td>
                        <td>{{ student.name }}</td>
                        <td>{{ student.email }}</td>
                        <td>{{ student.class.name }}</td>
                        <td>{{ student.section.name }}</td>
                        <td>{{ student.created_at }}</td>
                        <td>
                            <n-button
                                @click="
                                    show = true;
                                    setStudent(student);
                                "
                            >
                                Open
                            </n-button>
                            <n-button @click="setStudent(student)">
                                <!-- <Link
                                    :href="route('students.edit', student.id)"
                                    class="text-blue-600 hover:text-blue-900"
                                > -->
                                Edit
                                <!-- </Link> -->
                            </n-button>

                            <n-button
                                type="error"
                                @click="deleteStudent(student.id)"
                            >
                                Delete
                            </n-button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div>
                <Pagination :data="students" />
            </div>
            <pre>{{ JSON.stringify(students.meta, undefined, 2) }}</pre>
            <n-data-table
                :columns="columns"
                :data="students.data"
                :bordered="false"
            />
            <n-pagination v-model:page="page" :page-count="100" />
            <n-drawer v-model:show="show" :width="502">
                <n-drawer-content title="Update Student" closable>
                    <form @submit.prevent="updateStudent">
                        <n-space vertical>
                            <label for="name">Name</label>
                            <n-input
                                v-model:value="form.name"
                                type="text"
                                placeholder="Basic Input"
                            />
                            <label for="email">Email</label>
                            <n-input
                                v-model:value="form.email"
                                type="text"
                                placeholder="Basic Textarea"
                            />
                        </n-space>
                        <div class="mt-2">
                            <n-button>Update</n-button>
                        </div>
                    </form>
                </n-drawer-content>
            </n-drawer>
        </div>
    </AppLayout>
</template>
