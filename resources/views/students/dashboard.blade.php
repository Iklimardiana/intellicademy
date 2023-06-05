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
                <div class="card col-12 col-md-5 pt-2">
                    <img src="https://placeimg.com/640/480/any" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="/student-dashboard/student-course.html" class="btn btn-primary">Lanjutkan Belajar</a>
                    </div>
                </div>
                <div class="card col-12 col-md-5 pt-2">
                    <img src="https://placeimg.com/640/480/any" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="/student-dashboard/student-course.html" class="btn btn-primary">Lanjutkan Belajar</a>
                    </div>
                </div>
                <div class="card col-12 col-md-5 pt-2">
                    <img src="https://placeimg.com/640/480/any" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="/student-dashboard/student-course.html" class="btn btn-primary">Lanjutkan Belajar</a>
                    </div>
                </div>
                <div class="card col-12 col-md-5 pt-2">
                    <img src="https://placeimg.com/640/480/any" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="/student-dashboard/student-course.html" class="btn btn-primary">Lanjutkan Belajar</a>
                    </div>
                </div>
                <div class="card col-12 col-md-5 pt-2">
                    <img src="https://placeimg.com/640/480/any" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="/student-dashboard/student-course.html" class="btn btn-primary">Lanjutkan Belajar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="finished-tab-pane" role="tabpanel" aria-labelledby="finished-tab" tabindex="0">
            <div class="row gap-2 mt-3 " style="margin-left: 2rem!important">
                <div class="card col-12 col-md-5 pt-2">
                    <img src="https://placeimg.com/640/480/any" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="/student-dashboard/student-course.html" class="btn btn-primary">Lanjutkan Belajar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
