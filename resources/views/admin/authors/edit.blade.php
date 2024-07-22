@extends('admin.layout')
@section('main')


    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li style="color: red; font-size: 28px">{{ $error }}</li>
            @endforeach
        </ol>
    @endif

    <form action="{{ route('dashboard.authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
        @CSRF
        @method('put')
        <label>Name</label> </br>
        <p><input type="text" name="name" value="{{ $author->name }}" style="width: 500px;"></p><br>

        <label>Description</label> </br>
        <p>
            <textarea name="description" cols="80" rows="20">
            {{ $author->description }}
        </textarea>
        </p><br>

        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inputImage">
            <img src="/images/authors_images/{{ $author->image }}" width="300px">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div><br>

        <button type="submit">Update Blog</button>

    </form>

@endsection
