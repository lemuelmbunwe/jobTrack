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
        $stats = Application::selectRaw("
            count(*) as total,
            count(case when status = 'applied' then 1 end) as applied,
            count(case when status = 'interview' then 1 end) as interviews,
            count(case when status = 'offer' then 1 end) as offers,
            count(case when status = 'rejected' then 1 end) as rejections
            ")->first();

        $total = $stats->total ?: 1;

        $percentages = [
            'applied' => round(($stats->applied / $total) * 100),
            'interviews' => round(($stats->interviews / $total) * 100),
            'offers' => round(($stats->offers / $total) * 100),
            'rejections' => round(($stats->rejections / $total) * 100)
        ];


        $applications = Application::all();
        return view('applications.index' , compact('applications', 'stats' , 'percentages' , 'total') );
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
            'applied_at' => 'required',
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
        
        return view('applications.edit' , compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //validate
        $attributes = request()->validate([
            'company' => 'required',
            'role' => 'required',
            'status' => 'required',
            'applied_at' => 'required'
        
        ]);

        // dd($application);

        //persist data
        $application->update($attributes);

        //redirect
        return redirect('/applications');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
