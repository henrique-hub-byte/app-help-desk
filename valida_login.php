<?php
session_start();

echo '<hr>';
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = $user['perfil_id'];

$perfis = [1 => 'Adminsitrativo', 2 => 'Usuario'];

$usuarios_app = [
    ['id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' =>  1],
    ['id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id' =>  1],
    ['id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '123456', 'perfil_id' =>  2],
    ['id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id' =>  2],
];


/* validação de cada email e usuario ocorre dentro do foreach */
foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

/* condição se o usario for autenticado */
if ($usuario_autenticado) {
    echo 'usuario atenticado';
    $_SESSION['autenticado'] = true;
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    print_r($_SESSION);
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'não';
    header('Location: index.php?login=erro');
}
