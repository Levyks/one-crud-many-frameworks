@extends('layouts.app', ['active' => 'books', 'title' => 'Books'])

@section('head')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('header-title', 'Create Book')

@section('content')
  <form action="/books/{{$book->id}}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="titleInput" class="form-label">Title</label>
      <input class="form-control" name="title" id="titleInput" value="{{old('title') ?? $book->title}}" required>
    </div>
    <div class="mb-3">
      <label for="descriptionInput" class="form-label">Description</label>
      <textarea class="form-control" name="description" id="descriptionInput" rows="3" maxlength="2047">{{old('description') ?? $book->description}}</textarea>
    </div>
    <div class="mb-3">
      <label for="publishedAtInput" class="form-label">Published At</label>
      <input type="date" id="publishedAtInput" name="published_at" value="{{old('published_at') ?? $book->published_at->format('Y-m-d')}}" class="form-control">
    </div>
    <div class="mb-3 row">
      <div class="col-12 col-md-6">
        <label for="authorsSelect" class="form-label">Authors</label>
        <select id="authorsSelect" class="w-100" name="authors[]" multiple="multiple">
          @foreach($book->authors as $author)
            <option value="{{$author->id}}" selected>{{$author->fullName()}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12 col-md-6">
        <label for="categoriesSelect" class="form-label">Categories</label>
        <select id="categoriesSelect" class="w-100" name="categories[]" multiple="multiple">
          @foreach($book->categories as $category)
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <button type="submit" class="btn ms-auto btn-primary">Update</button>
  </form>
@endsection

@section('end-of-body')
  <script src="/assets/js/book-form.js"></script>
@endsection