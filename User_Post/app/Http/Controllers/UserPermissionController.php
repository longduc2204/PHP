<?php

namespace App\Http\Controllers;

use App\User_Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             return view('testloginuser');
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
     * @param  \App\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function show(User_Permission $user_Permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Permission $user_Permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Permission $user_Permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Permission $user_Permission)
    {
        //
    }
}
