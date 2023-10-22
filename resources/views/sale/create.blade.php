@extends('adminlte::page')
@section('title','puplish')
@section('content')

<h1 class="alert alert-secondary">puplish Sale Home</h1>

@if ($errors->any())
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('sales.store')}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3 ">
    <label for="inputfile" class="col-sm-2 col-form-label">IMAGE 1 :</label>
    <input type="file" value="{{old('sale_photo')}}" class="form-control w-50" name="sale_photo[]" multiple id="inputGroupFile01">
  </div>

  <div class="mb-3">
    <label for="sale_num" class="form-label">Phone :</label>
    <input type="integer" value="{{old('sale_num')}}" class="form-control w-50" name="sale_num" id="sale_num" placeholder="01083746556">
  </div>

  <div class="mb-3">
    <label for="sale_price" class="form-label">Price :</label>
    <input type="integer" value="{{old('sale_price')}}" class="form-control w-50" name="sale_price" id="sale_price" placeholder="50000">
  </div>

<div class="mb-3">
    <label for="sale_address" class="form-label">House Address :</label>
    <input type="text" value="{{old('sale_address')}}" class="form-control w-50" name="sale_address" id="sale_address" placeholder="19 street salah salem">
  </div>

  <div class="mb-3">
    <label for="sale_city" class="form-label">City :</label>
    <input type="text" value="{{old('sale_city')}}" class="form-control w-50" name="sale_city" id="sale_city" placeholder="Cairo">
  </div>

<div class="mb-3">
    <label for="sale_description" class="form-label">Description :</label>
    <input type="text" value="{{old('sale_description')}}" class="form-control w-50"  name="sale_description" id="sale_description" >
  </div>

<button class="btn btn-outline-info">Publish</button>
</form>

@endsection
