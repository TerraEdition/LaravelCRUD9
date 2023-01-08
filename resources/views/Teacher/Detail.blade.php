@extends("Layout.Main")
@include('Layout.Nav')
@section("title",'Detail Teacher')
@section("content")
<a href="/teacher" class="btn btn-danger">Back</a>
<h3>Teacher : {{ $data->teacher }}</h3>
<div class="d-flex justify-content-center">
    @if(Storage::exists($data->image))
        <img src="{{ asset('/storage/'.$data->image) }}" alt="{{ $data->image }}"
            class="img-thumbnail">
    @endif
</div>
<table class="table">
    <thead>
        <tr>
            <th>Class</th>
            <th>:</th>
            <th>
                @if($data->ClassRoom)
                    {{ $data->ClassRoom->class }}
                @else
                    No Have Class
                @endif
            </th>
        </tr>
    </thead>
</table>
<h5>List Student : </h5>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Gender</th>
        </tr>
    </thead>
    <tbody>
        @if($data->ClassRoom)
            @foreach($data->ClassRoom->Student as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->nis }}</td>
                    <td>
                        @if($r->gender == "L")
                            Laki Laki
                        @else
                            Perempuan
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection