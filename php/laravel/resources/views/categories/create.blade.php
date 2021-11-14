@extends('layouts.app', ['active' => 'categories', 'title' => 'Categories'])

@section('header-title', 'Create Category')

@section('content')
  <form action="/categories" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nameInput" class="form-label">Name</label>
      <input class="form-control" name="name" id="nameInput" required>
    </div>
    <button type="submit" class="btn ms-auto btn-primary">Create</button>
  </form>
@endsection