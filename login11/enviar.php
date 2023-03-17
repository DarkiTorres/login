<!-- vpnxlnwusjxrtosd -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$correo = $_POST['correo'];
$con = mysqli_connect('localhost','master','1234');

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
$finalcontra = generate_string($permitted_chars, 6);

if (!$con) {
    die('No se pudo conectar: ' . mysqli_error($con));                                        
}

mysqli_select_db($con,'mi_bd');

$sql="SELECT * FROM usuarios WHERE correo = '".$correo."'";
$sqa="UPDATE usuarios SET password = '".$finalcontra."' WHERE usuarios.correo = '".$correo."'";

$resulta = mysqli_query($con,$sqa);
//$row2 = mysqli_fetch_array($resulta);

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

//Llama autoloader de composer
require 'vendor/autoload.php';

//Crea un objeto PHPMailer;  `true` habilita excepciones
$mail = new PHPMailer(true);

try {

    $miCorreo ='ediandgow@gmail.com';

    //Configuracion del Servidor SMTP
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Muestra salida de depuración detallada
    $mail->isSMTP();                                            //Envia usando SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Configurar el servidor SMTP para enviar a través de él
    $mail->SMTPAuth   = true;                                   //Ahilita Autenticacion SMTP
    $mail->Username   = $miCorreo;                              //nombre de usuario del servidor SMTPe
    $mail->Password   = 'vpnxlnwusjxrtosd';                     //password del servidor SMTP
    $mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_SMTPS;   //Habilita TLS
    $mail->Port       = 587;                                    //Puerto TCP para conectarse; usar 587 si configuró `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Preparacion 
    $mail->setFrom($miCorreo, 'Yo envio');                  // Quien envia
    $mail->addAddress($correo, 'Enemigo publico');          //Añade a quien envia correo
   
    //Contenido
    $mail->isHTML(true);                                    //Especifica que se envia el docuento en formato HTML
    $mail->Subject = 'Mi asunto';
    $mail->Body    = "Mi Mensaje<br> Usuario: <b> ". $row['usuario'] ."</b>
                                <br> Contraseña: <b> ". $finalcontra ."</b>";
    $mail->AltBody = 'Mi Mensaje dios mio, no acepto html';                          //Mensaje plano si no se acepta HTML

    $mail->send();                                          //Envia el correo
    echo 'Mensaje Enviado en clase';
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    $password_hash = password_hash($finalcontra, PASSWORD_DEFAULT, ['cost' => 10]);
    
    $sqe="UPDATE usuarios SET password = '".$password_hash."' WHERE usuarios.correo = '".$correo."'";
    $resulta = mysqli_query($con,$sqe);

    mysqli_close($con);
?>