<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Duinenmars Voorverkoop</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(300deg, #56E821 0%,  #F5EC07 74%);
        }
    </style>

    @livewireStyles
    @livewireScripts
</head>
    <body class="body-bg">
        <section class="hero is-fullheight">
            <div class="hero-head"></div>
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered">
                        <div class="column is-two-thirds">
                            <h1 class="title has-text-centered">
                                Duinenmars
                            </h1>

                            <div class="box">
                                <div class="columns is-centered">
                                    <div class="column is-four-fifths">
                                        <section class="section">
                                            {{ $slot }}
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
