<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Validator;

class AdminUsersController extends Controller
{
    public function __construct ()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(8);
        return view('admin/user/index', ['users' => $users]);
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

    public function new()
    {
      return view('admin/user/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , [
          'email' => 'required|unique:users,email',
          'password' => 'required|confirmed',
          'password_confirmation' => 'required']);

          if ($validator->fails())
          {
              return redirect()->back()->withErrors($validator->errors())->withInput();
          }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->user_password);
        $user->company_name = $request->company_name;
        $user->company_address = $request->company_address;
        $user->company_contact = $request->company_contact;
        $user->company_web = $request->company_web;

        $user->save();

        if ($request->user_image !=null){
            $userImage = $user->id ."_".time(). '.jpg';
            $request->user_image->storeAs('public/user_images', $userImage);
            $user->user_image = $userImage;
        }

        $user->save();

        return redirect('admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::where('id', $user_id)->firstOrFail();
        return view('admin/user/show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::where('id', $user_id)->firstOrFail();
        return view('admin/user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $validator = Validator::make($request->all() , [
          'user_name' => 'required|string|max:255',
          'user_email' => 'required|string|max:255',
        ]);

        $user = User::find($request->id);
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->company_name = $request->company_name;
        $user->company_address = $request->company_address;
        $user->company_contact = $request->company_contact;
        $user->company_web = $request->company_web;

        if ($request->user_image !=null) {
            $userImage = $user->name ."_".time(). '.jpg';
            $request->user_image->storeAs('public/user_images', $userImage);
            $user->user_image = $userImage;

            $deleteUserImage = User::find($user_id);
            $deleteName = $deleteUserImage->user_image;
            Storage::delete('public/user_images/' . $deleteName);
        }

        $user->save();

        return redirect('/admin/users/'.$request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $deleteUserImage = User::find($user_id);
        $deleteName = $deleteUserImage->user_image;
        if (Storage::exists('public/user_images/', $deleteName)){
          Storage::delete('public/user_images/' . $deleteName);
        }

        $user = User::find($user_id);
        $user->delete();

        return redirect('/admin/users/');
    }
}
