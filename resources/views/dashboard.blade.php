@extends('layout.content')

@section('content')
    @include('navbar.top')
    @include('navbar.nav')

    {{-- front --}}
    <div class="container my-5">

        @include('front.navbar')

    </div>

    {{-- about --}}
    <div class="container-fluid bg-success px-2 py-5 text-dark bg-opacity-25 my-4">
        <div class="container">
            @include('front.about')
        </div>
    </div>

    {{-- location --}}
    <div class="container">
        @include('front.location')
    </div>

    {{-- footer --}}
    @include('front.footer')
@endsection
