@extends('layout.content')

@section('content')
    @include('navbar.adminNavbar')

    <div class="container mt-5 d-flex">
        <div class="w-75">
            @include('jobs.success')
            <div>
                <a class="btn btn-primary btn-sm my-2" href="{{ route('job.create') }}">Add Job Offer</a>
            </div>
            <br>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Job Offer</th>
                        <th scope="col">Location</th>
                        <th scope="col"></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->job }}</td>
                            <td>{{ $job->location }}</td>
                            <th><a class="btn btn-primary btn-sm" href="{{route('admin.applicant', $job->id )}}">View Applicant</a></th>
                            <td><a class="btn btn-success btn-sm" href="{{ route('admin.edit', $job->id) }}">Edit</a></td>
                            <td>
                                <form action="{{route('admin.destroy', $job->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $jobs->links() }}
            </div>
        </div>
        <div class="w-25">
            <form class="d-flex" role="search" method="GET" action="{{route('admin.dashboard')}}">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
        </div>
    </div>
@endsection
