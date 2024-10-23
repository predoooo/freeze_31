<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "referencias.php"?>
<body>
 <?php 
 //1° passo : incluir as configuraçoes de BDA
 include "conexao_bd.php";
 //2° passo : capturar o login e a senha 
 $login_usuario = $_POST["txtLoginUsuario"];
 $senha_ussuario = $_POST["txtSenhaUsuario"];
 //3° passo : montar o select 
 $sql = "SELECT * FROM usuario ";
 $sql .= " WHERE login_usuario = '$login_usuario'";
 //4° passo : executar o comando do banco de dados
 $dados = retornarDados($sql);
 if($dados ==0)
 {
    echo "<h1> Usuário inexistente! </h1>";
 }
 else
 {
   $linha =  mysqli_fetch_assoc($dados);
   $hash = $linha["senha_usuario"];
   
   $retorno = password_verify($senha_ussuario,$hash);

   if ($retorno)
   {
    header("location:index_admin.php");
   }
   else 
   {
    echo "<h1>Senha inválida!</h1>";
   }
   
 
 }
 ?>   
</body>
</html>