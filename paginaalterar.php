<?php
session_start();
?>
<?php 
include_once('conexao.php');

session_start();
include_once("conexao.php");

//Cria armazena os names nas váriaveis fazendo a filtração
$id= filter_input(INPUT_POST,'id', FILTER_VALIDATE_INT);
$email = filter_input (INPUT_POST,'email', FILTER_DEFAULT);
$email = strip_tags($email);
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

$senha = filter_input (INPUT_POST,'senha', FILTER_DEFAULT);
$senha= strip_tags($senha);
$senha= htmlspecialchars($senha, ENT_QUOTES, 'UTF-8');




//verifica se a conexão foi bem sucedida
if (!$conexao){
    die('Erro de conexão:' . mysqli_connect_error());
}
// prepara a instrução SQL de atualização
$sql = "UPDATE cliente SET senha='$senha' WHERE id_user='$id'";
if (mysqli_query($conexao, $sql)) {
    header('Location:index.php');
} else {
    echo "Erro ao atualizar o contato:" . mysqli_error($conexao);
}

// prepara a instrução SQL de atualização
$sql = "UPDATE cliente SET senha='$senha' WHERE id_user='$id'";
if (mysqli_query($conexao, $sql)) {
    header('Location:alterar.html');
} else {
    echo "Erro ao atualizar o contato:" . mysqli_error($conexao);
}

mysqli_close($conexao);


?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/paginaalterar.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Alterarpag</title>
 </head>
 <body>
 <div id="first_column" class="fixed-top">
    <div id="b">
        <div id="id_oneimage"> 
            <a href="index.php">
                <img id="one_image" src="imagens/logooriginal.png" alt="brasil">
            </a>
        </div>
        <div id="id_onetitle"> 
            <h2 id="one_title">
                <a href="index.php">
                <h3 id="h3">Convites<span> web</span></h3>

                </a>
            </h2>
        </div>
        <div id="id_secondtitle"> 
            <h3 id="estrela">
                <a href="crieseuevento.php" id="second_title">&#9733; Crie seu evento</a>
            </h3>
        </div>

        <?php if (isset($_SESSION['nome'])): ?>
            <!-- Dropdown do nome do usuário logado -->
            <div id="one_title" class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                     <?php echo $_SESSION['nome']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="alterar.php">Alterar Senha</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                </ul>
            </div>
        <?php else: ?>
            <!-- Exibe o link de login se o usuário não estiver logado -->
            <div id="id_firstlink"><a href="login.php" id="first_link">ENTRAR</a></div>
        <?php endif; ?>

        
    </div>
    </div>
 <br> <br><br><br>  
 <div class="wrapper">
        <form action="alterar.php" method="post" onsubmit="return paginaalterar()">
        
            <h1>Convites<span style="color: #1b8f21;">web</span></h1>

            <div class="input-box">
                <label for="id"></label>
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                
            </div>
            
            <div class="input-box">
                <label for="email"></label>
                <label for=""><?php echo $email?></label>
                
            </div>

            <div class="input-box">   
                 <label for="senha"></label>
                 <input type="password" name="senha" id="senha" placeholder="Digite a sua nova senha" value="<?php echo $senha; ?>">
  
            </div>
           <button type="submit" class="btn" >Alterar Senha</button>

        </div>
            <!-- Rodapé -->
 <div id="rodape">
    <footer>
        <div id="barra_links" class="d-flex justify-content-center"> 
            <div id="insta" class="d-flex"> 
                <abbr title="Instagram" class="m-0 mx-3">
                    <a href="https://www.instagram.com" class="d-inline-block"><i class="bi bi-instagram large-icon green-icon"></i></a>
                </abbr>
                <abbr title="Facebook" class="m-0 mx-3">
                    <a href="https://www.facebook.com" class="d-inline-block"><i class="bi bi-facebook large-icon green-icon"></i></a>
                </abbr>
                <abbr title="Youtube" class="m-0 mx-3">
                    <a href="https://www.youtube.com" class="d-inline-block"><i class="bi bi-youtube large-icon green-icon"></i></a>
                </abbr>
                <abbr title="Twitter" class="m-0 mx-3">
                    <a href="https://www.x.com" class="d-inline-block"><i class="bi bi-twitter-x large-icon green-icon"></i></a>
                </abbr>
            </div>
        </div>
    </footer>
    <div id="i">
        <!--Ul-->
        <div class="container">
            <ul id="one_links">
                <div id="tr">
                    <h3  id="h3" class="titleis">Institucional</h3>
                    <div id="linka1"><li id="e_mensage"><a href="index.php" id="a_mensage">Home</a></li></div>
                    <div id="linka1"><li id="e_mensage"><a href="contato.php" id="a_mensage" >Contato</a></li></div>
                </div>
            </ul>
            <ul id="two_links">
                <div id="tr">
                    <h3 id="h3" class="titleis">Minha conta</h3>
                    <div id="linka2"><li id="i_mensage"><a href="pedidos.php" id="i2_mensage">meus pedidos</a></li></div>
                    <div id="linka2"><li id="i_mensage"><a href="select.php" id="i2_mensage">Alterar senha</a></li></div>
                </div>
            </ul>
        </div>
        </div>
            </body>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </html>