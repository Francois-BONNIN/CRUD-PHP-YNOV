<?php

namespace App\Http\Controllers;

use App\Student;
use App\Module;
use App\Promotion;
use Illuminate\Http\Request;

class ModuleController extends Controller
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
            $modules = Module::where('name', 'like', '%'.$search.'%') 
            -> orWhere('description', 'like', '%'.$search.'%')
            -> get();
        }else {
            $modules = Module::all();
        }
        return view('modules.index', ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.create',[
            'students' => Student::all(),
            'promotions' => Promotion::all()
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
        $newmodule = new Module;
        $newmodule -> name = $request->input('name');
        $newmodule -> description = $request->input('description');
        $newmodule -> save();

        $newmodule -> promotion() -> attach($request->input('promotions'));
        $newmodule -> student() -> attach($request->input('students'));

        return redirect() -> route('modules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return view('modules.show', ['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('modules.edit', [
            'module' => $module,
            'students' => Student::all(),
            'promotions' => Promotion::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {        
        $editModule = Module::find($module-> id);
        $editModule -> name = $request -> input('name');
        $editModule -> description = $request -> input('description');
        $editModule -> push();

        $editModule-> student() -> detach();
        $editModule -> student() -> attach($request->input('students'));

        $editModule-> promotion() -> detach();
        $editModule -> promotion() -> attach($request->input('promotions'));

        return redirect() -> route('modules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module = Module::find($module->id);
        $module -> delete();

        return redirect() -> route('modules.index');
    }
}
