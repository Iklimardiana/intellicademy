<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IntelliCode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Editor CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/quill-image-upload@0.1.3/image-upload.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module"></script>

    <script defer src="{{ asset('js/main.js') }}"></script>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
    @include('partials.nav')

    <div class="container mt-4">
        <div class="row">
            @yield('aside')
            {{-- @include('partials.aside') --}}
            <main class="col mt-3 mt-lg-0">
                @yield('content')
            </main>
        </div>

    </div>


    <footer class="p-4">
        <div class="container">
            <p>&copy; 2023 IntelliCode</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        feather.replace()

        const deleteData = (event, url) => {
        event.preventDefault(); // Menghentikan aksi default form

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your data has been deleted!", {
                        icon: "success",
                    });

                    fetch(url, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(response => {
                        location.reload();
                    })
                    .catch(error => {
                        // 
                    });

                } else {
                    swal("Your data is safe!");
                }
            });
        }
    </script>
</body>

</html>
