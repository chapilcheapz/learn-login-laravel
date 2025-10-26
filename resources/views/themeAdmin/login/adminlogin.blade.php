<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in Admin</h3>

                            <form action="{{ route('admin.login') }}" method="post">
                                @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label float-start" for="typeEmailX-2">Email</label>
                                    <input type="email" name="email" id="typeEmailX-2" value="{{ old('email') }}"
                                        class="form-control form-control-lg" />
                                        <small>
                                            @error('email')
                                                <small>{{ $message }}</small>
                                            @enderror
                                

                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label float-start" for="typePasswordX-2">Password</label>
                                    <input type="password" name="password" id="typePasswordX-2" value="{{ old('password') }}"
                                        class="form-control form-control-lg" />
                                         @error('password')
                                                <small>{{ $message }}</small>
                                            @enderror
                                </div>

                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-lg btn-block" >Login</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
