<?php
include('db.php');

if (isset($_POST['titulo'])) {
    $titulo = trim($_POST['titulo']);
    if ($titulo !== '') {
        $stmt = $conn->prepare("INSERT INTO tarefas (titulo) VALUES (?)");
        $stmt->bind_param("s", $titulo);
        $stmt->execute();
    }
}

header("Location: index.php");
exit;
?>