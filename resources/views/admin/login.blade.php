@extends('layout.content')

@section('content')

<div class="container mt-5 d-flex">
    <div class="w-50 mx-2 px-5">
        <img src="{{asset('assets/css/images/login.png')}}" alt="" style="100%">
    </div>

    <div class="w-50 bg-success p-5 text-dark bg-opacity-25 rounded">
        <h2>Admin Login</h2>
        <form action="{{route('admin.login')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              @error('email')
              <span style="color: red; font-size: 12px;">* {{ $message }}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1"
              name="password">
              @error('password')
              <span style="color: red; font-size: 12px;">* {{ $message }}</span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
          </form>
    </div>
</div>


@endsection
