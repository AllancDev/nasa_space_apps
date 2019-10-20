<?php 

    require_once ("../config.php");

    if(isset($_GET) && !empty($_GET)) {
        if($_GET['senha'] == $_GET['r-senha']) {
            $cpf = $_GET['cpf'];
            $email = $_GET['email'];
            $stmt = $db -> prepare('SELECT cpf FROM tb_users WHERE cpf = :cpf AND email = :email');

            $stmt -> execute([
                'cpf' => $cpf,
                'email' => $email
            ]);

            $consulta = $stmt -> fetch(PDO::FETCH_ASSOC);
            if(isset($consulta) && !empty($consulta)) { 
                header('Location: ../register.php?error=3');
                exit; 
            } else {

                $stmt = $db -> prepare('INSERT INTO tb_users (nome_usuario, cpf, tipo, email, senha ) VALUES (:nome, :cpf, :tipo, :email, :senha) ');
                $stmt -> execute([
                    ':nome' => $_GET['nome_completo'],
                    ':cpf' => $cpf,
                    ':tipo' => $_GET['tipo'],
                    ':email' => $_GET['email'],
                    ':senha' => md5($_GET['senha'])
                ]);


                if($stmt -> rowCount() == 1) {
                    header('Location: ../login.php?success=1');
                    exit;
                };



            }

        } else {
            header('Location: ../register.php?error=1');
            exit;
        }


    } else {
        header('Location: ../register.php?error=2');
    }
     

    /**
     * Erros: 
     *  1 = Suas senhas estão diferentes.
     *  2 = Por favor, digite seus dados novamente.
     *  3 = Esse CPF e/ou email já estão cadastrados.
     */



?>