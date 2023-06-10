@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="on-going-tab" data-bs-toggle="tab" data-bs-target="#on-going-tab-pane"
                type="button" role="tab" aria-controls="on-going-tab-pane" aria-selected="true">Sedang
                Dipelajari</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="finished-tab" data-bs-toggle="tab" data-bs-target="#finished-tab-pane"
                type="button" role="tab" aria-controls="finished-tab-pane" aria-selected="false">Telah
                Diselesaikan</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="on-going-tab-pane" role="tabpanel" aria-labelledby="on-going-tab"
            tabindex="0">
            <div class="row gap-2 mt-3 " style="margin-left: 2rem!important">
                @forelse ($transaction as $t)
                    <div class="card col-12 col-md-5 pt-2">
                        <img src="{{asset ('/images/thumbnail/'.$t->Course->thumbnail)}}" class="card-img-top" alt="thumbnail {{ $t->Course->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{$t->Course->name}}</h5>
                            <p class="card-text">{{$t->Course->description}}</p>
                            @php
                            $currentProgres = $progres->where('idCourse', $t->Course->id)->first();
                            @endphp
                            @if ($t->course->Progres->isEmpty())
                            <a href="/student/learning-page/{{ $t->Course->id }}?sequence=1" class="btn btn-primary">Mulai Belajar</a>
                            @elseif ($currentProgres->sequence == $t->Course->Module->count())
                            <a href="#" class="btn btn-success">Selesai</a>
                            @else
                            <a href="/student/learning-page/{{ $t->Course->id }}?sequence={{ $currentProgres->sequence }}" class="btn btn-primary">Lanjutkan Belajar</a>
                            @endif
                            {{-- <a href="/student/learning-page/{{ $t->Course->id }}?sequence=1" class="btn btn-primary">Lanjutkan Belajar</a> --}}
                        </div>
                    </div>
                @empty
                    <h2>The Courses Are Empty</h2>
                @endforelse
            </div>
        </div>
@endsection
