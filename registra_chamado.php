<?php
    session_start();

    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);
    //implode ('#')
    $texto = $_SESSION['id']. '#' . $titulo. '#' .$categoria.'#'.$descricao . PHP_EOL;

    //abrindo o arquivo
    $arquivo = fopen('arquivo.txt', 'a');
    //escrevendo o texo
    fwrite($arquivo ,$texto);
    //fechando o arquivo
    fclose($arquivo);

    //echo $texto;

    header('Location: abrir_chamado.php');
