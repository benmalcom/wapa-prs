<?php

namespace App\Http\Controllers;

use App\Advocacy;
use App\AdvocacyAttendee;
use App\Utils\RouteRoleUtils;
use Illuminate\Http\Request;

class AdvocacyController extends Controller
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
        $advocacies = Advocacy::withCount(['attendees'])->orderBy('created_at','desc')->paginate(self::ITEMS_PER_PAGE);
        return view('women-dept.advocacy.list', compact('advocacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('women-dept.advocacy.create');
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
        $this->validate($request,Advocacy::createRules());
        $inputs = $request->all();
        Advocacy::create($inputs);
        $this->setFlashMessage("You added a new record",1);
        return redirect()->route('advocacies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advocacy  $advocacy
     * @return \Illuminate\Http\Response
     */
    public function show(Advocacy $advocacy)
    {
        //
        if(is_null($advocacy)){
            return abort(404);
        }
        return view('women-dept.advocacy.view',compact('advocacy'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advocacy  $advocacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Advocacy $advocacy)
    {
        //
        if(is_null($advocacy)){
            return abort(404);
        }
        return view('women-dept.advocacy.edit',compact('advocacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advocacy  $advocacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advocacy $advocacy)
    {
        //

        if(is_null($advocacy)){
            return abort(404);
        }

        $advocacy->update($request->all());
        $this->setFlashMessage("Record details updated",1);
        return redirect()->route('advocacies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advocacy  $advocacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advocacy $advocacy)
    {
        //
        if(is_null($advocacy)){
            return abort(404);
        }

        $advocacy->delete();
        $this->setFlashMessage("Record deleted",1);
        return redirect()->route('advocacies.index');
    }

    public function getNewAttendee(Advocacy $advocacy)
    {
        //

        if(is_null($advocacy)){
            return abort(404);
        }
        return view('women-dept.advocacy.new-attendee',compact('advocacy'));

    }

    public function postAttendees(Request $request, Advocacy $advocacy)
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
        return redirect('/advocacies/'.$advocacy->id.'/attendees');

    }

    /**
     * Get attendees of advocay.
     *
     * @param  Advocacy  $advocacy
     * @return \Illuminate\Http\Response
     */
    public function getAttendees(Advocacy $advocacy)
    {
        //
        if(is_null($advocacy)){
            return abort(404);
        }

        $attendees = AdvocacyAttendee::where('advocacy_id',$advocacy->id)->paginate(self::ITEMS_PER_PAGE);
        return view('women-dept.advocacy.attendees',compact('attendees','advocacy'));

    }
}
