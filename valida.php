<?php
session_start();
include_once("conecta.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
        //echo password_hash($senha, PASSWORD_DEFAULT);
        
        $sql = "SELECT id_usuario, nome, usuario, senha FROM `usuarios` WHERE `usuario` = '".$usuario."' limit 1";
        $resultado = mysqli_query($conexao, $sql);
    

        if($resultado){
            $row_resultado = mysqli_fetch_assoc($resultado);
            if(password_verify($senha, $row_resultado['senha'])){
                $_SESSION['id_usuario'] = $row_resultado['id_usuario'];
                $_SESSION['nome'] = $row_resultado['nome'];
                $_SESSION['usuario'] = $row_resultado['usuario'];

                header("Location: paginaUsuario.php");

            }else{
                $_SESSION['msg'] = "Login ou senha incorretos.";
                header("Location: index.php");
            }
        }



	}else{
		$_SESSION['msg'] = "Login ou senha incorretos.";
		header("Location: index.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: index.php");
}





