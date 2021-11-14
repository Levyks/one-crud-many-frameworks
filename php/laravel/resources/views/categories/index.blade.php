
@extends('layouts.app', ['active' => 'categories', 'title' => 'Categories'])

@section('header-title', 'Categories')

@section('header-right')
  <a href="/categories/create" class="btn btn-primary"><i class="fas fa-plus"></i></a>
@endsection

@section('content')
  <ul class="list-group">
    @foreach($categories as $category)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="ms-2 me-auto">
          <b>{{$category->name}}</b> <span class="text-secondary">- {{$category->books->count()}} book(s)</span>
        </div>
        <div class="btn-toolbar">
          <a href="/categories/{{$category->id}}" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
          <a href="/categories/{{$category->id}}/edit" class="btn btn-outline-dark mx-2"><i class="fas fa-edit"></i></a>
          <form action="/categories/{{$category->id}}" method="post" class="require-confirm mb-0" confirm="Do you want to delete the category [{{$category->id}}] {{$category->name}}?">
            @csrf @method('DELETE') <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
          </form>
        </div>
      </li>
    @endforeach
  <ul>
  {{ $categories->onEachSide(2)->links('components.pagination') }}
@endsection