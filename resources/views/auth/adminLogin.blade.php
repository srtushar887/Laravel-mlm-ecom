<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


    <style>
        body {
            background-color: rgb(93, 28, 139)
        }

        input {
            border: none;
            outline: none
        }

        .container {
            border-radius: 15px
        }

        @media(min-width:992px) {
            img {
                width: 500px;
                height: 500px
            }

            #circle {
                border: 10px solid rgba(255, 0, 234, 0.945);
                border-radius: 50%;
                position: absolute;
                height: 50px;
                width: 50px;
                left: 290px;
                top: -25px
            }

            .container {
                background-image: linear-gradient(to bottom, rgb(255, 255, 255) 80%, rgb(242, 242, 253), rgb(164, 164, 235))
            }
        }

        @media(max-width:991px) {
            img {
                display: none
            }

            #circle {
                border: 10px solid rgba(255, 0, 234, 0.945);
                border-radius: 50%;
                position: absolute;
                height: 50px;
                width: 50px;
                left: 100px;
                top: -25px
            }

            .container {
                background-image: linear-gradient(to bottom, rgb(255, 255, 255) 80%, rgb(242, 242, 253), rgb(164, 164, 235))
            }
        }

        @media(max-width:768px) {
            img {
                display: none
            }

            #circle {
                border: 10px solid rgba(255, 0, 234, 0.945);
                border-radius: 50%;
                position: absolute;
                height: 50px;
                width: 50px;
                left: 302px;
                top: -29px
            }
        }

        @media(max-width:567px) {
            img {
                display: none
            }

            .container {
                margin-left: 0px;
                margin-top: 30px
            }

            #circle {
                border: 10px solid rgba(255, 0, 234, 0.945);
                border-radius: 50%;
                position: absolute;
                height: 50px;
                width: 50px;
                left: 202px;
                top: -29px
            }
        }
    </style>
</head>
<body>
<div class="container bg-white pb-5">
    <div class="row d-flex justify-content-start align-items-center mt-sm-5">
        <div class="col-lg-5 col-10">
            <div id="circle"></div>
            <div class="pb-5">
                <img src="https://img.freepik.com/free-vector/authentication-concept-illustration_114360-2168.jpg?size=338&ext=jpg&ga=GA1.2.777073396.1599399655" alt="" />
            </div>
        </div>
        <div class="col-lg-4 offset-lg-2 col-md-6 offset-md-3">
            <div class="pt-4">
                <h6><span class="fa fa-superpowers text-primary px-md-2"></span>COMPANY LOGO</h6>
            </div>
            <div class="mt-3 mt-md-5">
                <h5>Log in to your account</h5>
                <form class="pt-4" action="{{route('admin.login.submit')}}" method="post">
                    @csrf
                    <div class="d-flex flex-column pb-3"><label for="email">Email Address</label> <input type="email" name="email" required id="emailId" class="border-bottom border-primary" /></div>
                    <div class="d-flex flex-column pb-3"><label for="password">Password</label> <input type="password" name="password" required id="pwd" class="border-bottom border-primary" /></div>
                    <div class="d-flex jusity-content-end pb-4">
                        <div class="ml-auto">
                            <a href="#" class="text-danger text-decoration-none">Forgot password?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-3">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>
