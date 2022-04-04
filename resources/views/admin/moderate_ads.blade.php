@extends ('layouts.default')
@section ('title', 'Moderate Ads')
@auth
@section('content')
@if ($errors->any())
    <div class="alert alert-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



  <h1>Moderate</h1>
  <div class="container">
    <div class="row">

      @foreach ($ads as $ad)
      <div class="col-md-4">
        <div class="blog-card blog-card-blog">
          <div class="blog-card-image">
            <!-- <a href="#"> <img class="img" src="{{ asset('storage/ads_img/'.$ad->img1) }}"> </a> -->
            <a href="{{ route('adpage', $ad->id) }}"> <img class="img" src="{{ asset('storage/'.$ad->img1)}}"> </a>
            <div class="ripple-cont"></div>
          </div>
          <div class="blog-table">
            <h6 class="blog-category blog-text-success"><i class="far fa-newspaper"></i> {{$ad->city}}</h6>
            <h4 class="blog-card-caption">
              <a href="{{ route('adpage', $ad->id) }}">{{$ad->title}}</a>
            </h4>
            <p class="blog-card-description"> {{ Str::limit($ad->description, 200) }}</p>
            <div class="ftr">
              <div class="author">

                <a href="#"> <img src="https://w7.pngwing.com/pngs/340/956/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper-thumbnail.png" alt="..." class="avatar img-raised"> <span></span> </a>
              </div>
              <div class="stats"> <i class="far fa-clock"></i> <strong>{{$ad->price}} €</strong> </div>
            </div>
          </div>


          <div class="ftr">
              <div class="author">

                <a ><form action="{{ route('/admin/moderate_ads/acceptads', ['ad' => $ad->id]) }}" method="POST">
              @csrf
              @method('PUT')
              <input type="submit" name="enregistrer" id="enregistrer" class="btn btn-warning" label="Accepter" value=Accepter />


            </form> </a>
              </div>
              <div> <form action="{{ route('/admin/moderate_ads/rejectads', ['ad' => $ad->id]) }}" method="POST">
              @csrf
              @method('PUT')
              <input type="submit" name="enregistrer" id="enregistrer" class="btn btn-warning" label="Refuser" value=Refuser />


            </form></div>
            
          


          </div>

        </div>


      </div>
      @endforeach


    </div>
  </div>
</section>



@endsection
@endauth