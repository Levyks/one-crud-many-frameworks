@extends('layouts.app', ['active' => 'authors', 'title' => 'Categories'])

@section('header-title', 'Edit Author')

@section('content')
  <form action="/authors/{{$author->id}}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="firstNameInput" class="form-label">First Name</label>
      <input id="firstNameInput" name="first_name" class="form-control" value="{{$author->first_name}}">
    </div>
    <div class="mb-3">
      <label for="lastNameInput" class="form-label">Last Name</label>
      <input id="lastNameInput" name="last_name" class="form-control" value="{{$author->last_name}}">
    </div>
    <div class="mb-3">
      <label for="firstNameInput" class="form-label">City of Birth</label>
      <input id="cityOfBirthInput" name="city_of_birth" class="form-control" value="{{$author->city_of_birth}}">
    </div>
    <div class="mb-3">
      <label for="lastNameInput" class="form-label">Country of Birth</label>
      <input id="countryOfBirthInput" name="country_of_birth" class="form-control" value="{{$author->country_of_birth}}">
    </div>
    <div class="mb-3">
      <label for="lastNameInput" class="form-label">Born At</label>
      <input type="date" id="bornAtInput" name="date_of_birth" class="form-control" value="{{$author->date_of_birth}}">
    </div>
    <button type="submit" class="btn ms-auto btn-primary">Update</button>
  </form>
@endsection