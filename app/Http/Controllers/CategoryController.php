<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        // dd($request->input('color'));
        // dd($request);

        // $category = new Category();
        // $category->name = $request->name;
        // $category->color = $request->color;
        // $category->save();

        // Category::create([
        //     'name'  => $request->input('name'),
        //     'color' => $request->input('color'),
        // ]);

        Category::create($request->all());

        //
        // return redirect();
        // return redirect()->route('categories.create')->with('success', 'カテゴリーを作成しました。');
        // return view('categories.create')->with('success', 'カテゴリーを作成しました。');
        return redirect()->route('categories.index')->with('success', 'カテゴリーを作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // dd($category->tasks()->select('id', 'name')->get(), $category->tasks);
        $tasks = $category->tasks;

        return view('categories.show', compact('category', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // dd($request->all());

        // $category->name  = $request->input('name');
        // $category->color = $request->input('color');
        // $category->save();

        // $category->update([
        //     'name'  => $request->input('name'),
        //     'color' => $request->input('color'),
        // ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'カテゴリーを更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Category::destroy($category->id);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'カテゴリーを削除しました。');
    }
}
