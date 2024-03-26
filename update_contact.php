<?php
session_start();

// Verifica se os dados do formulário foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos obrigatórios foram preenchidos
    if (isset($_POST['id'], $_POST['username'], $_POST['email'], $_POST['number'], $_POST['address'], $_POST['locality'], $_POST['postalcode'], $_POST['sexo'], $_POST['date'])) {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $locality = $_POST['locality'];
        $postalcode = $_POST['postalcode'];
        $sexo = $_POST['sexo'];
        $date = $_POST['date'];

        // Verifica se o contato com o ID fornecido existe na sessão
        if (isset($_SESSION['contacts'][$id])) {
            // Atualiza os dados do contato na sessão
            $_SESSION['contacts'][$id]['username'] = $username;
            $_SESSION['contacts'][$id]['email'] = $email;
            $_SESSION['contacts'][$id]['number'] = $number;
            $_SESSION['contacts'][$id]['address'] = $address;
            $_SESSION['contacts'][$id]['locality'] = $locality;
            $_SESSION['contacts'][$id]['postalcode'] = $postalcode;
            $_SESSION['contacts'][$id]['sexo'] = $sexo;
            $_SESSION['contacts'][$id]['date'] = $date;

            // Redireciona para a página de detalhes do contato com os dados atualizados
            header("Location: details.php?id=$id");
            exit(); // Certifique-se de adicionar esta linha para interromper a execução do script após o redirecionamento
        } else {
            // Se o contato com o ID fornecido não existir, exibe uma mensagem de erro
            echo "O contato com o ID fornecido não existe na sessão.";
        }
    } else {
        // Se algum campo obrigatório estiver faltando, exibe uma mensagem de erro
        echo "Todos os campos obrigatórios devem ser preenchidos.";
    }
}
?>
