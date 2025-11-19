<?php 

namespace Aula17;


require_once __DIR__ . '/../Controller/LivroController.php'; 


$controller = new LivroController(); 
$feedback = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $acao = $_POST['acao'] ?? ''; 
    
    if ($acao === 'criar'){
        try {
            $controller->criar(
                $_POST['titulo'],
                $_POST['autor'],
                $_POST['ano'],
                $_POST['genero'],
                (int)$_POST['quantidade']
            );
            $feedback = "Livro '{$_POST['titulo']}' cadastrado com sucesso!";
        } catch (\PDOException $e) {
           
            $feedback = "Erro ao cadastrar livro: " . $e->getMessage();
        }
        
    } elseif ($acao === 'deletar'){
        $id = $_POST['id'] ?? null;
        if ($id) {
            try {
                 $controller->deletar($id); 
                 $feedback = "Livro (ID: {$id}) excluído com sucesso!";
            } catch (\PDOException $e) {
                 $feedback = "Erro ao excluir livro: " . $e->getMessage();
            }
        }
    }
}

$livros = $controller->ler(); 
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Livros da Biblioteca Escolar - CRUD MVC</title>
    <style>
        /* Estilos CSS (mantidos os estilos originais com cores ajustadas e melhorias de layout) */
        body { font-family: sans-serif; padding: 20px; }
        h1, h2 { color: #333; }
        form { background-color: #e6f0ff; padding: 20px; border-radius: 8px; max-width: 600px; margin: 20px 0; display: flex; flex-wrap: wrap; gap: 10px; }
        .form-group { flex-grow: 1; min-width: 150px; display: flex; flex-direction: column; }
        input[type="text"], input[type="number"], select {
            width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #cce0ff; border-radius: 4px; box-sizing: border-box; font-size: 14px;
        }
        label { display: block; font-weight: bold; font-size: 14px; }
        button[type="submit"].criar { height: 40px; padding: 0 20px; background-color: #6a96e8; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; margin-top: 25px; transition: background-color 0.3s; }
        button[type="submit"].criar:hover { background-color: #4a7fdc; }

        table { width: 100%; border-collapse: collapse; margin-top: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #dddddd; }
        th { background-color: #cce0ff; color: #333; text-transform: uppercase; }
        tr:nth-child(even) { background-color: #f9f9f9; } 
        td:last-child { white-space: nowrap; width: 1%; }
        
        .form-acao { display: inline-block; margin: 0; padding: 0; background: none; box-shadow: none; max-width: none; }
        button { padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; margin-right: 5px; transition: background-color 0.3s; }
        .btn-editar { background-color: #8c73ff; color: white; }
        .btn-editar:hover { background-color: #6e50ff; }
        .btn-deletar { background-color: #ff6e6e; color: white; }
        .btn-deletar:hover { background-color: #ff4d4d; }
        .feedback-message { padding: 10px; margin-bottom: 20px; border-radius: 4px; font-weight: bold; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;}
    </style>
</head>
<body>
    <h1>📚 Catálogo de Livros da Biblioteca Escolar</h1>

    <?php if (!empty($feedback)): ?>
        <div class="feedback-message"><?php echo htmlspecialchars($feedback); ?></div>
    <?php endif; ?>

    <h2>Novo Livro (Create)</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="criar">
        
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título do Livro" required>
        </div>
        
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" placeholder="Autor do Livro" required>
        </div>
        
        <div class="form-group">
            <label for="ano">Ano de Publicação:</label>
            <input type="number" id="ano" name="ano" placeholder="Ex: 2023" min="1500" max="<?php echo date('Y'); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="genero">Gênero Literário:</label>
            <select name="genero" id="genero" required>
                <option value="">Selecione o Gênero</option>
                <option value="Romance">Romance</option>
                <option value="Ficção Científica">Ficção Científica</option>
                <option value="Fantasia">Fantasia</option>
                <option value="Terror">Terror</option>
                <option value="Conto">Conto</option>
                <option value="Não-Ficção">Não-Ficção</option>
                <option value="Didático">Didático</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" placeholder="Qtd. em estoque" min="1" required>
        </div>
        
        <button type="submit" class="criar">Salvar Livro</button>
    </form>
    
    <h2>Livros Cadastrados (Read)</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Gênero</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $item): 
                $livro = $item['livro'];
                $id = $item['id'];
            ?>
            <tr>
                <td><?php echo htmlspecialchars($id); ?></td>
                <td><?php echo htmlspecialchars($livro->getTitulo()); ?></td>
                <td><?php echo htmlspecialchars($livro->getAutor()); ?></td>
                <td><?php echo htmlspecialchars($livro->getAno()); ?></td>
                <td><?php echo htmlspecialchars($livro->getGenero()); ?></td>
                <td><?php echo htmlspecialchars($livro->getQuantidade()); ?></td>
                <td>
                    <form method="POST" class="form-acao">
                        <input type="hidden" name="acao" value="deletar">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir este livro?');">Excluir</button>
                    </form>
                    
                    <form method="GET" class="form-acao" action="editar.php">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        <button type="submit" class="btn-editar">Editar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>