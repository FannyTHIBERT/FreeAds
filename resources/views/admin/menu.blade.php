@extends ('layouts.default')
@section ('title', 'Admin')
@auth
@section('content')


 
<main class="container">
        <div class="row adminbtn">
                <h1>Bienvenue sur la page admin</hi></br>
                <a class="btn btn-secondary-menu" href="/admin/moderate_ads">Moderate ads</a>
                <a class="btn btn-secondary-menu" href="/admin/ads">Manage ads</a>
                <a class="btn btn-secondary-menu" href="/admin/users">Manage users</a>
                
            
        </div>
    </main>



@endsection
@endauth