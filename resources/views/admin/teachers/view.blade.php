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
                        <a href="/dashboard" class="list-group-item list-group-item-action sidebar-link">
                            <i data-feather="activity"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="/teachers" class="list-group-item list-group-item-action sidebar-link">
                            <i data-feather="user"></i>
                            <span>Teachers</span>
                        </a>
                        <a href="/students" class="list-group-item list-group-item-action sidebar-link">
                            <i data-feather="users"></i>
                            <span>Students</span>
                        </a>
                        <a href="/course" class="list-group-item list-group-item-action sidebar-link">
                            <i data-feather="archive"></i>
                            <span>Courses</span>
                        </a>
                    </div>
                </div>
            </aside>
            
            <main class="col mt-3 mt-lg-0">
                    <div aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Teachers</li>
                        </ol>
                    </div>

                    <div class="card p-4">
                        <div class="col-md-4">
                            <a href="/admin-dashboard-teachers-add.html" class="btn btn-success">
                                <i data-feather="plus"></i>
                                <span>Add Teacher</span>
                            </a>
                        </div>
                        <div class="col mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>E-Mail</th>
                                        <th>Phone</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($teachers as $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->username}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>
                                                <a href="#" class="badge bg-warning">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                <a href="#" class="badge bg-danger" onclick="lib.test()">
                                                    <i data-feather="trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Teachers are Empty</td>
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