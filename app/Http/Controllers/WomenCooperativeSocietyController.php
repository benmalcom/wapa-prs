<?php

namespace App\Http\Controllers;

use App\Member;
use App\Utils\RouteRoleUtils;
use App\WomenCooperativeSociety;
use Illuminate\Http\Request;

class WomenCooperativeSocietyController extends Controller
{
    public function __construct()
    {
        $this->middleware([RouteRoleUtils::POVERTY_ALLEVIATION])->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $societies = WomenCooperativeSociety::withCount(['members'])->orderBy('name')->paginate(self::ITEMS_PER_PAGE);
        return view('poverty-alleviation.cooperative-societies.list', compact('societies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('poverty-alleviation.cooperative-societies.create');
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
        $this->validate($request,WomenCooperativeSociety::createRules());
        $inputs = $request->all();
        WomenCooperativeSociety::create($inputs);
        $this->setFlashMessage("You added a new cooperative society",1);
        return redirect()->route('cooperative-societies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $womenCooperativeSociety = WomenCooperativeSociety::find($id);
        if(is_null($womenCooperativeSociety)){
            return abort(404);
        }
        return view('poverty-alleviation.cooperative-societies.view',compact('womenCooperativeSociety'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $womenCooperativeSociety = WomenCooperativeSociety::find($id);
        if(is_null($womenCooperativeSociety)){
            return abort(404);
        }
        return view('poverty-alleviation.cooperative-societies.edit',compact('womenCooperativeSociety'));

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
        $womenCooperativeSociety = WomenCooperativeSociety::find($id);

        if(is_null($womenCooperativeSociety)){
            return abort(404);
        }

        $womenCooperativeSociety->update($request->all());
        $this->setFlashMessage("Group details updated",1);
        return redirect()->route('cooperative-societies.index');

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
        $womenCooperativeSociety = WomenCooperativeSociety::find($id);

        if(is_null($womenCooperativeSociety)){
            return abort(404);
        }

        $womenCooperativeSociety->delete();
        $this->setFlashMessage("Group deleted",1);
        return redirect()->route('cooperative-societies.index');

    }

    /**
     * Show the form for creating the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function getNewMember($id)
    {
        //
        $womenCooperativeSociety = WomenCooperativeSociety::find($id);
        if(is_null($womenCooperativeSociety)){
            return abort(404);
        }
        return view('poverty-alleviation.cooperative-societies.new-member',compact('womenCooperativeSociety'));

    }

    /**
     * Save members of cooperative society.
     *
     * @param  string  $id
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postMembers(Request $request)
    {
        //
        if(!$request->has('cooperative_society_id')){
            return abort(400);
        }
        $id = $request->get('cooperative_society_id');
        $womenCooperativeSociety = WomenCooperativeSociety::find($id);
        if(is_null($womenCooperativeSociety)){
            return abort(404);
        }
        $this->validate($request,Member::createRules());
        $inputs = $request->all();
        Member::create($inputs);
        $this->setFlashMessage("A new member has been added to this group",1);
        return redirect('/cooperative-societies/'.$id.'/members');

    }

    /**
     * Get members of cooperative society.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function getMembers($id)
    {
        //
        $womenCooperativeSociety = WomenCooperativeSociety::find($id);
        if(is_null($womenCooperativeSociety)){
            return abort(404);
        }
        $members = Member::where('cooperative_society_id',$id)->paginate(self::ITEMS_PER_PAGE);
        return view('poverty-alleviation.cooperative-societies.members',compact('members','womenCooperativeSociety'));

    }
}
