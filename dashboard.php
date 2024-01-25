

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>NutriAi+</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilos adicionais */
    .fixed-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      border-radius: 50%;
      width: 60px; /* Aumentando a largura */
      height: 60px; /* Aumentando a altura */
      background-color: #007bff; /* Cor de fundo do botão */
      color: white; /* Cor do texto ou ícone */
      border: none;
      outline: none;
      cursor: pointer;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.5em; /* Aumentando o tamanho do texto */
    }
      h1 {
        text-align: center;
        display: block;
        margin: 0 auto;

    }
    .fixed-button:hover {
      background-color: #0056b3; /* Cor de fundo do botão ao passar o mouse */
    }
      /* Estilos adicionais */
      .file-input-container {
      position: relative;
      width: fit-content;
    }
    #imagem{
      border: 1px;
    }
    .file-input-button {
      position: absolute;
      top: 0;
      right: 0;
      height: 100%;
      padding: 5px 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
    }
    .file-input {
      padding-right: 40px; /* Para acomodar o botão dentro do campo */
    }
   

  </style>
</head>
<body>

  <!-- Conteúdo da página -->
  <h1>NutriAI </h1>
<br>
  <div class="container mt-4">
  <h1>Cliente/Pacientes</h1>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Imagem</th>
        <th>TMB</th>
        <th>CPO</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <!-- Aqui é onde cada linha do inventário será adicionada dinamicamente -->
      <tr>
        <td>1</td>
        <td><a  href="#" data-bs-toggle="modal" data-bs-target="#imagemModal" data-imagem="assets/img/IMG_5197.jpg">
    <img id="imagem" src="assets/img/images.jpeg" alt="Imagem do Produto A" width="50">
  </a></td>
        <td>2600</td>
        <td>2800</td>
        <td>
          <!-- Botões de editar e excluir -->
          <button class="btn btn-primary btn-sm">Editar</button>
          <button class="btn btn-danger btn-sm">Excluir</button>
        </td>
      </tr>
      <!-- Pode adicionar mais linhas conforme necessário -->
    </tbody>
  </table>
</div>
  <!-- Botão redondo -->
  <button class="fixed-button" data-bs-toggle="tooltip" data-bs-placement="left" title="Adicionar">
    +
  </button>

  <!-- modal -->
<div class="modal fade" id="imagemModal" tabindex="-1" aria-labelledby="imagemModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imagemModalLabel">Imagem Ampliada</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="assets/img/IMG_5197.jpg" alt="Imagem Ampliada" id="imagemAmpliada" class="img-fluid">
      </div>
    </div>
  </div>
</div>
<!-- final modal -->
<!--  modal Cadastro  -->

<!-- Modal para adicionar produto -->
<div class="modal fade" id="adicionarProdutoModal" tabindex="-1" aria-labelledby="adicionarProdutoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adicionarProdutoModalLabel">Adicionar Paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulário para adicionar produto -->
        <form id="formAdicionarProduto">
          <div class="mb-3">
            <label for="nomeProduto" class="form-label">Nome do Paciete</label>
            <input type="text" class="form-control" id="nomeProduto" required>
          </div>
          <div class="mb-3">
            <label for="quantidadeProduto" class="form-label">Idade</label>
            <input type="number" class="form-control" id="quantidadeProduto" required>
          </div>
          <div class="mb-3">
            <label for="#" class="form-label">Peso</label>
            <input type="number" class="form-control" id="quantidadeProduto" required>
          </div>
          <div class="mb-3">
            <label for="quantidadeProduto" class="form-label">Altura</label>
            <input type="number" class="form-control" id="quantidadeProduto" required>
          </div>
          <br>
          <select class="form-select" aria-label="Default select example">
  <option selected>Genero</option>
  <option value="1">Homem</option>
  <option value="2">Mulher</option>
</select>
          
<div class="container mt-4">
  <div class="mb-3 file-input-container">
    <input type="text" class="form-control file-input" id="fileInput" placeholder="Selecione um arquivo..." readonly>
    <button class="file-input-button" onclick="document.getElementById('file').click()">Buscar</button>
    <input type="file" id="file" style="display: none;">
  </div>
</div>

          <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
      </div>
    </div>
  </div>
</div>




<button class="fixed-button" data-bs-toggle="modal" data-bs-target="#adicionarProdutoModal" data-bs-toggle="tooltip" data-bs-placement="left" title="Adicionar">
  +
</button>


<script>
  // Atualiza a imagem no modal quando o link for clicado
  document.querySelectorAll('[data-bs-toggle="modal"]').forEach(link => {
    link.addEventListener('click', function() {
      const imagemCaminho = this.getAttribute('data-imagem');
      document.getElementById('imagemAmpliada').src = imagemCaminho;
    });
  });
</script>


  <!-- Bootstrap JS (opcional, necessário para funcionalidades como tooltip) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
