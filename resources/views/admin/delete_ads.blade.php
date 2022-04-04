@extends ('layouts.default')
@section ('title', 'Delete Ads')
@auth
@section('content')


 
<main class="container">
        <div class="row adminbtn">
                <h1>Etes vous sur de vouloir supprimer ?</hi></br>
                               
                <div class="col-md-2 offset-md-5">
                <form action="{{ route('destroy_ads', $ad->id) }}" method='post' enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <input type='submit' class="btn btn-danger " id="destroy_ads" alt="destroy_ads" value='Supprimer'>
                    <a class="btn btn-warning" href="/admin/ads">Non</a>
                </form> 
                
        
        
        
        
        
        </div> 
            



        </div>
    </main>



@endsection
@endauth