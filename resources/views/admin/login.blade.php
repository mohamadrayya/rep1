<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/login_page.css') }}">

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</head>

<body>


    <div class="parent">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-12 col-md-12 col-lg-6 ">

                    <div class="left_item ">
                        <img src="{{ asset('images/icons8-dashboard-50.png') }}">
                        <h2 class="text-dark mt-4">We Are The Laravel Team</h2>
                    </div>
                    <div class="left_content">

                        <div class=" col3 px-4">
                            <p>more than more than just a companyjust a companymore more than just a company than just
                                more
                                than just a company a company</p>
                        </div>

                        <form method="post" action="{{ route('login_check') }}">
                            @csrf
                            <div>
                                <h5 class="px-4 py-2">please Login to your account</h5>

                                <label class="px-4 py-2">Email </label>
                                <div class="form-group px-4 py-2">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email address" style="width:100%;">
                                </div>
                                @if ($errors->has('email'))
                                    <div class="error text-danger px-4 py-2">{{ $errors->first('email') }}</div>
                                @endif

                                <label class="px-4 py-2">Password </label>
                                <div class="form-group px-4 py-2">
                                    <input type="password" class="form-control pb-2" name="password" id="password"
                                        placeholder="" style="width:100%;">
                                </div>
                                @if ($errors->has('password'))
                                    <div class="error px-4 text-danger">{{ $errors->first('password') }}</div>
                                @endif

                            </div>
                            <div class="style_button my-3">
                                <button type="submit" class="button1">Login</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-6 col2 right_item">
                    <div class="child_div">
                        <h3>We are more than just a company</h3>
                        <p>more than more than just a companyjust a companymore more than just a company than just more
                            than just a company a company</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
