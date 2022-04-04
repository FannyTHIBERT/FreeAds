@extends ('layouts.defaultFront')

@section ('title', 'Creat Ad')
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

<div class="container" style="margin-bottom: 550px;">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Déposer une annonce</div>

        <div class="card-body">
          <!-- au clic sur submit, on passe par la route ads.store et la fonction store du controlleur adsController. La page create est renvoyée par la fonction create du controlleur adscontroller  -->
          <form action="{{ route('ads.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- title input -->




            <div class="form group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id='title'>
            </div>

            <!-- $categories correspond à l'objet catégorie qui est retourné dans adscontroller create -->


            <div class="form-group">
              <label for="category">Category</label>
              <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                @foreach($category->children as $child)
                <option value="{{ $child->id}}"> {{ $child->name}}</option>
                @endforeach
                @endforeach
              </select>

              


              <div class="form group creatad">
                <label for="description">Description</label>
                <textarea type="textarea" class="form-control" name="description" id='description'></textarea>
              </div>

              <div class="form group creatad">
                <label for="price">Price
                </label>
                <input type="number" class="form-control" name="price" id='price'>
              </div>

              <div class="form group creatad">
                <label for="img1">Image 1</label>
                <input type="file" class="form-control-file" name="img1" id='img1'>
              </div>

              <div class="form group creatad">
                <label for="img2">Image 2</label>
                <input type="file" class="form-control-file" name="img2" id='img2'>
              </div>

              <div class="form group creatad">
                <label for="img3">Image 3</label>
                <input type="file" class="form-control-file" name="img3" id='img3'>
              </div>

              <div class="form group creatad">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id='city'>
              </div>

              <div class="form group creatad">
                <label for="category">Zipcode</label>
                <input type="text" class="form-control" name="zipcode" id='zipcode'>
              </div>

              <div class="row">
                <button class="btn btn-primary">Add a new ad </button>
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