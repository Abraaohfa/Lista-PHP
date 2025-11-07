<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Tarefas</title>
  <link rel="stylesheet" href="style.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
  <header>
    <h1>Bem vindo ao site que você irá gerenciar a tua rotina!</h1>
  </header>
  
  <div class="link-abaixo">
  <a href="informacao.php">Sobre o site</a>
</div>

  <main>
    <div class="container">
      <h1><ion-icon name="list-circle-outline"></ion-icon> Lista de Tarefas</h1>

      <form action="adicionar.php" method="POST">
        <input type="text" name="titulo" placeholder="Digite uma tarefa..." required>
        <button type="submit">Adicionar</button>
      </form>

      <ul>
      <?php
        $sql = "SELECT * FROM tarefas ORDER BY criado_em DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($linha = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($linha['titulo']) . 
                     " <a href='deletar.php?id=" . $linha['id'] . "'><ion-icon name='trash-outline'></ion-icon></a></li>";
            }
        } else {
            echo "<p>Nenhuma tarefa ainda.</p>";
        }
      ?>
      </ul>
    </div>
  </main>
</body>
</html>