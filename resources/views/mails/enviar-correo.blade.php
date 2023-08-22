<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f7f7f7;
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
    
            text-decoration: none;
            border-radius: 5px;
            border-style: solid;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a <b>Drogueria La Economia</b></h1>
        <p>Hola {{ @$nombre_usuario }},</p>
        <p>Gracias por registrarte en nuestra aplicación. Estamos emocionados de tenerte como parte de nuestra comunidad.</p>
        <p>¡Comienza a explorar y disfrutar de nuestras funcionalidades!</p>
        <p>Si tienes alguna pregunta, no dudes en ponerte en contacto con nosotros.</p>
        <p>Saludos,</p>
        <p>El equipo de nuestra aplicación <b>Drogueria La Economia</b></p>
        <p><a class="button" href="{{ url('/') }}">Ir a la aplicación</a></p>
    </div>
</body>
</html>
