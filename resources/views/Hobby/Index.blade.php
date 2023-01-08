@extends('Layout.Main')
@include('Layout.Nav')
@section('title','Hobby')
@section('content')
<a href="/hobby/create" class="btn btn-success">Create Data</a>
<table class="table">
    <thead>
        <tr>
            <td>#</td>
            <td>Hobby</td>
            <td>Date Modified</td>
            <td>Option</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $r)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$r->hobby}}</td>
            <td>{{$r->updated_at}}</td>
        <td><a href="/hobby/{{$r->id}}" class="btn btn-sm btn-primary m-1">Detail</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection