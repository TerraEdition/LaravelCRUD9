@extends("Layout.Main")
@include('Layout.Nav')
@section("title",'Create Class Room')
@section("content")
<a href="/classroom" class="btn btn-danger my-3">Back</a>
<form action="/classroom" method="POST">
    @csrf
    <div class="mb-3">
        <label for="class-room" class="form-label">Class Room</label>
        <input type="text" class="form-control" id="class-room" placeholder="" name="class_room">
    </div>
    <div class="mb-3">
        <label for="teacher" class="form-label">Teacher</label>
        <select name="teacher" id="teacher" class="form-control">
            @foreach($teacher as $r)
            <option value="{{$r->id}}">{{$r->teacher}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection