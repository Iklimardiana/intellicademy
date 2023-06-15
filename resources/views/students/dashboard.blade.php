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
                    @php
                        $currentProgress = $progres->where('idCourse', $t->Course->id)->first();
                    @endphp
                   
                    @if (!$currentProgress || $currentProgress->sequence != $t->Course->Module->count() || $currentProgress->status == '0' )
                        <div class="card col-12 col-md-5 pt-2">
                            <div class="card-img-container">
                                <img src="{{ asset('/images/thumbnail/' . $t->Course->thumbnail) }}" class="card-img-top" alt="thumbnail {{ $t->Course->name }}">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $t->Course->name }}</h5>
                                <p class="card-text flex-grow-1">{{ $t->Course->description }}</p>
                                <div class="mt-auto">
                                    @if ($t->course->Progres->isEmpty())
                                        <a href="/student/learning-page/{{ $t->Course->id }}?sequence=1" class="btn btn-primary">Mulai Belajar</a>
                                    @else
                                        <a href="/student/learning-page/{{ $t->Course->id }}?sequence={{ $currentProgress ? $currentProgress->sequence : 1 }}" class="btn btn-primary">Lanjutkan Belajar</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    {{-- <div class="card col-12 col-md-5 pt-2">
                            <img src="{{ asset('/images/thumbnail/' . $t->Course->thumbnail) }}" class="card-img-top"
                                alt="thumbnail {{ $t->Course->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $t->Course->name }}</h5>
                                <p class="card-text flex-grow-1">{{ $t->Course->description }}</p>
                                @if ($t->course->Progres->isEmpty())
                                    <a href="/student/learning-page/{{ $t->Course->id }}?sequence=1" class="btn btn-primary">Mulai Belajar</a>
                                @else
                                    <a href="/student/learning-page/{{ $t->Course->id }}?sequence={{ $currentProgress ? $currentProgress->sequence : 1 }}" class="btn btn-primary">Lanjutkan Belajar</a>
                                @endif
                            </div>
                        </div> --}}
                    @endif
                @empty
                    <h2>The Courses Are Empty</h2>
                @endforelse

                @php
                $complete = $progres->where('status', '1')
                            ->where('complete', '1')->count();
                @endphp 
                @if ($transaction->count() > 0 && $complete == $progres->count())
                    <div class="col-12">
                        <h2>Your courses have been completed.</h2>
                    </div>
                @endif
            </div>
        </div>
        <div class="tab-pane fade" id="finished-tab-pane" role="tabpanel" aria-labelledby="finished-tab" tabindex="0">
            <div class="row gap-2 mt-3 " style="margin-left: 2rem!important">
                @forelse ($transaction as $t)
                    @php
                        $currentProgres = $progres->where('idCourse', $t->Course->id)->first();
                    @endphp
                    @if ($currentProgres && $currentProgres->sequence == $t->Course->Module->count() && $currentProgres->status == '1')
                        <div class="card col-12 col-md-5 pt-2">
                            <div class="card-img-container">
                                <img src="{{ asset('/images/thumbnail/' . $t->Course->thumbnail) }}" class="card-img-top" alt="thumbnail {{ $t->Course->name }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $t->Course->name }}</h5>
                                <p class="card-text flex-grow-1">{{ $t->Course->description }}</p>
                                @if ($t->course->Progres->isEmpty())
                                    <a href="/student/learning-page/{{ $t->Course->id }}?sequence=1" class="btn btn-primary">Mulai Belajar</a>
                                @elseif ($currentProgres && $currentProgres->sequence == $t->Course->Module->count() && $currentProgres->status == '1')
                                    <a href="/student/learning-page/{{ $t->Course->id }}?sequence=1" class="btn btn-success" data-course-id="{{ $t->Course->id }}">Belajar kembali</a>
                                    <a href="/student/sertifikat/{{ $t->Course->id }}" class="btn btn-primary">Cetak Sertifikat</a>
                                @else
                                    <a href="/student/learning-page/{{ $t->Course->id }}?sequence={{ $currentProgress ? $currentProgress->sequence : 1 }}" class="btn btn-primary">Lanjutkan Belajar</a>
                                @endif
                            </div>
                        </div>
                    @endif
                @empty
                    <h2>The Courses Are Empty</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection

