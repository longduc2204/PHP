<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Builder;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $category = Categories::all();
        $post = Post::all();
        return view('shownewpost', compact('post', 'category'));
    }

    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categoryId)
    {
        $category = Categories::all();
        $cat = Categories::with('posts')->find($categoryId);
        $posts = $cat->posts;
        // dd($cat);
        //dd($posts);
        // $posts = Post::whereHas('posts', function (Builder $query) use ($categoryId) {
        //     $query->where('category_id', '=', $categoryId);
        // })->get();
        // dd($posts);
        return view('test', compact('category', 'posts'));
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
