<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do líder da equipe
    $bairro = $_POST['bairro'] ?? '';
    $contato = $_POST['contato'] ?? '';
    $nomeEquipe = $_POST['nome-equipe'] ?? '';

    // Dados dos jogadores
    $jogadores = array();
    for ($i = 1; $i <= 6; $i++) {
        $nomeKey = 'nome' . $i;
        $idadeKey = 'idade' . $i;
        $nicknameKey = 'nickname' . $i;

        if (isset($_POST[$nomeKey]) && isset($_POST[$idadeKey]) && isset($_POST[$nicknameKey])) {
            $jogador = array(
                'nome' => $_POST[$nomeKey],
                'idade' => $_POST[$idadeKey],
                'nickname' => $_POST[$nicknameKey]
            );
            $jogadores[] = $jogador;
        }
    }

    // Exibindo os dados recebidos (apenas para teste)
    echo "<h1>Dados Recebidos:</h1>";
    echo "<h2>Informações do Líder da Equipe</h2>";
    echo "<p>Bairro representante: $bairro</p>";
    echo "<p>Número do Contato do Representante: $contato</p>";
    echo "<p>Nome da Equipe: $nomeEquipe</p>";

    echo "<h2>Informações dos Jogadores</h2>";
    foreach ($jogadores as $index => $jogador) {
        $numJogador = $index + 1;
        echo "<h3>Jogador $numJogador</h3>";
        echo "<p>Nome: {$jogador['nome']}</p>";
        echo "<p>Idade: {$jogador['idade']}</p>";
        echo "<p>Nickname: {$jogador['nickname']}</p>";
        echo "<hr>";
    }

    // Aqui você pode adicionar código para salvar os dados em um banco de dados, enviar por e-mail, etc.
} else {
    // Se o método de requisição não for POST, redireciona para o formulário
    header("Location: index.html");
    exit();
}
?>
