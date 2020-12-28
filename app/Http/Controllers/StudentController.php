<?php

namespace App\Http\Controllers;

use App\Student;
use App\Module;
use App\Promotion;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search){
            $students = Student::where('firstname', 'like', '%'.$search.'%') 
            -> orWhere('lastname', 'like', '%'.$search.'%')
            -> orWhere('email', 'like', '%'.$search.'%')
            -> get();
        }else {
            $students = Student::all();
        }
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promotions = Promotion::all();
        $modules = Module::all();
        return view('students.create', [
            'promotions' => $promotions,
            'modules' => $modules
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newStudent = new Student;
        $newStudent -> firstname = $request->input('firstname');
        $newStudent -> lastname = $request->input('lastname');
        $newStudent -> email = $request->input('email');
        
        $promotion = $request->input('promotion');
        
        if ($request->get('promotion')){
            $newStudent -> promotion_id = $promotion;
        }else{
            $newStudent -> promotion_id = NULL;
        }
        $newStudent -> save();
        $newStudent -> module() -> attach($request->input('modules'));

        return redirect() -> route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student,
            'promotions' => Promotion::all(),
            'modules' => Module::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $editStudent = Student::find($student-> id);
        $editStudent -> firstname = $request -> input('firstname');
        $editStudent -> lastname = $request -> input('lastname');
        $editStudent -> email = $request -> input('email');
        $editStudent -> promotion_id = $request -> input('promotion');
        $editStudent -> push();

        $editStudent -> module() -> detach();
        $editStudent -> module() -> attach($request->input('modules'));

        return redirect() -> route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student = Student::find($student->id);
        $student -> delete();

        return redirect() -> route('students.index');
    }
}
