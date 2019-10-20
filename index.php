<?php


session_start();
require_once("./config.php");

if (!isset($_SESSION['hashuser']) && empty($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}


include_once("templates/header.php");
?>
<style>
  div {
    /* background-color: #CE0B00; */
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php

      if (isset($_GET['a']) && !empty($_GET['a'])) {
        $url = "./views/" . $_GET['a'] . '.php';
        if (file_exists($url)) {
          require_once($url);
        } else {
          require_once('./views/painel.php');
        }
    } else {
      require_once('./views/painel.php');
    }

    ?>
</div>
<!-- /.content-wrapper -->
<?php
include_once("templates/footer.php");
?>