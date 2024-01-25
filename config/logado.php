
<?php
// Inicia a sessão
session_start();

// Verifica se a sessão do usuário está definida
if (!isset($_SESSION['user_id'])) {
    // Se não estiver, redirecione para a página de login
    header('Location: index.php');
    exit();
}

// O restante do código da página logada continua aqui
?>