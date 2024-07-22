@extends('admin.layout')
@section('main')
<button class="btn btn-success"><a class="btn btn-success" href="{{ url('dashboard/authors/create') }}">Add</a></button>

<h2>Authors Lists</h2>

<table class="table">
    <thead>
      <tr>
          <th scope="col">image</th>
          <th scope="col">name</th>
          <th scope="col">description</th>
          <th scope="col">Actions</th>
      </tr>
    </thead>
    @foreach($authors as $author)
    <tbody>
      <tr>
        <td><img src="/images/authors_images/{{ $author->image }}" width="100px"></td>
        <td>{{ $author->name}}</td>
        <td>{{ $author->description}}</td>
        <td>
          <form action="{{ route('dashboard.authors.destroy',$author->id) }}" method="post">
            @csrf
            @method('delete')
            <div>
                <button type="submit">delete</button>
            </div>
        </form>

        <button type="submit"><a href="{{ route('dashboard.authors.edit',$author->id) }}">edit</a></button></br>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>




@endsection