@extends('layout.content')

@section('content')
    <div class="container mt-5 d-flex">
        <div class="w-50 bg-success p-5 text-dark bg-opacity-25 rounded">
            <h2>Admin Register Form</h2>
            <br>
            <form action="{{route('admin.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                    <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @error('email')
                    <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    @error('password')
                    <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
                    @error('password_confirmation')
                    <span style="color: red; font-size: 12px;">* {{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="w-50 pt-3 mx-2">
            <img style="width:100%;" src="{{asset('assets/css/images/register.png')}}" alt="">
        </div>
    </div>

@endsection
