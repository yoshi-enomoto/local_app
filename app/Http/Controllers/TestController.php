<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;
use App\Models\Hour;
use App\Http\Requests\Hour\StoreHourRequest;
use App\Http\Requests\Hour\UpdateHourRequest;
use Carbon\Carbon;
use DB;
// メール送信用の処理（お試し・テスト）
use Mail;
use App\Mail\TestSendMail;

// ジョブクラス関連
use App\Jobs\StoreText;
use App\Jobs\GenerateTextFile;
use App\Http\Components\FileOperation;

class TestController extends Controller
{
    const MAX = 30000; // ループ回数

    private $fp;

    public function __construct()
    {
        $this->fp = new FileOperation();
    }

    /**
     * ジョブクラスを動かす
     *
     * @return \Illuminate\Http\Response
     */
    public function queues()
    {
        $text = str_random(1000);

        // ジョブをディスパッチする
        $this->dispatch(new StoreText($text));

        return view('tests.queues');
    }

    /**
     * 通常
     *
     * @return [type] [description]
     */
    public function queuesNone()
    {
        $start = time();

        $file = $this->fp->makeTextFile();

        $this->fp->write($file, self::MAX);

        return view('tests.queues', ['start' => $start]);
    }

    /**
     * 非同期用
     *
     * @return [type] [description]
     */
    public function queuesDatabase()
    {
        $start = time();

        $file = $this->fp->makeTextFile();

        GenerateTextFile::dispatch($file, self::MAX);

        return view('tests.queues', ['start' => $start]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tasks = Task::all();

        return view('tests.create', compact('categories', 'tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Hour\StoreHourRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHourRequest $request)
    {
        if($request->input('register') == '連続登録する') {
            $this->storeProcess($request);

            return redirect()->route('tests.create')->with('success', '時間を登録しました。');
        } else {
            $this->storeProcess($request);

            return redirect()->route('hours.list_date')->with('success', '時間を登録しました。');
        }
    }

    /**
     * 保存処理の本体
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function storeProcess(Request $request)
    {
        unset($request['register']);
            // レコードinsertの為に削除しなくても保存できる
        $dateInput = $request->input('date');
        $hoursInputs = $request->input('hours');
            // nameの属性値をkeyとして通常配列で送られる。
            // 更に階層を深くすることができる

        foreach ($hoursInputs as $hoursInput ) {
            // メール送信用の処理（お試し・テスト）
            $hour = new Hour();
            $hour = Hour::create(array_merge($hoursInput, ['date' => $dateInput]));
                // メールコントローラーに渡す為に、変数に格納。
            $to = 'example@example.com';
            $subject = '時間登録内容';
            $body = $hour;
            Mail::to($to)->send(new TestSendMail($subject, $body));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
