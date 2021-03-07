<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $description?>">
  <meta name="author" content="">
  <link rel="icon" type="image/ico" href="<?php echo HTTP_IMAGE_PATH; ?>favicon.ico">
  <title><?php echo $title; ?></title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- Custom styles -->
  <link href="<?php print HTTP_CSS_PATH; ?>styles.css" rel="stylesheet">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top header-bg-dark white-color">
  <div class="container">
    <a class="navbar-brand font-weight-bold"><h1>Taskz</h1></a>
    <?php  if (isset($this->session->userdata('ci_seesion_key')['is_loggedin']) && $this->session->userdata('ci_seesion_key')['is_loggedin'] == TRUE): ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <span class="nav-link">Welcome, <i> <?php echo $this->session->userdata('ci_seesion_key')['name'];?> </i> </span>  
        <a class="nav-link float-right" href="<?php echo site_url('auth/logout');?>">Logout
                <span class="sr-only">(current)</span>
              </a>
        </li>

      </ul>
    </div>
    <?php endif;?>
  </div>
</nav>