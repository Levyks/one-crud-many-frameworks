
@extends('layouts.app', ['active' => 'books', 'title' => 'Books'])

@section('header-title', 'Book')

@section('content')
  <div class="row mb-3">
    <div class="col-9 col-md-11">
      <h2><span class="text-secondary">ID:</span> {{ $book->id }}</h2>
      <h2><span class="text-secondary">Title:</span>  {{ $book->title }}</h2>
      <h2 class="text-secondary">Description:</h2>
      <p>{{ $book->description }}</p>
    </div>
    <div class="col-3 col-md-1 d-flex flex-column">
      <a href="/books/{{$book->id}}/edit" class="btn btn-outline-dark btn-lg mt-4 mb-2"><i class="fas fa-edit"></i></a>
      <form action="/books/{{$book->id}}" method="post" class="require-confirm mb-0" confirm="Do you want to delete the book [{{$book->id}}] {{$book->title}}?">
          @csrf @method('DELETE') <button type="submit" class="btn btn-outline-danger btn-lg w-100 my-2"><i class="fas fa-trash-alt"></i></button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-6">
      <h2 class="text-secondary">Authors:</h2>
      <ul class="list-group mb-2">
        @foreach($book->authors as $author)
          <li class="list-group-item"><a href="/authors/{{$author->id}}">{{ $author->fullName() }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="col-12 col-md-6">
      <h2 class="text-secondary">Categories:</h2>
      <ul class="list-group mb-2">
        @foreach($book->categories as $category)
          <li class="list-group-item"><a href="/categories/{{$category->id}}">{{ $category->name }}</a></li>
        @endforeach
    </div>
  </div>
@endsection