<?php

namespace App\Http\Controllers;

use App\Advocacy;
use App\AdvocacyAttendee;
use App\Utils\RouteRoleUtils;
use Illuminate\Http\Request;

class AdvocacyAttendeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(RouteRoleUtils::WOMEN_DEPARTMENT)->except('index');
    }

    /**
     * Display a listing of the resource.
     * @param  Advocacy $advocacy
     * @return \Illuminate\Http\Response
     */
    public function index(Advocacy $advocacy)
    {
        //
        if(is_null($advocacy)){
            return abort(404);
        }

        $attendees = AdvocacyAttendee::where('advocacy_id',$advocacy->id)->paginate(self::ITEMS_PER_PAGE);
        return view('women-dept.advocacy.attendee.list',compact('attendees','advocacy'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  Advocacy $advocacy
     * @return \Illuminate\Http\Response
     */
    public function create(Advocacy $advocacy)
    {
        //

        if(is_null($advocacy)){
            return abort(404);
        }
        return view('women-dept.advocacy.attendee.create',compact('advocacy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * * @param  Advocacy $advocacy
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Advocacy $advocacy)
    {
        //
        if(is_null($advocacy)){
            return abort(404);
        }

        $inputs = $request->all();
        $this->validate($request,AdvocacyAttendee::createRules());
        $inputs['advocacy_id'] = $advocacy->id;
        AdvocacyAttendee::create($inputs);
        $this->setFlashMessage("A new attendee record has been added",1);
        return redirect()->route('advocacies.attendees.index',$advocacy->id);

    }

    /**
     * Display the specified resource.
     * @param  Advocacy $advocacy
     * @param  \App\AdvocacyAttendee  $advocacyAttendee
     * @return \Illuminate\Http\Response
     */
    public function show(Advocacy $advocacy, AdvocacyAttendee $advocacyAttendee)
    {
        //
        if(is_null($advocacy) || is_null($advocacyAttendee)){
            return abort(404);
        }
        $attendee = $advocacyAttendee;
        return view('women-dept.advocacy.attendee.show',compact('advocacy','attendee'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Advocacy $advocacy
     * @param  \App\AdvocacyAttendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function edit(Advocacy $advocacy, AdvocacyAttendee $attendee)
    {
        //
        if(is_null($advocacy) || is_null($attendee)){
            return abort(404);
        }
        return view('women-dept.advocacy.attendee.edit',compact('advocacy','attendee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Advocacy $advocacy
     * @param  \App\AdvocacyAttendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advocacy $advocacy, AdvocacyAttendee $attendee)
    {
        //
        if(is_null($advocacy) || is_null($attendee)){
            return abort(404);
        }

        $attendee->update($request->all());
        $this->setFlashMessage("Record updated successfully",1);
        return redirect()->route('advocacies.attendees.index',$advocacy->id);

    }

    /**
     * Remove the specified resource from storage.
     * @param  Advocacy $advocacy
     * @param  \App\AdvocacyAttendee  $attendee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advocacy $advocacy, AdvocacyAttendee $attendee)
    {
        //
        if(is_null($advocacy) || is_null($attendee)){
            return abort(404);
        }

        $attendee->delete();
        $this->setFlashMessage("Record deleted successfully",1);
        return redirect()->route('advocacies.attendees.index',$advocacy->id);
    }
}
