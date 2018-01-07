<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        {{-- VERIFYING CFRF == VVI (MUST CHECK THIS) --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h2>Register Form</h2>

                <div class="row col-lg-5">
                    <button class="btn btn-xs btn-danger" id="getRequest">Get Request</button>
                </div>

                <div class="row col-lg-5">
                    {{-- Registration Form --}}
                    <form action="#" role="form">
                        {{-- {{ csrf_token() }} --}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <legend>Registration Form</legend>
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter first name here..">

                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name here" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary" id="register">Register</button>

                    </form>

                </div>

                <div id="getRequestData">
                    {{-- js data here --}}
                </div>

                <div id="postRequestData">
                    {{-- js data here --}}
                </div>

            </div>
        </div>

        <script type="text/javascript">

            //VERIFYING CFRF -- VVI (MUST CHECK THIS)...please go to app/Http/Middleware/VerifyCsrfToken.php
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
            });

            $(document).ready(function(){
                $('#getRequest').click(function ()
                {
                    // alert($(this).text());
                    $.get('getMessage',function(data)
                    {
                        $('#getRequestData').append(data);
                        console.log(data);
                    });
                });

                $('#register').submit(function(event) {
                    var fname = $('#first_name').val();
                    var lname = $('#last_name').val();

                    $.post('register', { first_name: fname, last_name:lname}, function (data) {
                        // console.log(data);
                        $('#postRequestData').html();
                    })
                });
            });

        </script>
    </body>
</html>
