<?php

namespace App\Http\Controllers;

use App\Categories;
use App\post;
use App\PostCategory;
use App\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('managenewpost', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userPermisions = $this->namepermission(Auth::user()->id);

        $this->allowPermission('admin',  $userPermisions);
        $category = Categories::all();
        return view('createnewpost', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $feature_url = request()->file('feature_url');
        $feature_name = time() . '.' . $feature_url->getClientOriginalExtension();
        $feature_path = public_path('/image/');
        $feature_url->move($feature_path, $feature_name);
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        $img  = '/image/' . $feature_name;

        $data = $request->only('title', 'content');
        $data['feature_url']  = $img;
        $post = Post::create($data);
        $categoryIds = $request->category_id;
        $post->categories()->attach($categoryIds);
        return redirect()->route('post.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userPermisions = $this->namepermission(Auth::user()->id);
        $this->allowPermission('admin',  $userPermisions);

        $category = Categories::all();
        $post = Post::find($id);
        $category_post = $post->categories->pluck('id')->toArray();
        return view('editnewpost', compact('post', 'category', 'category_post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        if ($request->hasFile('feature_url')) {
            $feature_url = request()->file('feature_url');
            $feature_name = time() . '.' . $feature_url->getClientOriginalExtension();
            $feature_path = public_path('/image/');
            $feature_url->move($feature_path, $feature_name);
            $this->validate($request, [
                'title' => 'required',
                'content' => 'required',
            ]);
        }
        $img  = '/image/' . $feature_name;
        $post = Post::find($request->input('id'));
        $data = $request->only('title', 'content');
        $data['feature_url'] = $img;

        $post->update($data);

        $categoryIds = $request->category_id;
        $post->categories()->sync($categoryIds);
        return redirect()->route('post.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userPermisions = $this->namepermission(Auth::user()->id);
        $this->allowPermission('admin',  $userPermisions);
        $post = Post::find($id);
        $post->categories()->sync([]);
        Post::find($id)->delete();
        return redirect()->route('post.index')
            ->with('success', 'Project deleted successfully');
    }
    private function allowPermission(string $pername, array $userPermisions)
    {
        if (in_array($pername, $userPermisions)) {
            return true;
        }
        abort(401);
    }

    public function namepermission($id)
    {
        $user = User::with(['permissions'])->find($id);
        $permssions = $user->permissions;
        return $permssions->pluck('name')->toArray();
    }
}
