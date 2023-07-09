<?php
session_start();
include("../models/conexao.php");

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
  header('Location: ./login.php');
  exit;
}

include("./blades/header.php");

// Função para obter as mensagens de um atendimento específico
function getChatMessages($idAtendimento, $conn)
{
  // TODO: Substituir "sup_chat_messages" pelo nome da tabela de mensagens
  $query = "SELECT * FROM sup_chat_messages WHERE id_atendimento = ? ORDER BY datahora ASC";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $idAtendimento);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result->fetch_all(MYSQLI_ASSOC);
}

// Função para obter o nome do usuário com base no ID
function getUserName($userId, $conn)
{
  // TODO: Substituir "clients" pelo nome correto da tabela de clientes
  $query = "SELECT nome FROM clients WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $userId);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  return $row['nome'];
}

// Função para inserir uma nova mensagem no banco de dados
function insertChatMessage($idAtendimento, $sender, $message, $conn)
{
  // TODO: Substituir "sup_chat_messages" pelo nome da tabela de mensagens
  $query = "INSERT INTO sup_chat_messages (id_atendimento, sender, mensagem) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('iss', $idAtendimento, $sender, $message);
  $stmt->execute();
}

// Função para criar um novo atendimento e retornar o ID
function createNewAtendimento($user_id, $conn)
{
  // TODO: Substituir "sup_chat" pelo nome da tabela de atendimentos
  $query = "INSERT INTO sup_chat (id_user) VALUES (?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  return $conn->insert_id;
}

// Verificar se há uma ID de atendimento na URL
if (isset($_GET['id_atendimento'])) {
  $idAtendimento = $_GET['id_atendimento'];

  // Verificar se o usuário tem permissão para acessar esse atendimento
  // TODO: Verificar a permissão do usuário com base no $user_id e na tabela sup_chat

  // Obter as mensagens do atendimento
  $chatMessages = getChatMessages($idAtendimento, $conn);

  // Processar o envio de uma nova mensagem
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message'])) {
      $message = $_POST['message'];

      // Verificar se a mensagem não está vazia
      if (!empty($message)) {
        // Inserir a nova mensagem no banco de dados
        // O sender será "usuario", pois o usuário está enviando a mensagem
        insertChatMessage($idAtendimento, "usuario", $message, $conn);

        // Redirecionar para a mesma página para evitar reenvio do formulário
        header("Location: atendimento.php?id_atendimento=$idAtendimento");
        exit;
      }
    }
  }
} else {
  // Criar um novo atendimento
  $idAtendimento = createNewAtendimento($user_id, $conn);

  // Redirecionar para a mesma página com o novo ID de atendimento
  header("Location: atendimento.php?id_atendimento=$idAtendimento");
  exit;
}
?>

<!-- CSS do chat -->
<style>
  .chat-box {
    background-color: #f5f5f5;
    border-radius: 5px;
    padding: 15px;
    min-height: 400px;
    overflow-y: auto;
  }

  .message {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
  }

  .usuario .message {
    background-color: #eaf5ff;
    color: #000;
    text-align: right;
  }

  .suporte .message {
    background-color: #fff;
    color: #000;
    text-align: left;
  }

  .message-header {
    font-weight: bold;
    margin-bottom: 5px;
  }

  .message-content {
    margin-bottom: 3px;
  }

  .message-time {
    font-size: 12px;
    color: #999;
  }

  .chat-input {
    margin-top: 15px;
    position: sticky;
    bottom: 0;
    background-color: #fff;
    padding: 10px;
    border-top: 1px solid #ccc;
  }
</style>

<!-- HTML do chat -->
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="chat-box">
        <?php foreach ($chatMessages as $message) : ?>
          <div class="message <?php echo $message['sender']; ?>">
            <div class="message-header">
              <?php
              if ($message['sender'] === 'usuario') {
                echo getUserName($user_id, $conn);
              } elseif ($message['sender'] === 'suporte') {
                echo 'Suporte';
              }
              ?>
            </div>
            <div class="message-content"><?php echo $message['mensagem']; ?></div>
            <div class="message-time"><?php echo date('d/m/Y H:i', strtotime($message['datahora'])); ?></div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="chat-input">
        <form method="post">
          <input type="text" name="message" placeholder="Digite sua mensagem..." class="form-control" />
          <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include("./blades/fim.php") ?>