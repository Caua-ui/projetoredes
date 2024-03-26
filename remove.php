<?php
session_start();

// Verifica se o ID do contato foi fornecido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Obtém o ID do contato a ser removido
    $id = $_POST['id'];

    // Verifica se o contato com o ID fornecido existe na sessão
    if (isset($_SESSION['contacts'][$id])) {
        // Remove o contato da sessão
        unset($_SESSION['contacts'][$id]);
        // Redireciona de volta para a página de lista de contatos
        header("Location: lista.php");
        exit();
    } else {
        // Se o contato não existe, exibe uma mensagem de erro
        echo "Contato não encontrado.";
    }
} else {
    // Se o ID do contato não foi fornecido via POST, exibe uma mensagem de erro
    echo "ID do contato não fornecido.";
}
?>
