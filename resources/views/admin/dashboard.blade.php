@extends('layouts.master')
@section('aside')
@include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

    <div class="card p-4">
        <div class="row gap-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-evenly align-items-center dashboard-info">
                            <div class="text-center dashboard-info-label">
                                <i data-feather="user" class="dashboard-info-icon"></i>
                                <span class="d-block dashboard-info-description">Teacher</span>
                            </div>
                            <div class="text-center">
                                <span class="dashboard-info-number">{{ $teacherCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-evenly align-items-center dashboard-info">
                            <div class="text-center dashboard-info-label">
                                <i data-feather="users" class="dashboard-info-icon"></i>
                                <span class="d-block dashboard-info-description">Students</span>
                            </div>
                            <div class="text-center">
                                <span class="dashboard-info-number">{{ $studentCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-evenly align-items-center dashboard-info">
                            <div class="text-center dashboard-info-label">
                                <i data-feather="archive" class="dashboard-info-icon"></i>
                                <span class="d-block dashboard-info-description">Courses</span>
                            </div>
                            <div class="text-center">
                                <span class="dashboard-info-number">{{ $courseCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
