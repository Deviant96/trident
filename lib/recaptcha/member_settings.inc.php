<?php 

$sysconf['captcha']['member']['folder'] = 'recaptcha'; // folder name inside the SENAYAN_LIB_DIR folder
$sysconf['captcha']['member']['incfile'] = 'recaptchalib-v2.php'; // php file that needs to be included in php file
$sysconf['captcha']['member']['webfile'] = ''; // php file that needs to accessed to create captcha image
$sysconf['captcha']['member']['publickey'] = '6LdpPaoZAAAAAO8i_3T8Qh0pq9bIBx1hPFIS21QP'; // some captcha providers need this. Ajdust it with yours
$sysconf['captcha']['member']['privatekey'] = '6LdpPaoZAAAAALonh_qzCDvYmC98KzcsxMWJBLr_'; // some captcha providers need this. Ajdust it with yours

$sysconf['captcha']['member']['recaptcha']['theme'] = 'white'; // Possible values: 'red' | 'white' | 'blackglass' | 'clean' | 'custom'
$sysconf['captcha']['member']['recaptcha']['lang'] = 'en'; // Possible values: 'en' (english) | 'nl' (Dutch) | 'fr' (French) | 'de' (German) | 'pt' (Portuguese) | 'ru' (Russian) | 'es' (Spanish) | 'tr' (Turkish)
$sysconf['captcha']['member']['recaptcha']['customlang']['enable'] = false;
$sysconf['captcha']['member']['recaptcha']['customlang']['instructions_visual'] = 'Ketik dua kata diatas:';
$sysconf['captcha']['member']['recaptcha']['customlang']['instructions_audio'] = 'Ketik kata yang anda dengar:';
$sysconf['captcha']['member']['recaptcha']['customlang']['play_again'] = 'Putar suara kembali';
$sysconf['captcha']['member']['recaptcha']['customlang']['cant_hear_this'] = 'Unduh suara format MP3';
$sysconf['captcha']['member']['recaptcha']['customlang']['visual_challenge'] = 'Captcha visual';
$sysconf['captcha']['member']['recaptcha']['customlang']['audio_challenge'] = 'Captcha audio';
$sysconf['captcha']['member']['recaptcha']['customlang']['refresh_btn'] = 'Minta kata baru';
$sysconf['captcha']['member']['recaptcha']['customlang']['help_btn'] = 'Bantuan';
$sysconf['captcha']['member']['recaptcha']['customlang']['incorrect_try_again'] = 'Salah. Coba lagi.';

?>