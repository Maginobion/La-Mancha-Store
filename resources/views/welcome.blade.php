<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>La Mancha</title>

        <link href={{ asset('css/app.css') }} rel="stylesheet">  
        <style>
            html, body, #app{
                height: 100%;
                width: 100%;
                margin: 0;
            }
            
            #app{
                position: relative;
            }
        </style>     
    </head>
    <body>
        <div id="app">
            <responsive-page>       
                <router-view/>   
            </responsive-page>        
        </div>
        <script src={{ mix('js/app.js') }} defer></script>
    </body>
</html>
