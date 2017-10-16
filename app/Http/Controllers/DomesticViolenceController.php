<?php

namespace App\Http\Controllers;

use App\DomesticViolence;
use App\Lga;
use App\State;
use Illuminate\Http\Request;

class DomesticViolenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $violences = DomesticViolence::orderBy('created_at','desc')
            ->with('state','lga')->paginate(self::ITEMS_PER_PAGE);
        return view('women-dept.domestic-violence.list', compact('violences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lgas = Lga::all();
        $states = State::all();
        return view('women-dept.domestic-violence.create', compact('states','lgas'));
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
        $this->validate($request, DomesticViolence::createRules());
        $inputs = $request->all();
        DomesticViolence::create($inputs);
        $this->setFlashMessage("You added a new Domestic Violence issue",1);
        return redirect('/domestic-violences');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DomesticViolence  $domesticViolence
     * @return \Illuminate\Http\Response
     */
    public function show(DomesticViolence $domesticViolence)
    {
        //
        if(!$domesticViolence){
            $this->setFlashMessage("This violence does not exist on our system",2);
            return redirect()->back();
        }
        return view('women-dept.domestic-violence.view',compact('domesticViolence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DomesticViolence  $domesticViolence
     * @return \Illuminate\Http\Response
     */
    public function edit(DomesticViolence $domesticViolence)
    {
        //
        if(!$domesticViolence){
            $this->setFlashMessage("This violence does not exist on our system",2);
            return redirect()->back();
        }
        $lgas = Lga::all();
        $states = State::all();
        return view('women-dept.domestic-violence.edit',compact('domesticViolence','lgas','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DomesticViolence  $domesticViolence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DomesticViolence $domesticViolence)
    {
        //
        DomesticViolence::find($domesticViolence->id)->update($request->all());
        $this->setFlashMessage("Domestic Violence details updated",1);
        return redirect()->route('domestic-violences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DomesticViolence  $domesticViolence
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomesticViolence $domesticViolence)
    {
        //
        DomesticViolence::find($domesticViolence->id)->delete();
        $this->setFlashMessage("Domestic Violence deleted",1);
        return redirect()->route('domestic-violences.index');
    }
}
