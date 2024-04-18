@extends('layout.content')

@section('content')
    @include('navbar.top')
    @include('navbar.nav')

    <div class="container my-5">

        @include('jobs.success')

        <div class="d-flex flex-wrap p-3">

            {{-- add job and  tables --}}
            @include('jobs.tables')

            {{-- search and details --}}
            @include('jobs.search_details')

        </div>
    </div>

    {{-- footer --}}
    @include('front.footer')
@endsection
