@extends('adminlte::page')
@section('title','puplish')
@section('content')

<h1 class="alert alert-secondary">puplish Rent Home</h1>

@if ($errors->any())
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('rents.store')}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3 ">
    <label for="inputfile" class="col-sm-2 col-form-label">IMAGE :</label>
    <input type="file" value="{{old('rent_photo')}}" class="form-control w-50" name="rent_photo[]" multiple id="inputGroupFile01">
  </div>

  <div class="mb-3">
    <label for="rent_num" class="form-label">Phone :</label>
    <input type="integer" value="{{old('rent_num')}}" class="form-control w-50" name="rent_num" id="rent_num" placeholder="201083746556">
  </div>

  <div class="mb-3">
    <label for="rent_price" class="form-label">Price :</label>
    <input type="integer" value="{{old('rent_price')}}" class="form-control w-50" name="rent_price" id="rent_price" placeholder="50000">
  </div>

<div class="mb-3">
    <label for="rent_address" class="form-label">House Address :</label>
    <input type="text" value="{{old('rent_address')}}" class="form-control w-50" name="rent_address" id="rent_address" placeholder="19 street salah salem">
  </div>

  <div class="mb-3">
    <label for="rent_city" class="form-label">City :</label>
    <input type="text" value="{{old('rent_city')}}" class="form-control w-50" name="rent_city" id="rent_city" placeholder="Cairo">
  </div>

<div class="mb-3">
    <label for="rent_description" class="form-label">Description :</label>
    <input type="text" value="{{old('rent_description')}}" class="form-control w-50"  name="rent_description" id="rent_description" >
  </div>

<button class="btn btn-outline-info">Publish</button>
</form>

@endsection
