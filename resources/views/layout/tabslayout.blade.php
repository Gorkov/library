<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .nav-tabs {
            display: flex;
            flex-direction: row;
            justify-content: center;
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
        .genre__link {
            cursor: pointer;
        }
        .genre__link:hover {
            background-color: #ddd;
        }
        .table--inside {
            display: none;
        }
        .td--center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">

            <ul class="nav nav-tabs">
                <li role="presentation"><a href="/">Home</a></li>
                <li role="presentation"><a href="/books/">Books</a></li>
                <li role="presentation"><a href="/authors/">Authors</a></li>
                <li role="presentation"><a href="/genres/">Genres</a></li>
            </ul>

            @yield('content')

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/sortingModule.js"></script>
</body>
</html>