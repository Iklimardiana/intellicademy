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
                    @forelse($transaction as $item)
                        <tr>
                            <td>{{ $iteration++ }}</td>
                            <td>{{ $item->User->username }}</td>
                            <td>{{ $item->User->email }}</td>
                            <td>{{ $item->User->phone }}</td>
                            <td>
                                @php
                                    $progresUser = $progres->where('idUser', $item->User->id)->first();
                                @endphp
                                {{-- {{ dd($course) }} --}}
                                @if ( $progresUser ? $progresUser->sequence : '')
                                    @if ( $progresUser->sequence == $course->Module->count())
                                        @if ($progresUser->status == 0)
                                        {{ round($progresUser->sequence / $course->Module->count() * 100) - 1 }} %
                                        @else
                                        Complete
                                        @endif
                                    @else
                                        @if ($progresUser->status == 0)
                                        {{ round($progresUser->sequence / $course->Module->count() * 100) - 1 }} %
                                        @else
                                        {{ round($progresUser->sequence / $course->Module->count() * 100) }} %
                                        @endif
                                    
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

            <div>
                {{ $transaction->links() }}
            </div>
        </div>
    </div>
@endsection
