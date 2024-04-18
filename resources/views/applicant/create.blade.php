@extends('layout.content')

@section('content')
    @include('navbar.top')
    @include('navbar.nav')

    <div class="mt-4 mx-3">
        <h1>{{ $job->job }}</h1>
        <h5><i class="fa-solid fa-location-crosshairs" style="color: red"></i> {{ $job->location }}</h5>
    </div>
    <div class="container d-flex my-4">
        <div class="w-50 bg-success p-4 text-dark bg-opacity-25 mt-2 rounded mx-2">
            <h3>Application Form</h3>
            <br>
            <form action="{{ route('applicant.store', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullname" value="{{old('fullname')}}">
                    @error('fullname')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" value="{{old('email')}}">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @error('email')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact No.</label>
                    <input type="number" class="form-control" name="contact" value="{{old('contact')}}">
                    @error('contact')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Resume</label>
                    <input class="form-control" type="file" id="formFile" name="file" >
                    @error('file')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="w-50 mx-2">
            <img style="width:100%" src="{{ asset('assets/css/images/apply.png') }}" alt="">
            <div class="mt-5 mx-5">
                <a class="btn btn-outline-primary mx-2" href="{{ route('job.table') }}">Find another</a>
            </div>
        </div>
    </div>



    {{-- footer --}}
    @include('front.footer')
@endsection
