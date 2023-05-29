@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row gap-4">
            <h1 class="mt-4">Courses</h1>
            @forelse ($course as $item)
                <div class="card col-12 col-md-5 col-lg-3 pt-2">
                    <img src="{{asset('/images/'. $item->thumbnail)}}" class="card-img-top" alt="course image">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{$item->price}}</h6>
                        <p class="card-text">{{$item->description}}</p>
                        <a href="#" class="btn btn-primary">Beli Kelas</a>
                    </div>
                </div>
            @empty
                <h1 class="mt-4 text-center">There Are No Courses</h1>
            @endforelse
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
