<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';


export default {
    data() {

    },
    methods: {
        sendMail(){
            this.$inertia.post(route('send.mail'));
        },
    },
};
</script>



<template>
    <Head title="Dashboard" />

    <!-- 引用AuthenticatedLayout的主元件包起來了 -->
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">js>Pages>profile>Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">js>Pages>profile>Dashboard.vue(You're logged in!)</div>
                </div>
                <div class="p-6 text-gray-900">歡迎登入</div>
                <button class="w-[100px] h-[100px] bg-red-300 rounded">寄信</button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
