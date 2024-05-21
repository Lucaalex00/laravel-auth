<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* dd(Project::all()); */
        return view('admin.portfolio.index', ['projects' => Project::orderByDesc('id')->paginate(4)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('admin.portfolio.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        /* Validate */

        $validated = $request->validated();
        $slug = Str::slug($request->slug, '-');
        /* Create */
        $validated['slug'] = $slug;
        Project::create($validated);
        /* Redirect */
        return to_route('admin.portfolio.index')->with('message', 'Project Created Successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        /* dd($project->all()); */
        return view('admin.portfolio.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.portfolio.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        /*  dd($request->all()); */

        /* Validate */

        $validated = $request->validated();
        $slug = Str::slug($request->slug, '-');
        $validated['slug'] = $slug;

        /* Update */
        $project->update($validated);

        /* Redirect */
        return to_route('admin.portfolio.show', $project)->with('message', 'Project Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.portfolio.index')->with('message', 'Project Deleted');
    }
}
