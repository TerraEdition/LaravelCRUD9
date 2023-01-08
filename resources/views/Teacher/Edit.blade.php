@extends("Layout.Main")
@include('Layout.Nav')
@section("title",'Create Teacher')
@section("content")
<a href="/teacher" class="btn btn-danger my-3">Back</a>
<form action="/teacher/{{$data->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="mb-3">
        <label for="teacher" class="form-label">Teacher</label>
        <input type="text" class="form-control" id="teacher" placeholder="" name="teacher" value="{{$data->teacher}}">
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
        <div class="d-flex justify-content-center">
            @if(Storage::exists('Teacher/'.$data->image))
                <img src="{{ asset('/storage/Teacher/'.$data->image) }}" alt="{{ $data->image }}"
                    class="img-thumbnail">
            @endif
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection