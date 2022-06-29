<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>La Mancha</title>

        <link href={{ mix('css/app.css') }} rel="stylesheet">  
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
            <welcome-header>
            </welcome-header>
            <responsive-page>       
                <router-view/>   
            </responsive-page>        
        </div>
        <script src={{ mix('js/app.js') }} defer></script>
    </body>
</html>
