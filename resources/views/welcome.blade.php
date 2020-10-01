<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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

        .content {
            text-align: center;
        }

        .content > p {
            margin-top: 30px;
            color: #b4b6be;
        }

        .title {
            font-size: 85px;
            font-weight: 900;
            color: #4AAEE3;
            font-family: 'Mulish', sans-serif;
            margin-bottom: 30px;
        }

        .links {
            padding: 30px 0;
            border-top: 1px solid #dfe2e5;
            border-bottom: 1px solid #dfe2e5;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            VARBOX
        </div>
        <div class="links">
            <a href="https://varbox.io" target="_blank" rel="noreferrer">Site</a>
            <a href="https://varbox.io/docs" target="_blank" rel="noreferrer">Docs</a>
            <a href="https://varbox.io/buy" target="_blank" rel="noreferrer">Buy</a>
            <a href="https://github.com/VarboxInternational/varbox" target="_blank" rel="noreferrer">Repo</a>
        </div>
        <p>
            No front-end pages are provided in this demo. <br />Only the admin panel.
        </p>
    </div>
</div>
</body>
</html>
