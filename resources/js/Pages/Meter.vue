<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    // 主元件
    components: {
        AuthenticatedLayout,
    },
    // 由父層繼承下來的值
    props: {

    },
    // 放變數
    data() {

    },
    // 放函式
    methods: {

    },
}
</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">js>Pages>profile>Dashboard</h2>
        </template>
        <h2>12345</h2>
    </AuthenticatedLayout>
</template>