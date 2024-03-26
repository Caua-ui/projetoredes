<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Editar Contato</title>
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
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #333; 
        z-index: 1000; 
    }

    .container {
        width: 80%;
        margin: 0 auto; /* Centraliza o conteúdo horizontalmente */
    }

    .form-content {
        margin-bottom: 20px;
    }

    .form-content label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-content input[type="text"],
    .form-content input[type="email"],
    .form-content input[type="tel"],
    .form-content input[type="date"] {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .form-content input[type="radio"] {
        width: auto;
        display: inline-block;
        margin-right: 10px;
    }

    .button-container {
        text-align: center; /* Centraliza o conteúdo horizontalmente */
    }

    .button-container button {
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<body>

<nav class="nav">
    <ul>
        <li><a href="index.html">Página inicial</a></li>
        <li><a href="registos.php">Registar Contactos</a></li>
        <li><a href="lista.php">Lista de Contatos</a></li>
    </ul>
</nav>

<br><br>

<div class="container">
    <section class="header">
        <h2>Editar Contato</h2>
    </section>

    <br>

    <?php
session_start();

$contact = [
    'username' => '',
    'email' => '',
    'number' => '',
    'address' => '',
    'locality' => '',
    'postalcode' => '',
    'sexo' => '',
    'date' => ''
];


// Verifica se o ID do contato foi passado na URL
if (isset($_POST['id'])) {
    // Obtém o ID do contato da URL
    $id = $_POST['id'];

    // Verifica se o contato com o ID fornecido existe na sessão
    if (isset($_SESSION['contacts'][$id])) {
        // Obtém os detalhes do contato com base no ID
        $contact = $_SESSION['contacts'][$id];
        // Agora você pode usar os detalhes do contato para preencher o formulário de edição
    } else {
        // Se o contato com o ID fornecido não existir na sessão, exiba uma mensagem de erro
        echo "<p>O contato não existe.</p>";
    }
} else {
    // Se o ID do contato não foi fornecido na URL, exiba uma mensagem de erro
    echo "<p>O ID do contato não foi fornecido.</p>";
}
?>

    
<form id="contactForm" action="update_contact.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">

        <div class="form-content">
            <label for="username">Nome e Sobrenome</label>
            <input type="text" id="username" name="username" value="<?php echo $contact['username']; ?>" required>
        </div>

        <div class="form-content">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $contact['email']; ?>" required>
        </div>

        <div class="form-content">
            <label for="number">Número de telefone</label>
            <input type="tel" id="number" name="number"  value="<?php echo $contact['number']; ?>" required>
        </div>

        <br>

        <div class="form-content">
            <label for="address">Endereço</label>
            <input type="text" id="address" name="address" value="<?php echo $contact['address']; ?>" required>
        </div>

        <br>

        <div class="form-content">
            <label for="locality">Localidade</label>
            <input type="text" id="locality" name="locality" value="<?php echo $contact['locality']; ?>" required>
        </div>

        <br>

        <div class="form-content">
            <label for="postalcode">Código Postal</label>
            <input type="text" id="postalcode" name="postalcode" value="<?php echo $contact['postalcode']; ?>" required>
        </div>

        <br>

        <div class="form-content">
            <label>Sexo</label>
            <input type="radio" id="masculino" name="sexo" value="masculino" required>
            <label for="masculino">Masculino</label>

            <input type="radio" id="feminino" name="sexo" value="feminino" required>
            <label for="feminino">Feminino</label>
        </div>

        <br>

        <div class="form-content">
            <label for="date">Data de Nascimento</label>
            <input type="date" id="date" name="date" value="<?php echo $contact['date']; ?>" required>
        </

        
        <div class="button-container">
            <button type="submit">Salvar Alterações</
