@extends ('layouts.defaultFront')

@section ('title', 'Search')
@section('content')

<div class="container">
  <div class="card my-4" style="box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;">
    <form class="form-inline card-body" action="/search" method="GET" role="search">
    {{ csrf_field() }}
      <fieldset>
        <div class="input-group">
          <div class="input-group-prepend">
            <select name="categories" id="categories" class="form-control">
              <option selected="selected" value="0">Catégories </option>
              @foreach($categories as $category)
                @foreach($category->children as $child)
              <option value="{{ $child->id}}"> {{ $child->name}}</option>
                @endforeach
                @endforeach
          </select>
        </div>
        <input type=" text" class="c-p" value="{{ Request::get('cp') }}" placeholder="code postal..." id="cp" name="cp">
                <div class="input-group-append">
                </div>
                <input type="text" class="form-control" placeholder="Rechercher..." name="search">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">Recherche</button>
                </div>
          </div>
      </fieldset>
    </form>
  </div>
  <div>
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Trier
      </a>


      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href=<?= '/search?' . 'search=' . $_GET['search'] . '&categories=' . $_GET['categories'] . '&cp=' . $_GET['cp'] . '&order=price&sort=asc' ?>>
          Prix croissants
        </a>

        <a class="dropdown-item" href=<?= '/search?' . 'search=' . $_GET['search'] . '&categories=' . $_GET['categories'] . '&cp=' . $_GET['cp'] . '&order=price&sort=desc' ?>>
          Prix décroissant
        </a>

        <a class="dropdown-item" href=<?= '/search?' . 'search=' . $_GET['search'] . '&categories=' . $_GET['categories'] . '&cp=' . $_GET['cp'] . '&order=created_at&sort=asc' ?>>
          Plus récentes
        </a>

        <a class="dropdown-item" href=<?= '/search?' . 'search=' . $_GET['search'] . '&categories=' . $_GET['categories'] . '&cp=' . $_GET['cp'] . '&order=created_at&sort=desc' ?>>
          plus anciennes
        </a>
      </div>
    </li>
  </div>
</div>


</section>


<section>
  <hr>
  <h1>Search results</h1>
  <div class="container">
    <div class="row">
      @foreach ($ads->where('status', '=', 'to_publish') as $ad)
      <div class="col-md-4">
        <div class="blog-card blog-card-blog">
          <div class="blog-card-image">
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

                <a href="{{ route('adpage', $ad->id) }}"> <img src="https://w7.pngwing.com/pngs/340/956/png-transparent-profile-user-icon-computer-icons-user-profile-head-ico-miscellaneous-black-desktop-wallpaper-thumbnail.png" alt="..." class="avatar img-raised"> <span></span> </a>
              </div>
              <div class="stats"> <i class="far fa-clock"></i> <strong>{{$ad->price}} €</strong> </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      
    </div>
    <div class="d-flex justify-content-center">
    {!! $ads->links() !!}
</div>
  </div>

</section>









@endsection