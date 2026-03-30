<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::all();
        return view('applications.index' , ['applications' => $applications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $attributes = request()->validate([
            'company'=>'required',
            'role' => 'required',
            'status' => 'required',
        ]);

        // dd(request();
        
        //persist user data
        Application::create([
            'company' => request()->company,
            'role' => request()->role,
            'user_id' => 1,
            'status' => request()->status,
            'applied_at' => request()->applied_at ?? now (),
            'notes' => request()->notes
            
            
        ]);

        //redirect
        return redirect('/applications');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
