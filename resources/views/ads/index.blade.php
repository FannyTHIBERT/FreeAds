@extends ('layouts.defaultFront')

@section('content')

<<section>
    <h1>Latest Ads</h1>
    <div class="container">
        <div class="row">
            @foreach ($ads as $ad)
            <div class="col-md-4">
                <div class="blog-card blog-card-blog">
                    <div class="blog-card-image">
                    <a href="#"> <img class="img" src="{{ asset('storage/ads_img/'.$ad->img1) }}"> </a>
                        <div class="ripple-cont"></div>
                    </div>
                    <div class="blog-table">
                        <h6 class="blog-category blog-text-success"><i class="far fa-newspaper"></i> {{$ad->city}}</h6>
                        <h4 class="blog-card-caption">
                            <a href="#">{{$ad->title}}</a>
                        </h4>
                        <p class="blog-card-description"> {{$ad->description}}</p>
                        <div class="ftr">
                            <div class="author">

                                <a href="#"> <img src="https://w7.pngwing.com/pngs/340/956/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper-thumbnail.png" alt="..." class="avatar img-raised"> <span>{{$ad->user_id}}</span> </a>
                            </div>
                            <div class="stats"> <i class="far fa-clock"></i> <strong>{{$ad->price}} €</strong> </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>


@endsection