<?php

namespace App\Http\Controllers;

use App\SkillAcquisitionCenter;
use Illuminate\Http\Request;

class SkillAcquisitionCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $centers = SkillAcquisitionCenter::orderBy('name')->paginate(self::ITEMS_PER_PAGE);
        return view('poverty-alleviation.centers.list', compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('poverty-alleviation.centers.create');

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
        $this->validate($request,SkillAcquisitionCenter::createRules());
        $inputs = $request->all();
        SkillAcquisitionCenter::create($inputs);
        $this->setFlashMessage("You added a new center",1);
        return redirect()->route('skill-acquisition-centers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SkillAcquisitionCenter  $skillAcquisitionCenter
     * @return \Illuminate\Http\Response
     */
    public function show(SkillAcquisitionCenter $skillAcquisitionCenter)
    {
        //
        if(is_null($skillAcquisitionCenter)){
            $this->setFlashMessage("This center does not exist on our system",2);
            return redirect()->back();
        }
        return view('poverty-alleviation.centers.view',compact('skillAcquisitionCenter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SkillAcquisitionCenter  $skillAcquisitionCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(SkillAcquisitionCenter $skillAcquisitionCenter)
    {
        //
        if(is_null($skillAcquisitionCenter)){
            $this->setFlashMessage("This center does not exist on our system",2);
            return redirect()->back();
        }
        return view('poverty-alleviation.centers.edit',compact('skillAcquisitionCenter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SkillAcquisitionCenter  $skillAcquisitionCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillAcquisitionCenter $skillAcquisitionCenter)
    {
        //
        if(is_null($skillAcquisitionCenter)){
            $this->setFlashMessage("This Center does not exist on our system",2);
            return redirect()->back();
        }
        SkillAcquisitionCenter::find($skillAcquisitionCenter->id)->update($request->all());
        $this->setFlashMessage("Center details updated",1);
        return redirect()->route('skill-acquisition-centers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SkillAcquisitionCenter  $skillAcquisitionCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillAcquisitionCenter $skillAcquisitionCenter)
    {
        //
        if(is_null($skillAcquisitionCenter)){
            $this->setFlashMessage("This Location does not exist on our system",2);
            return redirect()->back();
        }
        SkillAcquisitionCenter::find($skillAcquisitionCenter->id)->delete();
        $this->setFlashMessage("Center deleted",1);
        return redirect()->route('skill-acquisition-centers.index');
    }
}
