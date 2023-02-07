<?php 
echo $_GET['query'];

$phpList=['login','logout','table'];
$isPhpExist=false;
foreach($phpList as $php){
        if($_GET['query']===$php){
                require_once($_GET['query'].'.php');
                callphp();
                $isPhpExist=true;
        }
}
if(!$isPhpExist){
        header("HTTP/1.1 404 Not Found");
        include ($_SERVER['DOCUMENT_ROOT'].'/404.html');
        exit();
}
;?>
