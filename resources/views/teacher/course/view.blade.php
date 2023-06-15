@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Courses</li>
        </ol>
    </div>

    <div class="row">
        @auth
            @forelse ($courses as $item)
            <div class="col-12 col-md-5 col-lg-6 pt-2">
                <div class="card h-100">
                    <div class="card-img-container" style="max-height: 200px; overflow: hidden;">
                        <img src="{{ asset('images/thumbnail/'.$item->thumbnail) }}" class="card-img-top" alt="course image">
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ Str::rupiah($item->price) }}</h6>
                        <p class="card-text flex-grow-1">{{ $item->description }}</p>
                        <div class="text-center mt-auto">
                            <a href="/teacher/students/{{ $item->id }}" class="btn btn-info">Students</a>
                            <a href="/teacher/modules/{{ $item->id }}" class="btn btn-primary">Modul</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p>There Are No Courses For You</p>
            @endforelse
        @endauth
    </div>
    <div class="pagination justify-content-center mt-5">
        {{ $courses->links() }}
    </div>
@endsection
