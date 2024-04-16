<?php

use App\Models\Book;
use App\Models\User;
use Inertia\Inertia;
use App\Models\ProductType;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TextController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 代表連去首頁的路由就是走這一支，進去這一個Route，他就會return
Route::get('/', function () {
    // 宣告變數
    $a = 0; //數字
    $c = '你好'; //字串
    $b = [1, 2, 3]; //陣列
    $e = ['id' => 1]; //陣列
    $d = (object) ['id' => 1]; //php的物件寫法 中括號，只不過php很少用到物件

    // 宣告變數並裝入Book全部資料陣列，get()他就是會全部都拿出來
    // 然後要把Book標記起來，對Bool按右鍵，import class 就會自己把他加到最上面
    // 可以看到一個陣列集合，裡面有(addributes屬性)
    $books = Book::get();

    // 中止並印出，會顯示出在第幾行Route的dd被停止了
    // dd($books);

    // 中止並印出
    // dd([1, 2 , 3]);

    // 回傳到指定的vue的頁面，跳轉至指定頁面
    // 經過他他會return某個頁面，離開的時候他會把你帶到某個頁面去
    // render就是渲染畫面，所以他進了首頁，他會把你帶到Welcome這個頁面，可以按ctrl點擊Welcome就會跳轉到 Pages > profile 的 Welcome.vue頁面
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);

    // 建立資料夾裡新增文件，按ctrl點擊就會回到那一個頁面
    // return Inertia::render('Test');
    // 如頁面式朝狀資料夾則須帶完整路徑
    // return Inertia::render('Client/Clientinfo');
    // 回傳到指定的Vue
    // return Inertia::render('Test', [
    //     // key value ，是用大箭頭
    //     'books' => $books,
    //     'count' => 5,
    //     //  (title標題)
    //     'title' => '黃昏書店',
    // ]);
    

    // 實際上會這樣寫，會是像上面一樣
    // 把資料整理成一包帶到前端
    // 只要有 => 的這個符號就是物件
    $data = [
        'books' => $books,
        'count' => 5,
        'title' => '黃昏書店',
    ];
    return Inertia::render('Test', [
        'response' => $data,
    ]);
});

// 打包
Route::middleware(['auth', 'verified'])->group(function() {
    // 將邏輯放到TextController裡並呼叫index函式
    // ->middleware(['auth', 'verified']) => 驗證的意思
    Route::get('/test', [TextController::class, 'index'])->middleware(['auth', 'verified'])->name('test');

    // 儀表板
    // Route::get('/meter', function () { return Inertia::render('Meter'); })->middleware(['auth', 'verified']);
    
    // 新增Book的資料用get請求，auth就是他檢查你有沒有登入
    Route::get('/add-book', [TextController::class, 'store'])->middleware(['auth', 'verified']);
    
    Route::post('/post-book', [TextController::class, 'add'])->middleware(['auth', 'verified']);
    
    // 刪除Book的路由
    Route::post('/delete-book', [TextController::class, 'deleteBook'])->middleware(['auth', 'verified']);
});



// Route::get('/dashboard', function () {
//     $user = User::with('member')->find(1);
//     // dd($user);
//     $data = [
//         'name' => $user->name,
//         'email' => $user->email,
//         // (tel是自己命名的)然後要去對應member
//         'phone' => $user->member->phone,
//         // (country是自己命名的)然後要去對應member
//         'dountry' => $user->member->dountry,
//     ];
//     dd($data);
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', function () {
    // $productType = ProductType::with('Products')->find(1);
    // dd($productType);
    // $data = [
    //     'name' => $user->name,
    //     'email' => $user->email,
    //     // (tel是自己命名的)然後要去對應member
    //     'phone' => $user->member->phone,
    //     // (country是自己命名的)然後要去對應member
    //     'dountry' => $user->member->dountry,
    // ];
    // dd($data);
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// 寄信路徑
Route::get('send-mail', [TextController::class], 'sendMail')->name('send.mail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
