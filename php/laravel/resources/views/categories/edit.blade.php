@extends('layouts.app', ['active' => 'categories', 'title' => 'Categories'])

@section('header-title', 'Edit Category')

@section('content')
  <form action="/categories/{{$category->id}}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="nameInput" class="form-label">Name</label>
      <input class="form-control" name="name" id="nameInput" value="{{$category->name}}" required>
    </div>
    <button type="submit" class="btn ms-auto btn-primary">Update</button>
  </form>
@endsection