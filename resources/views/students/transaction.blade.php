@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row gap-4">
            <h1 class="mt-4">Transaction</h1>
            @foreach ( $transaction as $t )
                <div class="card col-12 col-md-5 col-lg-3 pt-2">
                    <div class="card-img-container">
                        @if($t->Course->thumbnail == null)
                            <img src="{{asset('/images/landingpage.png')}}" class="card-img-top" alt="course image">
                        @else
                            <img src="{{asset('/images/thumbnail/'. $t->Course->thumbnail)}}" class="card-img-top" alt="course image">
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{$t->Course->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{Str::rupiah($t->Course->price)}}</h6>
                        <p class="card-text flex-grow-1">{{$t->Course->description}}</p>
                        @if ( $t->verification == 0 )
                            <a href="/checkout/{{$t->idCourse}}" class="btn btn-primary">Pay!</a>
                        @elseif( $t->verification == 1)
                            <a href="/student/invoice/{{ $t->id }}" class="btn btn-success">Print Invoice</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>

    </div>
@endsection
