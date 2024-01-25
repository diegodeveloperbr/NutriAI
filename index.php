<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistema de Inventário</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa;
    }
    #loginBemvindos, #bola{
      color:red;
      font-style:italic;
      
  
    }
    #bola{


    }


    .card {
      width: 350px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="card">
  <h2 class="text-center mb-4">Login</h2>

  <h5 id="loginBemvindos"></h5> 
  <div id="bola"> </div>
  
  <form id="loginForm">
    <div class="mb-3">
      <label for="username" class="form-label">Usuário</label>
      <input type="text" class="form-control" id="username" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Senha</label>
      <input type="password" class="form-control" id="password" required>
    </div>
    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary btn-block">Entrar</button>
    </div>
  </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Obter os valores do formulário
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Criar objeto de dados para enviar para a API
    const data = {
      nome_usuario: username,
      senha: password
    };

    // Enviar solicitação POST para a API
    fetch('app/Views/auth/Login.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
      if (data.data) {
        // Redirecionar ou executar ação após o login bem-sucedido
        // Por exemplo, redirecionar para outra página
        window.location.href = 'dashboard.php';
      } else {
        // Exibir mensagem de erro
      //  alert('Erro ao fazer login. Verifique suas credenciais.');
     

      //alterou a h5 para por a mensagem de erro de login com o dom 
       var elemento = document.getElementById('loginBemvindos');
        elemento.innerHTML = "Login ou senha incorreto!";
      }        


    })
    .catch(error => {
      console.error('Erro:', error);
    });
  });
 
 


</script>
</body>
</html>

