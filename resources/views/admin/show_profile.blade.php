@extends ('layouts.default')
@section ('title', 'Profil')
@section('content')
@auth 

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Profil</div>
            <div class="text-center">
                    <h2>Nickname : {{ $users->nickname }}</h2>
                    <h4>Nom : {{ $users->name }}</h4>
                    <h6>Email : {{ $users->email }}</h6>
                    <h6>Phone number : {{ $users->phone_number }}</h6>
                    <h6>Is admin : {{ $users->is_admin }}</h6>
                </div>
            
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-5"> 
                        <a class="btn btn-warning" id="edit" alt="edit" href="{{ route('/admin/edit_profile', $users) }}">Modifier le profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


@endauth 
@endsection
