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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hours = DB::table('hours')->select(DB::raw('SUM(hour) as sum_hour'), DB::raw('DATE_FORMAT(date, "%Y/%m") as everyMonth'))->groupby(DB::raw('DATE_FORMAT(date, "%Y/%m")'))->get();


        return view('hours.index', compact('hours'));
    }

    public function indexThisMonth()
    {
        $thisMonth = Carbon::now()->month;

        $thisMonthCategoryHours = Hour::whereMonth('date', '=', $thisMonth)->select('category_id', DB::raw('SUM(hour) as sum_hour'))->groupby('category_id')->get();

        $thisMonthCategoryHourSum = Hour::whereMonth('date', '=', $thisMonth)->sum('hour');

        $thisMonthHours = Hour::whereMonth('date', '=', $thisMonth)->select('date', DB::raw('SUM(hour) as sum_hour'))->groupby('date')->get();

        return view('hours.index_this_month', compact('thisMonthHours', 'thisMonthCategoryHours', 'thisMonthCategoryHourSum'));
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
     * @param  App\Models\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hour $hour)
    {
        $hour->delete();

        return redirect()->route('hours.index_this_month')->with('success', '入力時間を削除しました。');
    }
}
