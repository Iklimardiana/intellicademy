@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row gap-4">
            <h1 class="mt-2 text-center">Courses</h1>
            @forelse ($course as $item)
            <div class="card col-12 col-md-5 col-lg-3 pt-2">
                <div class="card-img-container">
                    <img src="{{asset('/images/thumbnail/'. $item->thumbnail)}}" class="card-img-top" alt="course image">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{Str::rupiah($item->price)}}</h6>
                    <p class="card-text flex-grow-1">{{$item->description}}</p>
                    @auth
                        @if (Auth::user()->role == '2')
                            @if ($transaction->where('idCourse', $item->id)->first())
                                <button class="btn btn-secondary" disabled>Sudah dibeli</button>
                            @else
                                <form action="/checkout/{{ $item->id }}" method="post">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Beli Kelas</button>
                                </form>
                            @endif
                        @endif
                    @endauth 
                </div>
            </div>         
            @empty
                <h1 class="mt-4 text-center">There Are No Courses</h1>
            @endforelse
        </div>

        <nav class="mt-4">
            <div>
                {{ $course->links() }}
            </div>
        </nav>

    </div>
@endsection
