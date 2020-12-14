<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;
use Validator;

class UsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
      $user = User::where('id', $user_id)->firstOrFail();
      return view('user/index', ['user' => $user]);
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

    public function password($user_id)
    {
    //  $user = User::where('id', $user_id)->firstOrFail();
      $user = Auth::user();
      return view('user/password', ['user' => $user]);
    }

    public function password_confirmation(Request $request, $user_id)
    {

      $validator = Validator::make($request->all() , [
        'new_password' => 'required|confirmed',
        'new_password_confirmation' => 'required']);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = User::find($user_id);
        $user->password = bcrypt($request->new_password);

        $user->save();

        return redirect('/users/'.$user_id);
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
    public function edit()
    {
        $user = Auth::user();
        return view('user/edit', ['user' => $user]);
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
       //バリデーションの結果がエラーの場合
       if ($validator->fails())
       {
         return redirect()->back()->withErrors($validator->errors())->withInput();
       }

       $user = User::find($request->id);
       $user->name = $request->user_name;
       $user->email = $request->user_email;
       $user->company_name = $request->company_name;
       $user->company_address = $request->company_address;
       $user->company_contact = $request->company_contact;
       $user->company_web = $request->company_web;

       if ($request->user_image !=null) {

            $userImage = $user->id ."_".time(). '.jpg';
            $request->user_image->storeAs('public/user_images', $userImage);
            $user->user_image = $userImage;

            $deleteUserImage = User::find($user_id);
            $deleteName = $deleteUserImage->user_image;
            Storage::delete('public/user_images/' . $deleteName);
        }

        $user->save();

       return redirect('/users/'.$request->id);
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
