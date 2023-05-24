<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IntelliCode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://unpkg.com/feather-icons"></script>

  <script defer src="main.js"></script><link href="main.css" rel="stylesheet"></head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#"><h1><span>Intelli</span>Cademy</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Courses</a>
                </li>        
            </ul>
            <div class="nav-item dropdown d-flex">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i data-feather="user"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <!-- <i data-feather="log-out"></i> -->
                            Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <aside class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="page-title text-center mt-1">Admin Dashboard</h2>
                    </div>
                    <div class="list-group p-3">
                        <a href="/" class="list-group-item list-group-item-action sidebar-link">
                            <i data-feather="activity"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="/admin-dashboard-teachers.html" class="list-group-item list-group-item-action sidebar-link">
                            <i data-feather="user"></i>
                            <span>Teachers</span>
                        </a>
                        <a href="/admin-dashboard-students.html" class="list-group-item list-group-item-action sidebar-link">
                            <i data-feather="users"></i>
                            <span>Students</span>
                        </a>
                        <a href="/admin-dashboard-courses.html" class="list-group-item list-group-item-action sidebar-link">
                            <i data-feather="archive"></i>
                            <span>Courses</span>
                        </a>
                    </div>
                </div>
            </aside>
            
            <main class="col mt-3 mt-lg-0">
                    <div aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin-dashboard-courses.html">Courses</a>
                            </li>
                            <li class="breadcrumb-item active">add</li>
                        </ol>
                    </div>

                    <div class="card p-4">
                        <h2>Edit a course</h2>

                        <form action="/course/{{$course->id}}" method="POST" class="col-md-6" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="name" class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$course->name}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{$course->price}}">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description">{{$course->description}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="idUser" class="form-label">Teacher</label>
                                <select class="form-control" name="idUser" id="idUser">
                                    <option value="">--Please Select The Teacher--</option>
                                    @forelse ($teachers as $teacher)
                                        <option value="{{$teacher->id}}" @if($teacher->id == $course->idUser) selected @endif>{{$teacher->username}}</option>    
                                    @empty
                                        <option value="">There Are No Teachers</option>
                                    @endforelse
                                </select>
                                @error('idUser')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                                @error('thumbnail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <a href="/course" class="btn btn-warning">
                                    <i data-feather="corner-down-left"></i>
                                    <span>Back</span>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i data-feather="save"></i>
                                    <span>Update</span>
                                </button>
                            </div>
                        </form>
                    </div>
            </main>
        </div>
    </div>


    <footer class="p-4">
        <div class="container">
            <p>&copy; 2023 IntelliCode</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
      feather.replace()
    </script>
  </body>
</html>