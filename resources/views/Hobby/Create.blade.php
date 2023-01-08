@extends("Layout.Main")
@include('Layout.Nav')
@section("title",'Create Class Room')
@section("content")
<a href="/hobby" class="btn btn-danger my-3">Back</a>
<form action="" method="POST">
    @csrf
    <div class="mb-3">
        <label for="hobby" class="form-label">Hobby</label>
        <input type="text" class="form-control" id="hobby" placeholder="" name="hobby">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection