<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  //echo "Acceso no permitido";
  exit;
}

//Helpers
function clean_text(string $v): string {
  $v = trim($v);
  $v = str_replace(["\r", "\n"], ' ', $v);
  return $v;
}
$nombre   = clean_text($_POST['nombre']   ?? '');
$empresa  = clean_text($_POST['empresa']  ?? '');
$email    = trim($_POST['email'] ?? '');
$telefono = clean_text($_POST['telefono'] ?? '');
$mensaje  = trim($_POST['mensaje'] ?? '');
$apellidos = trim($_POST["apellidos"] ?? "");
$cargo     = trim($_POST["cargo"] ?? "");
$privacy   = isset($_POST["privacy"]); // checkbox


if ($nombre === '' || $empresa === '' || $email === '' || $telefono === '' || $mensaje === '' || $apellidos === '' || $cargo === '' || !$privacy) {
  //echo "❌ Campos incompletos";
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //echo "❌ Email inválido";
  exit;
}

// ====== SMTP / PHPMailer ======
$mail = new PHPMailer(true);

try {
  //echo "<h3>🔧 Iniciando configuración SMTP...</h3>";

  $mail->isSMTP();
  $mail->Host       = 'divcalpe.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'contacto@divcalpe.com';
  $mail->Password   = 'contactodivcalpe2026';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port       = 465;

  $mail->Timeout = 12;
  $mail->CharSet = 'UTF-8';

  //DEBUG
  //$mail->SMTPDebug  = 2;          // NIVEL DEBUG
  //$mail->Debugoutput = 'html';    // Mostrar en pantalla

  //echo "<p>Configuración SMTP cargada</p>";

  //Headers
  $mail->setFrom('contacto@divcalpe.com', 'Web DIVCAL');
  $mail->addAddress('contacto@divcalpe.com', 'Divcal');
  $mail->addReplyTo($email, $nombre);

  //echo "<p>✅ Headers configurados</p>";

  //Contenido
  $mail->isHTML(false);
  $mail->Subject = 'Nuevo contacto desde la web';

  $body =
"Nuevo mensaje desde la web DIVCAL

Nombre: {$nombre}
Empresa: {$empresa}
Email: {$email}
Teléfono: {$telefono}
Apellidos: {$apellidos}
Cargo: {$cargo}

Mensaje:
{$mensaje}
";

  $mail->Body    = str_replace("\n", "\r\n", $body);
  $mail->AltBody = $mail->Body;

  //echo "<p>Enviando correo...</p>";

  $mail->send();

  //echo "<h2 style='color:green'>CORREO ENVIADO</h2>";
  exit;

} catch (Exception $e) {
  //echo "<h2 style='color:red'>ERROR AL ENVIAR</h2>";
  //echo "<pre>";
  //echo htmlspecialchars($mail->ErrorInfo);
  //echo "</pre>";
  exit;
}
