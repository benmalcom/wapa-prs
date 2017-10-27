<?php

namespace App\Http\Controllers;

use App\Sensitization;
use App\SensitizationAttendee;
use App\Utils\RouteRoleUtils;
use Illuminate\Http\Request;

class SensitizationAttendeeController extends Controller
{
    public function __construct()
    {
        $this->middleware([RouteRoleUtils::WOMEN_DEPARTMENT])->except('index');
    }

    /**
     * Display a listing of the resource.
     * @param  Sensitization $sensitization
     * @return \Illuminate\Http\Response
     */
    public function index(Sensitization $sensitization)
    {
        //
        if(is_null($sensitization)){
            return abort(404);
        }

        $attendees = SensitizationAttendee::where('sensitization_id',$sensitization->id)->paginate(self::ITEMS_PER_PAGE);
        return view('women-dept.sensitization.attendee.list',compact('attendees','sensitization'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  Sensitization $sensitization
     * @return \Illuminate\Http\Response
     */
    public function create(Sensitization $sensitization)
    {
        //

        if(is_null($sensitization)){
            return abort(404);
        }
        return view('women-dept.sensitization.attendee.create',compact('sensitization'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * * @param  Sensitization $sensitization
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sensitization $sensitization)
    {
        //
        if(is_null($sensitization)){
            return abort(404);
        }

        $inputs = $request->all();
        $this->validate($request,SensitizationAttendee::createRules());
        $inputs['sensitization_id'] = $sensitization->id;
        SensitizationAttendee::create($inputs);
        $this->setFlashMessage("A new attendee record has been added",1);
        return redirect()->route('sensitizations.attendees.index',$sensitization->id);

    }

    /**
     * Display the specified resource.
     * @param  Sensitization $sensitization
     * @param  \App\SensitizationAttendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function show(Sensitization $sensitization, SensitizationAttendee $attendee)
    {
        //
        if(is_null($sensitization) || is_null($attendee)){
            return abort(404);
        }
        return view('women-dept.Sensitization.attendee.show',compact('sensitization','attendee'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Sensitization $sensitization
     * @param  \App\SensitizationAttendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensitization $sensitization, SensitizationAttendee $attendee)
    {
        //
        if(is_null($sensitization) || is_null($attendee)){
            return abort(404);
        }
        return view('women-dept.sensitization.attendee.edit',compact('sensitization','attendee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Sensitization $sensitization
     * @param  \App\SensitizationAttendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensitization $sensitization, SensitizationAttendee $attendee)
    {
        //
        if(is_null($sensitization) || is_null($attendee)){
            return abort(404);
        }

        $attendee->update($request->all());
        $this->setFlashMessage("Record updated successfully",1);
        return redirect()->route('sensitizations.attendees.index',$sensitization->id);

    }

    /**
     * Remove the specified resource from storage.
     * @param  Sensitization $sensitization
     * @param  \App\SensitizationAttendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensitization $sensitization, SensitizationAttendee $attendee)
    {
        //
        if(is_null($sensitization) || is_null($attendee)){
            return abort(404);
        }

        $attendee->delete();
        $this->setFlashMessage("Record deleted successfully",1);
        return redirect()->route('sensitizations.attendees.index',$sensitization->id);
    }
}
