<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('course/index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return Course::create([
            'name' => $data['name'],
            'name_teacher' => $data['name_teacher'],
            'fee' => $data['fee'],
            'start' => $data['start'],
            'end' => $data['end'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = new Course(array(
            'name' => $request['name'],
            'name_teacher' => $request['name_teacher'],
            'number_max' => $request['number_max'],
            'fee' => $request['fee'],
            'start' => $request['start'],
            'end' => $request['end'],
        ));
        $course->save();

        return redirect('/create') -> with('status','Create course success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where('id', '=', $id)->firstOrFail();
        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::where('id', '=', $id)->firstOrFail();
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, CourseRequest $request)
    {
        $course = Course::where('id', '=', $id)->firstOrFail();
        $course ->name = $request['name'];
        $course ->name_teacher = $request['name_teacher'];
        $course ->number_max = $request['number_max'];
        $course ->fee = $request['fee'];
        $course ->start = $request['start'];
        $course ->end = $request['end'];
        $course->save();

        return redirect(action('CourseController@edit', $course->id))->with('status', 'The course '.$id.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::where('id', '=', $id)->firstOrFail();
        $course ->delete();
        return redirect('/course') -> with('status','The course'.$id.'has been delete');
    }

    public function add()
    {
        return view('course/create');
    }

}
