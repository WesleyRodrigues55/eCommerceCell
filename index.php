<?php
    include("Security/conexaoBanco.php");
    include("Security/nivelAcesso.php");
    permissaoGeral();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <!-- css -->
    <link rel="stylesheet" href="css/styleNavegacao.css">
    <link rel="stylesheet" href="css/styleIndex.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
</head>
<body class="body">
    <!-- navegação do site -->
    <div class="container-fluid d-flex align-items-center justify-content-center user">
        <!-- recebendo dados do logiun do usuario -->
        <!-- <p style="color: white; font-size: 25px; margin: 0 20px"></p> -->
        <!-- botões de ações do usuário -->
        <!-- botão logout -->
        <a href="Security/logout.php"><button class="btn btn-warning" style="margin: 0 20px">
            <svg xmlns="http://www.w3.org/2000/svg" style="color: white" width="19" height="19" style="margin: 0 5px;" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
            </svg>Logout</button>
        </a>
    </div>
    <nav class="navbar navbar-expand-lg sticky-top nav">
        <h1 class="navbar-brand logo">LOGO</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" style="color: white" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown"> 
            <ul class="ml-auto p-2 d-flex justify-content-between items">
                <a href="index.php"><li class="items-nav">Home</li></a>
                <a href="#"><li class="items-nav">Celulares</li></a>
                <a href="#"><li class="items-nav">Sobre</li></a>
            </ul>
        </div>
    </nav>
    <div class="categorizando">
        <ul>
            <li>Mais vendidos</li>
            <li>Categorias</li>
            <li>Preço baixo</li>
            <li>Preço alto</li>
            <li>Qualidade</li>
            <li>Todos os produtos</li>
        </ul>
    </div>

    <div class="" style="margin: 5px;">
        <?php libera();liberaU()?>
    </div>

    <!-- <div class="">
        <//?php include("PHP/carrossel.php"); ?>
    </div> -->
    
    <!-- para pesquisa ajax -->
    <script type="text/javascript" src="Javascript/AJAX.js"></script>
        <div class="container" id="Container">
            <h1>Pesquisa de Produtos utilizando AJAX</h1>
            <hr/>
            <h2>Pesquisar Produtos:</h2>
            <div id="Pesquisar">
                Infome o nome:
                <input class="form-control" type="text" name="descricao" id="descricao"/>
                <input type="button" class="btn btn-info" name="btnPesquisar" value="Pesquisar" onclick="getDados();"/>
                <a href="index.php">limpar pesquisa</a>
            </div>
            <hr/>
            <div id="Resultado">

            </div>
        </div>

    <!-- dados php para produtos -->
    <?php 
        $conRecebePesquisaProduto = @mysqli_query($conexao, "SELECT * FROM produto");
    ?>
    <section class="content-list container-fluid" style="width: 98%;">
        <h1 class="best">Melhores no mercado</h1>
        <div class="row">
            <?php while($dado = $conRecebePesquisaProduto->fetch_array()) { ?>
                <div class="col-md-2 content-start">
                    <div class=" bg-light box-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-img">
                                    <h1 style="display: none"><?php echo $dado['ID'];?></h1>
                                    <img src="IMG/imgProduto/<?php echo $dado['IMG'];?>">
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="content-info">
                                    <h4>R$ <?php echo $dado['PRECO'];?></h4>
                                    <p><?php echo $dado['DESCRICAO'];?></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="content-button">
                                        <a href="PHP/produtoClicado.php?idProduto=<?php echo $dado['ID']; ?>">
                                            <button class="btn btn-block btn-info">
                                                Visualizar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fim row -->
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- fim row -->
    </section>

    
    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>