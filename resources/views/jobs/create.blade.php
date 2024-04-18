@extends('layout.content')

@section('content')

@include('navbar.adminNavbar')

    <div class="container-fluid">

        <div class="container my-5 bg-success p-5 text-dark bg-opacity-25 w-50 rounded">
            <h3>Add job offer</h3>
            <br>
            <form action="{{route('job.store')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Job offer</label>
                    <input type="text" class="form-control" name="job" value="{{ old('job')}}">
                    @error('job')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Job details</label>
                    <input type="text" class="form-control" name="job_details" value="{{ old('job_details')}}">
                    @error('job_details')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" value="{{ old('location')}}">
                    @error('location')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Full job description</label>
                    <input type="text" class="form-control" name="job_description" value="{{ old('job_description')}}">
                    @error('job_description')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Duties and Responsibilities</label>
                    <input type="text" class="form-control" name="duties_response" value="{{ old('duties_response')}}">
                    @error('duties_response')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Requirements</label>
                    <input type="text" class="form-control" name="requirements" value="{{ old('requirements')}}">
                    @error('requirements')
                        <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

    {{-- footer --}}
    @include('front.footer')
@endsection
