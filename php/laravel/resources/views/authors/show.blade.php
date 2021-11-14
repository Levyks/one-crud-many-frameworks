
@extends('layouts.app', ['active' => 'authors', 'title' => 'Authors'])

@section('header-title', 'Author')

@section('content')
  <div class="row mb-3">
    <div class="col-9 col-md-11">
      <h2><span class="text-secondary">ID:</span> {{ $author->id }}</h2>
      <h2><span class="text-secondary">Name:</span> {{ $author->fullName() }}</h2>
      <h2><span class="text-secondary">Born in:</span> {{ $author->bornIn() }}</h2>
      <h2><span class="text-secondary">Number of books:</span> {{ $author->books->count() }}</h2>
    </div>
    <div class="col-3 col-md-1 d-flex flex-column">
      <a href="/authors/{{$author->id}}/edit" class="btn btn-outline-dark btn-lg mt-4 mb-2"><i class="fas fa-edit"></i></a>
      <form action="/authors/{{$author->id}}" method="post" class="require-confirm mb-0" confirm="Do you want to delete the author [{{$author->id}}] {{$author->fullName()}}?">
          @csrf @method('DELETE') <button type="submit" class="btn btn-outline-danger btn-lg w-100 my-2"><i class="fas fa-trash-alt"></i></button>
      </form>
    </div>
  </div>
  <div class="row">
    <h2 class="text-secondary">Books:</h2>
    <ul class="list-group">
      @foreach ($author->books as $book)
        <li class="list-group-item"><a href="/books/{{$book->id}}">{{$book->title}}</a></li>
      @endforeach
    </ul>
  </div>
@endsection