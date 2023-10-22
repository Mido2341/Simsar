@extends('adminlte::page')
@section('title','puplish')
@section('content')

<h1 class="alert alert-secondary">puplish Land Sale Or Rent</h1>

@if ($errors->any())
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('lands.store')}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3 ">
    <label for="inputfile" class="col-sm-2 col-form-label">IMAGE :</label>
    <input type="file" value="{{old('land_photo')}}" class="form-control w-50" name="land_photo[]" multiple id="inputGroupFile01">
  </div>

  <div class="mb-3">
    <label for="land_num" class="form-label">Phone :</label>
    <input type="integer" value="{{old('land_num')}}" class="form-control w-50" name="land_num" id="land_num" placeholder="01083746556">
  </div>

  <div class="mb-3">
    <label for="meter_price" class="form-label">Price Meter :</label>
    <input type="integer" value="{{old('meter_price')}}" class="form-control w-50" name="meter_price" id="meter_price" placeholder="50000">
  </div>

  <div class="mb-3">
    <label for="land_area" class="form-label">Space :</label>
    <input type="integer" value="{{old('land_area')}}" class="form-control w-50" name="land_area" id="land_area" placeholder="50000">
  </div>

<div class="mb-3">
    <label for="land_address" class="form-label">House Address :</label>
    <input type="text" value="{{old('land_address')}}" class="form-control w-50" name="land_address" id="land_address" placeholder="19 street salah salem">
  </div>

  <div class="mb-3">
    <label for="land_city" class="form-label">City :</label>
    <input type="text" value="{{old('land_city')}}" class="form-control w-50" name="land_city" id="land_city" placeholder="Cairo">
  </div>

<div class="mb-3">
    <label for="land_description" class="form-label">Description :</label>
    <input type="text" value="{{old('land_description')}}" class="form-control w-50"  name="land_description" id="land_description" >
  </div>
<button class="btn btn-outline-info">Publish</button>
</form>

@endsection
