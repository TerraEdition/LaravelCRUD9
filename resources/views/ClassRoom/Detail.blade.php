@extends('Layout.Main')
@include('Layout.Nav')
@section('title','Detail Class Room')
@section('content')
<a href="/classroom" class="btn btn-danger">Back</a>
<h3>Class Room : {{ $data->class }}</h3>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>:</th>
                <th>{{ $data->Teacher->teacher }}</th>
            </tr>
        </thead>
    </table>
</div>

<h4>List Student : </h4>
<ol>
    @foreach($data->Student as $r)
        <li>{{ $r->student }}</li>
    @endforeach
</ol>
@endsection