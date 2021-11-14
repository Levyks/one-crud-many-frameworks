@extends('layouts.app', ['active' => 'authors', 'title' => 'Authors'])

@section('header-title', 'Create Author')

@section('content')
  <form action="/authors" method="POST">
    @csrf
    <div class="mb-3">
      <label for="firstNameInput" class="form-label">First Name</label>
      <input id="firstNameInput" name="first_name" class="form-control">
    </div>
    <div class="mb-3">
      <label for="lastNameInput" class="form-label">Last Name</label>
      <input id="lastNameInput" name="last_name" class="form-control">
    </div>
    <div class="mb-3">
      <label for="firstNameInput" class="form-label">City of Birth</label>
      <input id="cityOfBirthInput" name="city_of_birth" class="form-control">
    </div>
    <div class="mb-3">
      <label for="lastNameInput" class="form-label">Country of Birth</label>
      <input id="countryOfBirthInput" name="country_of_birth" class="form-control">
    </div>
    <div class="mb-3">
      <label for="lastNameInput" class="form-label">Born At</label>
      <input type="date" id="bornAtInput" name="date_of_birth" class="form-control">
    </div>
    <button type="submit" class="btn ms-auto btn-primary">Create</button>
  </form>
@endsection