<?php
session_start();
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
        include_once("conexao.php");
        $nome = filter_input(INPUT_POST , "nome", FILTER_DEFAULT);
        $nome = strip_tags($nome);
        $nome =htmlspecialchars($nome ,ENT_QUOTES,"utf-8");

        $data = filter_input(INPUT_POST,"data",FILTER_DEFAULT);
        $data = strip_tags($data);
        $data = htmlspecialchars($data , ENT_QUOTES , "utf-8");
 
        $nomema = filter_input(INPUT_POST, "nomema",FILTER_DEFAULT);
        $nomema = strip_tags($nomema);
        $nomema = htmlspecialchars($nomema,ENT_QUOTES,"utf-8");

        $cpf = filter_input(INPUT_POST,"cpf",FILTER_DEFAULT);
        $cpf = strip_tags($cpf);
        $cpf = htmlspecialchars($cpf , ENT_QUOTES , "utf-8");
        $cpfHash = password_hash($cpf, PASSWORD_BCRYPT);

        $telefone = filter_input(INPUT_POST , "telefone", FILTER_DEFAULT);
        $telefone = strip_tags($telefone);
        $telefone = htmlspecialchars($telefone ,ENT_QUOTES,"utf-8");

        $telefonefi = filter_input(INPUT_POST , "telefonefi", FILTER_DEFAULT);
        $telefonefi = filter_input(INPUT_POST , "telefonefi", FILTER_DEFAULT);
        $telefonefi = htmlspecialchars($telefonefi , ENT_QUOTES , "utf-8");
        $a = filter_input(INPUT_POST , "a" , FILTER_DEFAULT);
        $a = strip_tags($a);
        $a = htmlspecialchars($a , ENT_QUOTES , "utf-8");
        $login = filter_input(INPUT_POST , "login", FILTER_DEFAULT);
        $login = strip_tags($login);
        $login = htmlspecialchars($login , ENT_QUOTES , "utf-8");

        $senha = filter_input(INPUT_POST , "senha", FILTER_DEFAULT);
        $senha = strip_tags($senha);
        $senha = htmlspecialchars($senha ,ENT_QUOTES, "utf-8");
        $senhahash = password_hash($senha, PASSWORD_BCRYPT);

        $senhaconfi = filter_input(INPUT_POST, "senhaconfi",FILTER_DEFAULT);
        $senhaconfi = strip_tags($senhaconfi);
        $senhaconfi = htmlspecialchars($senhaconfi , ENT_QUOTES, "utf-8");
        
        $cep_endereço = filter_input(INPUT_POST , "cep_endereço",FILTER_DEFAULT);
        $cep_endereço = strip_tags($cep_endereço);
        $cep_endereço = htmlspecialchars($cep_endereço , ENT_QUOTES , "utf-8");
        
        
        $sexo = filter_input(INPUT_POST,"sexo");
        $sexo = strip_tags($sexo);
        $sexo = htmlspecialchars($sexo,ENT_QUOTES,"utf-8");


        //var_dump($nome,$data,$nomema,$cpf,$telefone,$telefonefi,$a,$login,$senha,$senhaconfi,$cep_endereço,$sexo);
        $comando = "INSERT into cliente values 
        (null,'$data','$nome','$sexo',
        '$nomema','$telefonefi','$telefone',
        '$cpfHash',
        '$a','$login',
        '$senhahash','$cep_endereço', 
         'comum')";
       $result = mysqli_query($conexao , $comando);
       if($result){
        header("Location:index.php");
       }
 
        
        mysqli_close($conexao); // Fecha a consulta
    }
class cliente {
    public $email;
    public $senha;
}
        ?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
=    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="javascript/cadastro.js"></script>
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
        <form action="" method="post" id="formulario" onsubmit="return valida()">
 <div id="flex-diretion">
           
    <h1>Convites<span style="color: #1b8f21;">web</span></h1>
    
    <div class="input-grid">
        <div class="input-box">
            <label for="email"></label>
            <input type="text" name="nome" id="nome"  placeholder="Nome completo" max="80" maxlength="80">
            
        </div>

        <div class="input-box">
            <label for="data"></label>
            <input type="date" class="inputs" name="data" id="data"  placeholder="Data de nascimento" >
            
        </div>

        <div class="input-box">
            <label for="nomema"></label>
            <input type="text" class="inputs"  name="nomema" id="nomema"  placeholder="Nome Materno" >
            
        </div>

        <div class="input-box">
            <label for="cpf"></label>
            <input type="text" name="cpf" class="inputs"  id="cpf"  placeholder="CPF"  maxlength="14"  minlength="14" min="14" max="14" onkeyup="mascaraCpf()">

        </div>

        <div class="input-box">
            <label for="telefone"></label>
            <input type="text" name="telefone" class="inputs"  id="telefone"  placeholder="telefone celular" maxlength="16"  minlength="16" min="16" max="16" onkeydown="return mascaraTelefone(event)">
        </div>
        <div class="input-box">
            <label for="telefonefi"></label>
            <input type="text" name="telefonefi" class="inputs"  id="telefonefi"  placeholder="Telefone fixo"  maxlength="16"  minlength="16" min="16" max="16" onkeydown="return mascaraTelefone(event)">
        </div>

        <div class="input-box">
            <label for="endereço"></label>
            <input type="text" name="a" class="inputs"  id="endereço"  placeholder="Endereço" >
        </div>

        <div class="input-box">
            <label for="login"></label>
            <input type="text" name="login" class="inputs"  id="login"  placeholder="Login" maxlength="50" >
        </div>

        <div class="input-box">   
             <label for="senha"></label>
             <input type="password" name="senha" class="inputs"  id="senha" placeholder="Senha" >
            </div>

        <div class="input-box">   
            <label for="senhaconfi"></label>
            <input type="password" name="senhaconfi" class="inputs"  id="senhaconfi" placeholder="Confirmar Senha" >
        </div>
        <div class="input-box">   
            <label for="cep"></label>
            <input type="text" name="cep_endereço" class="inputs"  id="cep" maxlength="9" min="9" max="9" minlength="9" placeholder="Digite seu CEP" onkeyup="return mascaracep()">
        </div>
        </div>

        <div class="input-box">   
            <select name="sexo" id="sexo">
                <option value="gen" disabled selected>Gênero</option>
                <option  value="Masculino">Masculino</option>
                <option  value="Feminino">Feminino</option>
            </select>
        </div>
        <div id="aviso"></div>
        </div>
       <button type="submit" class="btn">Cadastrar</button><p></p>
       <button type="reset" class="btn">Limpar</button><p></p>
       <div class="register-link">
        <p>Já possui conta? <a href="login.php">Entrar</a></p>
    </div>
 </div>
        </form>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </html>