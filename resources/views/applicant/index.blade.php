@extends('layout.content')

@section('content')
    @include('navbar.adminNavbar')

    <div class="container mt-5">
        @include('jobs.success')
        <br>
        <h3>{{ $jobs->job }}</h3>
        <h5>{{ $jobs->location}}</h5>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Full name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                <tr>
                    <td>{{ $applicant->fullname }}</td>
                    <td>{{ $applicant->email }}</td>
                    <td>{{ $applicant->contact }}</td>
                    <td>
                        @if ($applicant->status == 'INVITED')
                            <span class="text-danger fw-bold">{{ $applicant->status }}</span>
                            @else
                            <span class="fw-semibold">{{ $applicant->status }}</span>
                        @endif
                    </td>
                    <td><a class="btn btn-sm btn-primary" href="{{asset($applicant->file )}}" target="blank">Veiw details</a></td>
                    <td>
                        <form action="{{ route('applicant.invite', $applicant->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ $applicant->email }}">
                            <button class="btn btn-sm btn-success" type="submit">Invite</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('applicant.reject', $applicant->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">Reject</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div>
            {{ $applicants->links()}}
        </div>
    </div>
@endsection
