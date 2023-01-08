@extends('Layout.Main')
@include('Layout.Nav')
@section('title',"Teacher")
@section('content')
<div class="d-flex justify-content-between">
    <a href="/teacher/create" class="btn btn-success">Create Data</a>
    <a href="/teacher/bin" class="btn btn-warning">Bin</a>
</div>
@if(Session::has('message'))
    <div class="alert {{ Session::get('bg') }} my-3" role="alert">
        {{ Session::get('message') }}
    </div>
@endif
<div class="my-3 col-4">
    <form action="" method="get">
        <div class="input-group mb-3">
            <input type="text" name="s" class="form-control" value="{{app('request')->input('s')}}">
            <button class="input-group-text btn btn-primary">Search</button>
        </div>
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <td>#</td>
            <td>Teacher</td>
            <td>Class</td>
            <td>Date Modified</td>
            <td>Option</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->teacher }}</td>
                <td>@if($r->ClassRoom){{$r->ClassRoom->class}}@endif</td>
                <td>{{ $r->updated_at }}</td>
                <td>
                    <a href="/teacher/{{ $r->id }}" class="btn btn-sm m-1 btn-primary">Detail</a>
                    <a href="/teacher/edit/{{ $r->id }}" class="btn btn-sm m-1 btn-info">Edit</a>
                    <form action="/teacher/{{ $r->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm m-1 btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $data->withQueryString()->links() }}
@endsection