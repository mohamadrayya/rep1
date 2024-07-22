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
    <link rel="stylesheet" href="{{ asset('css/login_page2.css') }}">

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</head>

<body>





    <div class="parent">
        <div class="container">
            <div class="row">
                <div class="col-6 left_item">

                    <div class="left_content">
                        <img src="{{ asset('images/icons8-dashboard-50.png') }}">
                        <h2 class="text-dark ">We Are The Laravel Team</h2>
                    </div>
                    <div class="">
                        <form action="#">
                            <div>

                                <h5 class="">please Login to your account</h5>

                                <label class="">User Name </label>
                                <div class="form-group ">
                                    <input type="text" class="form-control" name="name"
                                        id="exampleFormControlInput1" placeholder="" style="width:100%;">
                                </div>

                                <label class="">Password </label>
                                <div class="form-group ">
                                    <input type="password" class="form-control pb-2" name="name"
                                        id="exampleFormControlInput1" placeholder="" style="width:100%;">
                                </div>

                            </div>
                            <div class="style_button">
                                <button type="submit" class="button1">Login</button>
                            </div>
                        </form>
                    </div>

                </div>















                <div class="col-6 right_item">
                    <div class="child_div">
                        <h3>We are more than just a company</h3>
                        <p>more than more than just a companyjust a companymore more than just a company than just more than just a company a company</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
