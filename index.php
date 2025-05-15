<?php
// Conexão com o banco de dados MySQL
$host = "localhost";
$user = "root";
$password = "";
$dbname = "gerenciador_tarefas";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para limpar dados de entrada
function limparEntrada($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Adicionar tarefa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionar"])) {
    $titulo = limparEntrada($_POST["titulo"]);
    if (!empty($titulo)) {
        $stmt = $conn->prepare("INSERT INTO tarefas (titulo) VALUES (?)");
        $stmt->bind_param("s", $titulo);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
        exit();
    }
}

// Editar tarefa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
    $id = intval($_POST["id"]);
    $titulo = limparEntrada($_POST["titulo"]);
    if ($id > 0 && !empty($titulo)) {
        $stmt = $conn->prepare("UPDATE tarefas SET titulo = ? WHERE id = ?");
        $stmt->bind_param("si", $titulo, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
        exit();
    }
}

// Excluir tarefa
if (isset($_GET["excluir"])) {
    $id = intval($_GET["excluir"]);
    if ($id > 0) {
        $stmt = $conn->prepare("DELETE FROM tarefas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
        exit();
    }
}

// Buscar tarefas
$result = $conn->query("SELECT * FROM tarefas ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Gerenciador de Tarefas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #333; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 8px; width: 300px; }
        input[type="submit"] { padding: 8px 12px; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        a { color: #d9534f; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .edit-link { color: #0275d8; }
    </style>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

    <?php if (isset($_GET["editar"])): 
        $idEditar = intval($_GET["editar"]);
        $stmt = $conn->prepare("SELECT * FROM tarefas WHERE id = ?");
        $stmt->bind_param("i", $idEditar);
        $stmt->execute();
        $resultadoEditar = $stmt->get_result()->fetch_assoc();
        $stmt->close();
    ?>
    <form method="post" action="index.php">
        <input type="hidden" name="id" value="<?php echo $resultadoEditar['id']; ?>" />
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($resultadoEditar['titulo']); ?>" required />
        <input type="submit" name="editar" value="Atualizar Tarefa" />
        <a href="index.php">Cancelar</a>
    </form>
    <?php else: ?>
    <form method="post" action="index.php">
        <input type="text" name="titulo" placeholder="Nova tarefa" required />
        <input type="submit" name="adicionar" value="Adicionar Tarefa" />
    </form>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Tarefa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($tarefa = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($tarefa['titulo']); ?></td>
                <td>
                    <a class="edit-link" href="?editar=<?php echo $tarefa['id']; ?>">Editar</a> |
                    <a href="?excluir=<?php echo $tarefa['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
