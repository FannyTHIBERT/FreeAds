@extends ('layouts.defaultFront')

@section ('title', 'Information')
@section('content')

<div class="container">

    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li><img src="{{ asset('storage/'.$ads->img1)}}" alt="{{$ads->title}}"></li>
                        <li><img src="{{ asset('storage/'.$ads->img2)}}" alt="{{$ads->title}}"></li>
                        <li><img src="{{ asset('storage/'.$ads->img3)}}" alt="{{$ads->title}}"></li>
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ asset('storage/'.$ads->img1)}}" alt="{{$ads->title}}"></div>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        
                        <div class="product_price">{{$ads->title}}</div>
                        <div> <span class="product_name">{{$ads->price}} €</span> </div>
                        <div> <span>{{$ads->city}} </span> </div>
                        <div> <span>{{$ads->zipcode}} </span> </div>
                        <hr class="singleline">
                        <div class="card w-100">
                            <div class="card-body">
                                <h5 class="card-title"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg> {{$ads->user->nickname}} </h5>
                                <h5 class="card-title"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg> {{$ads->user->phone_number}}</h5>
                                <a href="#" class="btn btn-primary">Send a message</a>
                            </div>
                        </div>
                        <hr class="singleline">
                        <div class="product_name">Description</div>
                        <div> {{$ads->description}} </div>
                    </div>
                </div>
            </div>
            @endsection