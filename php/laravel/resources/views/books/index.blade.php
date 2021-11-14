
@extends('layouts.app', ['active' => 'books', 'title' => 'Books'])

@section('header-title', 'Books')

@section('header-right')
  <a href="/books/create" class="btn btn-primary"><i class="fas fa-plus"></i></a>
@endsection

@section('content')
  <ul class="list-group">
    @foreach($books as $book)
      <li class="list-group-item">
        <div class="row">
          <div class="col-10 col-sm-9 col-lg-10">
            <b>{{$book->title}}</b>
          </div>
          <div class="col-2 col-sm-3 col-lg-2 ps-sm-0 ps-lg-4">
            <div class="row">
              <div class="col-12 col-sm-4 p-1">
                <a href="/books/{{$book->id}}" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
              </div>
              <div class="col-12 col-sm-4 p-1">
                <a href="/books/{{$book->id}}/edit" class="btn btn-outline-dark"><i class="fas fa-edit"></i></a>
              </div>
              <div class="col-12 col-sm-4 p-1">
                <form action="/books/{{$book->id}}" method="post" class="require-confirm mb-0" confirm="Do you want to delete the book [{{$book->id}}] {{$book->title}}?">
                  @csrf @method('DELETE') <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </li>
    @endforeach
    </ul>
  {{ $books->onEachSide(2)->links('components.pagination') }}
@endsection