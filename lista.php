<?php
session_start();

// Verifica se os dados do formulário foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios foram preenchidos
    if (isset($_POST['username'], $_POST['email'], $_POST['number'], $_POST['address'], $_POST['locality'], $_POST['postalcode'], $_POST['sexo'], $_POST['date'])) {
        // Obtém os dados do formulário
        $username = $_POST['username'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $locality = $_POST['locality'];
        $postalcode = $_POST['postalcode'];
        $sexo = $_POST['sexo'];
        $date = $_POST['date'];

        // Cria um novo contato com os dados do formulário
        $contact = [
            'username' => $username,
            'email' => $email,
            'number' => $number,
            'address' => $address,
            'locality' => $locality,
            'postalcode' => $postalcode,
            'sexo' => $sexo,
            'date' => $date,
        ];

        // Inicializa ou obtém a lista de contatos da sessão
        if (!isset($_SESSION['contacts'])) {
            $_SESSION['contacts'] = [];
        }

        // Adiciona o novo contato à lista de contatos da sessão
        $_SESSION['contacts'][] = $contact;

        // Redireciona de volta para a página de adição de contatos
        header("Location: lista.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Lista de Contatos</title>
</head>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        width: 100%;
        min-height: 100vh;
        padding-top: 50px; /* Adiciona um espaço para a barra de navegação */
    }

    .nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #333; 
        z-index: 1000; 
    }

    #contactsList {
        margin-top: -300px;
        margin-left: -990px;
        padding: 0 20px;
    }

    #contactsList h3 {
        margin-bottom: 10px;
        color: white;
    }

    .contact {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        background-color: white; /* Adiciona cor de fundo branco */
    }

    .contact a {
        text-decoration: none;
        color: black; /* Altera a cor do texto */
    }

    .contact button {
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
    }

    .contact button:hover {
        background-color: #0056b3;
    }
</style>

<body>

<nav class="nav">
    <ul>
        <li><a href="index.html">Página inicial</a></li>
        <li><a href="registos.php">Registar Contactos</a></li>
    </ul>
</nav>

<br><br>

<div id="contactsList">
    <h3>Contatos</h3>
    <?php
    // Verifica se há contatos na sessão
    if (isset($_SESSION['contacts']) && !empty($_SESSION['contacts'])) {
        // Exibe os contatos
        foreach ($_SESSION['contacts'] as $key => $contact) {
            // Exibe os detalhes de cada contato
            echo "<div class='contact'>";
            echo "<a href='details.php?id=$key'>{$contact['username']}</a>";
            echo "<button onclick=\"location.href='details.php?id=$key'\">Ver Contato</button>";
            echo "</div>";
        }
    } else {
        // Exibe uma mensagem se não houver contatos na sessão
        echo "<p>Nenhum contato foi adicionado ainda.</p>";
    }
    ?>
</div>

</body>
</html>
