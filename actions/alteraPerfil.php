<?php 
    include('../config.php');
    print_r($_GET);
    $stmt = $db -> prepare('SELECT * FROM tb_users WHERE id = :id' );

    $stmt -> execute([
        "id" => $_GET['id_u']
    ]);

    $user = $stmt -> fetch(PDO::FETCH_ASSOC);

    if(isset($user) && !empty($user)) {
        $stmt = $db ->
        prepare("UPDATE tb_users 
        SET info = :info AND sexo = :sexo AND dt_nascimento = :dt
        WHERE id = :id"
        );
        $stmt -> execute([
            "info" => $_GET['info'],
            "sexo" => $_GET['sexo'],
            "dt" => $_GET['data_nascimento'],
            "id" => $_GET['id_u']
        ]);

        $res = $stmt -> rowCount();
        print_r($res);
    } else {
        header("Location: ../index.php?erro=20");
        exit;
    }
    

?>