
@extends('layouts.master')

@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="course-title">{{ $module->name }}</h4>
            @foreach (preg_split('/<\/?p>/', $module->body) as $paragraph)
                @if (strpos($paragraph, '<img') !== false)
                    {!! \App\Helpers\Helper::processBase64Images($paragraph) !!}
                @else
                    @if (!empty($paragraph))
                        <p>{!! $paragraph !!}</p>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
@endsection
