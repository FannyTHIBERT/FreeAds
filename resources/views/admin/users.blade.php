@extends ('layouts.default')
@section ('title', 'Users')
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


<main class="container" style="text-align: center;">
  <h1>Manage users</h1>
  
    <table class="table-responsive" style="margin-left: auto;  margin-right: auto;">

      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Nickname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone number</th>
        <th></th>
        <th style="text-align: center; ">Action</th>

      </thead>

      <tr>
        @foreach ($users as $user)
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->nickname}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
        <td>{{$user->phone_number}}</td>
        <td>{{$user->is_admin}}</td>
        <td>
          <div div class="col" style="text-align: center;">
            <a class="btn btn-info" href="{{ route('/admin/show_profile', $user) }}">Détails</a>
            <a class="btn btn-warning" href="{{ route('/admin/edit_profile', $user) }}">Modifier</a>
            <form action="{{ route('/admin/destroy_profile', $user) }}" style="display: inline;" method='post' enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <input type='submit' class="btn btn-danger" id="destroy_ads" alt="destroy_ads" value='Supprimer'>
            </form>

        </td>
      </tr>

  
  @endforeach

</main>

@endauth
@endsection