@extends ('layouts.defaultFront')


@section('content')

<!-- <div class="dropdown">
  @foreach($categories as $category)
  <ul>
    <li>{{$category->name}}</li>
    @foreach($category->children as $child)
    <ul>
      <li>{{$child->name}}</li>
    </ul>
    @endforeach
  </ul>
  @endforeach
</div> -->

<!-- <ul class="list-group list-group-flush">
  @foreach($categories as $category)
  <li class="list-group-item">{{$category->name}}</li>
  @foreach($category->children as $child)
  <ul class="list-group list-group-flush">

    <li class="list-group-item" style="margin-left: 15px;">{{$child->name}}</li>
  </ul>
  @endforeach
</ul>
@endforeach -->
<div class="container">
<div class="card my-4">
  <form class="form-inline card-body" action="/search" method="GET" role="search">
    <fieldset>    
      <div class="input-group">
        <div class="input-group-prepend">
          <select name="category" id="category" class="form-control">
            <option selected="selected" value="0">Catégories </option>
            @foreach($categories as $category)
                <option value="{{ $category->id}}"> {{ $category->name}}</option>

                @endforeach
          </select>
        </div>
        <input type="text" class="form-control" placeholder="Rechercher..." name="search">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">Recherche</button>
        </div>
      </div>
    </fieldset> 
  </form>
</div>
</div>
<ul>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Categories
                        </a>
                        <!--ajouter profile button-->

                        <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ route('pageCategories', $category->id)}}">
                            {{ $category->name}}
                            </a>
                            @endforeach

                        </div>
                    </li>
                </ul>
<!-- <section class="container mx-auto text-center">
  <div class="card my-4">
    <form class="card-body" action="/search" method="GET" role="search">
      {{ csrf_field() }}
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Rechercher..." name="q">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="submit">Go!</button>
        </span>
      </div>
      
    </form>
    <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id}}"> {{ $category->name}}</option>

                @endforeach
              </select> -->

</section>
<li class="nav-item dropdown">
  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    Trier
  </a>
  <!--ajouter profile button-->

  <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="">
      Prix croissants
    </a>

    <a class="dropdown-item" href="">
      Prix décroissant
    </a>

    <a class="dropdown-item" href="">
      Plus récentes
    </a>

    <a class="dropdown-item" href="" >
      plus anciennes
    </a>
  </div>
</li>



@endsection