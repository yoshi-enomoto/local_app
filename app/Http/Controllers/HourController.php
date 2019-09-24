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

class HourController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tasks = Task::all();

        return view('hours.create', compact('categories', 'tasks'));
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

            return redirect()->route('hours.create')->with('success', '時間を登録しました。');
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
            // Hour::create(array_merge($hoursInput, ['date' => $dateInput]));
                // メール送信用の為に、一旦コメントアウト

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function edit(Hour $hour)
    {
        $categories = Category::all();
        $tasks = Task::all();

        return view('hours.edit', compact('hour', 'categories', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Hour\UpdateHourRequest  $request
     * @param  \App\Models\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHourRequest $request, Hour $hour)
    {
        $dateInput = $request->input('date');
        $hoursInputs = $request->input('hours');

        foreach ($hoursInputs as $hoursInput ) {
            $hour->update(array_merge($hoursInput, ['date' => $dateInput]));
        }

        return redirect()->route('hours.show_date', $hour->date->format('Y-m-d'))->with('success', '時間を更新しました。');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listDate()
        // 当月
    {
        $thisYear = Carbon::now()->year;
        $thisMonth = Carbon::now()->month;

        $thisMonthCategoryHours = Hour::whereYear('date', '=', $thisYear)->whereMonth('date', '=', $thisMonth)->select('category_id', DB::raw('SUM(hour) as sum_hour'))->groupby('category_id')->get();
        $thisMonthCategoryHourSum = Hour::whereYear('date', '=', $thisYear)->whereMonth('date', '=', $thisMonth)->sum('hour');
        $thisMonthHours = Hour::whereYear('date', '=', $thisYear)->whereMonth('date', '=', $thisMonth)->select('date', DB::raw('SUM(hour) as sum_hour'))->groupby('date')->orderBy('date', 'ASC')->get();

        return view('hours.list_date', compact('thisMonthHours', 'thisMonthCategoryHours', 'thisMonthCategoryHourSum'));
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function listMonth()
    {
        $hours = DB::table('hours')->select(DB::raw('SUM(hour) as sum_hour'), DB::raw('DATE_FORMAT(date, "%Y/%m") as everyMonth'))->groupby(DB::raw('DATE_FORMAT(date, "%Y/%m")'))->get();

        return view('hours.list_month', compact('hours'));
    }

    /**
     * Display a listing of the specified resource.
     * @param  String $year
     * @param  String $month
     * @return \Illuminate\Http\Response
     */
    public function listSelectMonth(String $year, String $month)
        // アクセスされた月
    {
        $thisMonthCategoryHours = Hour::whereYear('date', '=', $year)->whereMonth('date', '=', $month)->select('category_id', DB::raw('SUM(hour) as sum_hour'))->groupby('category_id')->get();
        $thisMonthCategoryHourSum = Hour::whereYear('date', '=', $year)->whereMonth('date', '=', $month)->sum('hour');
        $thisMonthHours = Hour::whereYear('date', '=', $year)->whereMonth('date', '=', $month)->select('date', DB::raw('SUM(hour) as sum_hour'))->groupby('date')->orderBy('date', 'ASC')->get();

        return view('hours.list_date', compact('thisMonthHours', 'thisMonthCategoryHours', 'thisMonthCategoryHourSum'));
            // 当月一覧で使用しているbladeに飛ぶ。
    }

    // wip
    public function listProcess($thisYear, $thisMonth)
    {
        $thisMonthCategoryHours = Hour::whereYear('date', '=', $thisYear)->whereMonth('date', '=', $thisMonth)->select('category_id', DB::raw('SUM(hour) as sum_hour'))->groupby('category_id')->get();
        $thisMonthCategoryHourSum = Hour::whereYear('date', '=', $thisYear)->whereMonth('date', '=', $thisMonth)->sum('hour');
        $thisMonthHours = Hour::whereYear('date', '=', $thisYear)->whereMonth('date', '=', $thisMonth)->select('date', DB::raw('SUM(hour) as sum_hour'))->groupby('date')->orderBy('date', 'ASC')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $$date
     * @return \Illuminate\Http\Response
     */
    public function showDate(String $date)
        // 引数にはURLの文字列が該当し、その変数名で取得可能。
    {
        $targetHours = Hour::where('date', $date)->get();
        // $test = Hour::select('date', DB::raw('SUM(hour) as sum_hour'))->groupby('date')->havingRaw('date = '.$date);
        $sum_hour = DB::table('hours')
                ->select('date', DB::raw('SUM(hour) as sum_hour'))
                ->groupBy('date')
                ->havingRaw('date = ?', [$date])
                ->get()[0]->sum_hour;

        return view('hours.show_date', compact('date', 'targetHours', 'sum_hour'));
    }

    // wip：不要？
    public function showMonth($date)
        // 引数にはURLの文字列が該当し、その変数名で取得可能。
    {
        // $targetHours = Hour::where('date', $date)->get();
        // // $test = Hour::select('date', DB::raw('SUM(hour) as sum_hour'))->groupby('date')->havingRaw('date = '.$date);
        // $sum_hour = DB::table('hours')
        //         ->select('date', DB::raw('SUM(hour) as sum_hour'))
        //         ->groupBy('date')
        //         ->havingRaw('date = ?', [$date])
        //         ->get()[0]->sum_hour;

        return view('hours.show_month', compact('date', 'targetHours', 'sum_hour'));
    }

    /**
     * Remove the specified date from storage.
     *
     * @param  \App\Models\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hour $hour)
    {
        $hour->delete();

        return redirect()->route('hours.show_date', $hour->date->format('Y-m-d'))->with('success', '入力時間を削除しました。');
    }

    /**
     * Remove the specified date from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyDate(Request $request)
    {
        $targetDate = $request->input('date_target');
        $targetIds = Hour::where('date', $targetDate)->pluck('id')->all();
        Hour::destroy($targetIds);

        return redirect()->route('hours.list_date')->with('success', '入力時間を削除しました。');
    }

    // wip：機能確認！：削除はできるが、入れ物（日付）が残る。
    public function destroyMonth(Request $request)
    {
        $targetDate = explode("/", $request->input('target'));
        $targetIds = Hour::whereYear('date', '=', $targetDate[0])->whereMonth('date', '=', $targetDate[1])->pluck('id')->all();

        Hour::destroy($targetIds);

        return redirect()->route('hours.list_month')->with('success', '入力時間を削除しました。');
    }
}
