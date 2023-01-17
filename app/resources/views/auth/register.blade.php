<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Signin Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href='resources/css/sign.css' rel="stylesheet">

</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
    <form action="{{ route('register.post') }}" method="POST" id="handleAjax">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

        <div class="form-floating">
            <input form="handleAjax" name="name" type="text" class="form-control" id="floatingName" placeholder="Name">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
            <label for="floatingName">Name</label>
        </div>

        <div class="form-floating">
            <input form="handleAjax" name="email" type="email" class="form-control" id="floatingEmail" placeholder="Email">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            <label for="floatingEmail">Email</label>
        </div>

        <div class="form-floating">
            <input form="handleAjax" name="phone" type="text" class="form-control" id="floatingPhone" placeholder="Phone">
            @if ($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
            <label for="floatingPhone">Phone</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit" form="handleAjax">Sign up</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
    </form>
</main>

</body>
</html>

<script type="text/javascript">

    $(function() {
        $(document).on("submit", "#handleAjax", function() {
            var e = this;
            $(this).find("[type='submit']").html("Register...");
            $.ajax({
                url: $(this).attr('action'),
                data: $(this).serialize(),
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    alert(data.status);
                    $(e).find("[type='submit']").html("Register");
                    if (data.status) {
                        window.location = data.redirect;
                    }else{
                        $(".alert").remove();
                        $.each(data.errors, function (key, val) {
                            $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                        });
                    }
                }
            });
            return false;
        });
    });
</script>
