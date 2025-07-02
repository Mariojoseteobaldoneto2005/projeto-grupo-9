<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/compras.css">
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
    <!-- Area do evento-->
    <div id="center_column">
        <div id="event_info" class="text-center">
            <div>

                <?php
                include_once('conexao.php');

                $nome = filter_input (INPUT_GET,'nome', FILTER_DEFAULT);
                $nome = strip_tags($nome);
                $nome = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');

                $data = filter_input (INPUT_GET,'data', FILTER_DEFAULT);
                $data = strip_tags($data);
                $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

                $preco = filter_input (INPUT_GET,'preco', FILTER_DEFAULT);
                $preco = strip_tags($preco);
                $preco = htmlspecialchars($preco, ENT_QUOTES, 'UTF-8');

                echo "<img id='image' src='imagens/rock_n_row.jpeg'>";

                echo "<h3 id='date_event'> Data:". $data. "</h3>";
                echo "<h3 id='time_event'> Valor:" . $preco . "</h3>";

                echo "</div>";

                echo "<div>";

                echo "<h2 id='title_event' class='fw-bold my-3'>" . $nome . "</h2>";

                echo "<p id='description_event'>" . $nome . "</p>";
                ?>
                </div>
                </div>

                <hr>
            <a href="#" id="button_event">Inscreva-se</a>
            <hr>
            <?php
            echo '<div id="event_dados">';
            echo  '<h3 id="title_event">'. $nome.'</h3>';
            echo  '<p id="event_info_description"> '. $nome.'</p>';
            echo  '<br>';

            echo '</div>';
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>