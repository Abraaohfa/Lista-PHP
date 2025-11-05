<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Tarefas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h1>🗒️ Lista de Tarefas</h1>

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
                 " <a href='deletar.php?id=" . $linha['id'] . "'>❌</a></li>";
        }
    } else {
        echo "<p>Nenhuma tarefa ainda.</p>";
    }
  ?>
  </ul>
</div>

</body>
</html>