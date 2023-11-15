@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Article</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/articles">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="text" class="form-control" id="slug" name="slug" disabled readonly>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">slug</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endForeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">slug</label>
                <form …>
                    <input id="body" type="hidden" name="body">
                    <trix-editor input="body"></trix-editor>
                </form>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
