@extends ('layouts.default')

@section ('title', 'Edit Profil')
@section('content')

@auth
<form action="{{ route('/admin/update_profile', $users) }}" method="POST">
@csrf 
@method('PUT')
<!-- title input -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Modifier mon profil</div>
                <div class="card-body">
                        <div class="row">
                            <section class="col-12">   
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nickname" class="col-md-4 col-form-label text-md-end">{{ __('Nickname') }}</label>

                                    <div class="col-md-6">
                                        <input id="nickname" type="text" class="form-control @error('name') is-invalid @enderror" name="nickname" value="{{ $users->nickname }}" required autocomplete="nickname" autofocus>

                                        @error('nickname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password_confirm" class="col-md-4 col-form-label text-md-end">{{ __('Password confirmation') }}</label>

                                    <div class="col-md-6">
                                        <input id="password_confirm" type="text" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm" value="">

                                        @error('password_confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone number') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $users->phone_number }}" required autocomplete="phone_number" autofocus>

                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>   
                                <div class="row mb-3">
                                    <label for="is_admin" class="col-md-4 col-form-label text-md-end">{{ __('Is admin') }}</label>

                                    <div class="col-md-6">
                                        <input id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" value="{{ $users->is_admin }}" required autocomplete="is_admin" autofocus>

                                        @error('is_admin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>       
                                <!--<div class="row mb-3">
                                    <label for="is_admin" class="col-md-4 col-form-label text-md-end">{{ __('Is admin') }}</label>

                                    <div class="col-md-6">
                                        <input id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" value="{{ $users->is_admin }}" required autocomplete="is_admin" autofocus>

                                        @error('is_admin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> -->           
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">                                         
                                        <input type="submit" name="enregistrer" id="enregistrer" class="btn btn-success" placeholder="enregistrer">       
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="text-center">
  <img src="img/auth.jpg" class="imgCatg" alt="">
</div>
@endauth 
<div class="text-center">
  <img src="img/fillerCat.jpg" class="imgCatg" alt="">
</div>
</div>
@endsection