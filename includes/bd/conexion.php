<?php
// Conexión a la base de datos MySQL con PDO
$host = 'localhost'; // Nombre del host
$dbname = 'despachos'; // Nombre de la base de datos
$user = 'root'; // Nombre de usuario
$password = ''; // Contraseña

try {
    // Crea la conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Configura PDO para que lance excepciones en caso de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>
