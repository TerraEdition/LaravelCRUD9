@extends("Layout.Main")
@include('Layout.Nav')
@section("title",'Create Teacher')
@section("content")
<a href="/teacher" class="btn btn-danger my-3">Back</a>
<form action="/teacher" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="teacher" class="form-label">Teacher</label>
        <input type="text" class="form-control @error('teacher') is-invalid @enderror" id="teacher"
            name="teacher" value="{{ old('teacher') }}">
        @error('teacher')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
            name="image" value="{{ old('image') }}">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection