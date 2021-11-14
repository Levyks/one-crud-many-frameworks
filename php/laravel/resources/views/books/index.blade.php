
@extends('layouts.app', ['active' => 'books', 'title' => 'Books'])

@section('header-title', 'Books')

@section('header-right')
  <a href="/books/create" class="btn btn-primary"><i class="fas fa-plus"></i></a>
@endsection

@section('content')
  <ul class="list-group">
    @foreach($books as $book)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="ms-2 me-auto">
          <b>{{$book->title}}</b>
        </div>
        <div class="btn-toolbar">
          <a href="/books/{{$book->id}}" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
          <a href="/books/{{$book->id}}/edit" class="btn btn-outline-dark mx-2"><i class="fas fa-edit"></i></a>
          <form action="/books/{{$book->id}}" method="post" class="require-confirm mb-0" confirm="Do you want to delete book [{{$book->id}}] {{$book->title}}?">
            @csrf @method('DELETE') <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
          </form>
        </div>
      </li>
    @endforeach
  <ul>
  {{ $books->onEachSide(2)->links('components.pagination') }}
@endsection