<?php

namespace App\Http\Controllers;

use App\User;
use App\UserType;
use Hash;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('created_at','desc')->paginate(self::ITEMS_PER_PAGE);
        return view('user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_types = UserType::all();
        return view('user.create', compact('user_types'));
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
        $this->validate($request,User::createRules());
        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);
        $user = User::create($inputs);
        $userType = UserType::find($inputs['user_type']);
        if(!is_null($userType)){
            $user->assignRole($userType->role_name);
        }
        $this->setFlashMessage("You created a new user",1);
        return redirect()->route('users.index');
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
        if(!$user){
            $this->setFlashMessage("This user does not exist on our system",2);
            return redirect()->back();
        }
        return view('user.view',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if(!$user){
            $this->setFlashMessage("This user does not exist on our system",2);
            return redirect()->back();
        }
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        if(!$user){
            $this->setFlashMessage("This user does not exist on our system",2);
            return redirect()->back();
        }
        $inputs = $request->all();
        if(!($request->has('password') && Hash::check($request->get('password'),$user->password))){
           $inputs['password'] = bcrypt($inputs['password']);
        }
        $user->update($request->all());
        $this->setFlashMessage("Updated successfully",1);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if(!$user){
            $this->setFlashMessage("This user does not exist on our system",2);
            return redirect()->back();
        }
        $user->delete();
        $this->setFlashMessage("User deleted",1);
        return redirect()->route('users.index');
    }

    public function getProfile(){
        return view('user.profile');
    }

    public function postProfile(Request $request){
        $inputs = $request->all();
        unset($inputs['_token']);
        Auth::user()->update($inputs);
        $this->setFlashMessage("Your details has been updated!", 1);
        return redirect()->back();
    }

    public function postPassword(Request $request){
        $this->validate($request,[
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed'
        ]);
        $user = Auth::user();
        $inputs = $request->all();
        if (Hash::check($inputs['old_password'], $user->password)) {
            // The passwords match...
            $user->password = bcrypt($inputs['password']);
            $user->save();
            $this->setFlashMessage("You changed your password!", 1);
        } else {
            $this->setFlashMessage("You entered an incorrect password!", 2);
        }
        return redirect()->back();
    }
}
