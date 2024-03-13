<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layout.nav')
    <main class="container">
        @yield('konten')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @include('layout.footer')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- @if (session('errors'))
        <script>
            swal("Error!", "{{ session('errors') }}", "error")
        </script>
    @endif --}}


    @if ($errors->any())
        <script>
            swal("Error!", "{!! implode('\n', $errors->all()) !!}", "error");
        </script>
    @endif

    @if (session('info'))
        <script>
            swal("Info", "{{ session('info') }}", "info");
        </script>
    @endif

    @if (session('success'))
        <script>
            swal("Success!", "{{ session('success') }}", "success");
        </script>
    @endif

    @if (session('error'))
        <script>
            swal("Error!", "{{ session('error') }}", "error");
        </script>
    @endif
    @if (session('errorx'))
        <script>
            swal("", "{{ session('errorx') }}", "error");
        </script>
    @endif



    {{-- {!! ... !!}: This syntax tells Blade to output the content as-is without escaping it. This is necessary when dealing with HTML or newline characters, as you want them to be interpreted as intended. --}}

    {{-- implode('\n', $errors->all()): This part uses the PHP implode function to concatenate all the elements of the $errors->all() array into a single string and represents a newline character.  --}}


</body>

</html>
