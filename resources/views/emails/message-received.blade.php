
<!DOCTYPE html>
<html>
<head>
    <tittle>Mensaje recibido</tittle>
</head>
<body>
    <p>Recibiste un mensaje de: {{ $msg['name'] }} - {{ $msg['email']}}</p>
    <p><strong>Asunto:</strong> {{ $msg['subject']}}</p>
    <p><strong>Contenido:</strong> {{ $msg['content'] }}</p>
</body>
</html>
