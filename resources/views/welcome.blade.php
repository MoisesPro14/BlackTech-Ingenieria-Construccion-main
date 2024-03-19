<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingenieria & Construcción</title>
    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="/resources/css/app.css"> -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .contenedor {
        width: 100%;
        max-width: 1200px;
        overflow: hidden;
        margin: auto;
        padding: 60px 0;
        padding-left: auto;
    }

    header {
        height: calc(100vh - 80px);
        background-image: url('	https://www.blacktech.pe/assets/img/cabecera-qquienesomos.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;

    }

    .head {
        padding: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    h1 {
        margin-top: 180px;
    }

    footer {
        display: flex;
        width: 100%;
        height: 80px;
        background-color: #6a0304;
        text-align: center;
        justify-content: center;
    }

    .derechos,
    .url {
        padding: 15px;
        color: white;
        font-size: 17px;
    }

    .url:hover {
        color: black;
    }

    a {
        text-decoration: none;

    }

    button {
        margin-left: 500px;
        align-items: center;
        margin-top: 40px;
        width: 220px;
        color: #090909;
        padding: 0.7em 1.7em;
        font-size: 18px;
        border-radius: 0.5em;
        background: #e8e8e8;
        border: 1px solid #e8e8e8;
        transition: all .3s;
        box-shadow: 6px 6px 12px #c5c5c5,
            -6px -6px 12px #ffffff;
    }

    button:active {
        color: #666;
        box-shadow: inset 4px 4px 12px #c5c5c5,
            inset -4px -4px 12px #ffffff;
    }
    </style>

</head>

<body>
    <header>
        <div class="contenedor head">
            <h1> BlackTech Consulting</h1>
            <button>
            <a  href="{{ route('login') }}" class="text-sm text-green-500 dark:text-gray-500 underline">Iniciar
                        Sesión</a>
                </button>

        </div>
    </header>
    <footer class="main-footer">
        <strong class="derechos"> Copyright &copy; <?php echo date("Y");?><a class="url"
                href="https://www.blacktech.pe/">BlackTech</a>All rights reserved</strong>
    </footer>
</body>

</html>
