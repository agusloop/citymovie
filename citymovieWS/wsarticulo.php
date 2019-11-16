<?php

 include 'clscitymovie.class.php';
  
  $soap=new SoapServer(null,array('uri' => 'http://citymovie.weare8lions.com.mx'));
   $soap->setClass('clsarticulo');
  $soap->handle();
?>