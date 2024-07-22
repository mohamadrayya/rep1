@extends('admin.layout')


@section('cssandjs')
    <link rel="stylesheet" href="{{ asset('filepond/filepond.min.css') }}">
    <script src="{{ asset('filepond/filepond.min.js') }}"></script>
    </script>
@endsection


@section('main')
    <div class="card">
        <div class="card-header text-center bg-success">
            Add New Author
        </div>
        @if ($errors->any())
            <ol>
                @foreach ($errors->all() as $error)
                    <li style="color: red; font-size: 28px">{{ $error }}</li>
                @endforeach
            </ol>
        @endif


        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif



        <div class="card-body">
            <form action="{{ route('dashboard.authors.store') }}" method="POST" enctype="multipart/form-data">
                @CSRF
                <div class="mb-3">
                    <label for="name" class="form-label">Author Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="des" class="form-label">Author Bio</label>
                    <textarea class="form-control" id="des" name="des" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    {{-- <label for="image" class="form-label">Author Image</label> --}}
                    <input type="file" class="form-control" name="image" id="image" placeholder="">
                </div>

                <div class="mb-3 w-35 text-center">
                    <button class="btn btn-success" type="submit"><a class="btn btn-success">Add Author</a></button>
                </div>

            </form>
        </div>

    </div>
    </div>



    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="image"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);


        FilePond.setOptions({
            server: {
                url: '/dashboard/upload',
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                }
            }
        });
    </script>


@endsection
