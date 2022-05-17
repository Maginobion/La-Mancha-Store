<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>La Mancha</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href={{ asset('css/app.css') }} rel="stylesheet">       
    </head>
    <body>
        <div id="app">
            <router-link to="/">Home</router-link>
            <router-link to="/prueba">Prueba</router-link>
            <router-link to="/atencion-cliente">Atencion</router-link>
            <router-link to="/pruebita">Pruebita</router-link>
            <router-view/>
        </div>      
        <script src={{ mix('js/app.js') }} defer></script>
    </body>
</html>
