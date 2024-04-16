<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Notifications\UserMessage;

class TextController extends Controller
{
    public function index()
    {
        // $rule = $request->rule ?? '0';
        // dd($rule);

        // === 三個等於差在資料型態
        // if ($rule === '0' ) {
        //     $books = Book::get();
        // } else if ($rule === '1') {
        //     $books = Book::where('price', '<', 2000)->get();
        // }

        $books = Book::get();
        // $books = Book::where('price', '>=', 2500)->get();
        // 加入where篩選條件，where是可以串連的
        // $books = Book::where('price', '>=', 2500)->where('name', '飢餓遊戲')->get();
        
        // $books = Book::where([
        //     ['price', '>=', 2500],
        //     ['name', '飢餓遊戲'],
        // ])->get();

        // 只拿一筆用first()
        // $books = Book::where([
        //     ['price', '>=', 2500],
        //     ['name', '=', '飢餓遊戲'],
        // ])->first();

        // $books = book::find(29);
        // $books = book::where('id', 29)->first();
        // $books = Book::where('name', '沙丘2')->get();
        // dd($books);

        $data = [
            // 只要有 => 的這個符號就是物件
            'books' => $books,
            'count' => 5,
            'title' => '黃昏書店',
        ];
        return Inertia::render('Test', [
            'response' => $data,
        ]);
    }

    // 新增資料
    public function store()
    {

        // 迴圈
        $arr = [1, 2, 3, 4];
        $newArr = [];
        foreach ($arr as $item) {
            // dump($item);
            // 把每一個item加1後 放入陣列
            // array_push($newArr, $item + 1);

            // 把每一個item加1後面加入文字後 放入陣列
            // array_push($newArr, $item. '元');
            // 類似樣板字號寫法
            array_push($newArr, "{$item}個");
        }
        // 停止印出來
        // dd($newArr);

        // 陣列內容
        $data = [
            [
                'id' => 1,
                'name' => 'Simom',
            ],
            [
                'id' => 2,
                'name' => 'Sam',
            ],
        ];
        $newData = [];
        foreach ($data as $value) {
            // dump($value['name']);
            array_push($newData, $value['name']);
        }
        // dd($newData);

        $teachers = [
            (object) [
                'id' => 1,
                'name' => '張三豐',
            ],
            (object) [
                'id' => 2,
                'name' => '李四川',
            ],
        ];

        $newTeachers = [];

        foreach ($teachers as $teacher) {
            // dump($teacher->name);
            array_push($newTeachers, $teacher->name);
        }
        // dd($newTeachers);


        // 第1種
        // foreach ([1, 2] as $item) {
        //     Book::create([
        //         'name' => '哈利波特',
        //         'price' => '500',
        //     ]);
        // }

        // 第2種
        // for ($i=0; $i < 2; $i++) { 
        //     Book::create([
        //         'name' => '哈利波特',
        //         'price' => '500',
        //     ]);
        // }

        $books = [
            [
                'name' => '哈利波特',
                'price' => '500',
                'bookimg' => '400',
            ],
            [
                'name' => '沙丘',
                'price' => '700',
                'bookimg' => '600',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
        // dd($books);

        // foreach ($books as $book) {
        //     Book::create([
        //         'name' => $book['name'],
        //         'price' => $book['price'],
        //     ]);
        // }

        // 重新改變路線、導向/test的路由，進而回到Test的頁面
        return redirect('/test');

        // Book::create([
        //     'name' => '哈利波特',
        //     'price' => '500',
        //     'bookimg' => '',
        // ]);

        // return Inertia::render('Dashboard');



    }

    // 新增書本
    public function add(Request $request)
    {
        $message = '';


        // 只要出事，就會跳到catch
        // 例外處理
        try {
            // -> 就理解裡面是物件，全部的東西給我看
            // dd($reuqest->all());
            Book::create([
                'name' => $request->name,
                'price' => $request->price,
            ]);

        } catch (\Throwable $th) {
            
        }

        return redirect('/test');
    }

    // 刪除書本
    public function deleteBook(Request $request)
    {
        // 只是拿來做檢查，停住並印出來，變數是怎樣，前面步驟確實是對的，是我所想的再去關掉
        // dd($request->all());


        // 找到指定id的書本並賦值給$book
        $book = Book::find($request->id);
        // dd($book);


        // 宣告變數
        $message = '';

        // 書是否存在
        if (!$book) {
            // 刪掉指定的書本
            $book->delete();
            $message = '成功';
        } else {
            $message = '失敗';
        }
        // dd($message);

        // 【 key 是 message 】，【 value 是 $message 成功 或 失敗 】
        // 帶一個with，帶一個message到前端
        // 回到Test頁面
        return redirect('/test')->with(['message' => $message]);
    }

    public function sendMail (Request $request)
    {
        $user = User::find(1);
        /**
         * 1.從資料庫拿出來整理好資料
         * 你的資料要有
         * 2.把資料弄成object
         * 3.寄給自己
         */
        $data = (object) [
            'title' => 'Hello',
            'content' => '我寄信給你摟',
        ];
        $user->notify(new UserMessage($data));
    }
}
