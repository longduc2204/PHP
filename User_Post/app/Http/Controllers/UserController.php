<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use App\User_Permission;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function logins()
    {
        return view('Logins');
    }
    public function forgotpassword()
    {
        return view('forgotpassword');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $UserS = User::all();
        return view('manageuser', ['user' => $UserS]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createacount');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userPermisions = $this->namepermission(Auth::user()->id);

        $this->allowPermission('admin',  $userPermisions);

        $user = User::find($id);
        return view('edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'gender' => 'required',
        ]);

        $infouser = User::find($request->input('id'));

        $infouser->update($request->only('full_name', 'gender'));

        return redirect()->route('manageuser.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response;
     */
    public function destroy($id)
    {
        $userPermisions = $this->namepermission(Auth::user()->id);
        $this->allowPermission('admin',  $userPermisions);
        User::find($id)->delete();
        return redirect()->route('manageuser.index')
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
