<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
if(isset($_SESSION['myusername'])){
    $text = $_POST['text'];
     
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['myusername']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>