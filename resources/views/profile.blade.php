@extends ('layouts.default')
@section ('title', 'Profil')
@section('content')
@auth 
@if ($errors->any())
    <div class="alert alert-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row justify-content-center" style="padding:10px">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header">Mon profil</div>
                <div class="text-center" style="padding: 10px;">
                
  

                <img src = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" 
            class = "rounded-circle" alt = "Rounded Image" width = "200" height = "200" >
            
                    <h2>{{ Auth::user()->nickname }}</h2>
                    <h4>Nom : {{ Auth::user()->name }}</h4>
                    <h6>Email : {{ Auth::user()->email }}</h6>
                    <h6>Phone number : {{ Auth::user()->phone_number }}</h6>
                </div>
                
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-5" style="padding: 10px;"> 
                        <a class="btn btn-warning" id="edit" alt="edit" href="{{ route('edit_profile', auth()->id()) }}">Modifier mon profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center" style="margin-bottom: 50px;">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Mes annonces
            </div>
                <div class="">
                    <div class="container " style="margin-bottom: 100px;">
                        <div class="row">                      
                        @foreach (Auth::user()->ads as $ad) 
                                             
                            <div class="col-md-4">
                                <div class="blog-card blog-card-blog" style="padding: 10px;">
                                    <div class="blog-card-image">
                                  
                                        <a href="{{ route('adpage', $ad->id) }}"> <img class="img" src="{{ asset('storage/'.$ad->img1) }}"> </a>
                                    </div>
                                        <div class="blog-table">
                                            <h6 class="blog-category blog-text-success"><i class="far fa-newspaper"></i> {{$ad->city}}</h6>
                                            <h4 class="blog-card-caption">
                                            <a href="{{ route('adpage', $ad->id) }}">{{$ad->title}}</a>
                                            </h4>
                                            <p class="blog-card-description"> {{ Str::limit($ad->description, 100) }}</p>
                                            <div class="ftr">
                                                <div class="author">                                 
                                                    <a href="#"> <img src="https://w7.pngwing.com/pngs/340/956/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper-thumbnail.png" alt="..." class="avatar img-raised"> <span>{{$ad->user_id}}</span> </a>
                                                </div>
                                                    <div class="stats"> <i class="far fa-clock"></i> 
                                                        <strong>{{$ad->price}} €</strong> 
                                                    </div>
                                            </div>
                                        </div>   
                                            <div class="row" style="float:left">
                                                <div class="col "> 
                                                    <a class="btn btn-primary btn-sm mb-2" id="edit_ads" alt="edit_ads" href="{{ route('edit_ads', $ad->id) }}">Modifier</a>
                                                    
                                                </div>

                                                <div class="col "> 
                                                    
                                                <div class="col-md-6 offset-md-5"> 
                                                <form action="{{ route('destroy_ads', $ad->id) }}" method='post' enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                <input type='submit' class="btn btn-danger btn-sm mb-2" id="destroy_ads" alt="destroy_ads" value='Supprimer'>
                                                </form>
                                            </div>
                                                </div>
                                            </div>
                                </div>
                            </div>                           
                        @endforeach                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if(session()->has('message'))
    <div class="alert alert-success" >
        {{ session()->get('message') }}
    </div>
@endif


@endauth 
@endsection

