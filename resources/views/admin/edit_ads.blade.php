@extends ('layouts.default')

@section ('title', 'Edit Ads')
@section('content')

@auth

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier mon annonce</div>

                <div class="card-body">
                    <!-- au clic sur submit, on passe par la route ads.store et la fonction store du controlleur adsController. La page create est renvoyée par la fonction create du controlleur adscontroller  -->
<form action="{{ route('update_ads', $ads->id) }}" method="POST" enctype="multipart/form-data">
@csrf
<!-- title input -->

@method('PUT')


  <div class="form group">
  <label for="title">Title</label>
  <input type="text" class="form-control" name="title" id='title' value="{{$ads->title}}" required autocomplete="title" autofocus>
</div>

    <div class="form group creatad">
  <label for="description">Description</label>
  <input type="textarea" class="form-control" name="description" id='description' value="{{$ads->description}}">
</div>

<div class="form group creatad">
  <label for="price">Price
  </label>
  <input type="number" class="form-control" name="price" id='price' value="{{$ads->price}}">
</div>

<div class="form group creatad">
  <label for="img1">Image 1</label>
  <input type="file" class="form-control-file" name="img1" id='img1' value=''>
</div>
 
<div class="form group creatad">
  <label for="img2">Image 2</label>
  <input type="file" class="form-control-file" name="img2" id='img2' value=''>
</div>

<div class="form group creatad">
  <label for="img3">Image 3</label>
  <input type="file" class="form-control-file" name="img3" id='img3' value=''>
</div>

<div class="form group creatad">
  <label for="city">City</label>
  <input type="text" class="form-control" name="city" id='city' value="{{$ads->city}}">
</div>

<div class="form group creatad">
  <label for="category">Zipcode</label>
  <input type="text" class="form-control" name="zipcode" id='zipcode' value="{{$ads->zipcode}}">
</div>

<div class="row">
  <button class="btn btn-primary">Modifier</button>
</div>

</form>






@else
<div class="text-center">
  <img src="img/auth.jpg" class="imgCatg" alt="">
</div>
@endauth 
<div class="text-center">
  <img src="img/fillerCat.jpg" class="imgCatg" alt="">
</div>
</div>


@endsection