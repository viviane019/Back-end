<?php

namespace Aula17;

// A única coisa que pode causar um erro fatal é o caminho, confirme se este caminho é correto:
require_once __DIR__. '/../Controller/LivroController.php';

$controller = new LivroController();
$livroParaEditar = null; 
// Usar (int) na variável $id lida com a entrada de dados e garante que a busca por ID funcione
$id = (int)($_REQUEST['id'] ?? 0); 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar' && $id > 0) { 
    
    // CORREÇÃO: As variáveis inteiras devem garantir que o índice existe antes da conversão.
    $id              = (int)($_POST['id'] ?? 0);   
    $novoTitulo      = $_POST['titulo'] ?? '';
    $novoAutor       = $_POST['autor'] ?? ''; 
    $novoAno         = (int)($_POST['ano'] ?? 0);
    $novoGenero      = $_POST['genero'] ?? '';
    $novaQuantidade  = (int)($_POST['quantidade'] ?? 0); // O CAMPO QUANTIDADE É LIDO CORRETAMENTE AQUI

    try {
        // ESSA LINHA FAZ O SALVAMENTO:
        $controller->atualizar($id, $novoTitulo, $novoAutor, $novoAno, $novoGenero, $novaQuantidade);

        // Redireciona com feedback de sucesso
        header('Location: index.php?feedback=' . urlencode("Livro '{$novoTitulo}' atualizado com sucesso!")); 
        exit();
    } catch (\PDOException $e) {
        // Tratar erros de banco de dados, se houver falha na atualização
        header('Location: index.php?feedback=' . urlencode("Erro ao atualizar Livro '{$novoTitulo}': " . $e->getMessage())); 
        exit();
    }
}


// O ID é validado como número inteiro no início do script.
if ($id > 0) {
    $livroData = $controller->buscarPorId($id);
    
    if ($livroData) {
        $livroParaEditar = $livroData['livro'];
    }
} 

if (!$livroParaEditar) {
    // Se não encontrou o livro, redireciona
    header('Location: index.php?feedback=' . urlencode("Erro: Livro não encontrado para edição."));
    exit();
}

// Essa linha é mantida por coerência, embora $id já contenha o valor correto.
$id = $livroData['id'];

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <style>
        /* Estilos CSS simplificados */
        body { font-family: sans-serif; padding: 20px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; max-width: 400px; margin: 20px 0; }
        input[type="text"], input[type="number"], select {
            width: 100%; padding: 10px; margin: 8px 0 16px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px; background-color: #8c73ff; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Editar Livro: <?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?></h1>
    
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar"> 
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"> 
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>" required>
        
        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" value="<?php echo htmlspecialchars($livroParaEditar->getAutor()); ?>" required>
        
        <label for="ano">Ano de Publicação:</label>
        <input type="number" name="ano" id="ano" value="<?php echo htmlspecialchars($livroParaEditar->getAno()); ?>" min="1500" max="<?php echo date('Y'); ?>" required>
        
        <label for="genero">Gênero Literário:</label>
        <select name="genero" id="genero" required>
            <?php $currentGen = $livroParaEditar->getGenero(); ?>
            <option value="Romance" <?php if ($currentGen === 'Romance') echo 'selected'; ?>>Romance</option>
            <option value="Ficção Científica" <?php if ($currentGen === 'Ficção Científica') echo 'selected'; ?>>Ficção Científica</option>
            <option value="Fantasia" <?php if ($currentGen === 'Fantasia') echo 'selected'; ?>>Fantasia</option>
            <option value="Terror" <?php if ($currentGen === 'Terror') echo 'selected'; ?>>Terror</option>
            <option value="Conto" <?php if ($currentGen === 'Conto') echo 'selected'; ?>>Conto</option>
            <option value="Não-Ficção" <?php if ($currentGen === 'Não-Ficção') echo 'selected'; ?>>Não-Ficção</option>
            <option value="Didático" <?php if ($currentGen === 'Didático') echo 'selected'; ?>>Didático</option>
        </select>
        
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" value="<?php echo htmlspecialchars($livroParaEditar->getQuantidade()); ?>" min="1" required>
        
        <button type="submit">Salvar Alterações</button>
    </form>
    
    <p><a href="index.php">Voltar para a lista</a></p>
</body>
</html>