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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHourRequest $request)
    {
        // dd(var_dump($request->input()));
        if($request->input('register') == '連続登録する') {
            $this->storeProcess($request);

            return redirect()->route('hours.create')->with('success', '時間を登録しました。');
        } else {
            $this->storeProcess($request);

            return redirect()->route('hours.index')->with('success', '時間を登録しました。');
        }
    }

    public function storeProcess($request)
    {
        unset($request['register']);
            // レコードinsertの為に削除しなくても保存できる
        $dateInput = $request->input('date');
        $hoursInputs = $request->input('hours');
            // nameの属性値をkeyとして通常配列で送られる。
            // 更に階層を深くすることができる

        foreach ($hoursInputs as $hoursInput ) {
            Hour::create(array_merge($hoursInput, ['date' => $dateInput]));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
     * Remove the specified date from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listDate()
    {
        $thisYear = Carbon::now()->year;
        $thisMonth = Carbon::now()->month;
        $thisMonthCategoryHours = Hour::whereYear('date', '=', $thisYear)->whereMonth('date', '=', $thisMonth)->select('category_id', DB::raw('SUM(hour) as sum_hour'))->groupby('category_id')->get();
        $thisMonthCategoryHourSum = Hour::whereYear('date', '=', $thisYear)->whereMonth('date', '=', $thisMonth)->sum('hour');
        $thisMonthHours = Hour::whereYear('date', '=', $thisYear)->whereMonth('date', '=', $thisMonth)->select('date', DB::raw('SUM(hour) as sum_hour'))->groupby('date')->orderBy('date', 'ASC')->get();

        return view('hours.list_date', compact('thisMonthHours', 'thisMonthCategoryHours', 'thisMonthCategoryHourSum'));
    }

    public function listMonth()
    {
        $hours = DB::table('hours')->select(DB::raw('SUM(hour) as sum_hour'), DB::raw('DATE_FORMAT(date, "%Y/%m") as everyMonth'))->groupby(DB::raw('DATE_FORMAT(date, "%Y/%m")'))->get();


        return view('hours.list_month', compact('hours'));
    }

    /**
     * Display the specified resource.
     *
     * @param  date  $$date
     * @return \Illuminate\Http\Response
     */
    public function showDate($date)
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

    public function destroyDate(Request $request)
    {
        $targetDate = $request->input('date_target');
        $targetIds = Hour::where('date', $targetDate)->pluck('id')->all();
        Hour::destroy($targetIds);

        return redirect()->route('hours.list_date')->with('success', '入力時間を削除しました。');
    }

    public function destroyMonth(Request $request)
    {
        $targetDate = explode("/", $request->input('target'));
        $targetIds = Hour::whereYear('date', '=', $targetDate[0])->whereMonth('date', '=', $targetDate[1])->pluck('id')->all();

        Hour::destroy($targetIds);

        return redirect()->route('hours.list_month')->with('success', '入力時間を削除しました。');
    }
}
