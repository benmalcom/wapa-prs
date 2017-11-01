<?php

namespace App\Http\Controllers;

use App\Sensitization;
use App\SensitizationAttendee;
use App\Utils\RouteRoleUtils;
use Illuminate\Http\Request;

class SensitizationController extends Controller
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
        $sensitizations = Sensitization::withCount(['attendees'])->orderBy('created_at','desc')->paginate(self::ITEMS_PER_PAGE);
        return view('women-dept.sensitization.list', compact('sensitizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('women-dept.sensitization.create');
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
        $this->validate($request,Sensitization::createRules());
        $inputs = $request->all();
        Sensitization::create($inputs);
        $this->setFlashMessage("You added a new record",1);
        return redirect()->route('sensitizations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensitization  $sensitization
     * @return \Illuminate\Http\Response
     */
    public function show(Sensitization $sensitization)
    {
        //
        if(is_null($sensitization)){
            return abort(404);
        }
        return view('women-dept.sensitization.view',compact('sensitization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensitization  $sensitization
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensitization $sensitization)
    {
        //
        if(is_null($sensitization)){
            return abort(404);
        }
        return view('women-dept.sensitization.edit',compact('sensitization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensitization  $sensitization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensitization $sensitization)
    {
        //
        if(is_null($sensitization)){
            return abort(404);
        }

        $sensitization->update($request->all());
        $this->setFlashMessage("Record details updated",1);
        return redirect()->route('sensitizations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensitization  $sensitization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensitization $sensitization)
    {
        //
        if(is_null($sensitization)){
            return abort(404);
        }

        $sensitization->delete();
        $this->setFlashMessage("Record deleted",1);
        return redirect()->route('sensitizations.index');
    }

    public function postAttendees(Request $request, Sensitization $sensitization)
    {
        //
        if(is_null($sensitization)){
            return abort(404);
        }

        $this->validate($request,SensitizationAttendee::createRules());
        $inputs = $request->all();
        $inputs['sensitization_id'] = $sensitization->id;
        SensitizationAttendee::create($inputs);
        $this->setFlashMessage("A new attendee record has been added",1);
        return redirect('/sensitizations/'.$sensitization->id.'/attendees');

    }

    public function getAttendees(Sensitization $sensitization)
    {
        //
        if(is_null($sensitization)){
            return abort(404);
        }

        $attendees = SensitizationAttendee::where('sensitization_id',$sensitization->id)->paginate(self::ITEMS_PER_PAGE);
        return view('women-dept.sensitization.attendees',compact('attendees','sensitization'));

    }
}
