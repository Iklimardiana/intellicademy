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

<div class="card p-4">
    <div class="col-md-4">
        <a href="course/create" class="btn btn-success">
            <i data-feather="plus"></i>
            <span>Add Course</span>
        </a>
    </div>
    <div class="col mt-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Course Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($course as $item)
                    <tr class="text-center">
                        <td>{{$iteration++}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <img src="{{ asset('images/thumbnail/'.$item->thumbnail) }}"
                                class="img-fluid" width="100px">
                        </td>
                        <td>
                            <a href="/admin/course/{{$item->id}}/edit" class="badge bg-warning p-1">
                                <i data-feather="edit"></i>
                            </a>
                            
                            <form action="/admin/course/{{$item->id}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger p-1" onclick="deleteData(event, '/admin/course/{{$item->id}}')" style="border: none; background: none; padding: 0;">
                                    <i data-feather="trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Course is Empty</td>
                    </tr>   
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $course->links() }}
        </div>
    </div>
    
</div>
@endsection