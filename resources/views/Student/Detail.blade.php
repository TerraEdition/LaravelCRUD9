@extends("Layout.Main")
@include('Layout.Nav')
@section('title',"Detail Student")
@section('content')
<a href="/student" class="btn btn-danger">Back</a>
<h3>Student : {{ $data->student }}</h3>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Teacher</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->nis }}</td>
                <td>
                    @if($data->gender == "L")
                        Laki Laki
                    @else
                        Perempuan
                    @endif
                </td>
                <td>{{ $data->ClassRoom->class }}</td>
                <td>{{ $data->ClassRoom->Teacher->teacher }}</td>
            </tr>
        </tbody>
    </table>
</div>

<h4>List Hobby</h4>
<ol>
    @foreach($data->Hobby as $r)
        <li>{{ $r->hobby }}</li>
    @endforeach
</ol>
@endsection