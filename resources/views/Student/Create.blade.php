@extends("Layout.Main")
@include('Layout.Nav')
@section("title",'Create Class Room')
@section("content")
<a href="/student" class="btn btn-danger my-3">Back</a>
<form action="/student" method="POST">
    @csrf
    <div class="mb-3">
        <label for="student" class="form-label">Student</label>
        <input type="text" class="form-control" id="student" name="student">
    </div>
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="text" class="form-control" id="nis" name="nis">
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" id="gender" class="form-control">
            <option value="L">Laki Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="class" class="form-label">Class</label>
        <select name="class" id="class" class="form-control">
            @foreach($class as $r)
            <option value="{{$r->id}}">{{$r->class}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="hobby" class="form-label">Hobby</label>
        <select name="hobby" id="hobby" class="form-control">
            @foreach($hobby as $r)
            <option value="{{$r->id}}">{{$r->hobby}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection