<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Mail\ApplicantMail;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Js;

class ApplicantController extends Controller
{
    // view all

    public function index(Job $jobs)
    {
        $applicants = $jobs->applicants()->orderBy('created_at', 'DESC');

        return view('applicant.index', ['jobs' => $jobs], ['applicants' => $applicants->paginate(5)]);
    }

    // create applicant

    public function create(Job $job)
    {
        return view('applicant.create', ['job' => $job]);
    }

    public function store(Job $job, Request $request)
    {
        $validated = $request->validate([
            'fullname' => ['required'],
            'email' => ['required', 'email'],
            'contact' => ['required', 'min:0', 'max:20'],
            'file' => ['required', 'mimes:png,jpg,jpeg,pdf,docx'],
        ]);

        $validated['job_id'] = $job->id;

        // // files

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $path = 'files/';
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);
        }

        $validated['file'] = $path . $filename;

       Applicant::create($validated);

        // email

        if ($request->has('email')) {
            Mail::to($validated['email'])->send(new ApplicantMail());
        }

        return redirect()->route('job.table')->with('success', 'Sent Application Successfully !');
    }

    // invite button

    public function invite($id)
    {
        $invite = Applicant::find($id);

        $invite->status = 'INVITED';

         $invite->save();

        if (request()->has('email')) {
            Mail::to($invite->email)->send(new AdminMail());
        }

        return redirect()->back()->with('success', 'Invite Applicant is Successfully !');
    }

    // reject button

    public function reject($id)
    {
        $invite = Applicant::find($id);
        $invite->delete();

        return redirect()->route('admin.applicant', $id)->with('success', 'Reject Applicant is Successfully !');
    }
}
