<?php

namespace App\Http\Controllers;

use App\Course;
use App\EducationalBackground;
use App\Lga;
use App\SkillAcquisitionCenter;
use App\State;
use App\Utils\RouteRoleUtils;
use App\VocationalTrainingSkill;
use Illuminate\Http\Request;
use Validator;

class VocationalTrainingSkillController extends Controller
{
    public function __construct()
    {
        $this->middleware([RouteRoleUtils::SKILL_ACQUISITION, RouteRoleUtils::PRINCIPAL])->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = VocationalTrainingSkill::orderBy('created_at', 'desc')
            ->with(['educationalBackground' => function ($query) {
                $query->where('model', VocationalTrainingSkill::class);
            }])->with('state', 'lga', 'course', 'center')
            ->paginate(self::ITEMS_PER_PAGE);
        return view('skill-acquisition.vocational-training.list', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::all();
        $centers = SkillAcquisitionCenter::all();
        $states = State::all();
        $lgas = Lga::all();
        return view('skill-acquisition.vocational-training.create', compact('courses', 'centers', 'states', 'lgas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $rules = VocationalTrainingSkill::createRules();
        $inputs = $request->all();
        $educations = null;
        if ($request->has('education')) {
            $rules = array_merge($rules, EducationalBackground::createRules());
            $this->validate($request, $rules);
            $educations = $request->get('education');
        }

        $data = VocationalTrainingSkill::create($inputs);
        if (!is_null($educations) && is_array($educations)) {

            foreach ($educations as &$education) {
                $education['model'] = VocationalTrainingSkill::class;
                $education['model_id'] = $data->id;
                EducationalBackground::create($education);
            }
        }

        $this->setFlashMessage("Registration successful!", 1);
        return redirect()->route('vocational-training-skills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $vocationalTraining = VocationalTrainingSkill::find($id);
        if (is_null($vocationalTraining)) {
            return abort(404);
        }
        return view('skill-acquisition.vocational-training.view', compact('vocationalTraining'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $vocationalTraining = VocationalTrainingSkill::where('id', $id)->orderBy('created_at', 'desc')
            ->with(['educationalBackground' => function ($query) {
                $query->where('model', VocationalTrainingSkill::class);
            }])->with('state', 'lga', 'course', 'center')
            ->first();
        if (is_null($vocationalTraining)) {
            return abort(404);
        }
        $courses = Course::all();
        $centers = SkillAcquisitionCenter::all();
        $states = State::all();
        $lgas = Lga::all();
        return view('skill-acquisition.vocational-training.edit', compact('vocationalTraining', 'courses', 'centers', 'states', 'lgas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $educations = null;
        $vocationalTraining = VocationalTrainingSkill::find($id);

        if (is_null($vocationalTraining)) {
            return abort(404);
        }

        $vocationalTraining->update($request->all());
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
                            $education['model'] = VocationalTrainingSkill::class;
                            $education['model_id'] = $vocationalTraining->id;
                            EducationalBackground::create($education);
                        }

                    }
                }
            }

        }

        $this->setFlashMessage("Record updated", 1);
        return redirect()->route('vocational-training-skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $vocationalTraining = VocationalTrainingSkill::find($id);

        if (is_null($vocationalTraining)) {
            return abort(404);
        }

        $vocationalTraining->delete();
        $this->setFlashMessage("Record deleted", 1);
        return redirect()->route('vocational-training-skills.index');
    }
}
