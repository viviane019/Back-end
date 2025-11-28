<?php 

namespace Aula17;


require_once __DIR__ . '/../Controller/LivroController.php'; 


$controller = new LivroController(); 
$feedback = $_GET['feedback'] ?? ''; // PEGA FEEDBACK DO REDIRECIONAMENTO DA PÁGINA EDITAR
$is_error = strpos(strtolower($feedback), 'erro') !== false;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $acao = $_POST['acao'] ?? ''; 
    
    if ($acao === 'criar'){
        try {
            $controller->criar(
                $_POST['titulo'] ?? '',
                $_POST['autor'] ?? '',
                (int)($_POST['ano'] ?? 0),
                $_POST['genero'] ?? '',
                (int)($_POST['quantidade'] ?? 0)
            );
            $feedback = "Livro '{$_POST['titulo']}' cadastrado com sucesso!";
            $is_error = false;
        } catch (\PDOException $e) {
            $feedback = "Erro ao cadastrar livro: " . $e->getMessage();
            $is_error = true;
        }
        
    } elseif ($acao === 'deletar'){
        $id = $_POST['id'] ?? null;
        if ($id) {
            try {
                $controller->deletar($id); 
                $feedback = "Livro (ID: {$id}) excluído com sucesso!";
                $is_error = false;
            } catch (\PDOException $e) {
                $feedback = "Erro ao excluir livro: " . $e->getMessage();
                $is_error = true;
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
    <!-- Importação de fonte moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Variáveis CSS para Cores */
        :root {
            --primary-color: #004AAD; /* Azul Marinho Profundo */
            --secondary-color: #4169E1; /* Royal Blue */
            --accent-color: #FFC72C; /* Amarelo Cítrico (Para destaque) */
            --text-dark: #343A40;
            --background-light: #F8F9FA;
            --success-bg: #D4EDDA;
            --success-text: #155724;
            --error-bg: #F8D7DA;
            --error-text: #721C24;
            --shadow-light: 0 4px 12px rgba(0, 0, 0, 0.1);
            --shadow-deep: 0 8px 16px rgba(0, 0, 0, 0.2);
            --border-radius: 8px;
        }

        body { 
            font-family: 'Poppins', sans-serif; 
            padding: 20px; 
            background-color: var(--background-light);
            color: var(--text-dark);
        }

        h1 { 
            color: var(--primary-color); 
            text-align: center; 
            font-weight: 700;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05);
        }

        h2 { 
            color: var(--primary-color); 
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 5px;
            margin-top: 40px;
        }

        /* --- Estilo do Formulário --- */
        form { 
            background-color: #FFFFFF; 
            padding: 30px; 
            border-radius: var(--border-radius); 
            max-width: 900px; /* Aumentado para melhor distribuição */
            margin: 20px auto; 
            display: flex; 
            flex-wrap: wrap; 
            gap: 20px; 
            border: 1px solid #E9ECEF; 
            box-shadow: var(--shadow-light);
        }

        .form-group { 
            flex: 1 1 calc(33.33% - 20px); /* 3 colunas em desktop */
            min-width: 180px; 
            display: flex; 
            flex-direction: column; 
        }

        label { 
            font-weight: 600; 
            font-size: 0.9rem; 
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], select {
            width: 100%; 
            padding: 10px; 
            border: 1px solid #CED4DA; 
            border-radius: 4px; 
            box-sizing: border-box; 
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        
        input[type="text"]:focus, input[type="number"]:focus, select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(65, 105, 225, 0.25);
            outline: none;
        }

        button[type="submit"].criar { 
            align-self: flex-end; /* Alinha o botão à direita na linha */
            flex-basis: 100%; /* Ocupa a largura total na última linha */
            height: 45px; 
            padding: 0 30px; 
            background-color: var(--secondary-color); 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-weight: 600; 
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 74, 173, 0.2);
            text-transform: uppercase;
        }

        button[type="submit"].criar:hover { 
            background-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 74, 173, 0.3);
        }

        /* --- Estilo da Tabela --- */
        .table-container {
            overflow-x: auto; /* Garante que a tabela seja responsiva */
        }
        
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin: 30px auto; 
            box-shadow: var(--shadow-light); 
            background-color: #fff; 
            border-radius: var(--border-radius);
            overflow: hidden; /* Para garantir que o border-radius funcione */
            max-width: 1200px;
        }

        th, td { 
            padding: 15px; 
            text-align: left; 
            border-bottom: 1px solid #E9ECEF;
        }

        th { 
            background-color: var(--primary-color); 
            color: white; 
            text-transform: uppercase; 
            font-size: 0.85rem;
            font-weight: 700;
        }

        tr:nth-child(even) { 
            background-color: #F8F8FF; /* Ghost White sutil */
        }
        
        tr:hover {
            background-color: #E9F4FF; /* Leve destaque ao passar o mouse */
            transition: background-color 0.3s;
        }

        /* --- Estilo das Ações e Botões --- */
        td:last-child { 
            white-space: nowrap; 
            width: 1%; 
        }
        
        .form-acao { 
            display: inline-block; 
            margin: 0; 
            padding: 0; 
            background: none; 
            box-shadow: none; 
            max-width: none; 
        }

        .btn-base { 
            padding: 8px 12px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-weight: 600; 
            margin-right: 5px; 
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .btn-editar { 
            background-color: #8A2BE2; /* Blue Violet */
            color: white; 
        } 
        .btn-editar:hover { 
            background-color: #6A1A9C; 
            box-shadow: 0 4px 8px rgba(138, 43, 226, 0.3);
        }
        
        .btn-deletar { 
            background-color: #DC3545; /* Bootstrap Red */
            color: white; 
        } 
        .btn-deletar:hover { 
            background-color: #C82333; 
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        /* Aplica a classe base para garantir que os estilos de transição e sombra funcionem */
        .form-acao button {
            /* Remove estilos padrao do button */
            all: unset;
            /* Aplica estilos elaborados */
            display: inline-block;
            padding: 8px 12px; 
            border-radius: 4px; 
            cursor: pointer; 
            font-weight: 600; 
            margin-right: 5px; 
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* --- Estilo da Mensagem de Feedback --- */
        .feedback-message { 
            padding: 15px; 
            margin: 20px auto;
            border-radius: var(--border-radius); 
            font-weight: 600; 
            max-width: 900px;
            text-align: center;
        }

        .feedback-success {
            background-color: var(--success-bg); 
            color: var(--success-text); 
            border: 1px solid #c3e6cb;
        }
        
        .feedback-error {
            background-color: var(--error-bg); 
            color: var(--error-text); 
            border: 1px solid #f5c6cb;
        }

        /* --- Responsividade --- */
        @media (max-width: 768px) {
            h1 { font-size: 1.8rem; }
            .form-group { 
                flex: 1 1 calc(50% - 10px); /* 2 colunas em tablet */
            }
            button[type="submit"].criar { 
                flex-basis: 100%; /* 1 coluna em tablet/mobile */
                margin-top: 10px;
            }
            th, td { padding: 10px 8px; font-size: 0.9rem; }
            
            /* Melhorando a visualização da tabela em telas pequenas */
            .table-container {
                border: 1px solid #E9ECEF;
                border-radius: var(--border-radius);
            }
        }
        
        @media (max-width: 480px) {
            body { padding: 10px; }
            .form-group { 
                flex: 1 1 100%; /* 1 coluna em mobile */
            }
            .form-acao button {
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>
    <h1> Catálogo de Livros da Biblioteca Escolar</h1>

    <?php if (!empty($feedback)): ?>
        <div class="feedback-message <?php echo $is_error ? 'feedback-error' : 'feedback-success'; ?>">
            <?php echo htmlspecialchars($feedback); ?>
        </div>
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
            <label for="ano">Ano de Publicação:</label>
            <input type="number" id="ano" name="ano" placeholder="Ex: <?php echo date('Y'); ?>" min="1500" max="<?php echo date('Y'); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" placeholder="Qtd. em estoque" min="1" required>
        </div>
        
        <!-- O botão de salvar agora ocupa a linha inteira, alinhado à direita -->
        <button type="submit" class="criar">Salvar Livro</button>
    </form>
    
    <h2>Livros Cadastrados (Read)</h2>
    <div class="table-container">
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
                            <button type="submit" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir este livro?');">
                                Excluir
                            </button>
                        </form>
                        
                        <form method="GET" class="form-acao" action="editar.php">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                            <button type="submit" class="btn-editar">
                                Editar
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>