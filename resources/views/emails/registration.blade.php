<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
</head>
<body>
    <p>Hola {{ $user->name }}.</p>
    <p>Hemos creado un usuario nuevo para ti en nuestro modulo de prestamos.</p>
    <p>A continuacion enviamos los datos para que ingreses por primera vez</p>
    <ul>
        <li>Usuario: {{ $user->email }}</li>
        <li>Contraseña: {{ $user->password }}</li>
    </ul>
    <p>Para ingresar dirigete al siguiente enlace:</p>
    <a href="http://prestamos.dev">Enlace</a>
</body>
</html>