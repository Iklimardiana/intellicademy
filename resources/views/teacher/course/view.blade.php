@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Courses</li>
        </ol>
    </div>

    <div class="row">
        @auth
            @forelse ($courses as $item)
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <img src="{{ asset('images/' . $item->thumbnail) }}" class="card-img-top" alt="landingpage"
                            style="max-height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <div class="text-center">
                                <a href="#" class="btn btn-info">Students</a>
                                <a href="#" class="btn btn-primary">Modul</a>
                                <a href="#" class="btn btn-info">Assignment</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Tidak ada course yang tersedia.</p>
            @endforelse
        @endauth
    </div>
@endsection
