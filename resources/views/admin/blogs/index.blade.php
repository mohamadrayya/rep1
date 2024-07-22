@extends('admin.layout')
@section('main')
    <div style=" width: 550px;">
        <form action="{{ url('dashboard/blogs/create') }}" method="get">
            @csrf
            <div>

                <button type="submit" class="btn btn-success"><a class="btn btn-success">Add</a></button>

            </div>
        </form>
    </div>


    <h2>Blogs Lists</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">image</th>
                <th scope="col">Title</th>
                {{-- <th scope="col">Contnet</th> --}}
                <th scope="col">Author</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        @foreach ($blogs as $blog)
            <tbody>
                <tr>
                    <td><img src="/images/blogs/{{ $blog->image }}" width="100px"></td>
                    <td>{{ $blog->title }}</td>
                    {{-- <td>{{ $blog->content }}</td> --}}
                    <td>{{ $blog->author->name }}</td> {{-- هي اسم التابع بموديل البلوجز author --}}
                    <td>
                        <form action="{{ route('dashboard.blogs.destroy', $blog->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <div>
                                <button type="submit">delete</button>
                            </div>
                        </form>

                        <button type="submit"><a
                                href="{{ route('dashboard.blogs.edit', $blog->id) }}">edit</a></button></br>
                    </td>

                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
