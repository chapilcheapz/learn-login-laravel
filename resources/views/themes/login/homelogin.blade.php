<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid mt-1">
        <div class="col-3 text-center m-auto border mt-9 p-5">
            <form action="{{ route('homelogin.login') }}" method="post" class="text-center">
                @csrf
                <input class="form-control mt-2" name="email" type="text" value="{{ old('email') }}"
                    placeholder="Email/Phone">
                <small>
                    @error('email')
                        <span class="text-danger">{{ $message ? 'Bắt buộc phải nhập Email hoặc SĐT' : '' }}</span>
                    @enderror
                </small>
                <input class="form-control mt-2" name="password" type="password" value="{{ old('password') }}"
                    placeholder="Password">
                <small>
                    @error('password')
                        <span class="text-danger">{{ $message ? 'Bắt buộc phải nhập mật khẩu' : '' }}</span>
                    @enderror
                </small>
                <button class="btn btn-danger form-control mt-2">Login</button>
                
            </form>

          
                <a class="btn btn-warning mt-2 float-end" href="{{ route('home.register') }}">Register</a>
           
        </div>

           
    </div>


</body>

</html>
