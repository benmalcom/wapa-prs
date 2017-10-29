<?php

namespace App\Http\Controllers;

use App\Course;
use App\EducationalBackground;
use App\Lga;
use App\SkillAcquisitionCenter;
use App\State;
use App\ShortTermSkill;
use App\Utils\RouteRoleUtils;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;

class ShortTermSkillController extends Controller
{
    public function __construct()
    {
        $this->middleware([RouteRoleUtils::WOMEN_DEPARTMENT])->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = ShortTermSkill::orderBy('created_at','desc')
            ->with(['educationalBackground'=>function($query){
                $query->where('model' , ShortTermSkill::class);
            }])->with('state','lga')
            ->paginate(self::ITEMS_PER_PAGE);
        return view('women-dept.short-term-skill.list', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states = State::all();
        $lgas = Lga::all();
        return view('women-dept.short-term-skill.create', compact('states','lgas'));
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

        $rules = ShortTermSkill::createRules();
        $inputs = $request->all();
        $educations = null;
        if($request->has('education')){
            $rules = array_merge($rules,EducationalBackground::createRules());
            $this->validate($request,$rules);
            $educations = $request->get('education');
        }

        $data = ShortTermSkill::create($inputs);
        if(!is_null($educations)){

            foreach ($educations as &$education){
                $education['model'] = ShortTermSkill::class;
                $education['model_id'] = $data->id;
                EducationalBackground::create($education);
            }
        }

        $this->setFlashMessage("Registration successful!",1);
        return redirect()->route('short-term-skills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $shortTermSkill = ShortTermSkill::find($id);
        if(is_null($shortTermSkill)){
            return abort(404);
        }
        return view('women-dept.short-term-skill.view',compact('shortTermSkill'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $states = State::all();
        $lgas = Lga::all();
        $shortTermSkill = ShortTermSkill::find($id);
        if(is_null($shortTermSkill)){
            return abort(404);
        }
        return view('women-dept.short-term-skill.edit',compact('shortTermSkill','states','lgas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$educations = null;
        $shortTermSkill = ShortTermSkill::find($id);

        if (is_null($shortTermSkill)) {
            return abort(404);
        }

        $shortTermSkill->update($request->all());
        if ($request->has('education')) {
            $educations = $request->get('education');
            if (!is_null($educations) && is_array($educations)) {

                foreach ($educations as &$education) {
                    if (array_key_exists('id', $education)) {
                        $update = $education;
                        unset($update['id']);
                        EducationalBackground::where('id', $education['id'])->update($update);
                    } else {
                        $validator = Validator::make($education, EducationalBackground::createRulesSingle());
                        if ($validator->passes()) {
                            $education['model'] = ShortTermSkill::class;
                            $education['model_id'] = $shortTermSkill->id;
                            EducationalBackground::create($education);
                        }

                    }
                }
            }

        }

        $this->setFlashMessage("Record updated",1);
        return redirect()->route('short-term-skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $shortTermSkill = ShortTermSkill::find($id);

        if(is_null($shortTermSkill)){
            return abort(404);
        }

        $shortTermSkill->delete();
        $this->setFlashMessage("Record deleted",1);
        return redirect()->route('short-term-skills.index');
    }
}
