@extends('layouts.master')
@section('aside')
    @include('partials.aside')
@endsection
@section('content')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">List Students</li>
        </ol>
    </div>

    <div class="card p-4">
        <div class="col mt-3 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaction as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->User->username }}</td>
                            <td>{{ $item->User->email }}</td>
                            <td>{{ $item->User->phone }}</td>
                            <td>
                                @php
                                    $progresUser = $progres->where('idUser', $item->User->id)->first();
                                @endphp
                                {{-- {{ dd($course) }} --}}
                                @if ( $progresUser ? $progresUser->sequence : '')
                                    @if ( $progresUser->sequence / $course->Module->count() == 1)
                                    Complete
                                    @else
                                    {{ round($progresUser->sequence / $course->Module->count() * 100) }} %
                                    @endif
                                @else
                                0 %
                                @endif
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Students are Empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>

                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
