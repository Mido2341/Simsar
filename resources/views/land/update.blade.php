@extends('adminlte::page')
@section('title','Update')
@section('content')

<h1 class="test-center alert alert-secondary">Form Land Sale</h1>

 @if ($errors->any())
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('lands.update',$land->id)}}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="mb-3 ">
        <label for="land_photo" class="col-sm-2 col-form-label">IMAGE :</label>
        <input type="file" value="{{$land->land_photo}}" class="form-control w-50" name="land_photo[]" multiple id="land_photo">
      </div>

  <div class="mb-3">
    <label for="Price_Meter" class="form-label">Price_Meter :</label>
    <input type="integer" value="{{$land->Price_Meter}}" class="form-control w-50" name="Price_Meter" id="Price_Meter" placeholder="500000">
  </div>

  <div class="mb-3">
    <label for="land_area" class="form-label">land_area :</label>
    <input type="integer" value="{{$land->land_area}}" class="form-control w-50" name="land_area" id="land_area" placeholder="500">
  </div>

<div class="mb-3">
    <label for="land_address" class="form-label">House Address :</label>
    <input type="text" value="{{$land->land_address}}" class="form-control w-50" name="land_address" id="land_address" placeholder="19 street salah landm">
  </div>

  <div class="mb-3">
    <label for="land_city" class="form-label">City :</label>
    <input type="text" value="{{$land->land_city}}" class="form-control w-50" name="land_city" id="land_city" placeholder="Cairo">
  </div>

<div class="mb-3">
    <label for="land_description" class="form-label">Description :</label>
    <input type="text" value="{{$land->land_description}}" class="form-control w-50"  name="land_description" id="land_description" >
  </div>

  {{-- <div class="mb-3  ">
     <label for="password" class="col-sm-2 col-form-label">Password :</label>
     <input type="password" class="form-control w-50 "  name="password" id="password">
    </div> --}}


      {{-- <select class="custom-select w-50" aria-label="Default select example" name="major_id">
  <option selected>Select Major</option>
  @foreach ($majors as $major)
  <option  @if (old('major_id')==$major->id) selected  @endif value="{{$major->id}}">{{$major->title}}
</option>
  @endforeach
</select> --}}

<button class="btn btn-outline-info">Publish</button>
</form>

@endsection
