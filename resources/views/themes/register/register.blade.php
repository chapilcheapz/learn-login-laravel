<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="col-3 m-auto text-center">
            <form action="{{ route('home.hanldeRegister') }}" method="post">
                @csrf
                <input class="form-control mt-2" type="text" name="lastname" id="" placeholder="Họ">
                <input class="form-control mt-2" type="text" name="firstname" id="" placeholder="Tên">
                <input class="form-control mt-2" type="text" name="email" id="" placeholder="Email">
                <input class="form-control mt-2" type="number" name="phone" id="" placeholder="SĐT">
                <input class="form-control mt-2" type="password" name="password" id="" placeholder="Mật khẩu">
                <button class="btn btn-danger mt-2">Đăng ký</button>
            </form>
        </div>
    </div>

</body>

</html>
