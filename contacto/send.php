<?php
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['ok'=>false,'message'=>'Método no permitido']); exit;
}

$honeypot = trim($_POST['empresa'] ?? '');
if ($honeypot !== '') { echo json_encode(['ok'=>true,'message'=>'OK']); exit; }

function clean($v){ return trim(strip_tags($v ?? '')); }

$nombre  = clean($_POST['nombre'] ?? '');
$email   = clean($_POST['email'] ?? '');
$tel     = clean($_POST['telefono'] ?? '');
$serv    = clean($_POST['servicio'] ?? '');
$desc    = clean($_POST['descripcion'] ?? '');

if ($nombre === '' || $email === '' || $desc === '') {
  echo json_encode(['ok'=>false,'message'=>'Faltan campos obligatorios']); exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['ok'=>false,'message'=>'Correo inválido']); exit;
}

$TO = 'contacto@axis3d.mx';
$subject = 'Nuevo proyecto – '.$serv;
$body = "Nombre: $nombre\nCorreo: $email\nTeléfono: $tel\nServicio: $serv\n\nDescripción:\n$desc\n\nFecha: ".date('Y-m-d H:i:s');
$headers  = "From: AXIS 3D <no-reply@axis3d.mx>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$sent = @mail($TO, $subject, $body, $headers);

echo json_encode([
  'ok'      => (bool)$sent,
  'message' => $sent ? 'Gracias, recibimos tu solicitud.' : 'No se pudo enviar el correo. Intenta más tarde.'
]);
