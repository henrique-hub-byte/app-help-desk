<?php
    session_start();

    $_SESSION['x'] = 'sou um valor de sessão';

    print_r($_SESSION);
    echo '<hr>';
    $usuario_autenticado = false;

    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcd' )
    );


    foreach($usuarios_app as $user){
      if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado =  true;
        }

    }
    var_dump($usuario_autenticado);
    if($usuario_autenticado == true){
        echo 'usuario atenticado';
        $_SESSION['autenticado'] = 'sim';
        $_SESSION['x'] = 'um valor';
        $_SESSION['y'] = 'outro valor';
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'não';
        header('Location: index.php?login=erro');
    }



?>