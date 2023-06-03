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
                        <img src="{{ asset( $item->thumbnail) }}" class="card-img-top" alt="landingpage"
                            style="max-height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <div class="text-center">
                                <a href="#" class="btn btn-info">Students</a>
                                <a href="/teacher/modules/{{  $item->id }}" class="btn btn-primary">Modul</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>There Are No Courses For You</p>
            @endforelse
        @endauth
    </div>
@endsection
