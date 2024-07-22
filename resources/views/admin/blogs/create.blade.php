@extends('admin.layout')
@section('main')

    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li style="color: red; font-size: 28px">{{ $error }}</li>
            @endforeach
        </ol>
    @endif


    <form action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @CSRF
        <label>Title</label> </br>
        <p><input type="text" name="title" style="width: 500px;"></p><br>

        <label>Content</label> </br>
        <p>
            <textarea name="content" cols="65" rows="10"></textarea>
        </p><br>

        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inputImage">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div></br>

        {{-- <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Author:</strong></label>
            <select class="form-select" >
                @foreach ($authors as $author)
                <option>{{ $author->name }}</option>
                @endforeach
            </select>
        </div></br></br> --}}
        <div class="mb-3">
            <select class="form-control" name="resoureceName">
                <option>Select Item</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}"> {{ $author->name }} </option>
                @endforeach
            </select>
        </div></br>


        <button type="submit">Add Blog</button>

    </form>

@endsection
