<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function view(){

        $jobs = Job::orderBy('created_at', 'DESC');

        if(request()->has('search')){
            $jobs = $jobs->where('job', 'like', '%'. request()->get('search', ''). '%');
        }

        return view('jobs.index', ['jobs' => $jobs->paginate(2)]);
    }

    // create job

    public function create(){

        return view('jobs.create');
    }

    public function store(){

        $validate = request()->validate([
            'job' => ['required'],
            'job_details' => ['required'],
            'location' => ['required'],
            'job_description' => ['required'],
            'duties_response' => ['required'],
            'requirements' => ['required']
        ]);

        Job::create($validate);

        return redirect()->route('admin.dashboard')->with('success', 'Created Job Successfully !');
    }

    // view data

    public function details(Job $job){

        return view('jobs.details', ['job' => $job]);
    }
}
