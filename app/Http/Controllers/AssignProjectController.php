<?php

namespace App\Http\Controllers;

use App\Models\Projects_Employees;
use App\Models\Employees;
use App\Models\Projects;
use Illuminate\Http\Request;

class AssignProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assigned = Projects_Employees::latest()->paginate(5);

        return view('assignProject.index',compact('assigned'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employees::orderBy('name')->get();
        $projects = Projects::orderBy('name')->get();
        return view('assignProject.create')->with('projects', $projects)->with('employees',$employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employeeId' => 'required',
            'projectId' => 'required'
        ]);

        Projects_Employees::create($request->all());

        return redirect()->route('assignProject.index')
                        ->with('success','project assigned successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects_employees $assigProject)
    {
        return view('assigProject.show',compact('assigProject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects_employees $assigProject)
    {
        return view('assigProject.edit',compact('assigProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects_employees $assigProject)
    {
        $request->validate([
            'employeeId' => 'required',
            'projectId' => 'required'
        ]);

        $assigProject->update($request->all());

        return redirect()->route('assigProject.index')
                        ->with('success','project updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects_employees $assigProject)
    {
        $assigProject->delete();

        return redirect()->route('assigProject.index')
                        ->with('success','project deleted successfully');
    }
}
