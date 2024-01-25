<?php
header('Content-Type: application/json');

include("../../../config/Database.php");
include("../../../app/Models/Usuario.php"); // Supondo que o arquivo de modelo do usuário está dentro de uma pasta models

// Conectando ao banco de dados
$database = new Database();
$db = $database->connect();

// Instanciando o objeto do usuário
$usuario = new Usuario($db);

// Obter dados da solicitação POST
$data = json_decode(file_get_contents('php://input'));

// Atribuir os valores do usuário
$usuario->nome_usuario = $data->nome_usuario;
$usuario->senha = $data->senha;

// Tentativa de login
$result = $usuario->login();

// Verificar se o login foi bem-sucedido
$num = $result->rowCount();
if ($num > 0) {
    $usuario_arr = array();
    $usuario_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $usuario_item = array(
            'id' => $id,
            'nome_usuario' => $nome_usuario
        );

        array_push($usuario_arr['data'], $usuario_item);
    }

    echo json_encode($usuario_arr); 

    





} else {
    // Em caso de falha no login
    http_response_code(401); // Indica um erro não autorizado
    echo json_encode(array('message' => 'Erro ao autenticar.'));
}
?>