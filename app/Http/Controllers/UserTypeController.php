<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_types = UserType::all();
        return view('user-type.list', compact('user_types'));
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
        $this->validate($request,UserType::createRules());
        $inputs = $request->all();
        $userType = UserType::create($inputs);
        Role::create(['name' => $userType->role_name]);
        $this->setFlashMessage("You added a new user type",1);
        return redirect('/user-types');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show(UserType $userType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $userType = UserType::find($id);
        $user_types = UserType::all();
        return view('user-type.edit',compact('userType','user_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        UserType::find($id)->update($request->all());
        $this->setFlashMessage("User type updated",1);
        return redirect()->route('user-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        UserType::find($id)->delete();
        $this->setFlashMessage("User type deleted",1);
        return redirect()->route('user-types.index');
    }


}
