<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <style>
     body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

#conteudo {
    width: 80%;
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

form {
    margin-top: 20px;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    max-width: 700px;
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

        table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
    
@media (max-width: 768px) {
    #first_column {
        flex-direction: column;
        align-items: center;
    }

    #id_onetitle h3 {
        font-size: 17px;
        text-align: center;
    }
    #id_secondtitle h3 {
        align-items: center;
        font-size: 12px;
    }

    #first_link{
        font-size: 10px;
        margin-top: 10px;
        border: solid 1px white;
        text-decoration: none;
        color: white;
        padding-left: 1px;
        padding-right: 1px;
        padding-top: 3px;
        padding-bottom: 3px;
        border-radius: 2px;
        font-family:Arial, Helvetica, sans-serif;
        display: inline-block;
    }
    #first_link:hover{
        background-color:white;
        color: black;
        border: solid 1px black;
        display: inline-block;
        }
    #first_link{
        font-size: 15px;
        margin-top: 10px;
        border: solid 1px white;
        text-decoration: none;
        color: white;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 3px;
        padding-bottom: 5px;
        border-radius: 5px;
        font-family:Arial, Helvetica, sans-serif;
        display: inline-block;
    }
    #first_link:hover{
        background-color:white;
        color: black;
        border: solid 1px black;
        display: inline-block;
        }
    .table {
        font-size: 14px;
        margin-top: 20px;
        word-wrap: break-word;
    }

    #link_red, #link_blue {
        font-size: 18px;
    }

    #barra_links {
        flex-direction: column;
        align-items: center;
    }

    #rodape {
        text-align: center;
    }

    #id_onetitle h2 {
        font-size: 10px;  /* Ajuste do tamanho do título para telas pequenas */
    }

    /* Melhora na exibição das tabelas em dispositivos móveis */
    table {
        width: 100%;
        font-size: 12px;  /* Reduz o tamanho da fonte em dispositivos móveis */
    }

    td, th {
        padding: 8px;
    }
}


 </style> 
    <title>Inicio</title>
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
    <div id='select_table' style="justify-content:center;display:flex;padding:200px">
   <?php 
   
 include_once('conexao.php');

  $parametro = filter_input(INPUT_GET, "parametro", FILTER_DEFAULT);

  $parametro = strip_tags($parametro);
  
  $parametro = htmlspecialchars($parametro, ENT_QUOTES, 'UTF-8');

   echo $parametro;

    if ($parametro) {
        $sql = "SELECT * FROM cliente WHERE email LIKE '%$parametro%'";
     } else {
        $sql = "SELECT * FROM cliente ";
        }


    $dados = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($dados) > 0) {
         echo "<table border='1'>";
         echo "<tr>
         <th>email</th>
         <th>Alterar</th>
        <th>Deletar</th>
         </tr>";

         while ($linha = mysqli_fetch_assoc($dados)) {
            echo "<tr>";
            echo "<td>" . $linha['email'] . "</td>";
            echo "<td> <a id='link_blue' href='paginaalterar.php?id=" . $linha['id_user'] . "&email=" . urlencode($linha['email']) . "&senha=" . urlencode($linha['senha']) . "'>Alterar</a>";
            echo "<td> <a id='link_red' href='paginadeletar.php?id=" . $linha['id_user'] . "&email=" . urlencode($linha['email']) . "&senha=" . urlencode($linha['senha']) .  "'>Deletar</a> ";
            echo "</td>";
            
            
            echo "</tr>";
        }
        
         echo "</table>";
        } else {
         echo "<p>Nenhum usuario encontrado.</p>";
        }


        mysqli_free_result($dados);
        mysqli_close($conexao);
        echo "</div>";
 ?>
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
</html>



