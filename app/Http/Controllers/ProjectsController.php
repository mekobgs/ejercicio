<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = projects::latest()->paginate(5);

        return view('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
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
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required'
        ]);

        projects::create($request->all());

        return redirect()->route('projects.index')
                        ->with('success','project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $project)
    {
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $project)
    {
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required'
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')
                        ->with('success','project updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
                        ->with('success','project deleted successfully');
    }
}
