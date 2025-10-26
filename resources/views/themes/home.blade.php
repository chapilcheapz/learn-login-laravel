<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <section>
        <div class="container bg-light p-5 ">
            <div class="d-flex justify-content-between">
                <div class="block-left">
                    {{ Auth::check() ? 'Đã đăng nhập xin chào' : 'Chưa đăng nhập' }}
                    {{ Auth::user()->firstname ?? 'không tìm thấy thông tin' }}
                    <small>
                        <div>
                            @php
                                if (Auth::user()->kyc == 'Chưa xác minh') {
                                    echo '<div class="text-danger">Chưa xác minh</div>';
                                } elseif (Auth::user()->kyc == 'Chờ xác minh') {
                                    echo '<div class="text-warning">Chờ xác minh</div>';
                                } elseif (Auth::user()->kyc == 'Đã xác minh') {
                                    echo '<div class="text-success">Đã xác minh</div>';
                                } else {
                                    echo '';
                                }
                            @endphp

                        </div>
                    </small>
                    @php
                        if (Auth::user()->kyc == 'Chưa xác minh' && Auth::user()->kyc == 'Chưa xác minh') {
                            echo "";
                        } else {
                            echo `<a class="{{ Auth::check() ? 'btn btn-info' : 'd-none' }}" href="{{ route('kyc.form') }}">KYC</a>`;
                        }
                    @endphp
                </div>

                <div class="block-right">
                    <a class="{{ Auth::check() ? 'd-none' : 'btn btn-success' }}"
                        href="{{ route('home.login') }}">login</a>

                    <a class="{{ Auth::check() ? 'btn btn-danger' : 'd-none' }}"
                        href="{{ route('home.logout') }}">logout</a>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
