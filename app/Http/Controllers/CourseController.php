<?php

namespace App\Http\Controllers;

use App\Course;
use App\Utils\RouteRoleUtils;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware([RouteRoleUtils::SKILL_ACQUISITION])->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::orderBy('created_at','desc')->paginate(self::ITEMS_PER_PAGE);
        return view('master-records.courses.list', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master-records.courses.create');
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
        $this->validate($request,Course::createRules());
        $inputs = $request->all();
        Course::create($inputs);
        $this->setFlashMessage("You added a new course",1);
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        if(!$course){
            $this->setFlashMessage("This course does not exist on our system",2);
            return redirect()->back();
        }
        return view('master-records.courses.view',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        if(!$course){
            $this->setFlashMessage("This course does not exist on our system",2);
            return redirect()->back();
        }
        return view('master-records.courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        if(!$course){
            $this->setFlashMessage("This course does not exist on our system",2);
            return redirect()->back();
        }
        $course->update($request->all());
        $this->setFlashMessage("Course details updated",1);
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        if(!$course){
            $this->setFlashMessage("This course does not exist on our system",2);
            return redirect()->back();
        }
        $course->delete();
        $this->setFlashMessage("Course deleted",1);
        return redirect()->route('courses.index');
    }
}
