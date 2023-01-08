@extends('Layout.Main')
@include('Layout.Nav')
@section('title',"Teacher")
@section('content')
<a href="/teacher" class="btn btn-danger">Back</a>
@if(Session::has('message'))
    <div class="alert {{Session::get('bg')}} my-3" role="alert">
        {{ Session::get('message') }}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <td>#</td>
            <td>Teacher</td>
            <td>Date Modified</td>
            <td>Option</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->teacher }}</td>
                <td>{{ $r->updated_at }}</td>
                <td>
                    <a href="/teacher/{{ $r->id }}" class="btn btn-sm m-1 btn-primary">Detail</a>
                    <form action="/teacher/restore/{{ $r->id }}" method="post">
                        @csrf
                        @method('PUT')
                    <button type="submit" class="btn btn-sm m-1 btn-primary">Restore</button>
                    </form>
                    <form action="/teacher/delete/{{ $r->id }}" method="post">
                        @csrf
                        @method('Delete')
                    <button type="submit" class="btn btn-sm m-1 btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$data->links()}}
@endsection