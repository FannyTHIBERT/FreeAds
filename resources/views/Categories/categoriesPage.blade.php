@extends ('layouts.defaultFront')
@section ('title', 'Categories')
@section('content')


</div>
<h1>Categories</h1>
  <div class="container">
    
    <div class="row">
      @foreach ($ads->where('status', '=', 'to_publish') as $ad)
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
            <p class="blog-card-description"> {{ Str::limit($ad->description, 100) }}</p>
            <div class="ftr">
              <div class="author">
               
                <a href="{{ route('adpage', $ad->id) }}" style="text-decoration: none;"> <img src="https://w7.pngwing.com/pngs/340/956/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper-thumbnail.png" alt="..." class="avatar img-raised"> 
                <span></span> </a>
              </div>
              <div class="stats"> <i class="far fa-clock"></i> <strong>{{$ad->price}} €</strong> </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    
    </div>
    <div class="d-flex justify-content-center" style="margin-bottom: 20px;">
    {!! $ads->links() !!}
</div>
@endsection

</html>


