<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
    $nome = $_GET["nome"];
    
    ?>
    <main>
        <div>
            <form action="pesquisa3.php" method="get" >
                <h1><?php echo "Olá $nome  "?></h1>
                <input type="hidden" name="nome" id="nome" value="<?php echo $nome ?>" >
                <label for="cep">CEP</label>
                <input type="number" class="escrever" name="cep" id="cep" pattern="\d{8}" required>
                <a href="pesquisa.php" class="botao">Voltar</a>
                <input type="submit" class="botao" name="" id="">
            </form>
        </div>
    </main>
</body>
</html>