@extends('Layout.Main')
@include('Layout.Nav')
@section('title','Welcome')

@section('content')
<div class="text-center">
<h3>
    Selamat Datang {{Auth::user()->name}}
</h3>
<h6>Role : {{Auth::user()->Role->role}}</h6>
</div>
@endsection