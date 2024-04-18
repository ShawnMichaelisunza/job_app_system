@extends('layout.content')

@section('content')
    @include('navbar.top')
    @include('navbar.nav')

    <div class="container my-5 d-flex">
        <div class="details p-4 w-50">
            <h1>{{$job->job}}</h1>
            <br>
            <h5>Job details</h5>
            <span class="text-body-secondary">{{$job->job_details}}</span>
            <hr>
            <h5>Location</h5>
            <span class="text-body-secondary">{{$job->job_details}}</span>
            <hr>
            <h5>Full Job description</h5>
            <span class="text-body-secondary">{{$job->job_description}}</span>
            <hr>
            <h5>Duties and Responsibility</h5>
            <span class="text-body-secondary">{{$job->duties_response}}</span>
            <hr>
            <h5>Requirements</h5>
            <span class="text-body-secondary">{{$job->requirements}}</span>
            <hr>
        </div>
        <div class="w-50 p-5">
            <img src="{{asset('assets/css/images/details.png')}}" alt="">
            <div class="mt-4">
                <a class="btn btn-outline-primary mx-2" href="{{route('job.table')}}">Find another</a>
                <a class="btn btn-outline-success mx-2" href="{{route('apply.create', $job->id)}}">Apply now</a>
            </div>
        </div>
    </div>

    {{-- footer --}}
    @include('front.footer')
@endsection
