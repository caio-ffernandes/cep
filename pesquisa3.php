<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pesquisa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
$nome = $_GET["nome"];
$cep = $_GET["cep"];

if (strlen($cep) !== 8 || !ctype_digit($cep)) {
    echo "
        <main>
            <form>
                <div>Por favor, insira um CEP válido com 8 dígitos numéricos.</div>
                <div><a href='pesquisa.php' class='botao'>Voltar</a></div>
            </form>
        </main>";
} else {
    $viacep = "https://viacep.com.br/ws/$cep/json/";
    $informacoes = file_get_contents($viacep);
    $endereco = json_decode($informacoes, true);

    if (isset($endereco['erro'])) {
        echo "
        <main>
            <form>
                <div>O CEP informado não é válido.</div>
                <div><a href='pesquisa.php' class='botao'>Voltar</a></div>
            </form>
        </main>";
    } else {
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        $hora = date('H:i');

        echo "
        <main>
            <div>
                <form>
                    <div><h1>Olá $nome</h1></div>
                    <div>
                        <p>CEP: {$endereco['cep']}</p>
                        <p>Bairro: {$endereco['bairro']}</p>
                        <p>Cidade: {$endereco['localidade']}</p>
                        <p>Estado: {$endereco['uf']}</p>
                    </div>
                    <div><p>Hoje é $data $hora</p></div>
                    <a href='pesquisa.php' class='botao'>Voltar</a>
                </form>
            </div>
        </main>";
    }
}
?>

   
    
</body>
</html>