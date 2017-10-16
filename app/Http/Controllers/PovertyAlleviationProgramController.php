<?php

namespace App\Http\Controllers;

use App\Lga;
use App\PovertyAlleviationProgram;
use App\State;
use Illuminate\Http\Request;

class PovertyAlleviationProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programs = PovertyAlleviationProgram::orderBy('created_at','desc')->paginate(self::ITEMS_PER_PAGE);
        return view('poverty-alleviation.program.list', compact('programs'));
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
        return view('poverty-alleviation.program.create', compact('states','lgas'));
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
        $this->validate($request, PovertyAlleviationProgram::createRules());
        $inputs = $request->all();
        PovertyAlleviationProgram::create($inputs);
        $this->setFlashMessage("Registration successful!",1);
        return redirect()->route('programs.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lgas = Lga::all();
        $states = State::all();
        //
        $povertyAlleviationProgram = PovertyAlleviationProgram::with('lga','state')
            ->where('id',$id)
            ->first();
        if(is_null($povertyAlleviationProgram)){
            return abort(404);
        }
        //
        if(!$povertyAlleviationProgram){
            return abort(404);
        }

        return view('poverty-alleviation.program.view',compact('povertyAlleviationProgram','lgas','states'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lgas = Lga::all();
        $states = State::all();
        //
        $povertyAlleviationProgram = PovertyAlleviationProgram::with('lga','state')
                                    ->where('id',$id)
                                    ->first();
        if(is_null($povertyAlleviationProgram)){
            return abort(404);
        }
        return view('poverty-alleviation.program.edit',compact('povertyAlleviationProgram','lgas','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $povertyAlleviationProgram = PovertyAlleviationProgram::find($id);
        if(is_null($povertyAlleviationProgram)){
            return abort(404);
        }
        $povertyAlleviationProgram->update($request->all());
        $this->setFlashMessage("Record successfully updated",1);
        return redirect()->route('programs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $povertyAlleviationProgram = PovertyAlleviationProgram::find($id);
        if(is_null($povertyAlleviationProgram)){
            return abort(404);
        }
        $povertyAlleviationProgram->delete();
        $this->setFlashMessage("Record deleted",1);
        return redirect()->route('programs.index');
    }
}
