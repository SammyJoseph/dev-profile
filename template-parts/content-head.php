<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo("charset"); ?>"> 
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- <title>iPortfolio Bootstrap Template - Index</title> se define desde Ajustes/Generales de Wordpress-->
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" rel="icon">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <?php wp_head(); ?>  <!-- agrega los estilos CSS encolados y generados en functions.php -->

  <!-- etiquetas modo app para iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="dev-profile">
  <link rel="apple-touch-icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/apple-touch-icon.png">
  <!-- etiquetas modo app para android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-title" content="dev-profile">
  <meta name="theme-color" content="#333333">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/icono.jpg">

  
    <!-- Template Main CSS File -->
 
  <!-- =======================================================
  * Template Name: iPortfolio - v3.9.1
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php wp_body_open(); ?>