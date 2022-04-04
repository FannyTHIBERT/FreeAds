@extends ('layouts.default')

@section ('title', 'Manage Ads')

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




  

<div class="container" style="text-align: center;">
  <h1>Manage ads</h1>
  <div>
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Trier
      </a>


      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href=<?= '/admin/ads?sort=asc' ?>>
         Les + anciennes
        </a>

        <a class="dropdown-item" href=<?= '/admin/ads?sort=desc' ?>>
         Les + récentes
        </a>


        <a class="dropdown-item" href=<?='/admin/ads?status=to_publish&sort=desc'?>>
          Annonces en ligne
        </a>

        <a class="dropdown-item" href=<?='/admin/ads?status=to_moderate&sort=desc'?>>
          Annonces à modérer
        </a>

        <a class="dropdown-item" href='/admin/ads?status=rejected&sort=desc'>
          Annonces refusées
        </a>
      </div>
    </li>
  </div>
  <hr>
  <table class="table-responsive" style="margin-left: auto;
  margin-right: auto;">

    <thead >
      <th>ID</th>
      <th>Title</th>
      <th>City</th>
      <th>Categorie</th>
      <th>Status</th>
      <th>Created_at</th>
      <th style="text-align: center; ">Actions</th>
    </thead>

    <tr>
      @foreach ($ads as $ad)
      <td>{{$ad->id}}</td>
      <td>{{$ad->title}}</td>
      <td>{{$ad->city}}</td>
      <td>{{$ad->category_id}}</td>
      <td>{{$ad->status}}</td>
      <td>{{$ad->created_at}}</td>
      <td>
        <div class="col" style="text-align: center;">
          <a class="btn btn-info" href="{{ route('adpage', $ad->id) }}">Détails</a>
          <a class="btn btn-warning" href="{{ route('/admin/edit_ads', $ad->id) }}">Modifier</a>
          <form action="{{ route('destroy_ads', $ad->id) }}" style="display: inline; height:38px;" method='post' enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <input type='submit' class="btn btn-danger" id="destroy_ads" alt="destroy_ads" value='Supprimer'>
          </form>
        </div>

      </td>
    </tr>


    @endforeach
    
  </table>
  <div class="pagin d-flex justify-content-center" >
    {!! $ads->links() !!}
</div>
</div>






@endauth

@endsection