<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //index

    public function index(){

        $jobs = Job::orderBy('created_at', 'DESC');

        if(request()->has('search')){
            $jobs = $jobs->where('job', 'like', '%'. request()->get('search', ''). '%');
        }

        return view('admin.dashboard', ['jobs' => $jobs->paginate(2)]);
    }

    // edit

    public function edit($edit){

        $data = Job::findOrFail($edit);

        return view('admin.edit', ['job' => $data]);

    }

    public function update(Job $job){

        $validate = request()->validate([
            'job' => ['required'],
            'job_details' => ['required'],
            'location' => ['required'],
            'job_description' => ['required'],
            'duties_response' => ['required'],
            'requirements' => ['required']
        ]);

        $job->update($validate);

        return redirect()->route('admin.dashboard')->with('success', 'Created Job Successfully !');

    }

    // destroy

    public function destroy($id){
        Job::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Deleted Job is Successfully !');
    }


}
