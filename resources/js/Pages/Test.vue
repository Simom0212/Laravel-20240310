<script>
// 引用Link，就可以把Link當成是一個主見，12號第4部31分
import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import testBg from '/images/cut.jpg';

// 主要是要script跟template，特殊符號都必須拿掉，不然會吃到

export default {
    // 把link當成是一個主見，所以要用components
    // Vue 的整個大架構核心是元件(component)
    components: {
        Link,
        AuthenticatedLayout,
    },

    // (props)父層繼承下來的值、變數
    // 後端帶進來的資料由(props)接收
    props: {
        // books: {
        // type: Array,
        // },
        // count: {
        // 為什麼是Number，可以去routes的web.php裡看，因為count接的是數字所以使用Number
        // type: Number,
        // },
        // (title接獲)
        // title: {
        // 因為routes的web.php裡看，title變數是'黃昏書店'是屬於字串，所以使用String
        // type: String,
        // },
        // (response回覆)
        // 建議跟團隊開發的時候可以定義一個專屬的key
        response: {
            type: Object,
        },

    },

    data() {
        // 我們拿到(testBg變數)，所以要把它裝起來
        return {
            testBg: testBg,
            name: '',
            price: 0,
            editPrice: 0,
        };
    },

    methods: {
        addBook() {
            // 發送get請求
            // this.$inertia.get('/add-book');

            // 發送post請求 ，一定要帶一個物件，只是多帶資料而已
            this.$inertia.post('/post-book', {
                name: this.name,
                price: this.price,
            });

            this.name = '';
            this.price = '';
        },

        /**
        * 刪除書本請求
        * @param { Number } id 書本的id
        */
        deleteBook(id) {
            this.$inertia.post('/delete-book', { id: id, }, {
                // 當傳過去之後，確實有成功回傳，(res => response)
                onSuccess: (res) => {
                    // console.log(res.props.flash.message);
                    const msg = res.props.flash.message;
                    alert(msg);
                }
            });
        },

        filterBook() {
            // post第一個是路徑，第二個是帶參數
            this.$inertua.get('/test');
        },

        // 發送篩選書籍的請求
        fileterBook(rule) {
            this.$inertia.get('test', {
                rule: rule,
            });
        },
    },

    // computed() {
    // bookData() {
    // return this.response;
    // },
    // },
};
</script>

<template>
        <!-- 引用AuthenticatedLayout的主元件包起來了 -->
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">js>Pages>Test.vue(Test)</h2>
        </template>

        <section class="px-10 py-4">
            <Link href="/" class="inline-block my-4 p-1 border border-black">回到首頁</Link>
            <Link href="/" class="inline-block my-4 p-1 border border-black">全部書籍</Link>
            <Link href="/" class="inline-block my-4 p-1 border border-black">特價(篩選)2000以下</Link>

            <img :src="testBg" alt="">
            <!-- v-for => 3/12號第二部=>4:32分影片 -->
            <!-- 他是一個陣列可以用迴圈  v-for記得一定要帶一個:key，:key每一個資料都有一個id唯一值-->
            <div v-for="book in response.books" :key="book.id">
                <p>書名 : {{ book.name }}</p>
                <p>價錢 : {{ book.price }}</p>
            </div>
            <div>Count : {{ response.count }}</div>
            <div>Title : {{ response.title }}</div>
            <form class="flex flex-col gap-y-1 mt-8">
                <label>
                    <span mr-2>書名</span>
                    <input v-model="name" type="text" placeholder="請輸入書名">
                </label>
                <label>
                    <span mr-2>價格</span>
                    <input v-model="price" type="number" placeholder="請輸入價格">
                </label>
            </form>
            <button type="button" class="block p-2 border border-black" @click="addBook">新增一本書</button>
            <button type="button" class="block py-2 px-2  border border-black rounded text-white hover:bg-red-500/50"
                @click="deleteBook">刪除書籍</button>
        </section>
    </AuthenticatedLayout>
</template>