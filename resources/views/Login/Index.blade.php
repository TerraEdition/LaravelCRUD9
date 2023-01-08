@extends('Layout.Main')
@section('title',"Login")
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="border border-secondary border-4 p-3 w-50">
        @if(Session::has('message'))
        <div class="alert {{Session::get('bg')}} my-3" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary form-control">Login</button>
        </form>
    </div>
</div>
@endsection