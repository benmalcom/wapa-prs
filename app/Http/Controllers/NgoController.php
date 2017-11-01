<?php

namespace App\Http\Controllers;

use App\Ngo;
use App\Utils\RouteRoleUtils;
use Illuminate\Http\Request;

class NgoController extends Controller
{
    public function __construct()
    {
        $this->middleware(RouteRoleUtils::WOMEN_DEPARTMENT)->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ngos = Ngo::orderBy('created_at','desc')->paginate(self::ITEMS_PER_PAGE);
        return view('women-dept.ngos.list', compact('ngos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('women-dept.ngos.create');
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
        $this->validate($request,Ngo::createRules());
        $inputs = $request->all();
        Ngo::create($inputs);
        $this->setFlashMessage("You added a new NGO",1);
        return redirect()->route('ngos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ngo  $ngo
     * @return \Illuminate\Http\Response
     */
    public function show(Ngo $ngo)
    {
        //
        if(!$ngo){
            $this->setFlashMessage("This NGO does not exist on our system",2);
            return redirect()->back();
        }
        return view('women-dept.ngos.view',compact('ngo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ngo  $ngo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ngo $ngo)
    {
        //
        if(!$ngo){
            $this->setFlashMessage("This NGO does not exist on our system",2);
            return redirect()->back();
        }
        return view('women-dept.ngos.edit',compact('ngo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ngo  $ngo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ngo $ngo)
    {
        //
        if(!$ngo){
            $this->setFlashMessage("This NGO does not exist on our system",2);
            return redirect()->back();
        }
        $ngo->update($request->all());
        $this->setFlashMessage("NGO details updated",1);
        return redirect()->route('ngos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ngo  $ngo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ngo $ngo)
    {
        //
        if(!$ngo){
            $this->setFlashMessage("This NGO does not exist on our system",2);
            return redirect()->back();
        }
        $ngo->delete();
        $this->setFlashMessage("NGO deleted",1);
        return redirect()->route('ngos.index');
    }
}