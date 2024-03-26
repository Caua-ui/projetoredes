<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes Contactos</title>
</head>

<style>
    *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Verdana;
}

body{
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    width: 100%;
    min-height: 100vh;
}

.nav {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #333; 
        z-index: 1000; 
    }

</style>

<body>

<nav class="nav">
    <ul>
        <li><a href="index.html">Página inicial</a></li>
        <li><a href="lista.php">Lista de Contactos</a></li>
        <li><a href="registos.php">Registar Contactos</a></li>
    </ul>
</nav>
<br><br><br><br>

<?php
session_start();

// Verifica se um ID de contato foi fornecido na URL
if (isset($_GET['id']) && isset($_SESSION['contacts'][$_GET['id']])) {
    // Obtém os detalhes do contato com base no ID fornecido na URL
    $contact = $_SESSION['contacts'][$_GET['id']];

    // Exibe todos os detalhes do contato
    echo "<h2>Detalhes do Contato</h2>"; 
    echo "<br>";
    echo "<p><strong>Nome:</strong> {$contact['username']}</p>";
    echo "<br>";
    echo "<p><strong>Email:</strong> {$contact['email']}</p>";
    echo "<br>";
    echo "<p><strong>Número de Telefone:</strong> {$contact['number']}</p>";
    echo "<br>";
    echo "<p><strong>Endereço:</strong> {$contact['address']}</p>";
    echo "<br>";
    echo "<p><strong>Localidade:</strong> {$contact['locality']}</p>";
    echo "<br>";
    echo "<p><strong>Código Postal:</strong> {$contact['postalcode']}</p>";
    echo "<br>";
    echo "<p><strong>Sexo:</strong> {$contact['sexo']}</p>";
    echo "<br>";
    echo "<p><strong>Data de Nascimento:</strong> {$contact['date']}</p>";

    echo "<form action='remove.php' method='post'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<button type='submit'>Remover Contato</button>";
    echo "</form>";

    echo "<form action='editar.php' method='post'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<button type='submit'>Editar Contato</button>";
    echo "</form>";
} else {
    // Exibe uma mensagem de erro se o ID do contato não for fornecido ou se o contato não existir
    echo "<p>O contato não existe ou o ID não foi fornecido.</p>";
} 
?>

</body>
</html>