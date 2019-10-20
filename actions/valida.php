<?php 
    session_start();
    require_once "../config.php";


    $stmt = $db -> prepare("SELECT email, senha FROM tb_users WHERE email = :email AND senha = :senha ");

    $stmt -> execute([
        'email' => $_POST['login'],
        'senha' => md5($_POST['senha'])
    ]);

    $consulta = $stmt -> fetch(PDO::FETCH_ASSOC);

    
    if(!empty($consulta)) {
        $_SESSION['loginUsuario'] = $consulta['email'];
        $_SESSION['hashuser'] = md5($consulta['email']);
        header('Location: ../index.php');
        exit;
    } else {
        header('Location: ../login.php?error=11');
        exit;
    }

?>