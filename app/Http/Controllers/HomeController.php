<?php

namespace App\Http\Controllers;

use App\Advocacy;
use App\DomesticViolence;
use App\Ngo;
use App\PovertyAlleviationProgram;
use App\Sensitization;
use App\ShortTermSkill;
use App\SkillAcquisitionCenter;
use App\VocationalTrainingSkill;
use App\WomenCooperativeSociety;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserType;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = [];
        $user = Auth::user();

        if($user->hasAnyRole([UserType::WOMEN_DEPT,UserType::PRS,UserType::ADMIN,UserType::DEVELOPER])){
            $ngo_count = Ngo::count();
            $last_ngo = Ngo::where('created_at', '>=', Carbon::today())->count();

            $domestic_violence_count = DomesticViolence::count();
            $today_domestic_violence = DomesticViolence::where('created_at', '>=', Carbon::today())->count();

            $short_skill_count = ShortTermSkill::count();
            $today_short_skill = ShortTermSkill::where('created_at', '>=', Carbon::today())->count();

            $sensitization_count = Sensitization::count();
            $today_sensitization = Sensitization::where('created_at', '>=', Carbon::today())->count();

            $advocacy_count = Advocacy::count();
            $today_advocacy = Advocacy::where('created_at', '>=', Carbon::today())->count();

            $details['ngo_count'] = $ngo_count;
            $details['today_ngo'] = $last_ngo;

            $details['domestic_violence_count'] = $domestic_violence_count;
            $details['today_domestic_violence'] = $today_domestic_violence;

            $details['short_skill_count'] = $short_skill_count;
            $details['today_short_skill'] = $today_short_skill;

            $details['sensitization_count'] = $sensitization_count;
            $details['today_sensitization'] = $today_sensitization;

            $details['advocacy_count'] = $advocacy_count;
            $details['today_advocacy'] = $today_advocacy;

        }

        if($user->hasAnyRole([UserType::POVERTY_ALLEVIATION,UserType::PRS,UserType::ADMIN,UserType::DEVELOPER])){

            $program_count = PovertyAlleviationProgram::count();
            $today_program = PovertyAlleviationProgram::where('created_at', '>=', Carbon::today())->count();

            $cooperative_count = WomenCooperativeSociety::count();
            $today_cooperative = WomenCooperativeSociety::where('created_at', '>=', Carbon::today())->count();

            $details['program_count'] = $program_count;
            $details['today_program'] = $today_program;

            $details['cooperative_count'] = $cooperative_count;
            $details['today_cooperative'] = $today_cooperative;
        }

        if($user->hasAnyRole([UserType::SKILL_ACQUISITION,UserType::PRS,UserType::ADMIN,UserType::DEVELOPER])){
            $vocational_count = VocationalTrainingSkill::count();
            $today_vocational = VocationalTrainingSkill::where('created_at', '>=', Carbon::today())->count();

            $details['vocational_count'] = $vocational_count;
            $details['today_vocational'] = $today_vocational;
        }

        if($user->hasAnyRole([UserType::PRINCIPAL,UserType::PRS,UserType::ADMIN,UserType::DEVELOPER])){
            $center = SkillAcquisitionCenter::where('user_id',$user->id)->first();
            if(!is_null($center)){
                $vocational_count = VocationalTrainingSkill::where('center_id',$center->id)->count();
                $today_vocational = VocationalTrainingSkill::where('created_at', '>=', Carbon::today())
                    ->where('center_id',$center->id)->count();

                $details['vocational_count'] = $vocational_count;
                $details['today_vocational'] = $today_vocational;
            }



        }

        return view('home', compact('details'));
    }
}
