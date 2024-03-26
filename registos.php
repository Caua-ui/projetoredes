<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <script src="script.js"></script>
    <title>Sistema de Gestão de Contactos</title>
</head>
<body>

<nav class="nav">
    <ul>
        <li><a href="index.html">Página inicial</a></li>
        <li><a href="lista.php">Lista de Contactos</a></li>
        <li><a href="editar.php">Editar Contactos</a></li>
    </ul>
</nav>

<div class="container">
    <section class="header">
        <h2>Adicionar Contato</h2>
    </section>

    <br><br>

    <form id="contactForm" action="lista.php" method="post">

        <div class="form-content">
            <label for="username">Nome e Sobrenome</label>
            <input type="text" id="username" name="username" placeholder="Digite o seu nome e sobrenome..." required>
        </div>

        <br>

        <div class="form-content">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Digite o seu email..." required>
        </div>

        <br>

        <div class="form-content">
            <label for="number">Número de telefone</label>
            <input type="tel" id="number" name="number" placeholder="Digite o seu nº de telefone..." required>
        </div>

        <br>

        <div class="form-content">
            <label for="address">Endereço</label>
            <input type="text" id="address" name="address" placeholder="Digite o seu endereço..." required>
        </div>

        <br>

        <div class="form-content">
            <label for="locality">Localidade</label>
            <input type="text" id="locality" name="locality" placeholder="Digite a sua localidade..." required>
        </div>

        <br>

        <div class="form-content">
            <label for="postalcode">Código Postal</label>
            <input type="text" id="postalcode" name="postalcode" placeholder="Digite o Código Postal..." required>
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
            <input type="date" id="date" name="date" required>
        </div>

        <br>

        <section class="footer"> 
            <div class="button">
                <button type="submit" value="Guardar">Guardar</button>
            </div>
        </section>

    </form>
</div>

<script src="script.js"></script>

</body>
</html>
