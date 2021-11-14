
@extends('layouts.app', ['active' => 'authors', 'title' => 'Authors'])

@section('header-title', 'Authors')

@section('header-right')
  <a href="/authors/create" class="btn btn-primary"><i class="fas fa-plus"></i></a>
@endsection

@section('content')
  <ul class="list-group">
    @foreach($authors as $author)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="ms-2 me-auto">
          <b>{{$author->fullName()}}</b> <span class="text-secondary">- {{$author->books->count()}} book(s)</span>
        </div>
        <div class="btn-toolbar">
          <a href="/authors/{{$author->id}}" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
          <a href="/authors/{{$author->id}}/edit" class="btn btn-outline-dark mx-2"><i class="fas fa-edit"></i></a>
          <form action="/authors/{{$author->id}}" method="post" class="require-confirm mb-0" confirm="Do you want to delete the author [{{$author->id}}] {{$author->fullName()}}?">
            @csrf @method('DELETE') <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
          </form>
        </div>
      </li>
    @endforeach
  <ul>
  {{ $authors->onEachSide(2)->links('components.pagination') }}
@endsection