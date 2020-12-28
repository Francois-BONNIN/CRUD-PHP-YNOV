<?php

namespace App\Http\Controllers;

use App\Student;
use App\Module;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
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
            $promotions = Promotion::where('name', 'like', '%'.$search.'%') 
            -> orWhere('speciality', 'like', '%'.$search.'%')
            -> get();
        }else {
            $promotions = Promotion::all();
        }
        return view('promotions.index', ['promotions' => $promotions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotions.create',[
            'students' => Student::all(),
            'modules' => Module::all(),
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
        $newPromotion = new Promotion;
        $newPromotion -> name = $request->input('name');
        $newPromotion -> speciality = $request->input('speciality');
        $newPromotion -> save();

        $newPromotion -> module() -> attach($request->input('modules'));

        $students = $request->input('students');

        if ($request->get('students')){
            foreach ($students as $student){
                $stud = Student::find($student);
                $stud -> promotion_id = $newPromotion -> id;
                $stud -> save();
            };
        };

        return redirect() -> route('promotions.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
         return view('promotions.show', ['promotion' => $promotion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', [
            'promotion' => $promotion,
            'students' => Student::all(),
            'modules' => Module::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $editPromotion = Promotion::find($promotion-> id);
        $editPromotion -> name = $request -> input('name');
        $editPromotion -> speciality = $request -> input('speciality');
        $editPromotion -> push();

        $editPromotion-> module() -> detach();
        $editPromotion -> module() -> attach($request->input('modules'));

        $students = $request->input('students');
        foreach ($students as $student){
            $stud = Student::find($student);
            $stud -> promotion_id = $editPromotion -> id;
            $stud -> save();
        };



        return redirect() -> route('promotions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion = Promotion::find($promotion->id);
        $promotion -> delete();

        return redirect() -> route('promotions.index');
    }
}
