<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;
    // public $hora;
    // public $fecha;
    // public $cliente;

    public function __construct($email, $nombre, $token)
    {
        $this->email=$email;
        $this->nombre=$nombre;
        $this->token=$token;
        // $this->hora=$hora;
        // $this->fecha=$fecha;
        // $this->cliente;
        
    }

    public function sendConfirmation(){
        //CREAR EL OBJETO DE EMAIL
        $mail=new PHPMailer();
        $mail->isSMTP();        
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;

        //YAHOO.ES
        //$mail->Username = 'fddbb27e52d034';
        //$mail->Password = '4f97c6a5f05413';

        //APP SEBITAS MAILTRAP
        $mail->Username = 'e4326512175132';
        $mail->Password = '71e65b35859c78';

        //$mail->SMTPSecure='tls';

        $mail->setFrom('christina.gramal@gmail.com');
        //$mail->setFrom('nataly.guallichico@epn.edu.ec');
        //$mail->addAddress('cuentas@appsebitas.com', 'AppSebitas.com');
        $mail->addAddress('nataly.guallichico@epn.edu.ec');
        $mail->Subject = 'Confirmar Cuenta';

        //SET HTML
        $mail->isHTML(TRUE);
        $mail->CharSet='UTF-8';

        $contenido= '<html>';
        $contenido.="<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en Peluquería Sebitas, para confirmar presiona el siguiente enlace</p>";
        $contenido .="<p>Presiona aquí: <a href='http://localhost:3000/confirmarCuenta?token=".$this->token."'>Confirmar Cuenta</a>";
        $contenido .="<p>Si no solicito esta cuenta ignore el mensaje</p>";
        $contenido .='</html>';

        $mail->Body=$contenido;

        //ENVIAR EMAIL
        $mail->send();

    }

    public function sendInstructions(){

        //CREAR EL OBJETO DE EMAIL
        $mail=new PHPMailer();
        $mail->isSMTP();        
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;

        //YAHOO.ES
        //$mail->Username = 'fddbb27e52d034';
        //$mail->Password = '4f97c6a5f05413';

        //APP SEBITAS MAILTRAP
        $mail->Username = 'e4326512175132';
        $mail->Password = '71e65b35859c78';

        //$mail->SMTPSecure='tls';

        $mail->setFrom('cuentas@appsebitas.com');
        $mail->addAddress('cuentas@appsebitas.com', 'AppSebitas.com');
        $mail->Subject = 'Reestablece  tu contraseña';

        //SET HTML
        $mail->isHTML(TRUE);
        $mail->CharSet='UTF-8';

        $contenido= '<html>';
        $contenido.="<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu contraseña, presiona el siguiente enlace</p>";
        $contenido .="<p>Presiona aquí: <a href='http://localhost:3000/recuperarPassword?token=".$this->token."'>Reestablecer Contraseña</a>";
        $contenido .="<p>Si no solicito esta cuenta ignore el mensaje</p>";
        $contenido .='</html>';

        $mail->Body=$contenido;

        //ENVIAR EMAIL
        $mail->send();

    }

    //enviar correo de cita agendad exitosamente
    public function sendCitaCreate(){

        //CREAR EL OBJETO DE EMAIL
        $mail=new PHPMailer();
        $mail->isSMTP();        
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;

        //YAHOO.ES
        //$mail->Username = 'fddbb27e52d034';
        //$mail->Password = '4f97c6a5f05413';

        //APP SEBITAS MAILTRAP
        $mail->Username = 'e4326512175132';
        $mail->Password = '71e65b35859c78';

        //$mail->SMTPSecure='tls';

        $mail->setFrom('cuentas@appsebitas.com');
        $mail->addAddress('cuentas@appsebitas.com', 'AppSebitas.com');
        $mail->Subject = 'Cita registrada en Peluquería Unisex  Sebitas';

        //SET HTML
        $mail->isHTML(TRUE);
        $mail->CharSet='UTF-8';

        $contenido= '<html>';
        $contenido.="<p><strong>Hola " . $this->nombre . "</strong> Has creado una cita en la Peluquería Unisex Sebitas, a continuación te presentamos los detalles de tu cita.</p>";
        //$contenido .="<p><strong> Fecha: " .$this->fecha . "</strong></p>";
        //$contenido .="<p><strong> Hora: " .$this->hora . "</strong></p>";
        $contenido .="<p>Peluquería Unisex Sebitas agradece por su confianza.</p>";
        $contenido .="<p>Si no solicitaste este servicio ignora este mensaje.</p>";
        $contenido .='</html>';

        $mail->Body=$contenido;

        //ENVIAR EMAIL
        $mail->send();

    }


}