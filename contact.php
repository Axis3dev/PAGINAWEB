<?php
/**
 * Actualiza el correo de destino en la variable $destinatario según tus necesidades.
 */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contacto.html', true, 303);
    exit;
}

$destinatario = 'contacto@axis3d.mx';
$asunto = 'Nueva solicitud de cotización – AXIS 3D';
$campos = [
    'nombre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'email' => FILTER_SANITIZE_EMAIL,
    'telefono' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'mensaje' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'empresa' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'acepto' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
];
$input = filter_input_array(INPUT_POST, $campos, false);

if (!$input) {
    enviarRespuesta(false, 'Datos inválidos.');
}

if (!empty($input['empresa'])) {
    enviarRespuesta(true, 'Gracias.');
}

$nombre = trim(substr($input['nombre'] ?? '', 0, 120));
$email = trim(substr($input['email'] ?? '', 0, 160));
$telefono = trim(substr($input['telefono'] ?? '', 0, 30));
$mensaje = trim(substr($input['mensaje'] ?? '', 0, 1200));
$acepto = isset($_POST['acepto']);

if ($nombre === '' || $mensaje === '' || !$acepto) {
    enviarRespuesta(false, 'Por favor completa los campos obligatorios.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    enviarRespuesta(false, 'El correo electrónico no es válido.');
}

$ip = $_SERVER['REMOTE_ADDR'] ?? 'N/A';
$fecha = date('d/m/Y H:i:s');
$cuerpo = "Nombre: {$nombre}\n" .
          "Email: {$email}\n" .
          "Teléfono: {$telefono}\n" .
          "Mensaje:\n{$mensaje}\n\n" .
          "IP: {$ip}\n" .
          "Fecha: {$fecha}\n";

$headers = [];
$headers[] = 'From: AXIS 3D <no-reply@axis3d.mx>';
$headers[] = 'Reply-To: ' . $email;
$headers[] = 'Content-Type: text/plain; charset=UTF-8';

$enviado = mail($destinatario, $asunto, $cuerpo, implode("\r\n", $headers));

if ($enviado) {
    enviarRespuesta(true, 'Gracias por tu mensaje. Te contactaremos muy pronto.');
}

enviarRespuesta(false, 'Ocurrió un error al enviar el correo. Intenta nuevamente.');

function enviarRespuesta(bool $exito, string $mensaje): void
{
    $aceptaJson = strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false ||
                  strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest';

    if ($aceptaJson) {
        header('Content-Type: application/json');
        echo json_encode(['success' => $exito, 'message' => $mensaje], JSON_UNESCAPED_UNICODE);
    } else {
        $status = $exito ? 'success' : 'error';
        header('Location: contacto.html?status=' . $status . '&msg=' . urlencode($mensaje));
    }
    exit;
}
