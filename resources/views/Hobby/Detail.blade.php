@extends("Layout.Main")
@include('Layout.Nav')
@section('title','Detail Hobby')
@section('content')
<a href="/hobby" class="btn btn-danger">Back</a>
<h3>Hobby : {{ $data->hobby }}</h3>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Student</th>
            </tr>
        </thead>
        <tbody>
            @if(collect($data->Student)->count()==0)
                <tr>
                    <td colspan="2">Data Belum Ada</td>
                </tr>
            @else
                @foreach($data->Student as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->student }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection