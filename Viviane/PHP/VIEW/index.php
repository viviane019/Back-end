<?php

namespace Oficina; 


require_once __DIR__ . '\..\controller\oficinaController.php'; 


$controller = new oficinaController(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_POST['acao'] ?? null;
    
 
    $id_Cliente POST (['Id_Cliente']) ? (float)$_POST[''] : 0.00;
    $estoque = isset($_POST['estoque']) ? (int)$_POST['estoque'] : 0;
    
    if ($acao == 'criar') {
        $controller->criar(
            $_POST['nome'],
            $valorUnitario, 
            $estoque
        );
    } elseif ($acao === 'deletar') {
        $controller->excluir($_POST['nome']);
    } elseif ($acao === 'editar') {
        // Valores de edição
        $novoValorUnitario = isset($_POST['novoValorUnitario']) ? (float)$_POST['novoValorUnitario'] : 0.00;
        $novoEstoque = isset($_POST['novoEstoque']) ? (int)$_POST['novoEstoque'] : 0;
        
        $controller->atualizar(
            $_POST['nome'], // Nome original
            $_POST['novoNome'], 
            $novoValorUnitario,
            $novoEstoque
        );
    }

    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Peças - Oficina</title>

</head>
<body>

    <main>
        <h1>Formulário de Cadastro de Peças</h1>
        <form action="" method="POST">
            <input type="hidden" name="acao" value="criar">
            
            <label for="nome">Nome da Peça:</label>
            <input type="text" name="nome" required>
            
            <label for="valor_unitario">Valor Unitário:</label>
            <input type="number" name="valor_unitario" step="0.01" required>

            <label for="estoque">Estoque (Quantidade):</label>
            <input type="number" name="estoque" required>
            
            <button type="submit">Cadastrar Peça</button>
        </form>

        <div class="ler">
            <h2>Peças Cadastradas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor Unitário</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
             
                    $pecas = $controller->ler(); 
                    foreach ($pecas as $peca) {
                        // Use os novos getters
                        $nome = htmlspecialchars($peca->getNome());
                        $valor = $peca->getValorUnitario();
                        $qtde = $peca->getEstoque();

                        echo "<tr>";
                        echo "<td>{$nome}</td>";
                        echo "<td>R$ " . number_format($valor, 2, ',', '.') . "</td>";
                        echo "<td>{$qtde}</td>";
                        echo "<td>
                                <button onclick=\"abrirModal('{$nome}', {$valor}, {$qtde})\" class=\"btn-editar\">Editar</button>
                                <form action=\"\" method=\"POST\" style=\"display:inline;\">
                                    <input type=\"hidden\" name=\"acao\" value=\"deletar\">
                                    <input type=\"hidden\" name=\"nome\" value=\"{$nome}\">
                                    <button type=\"submit\" class=\"btn-deletar\">Deletar</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <div id="modalEditar" class="modal">
        <div class="modal-content">
            <span class="fechar">&times;</span>
            <h2>Editar Peça</h2>
            <form action="" method="POST" id="formEditar">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="nome" id="nome_original"> <label for="nome_edit">Nome:</label>
                <input type="text" name="novoNome" id="nome_edit" required>
                
                <label for="valor_edit">Valor Unitário:</label>
                <input type="number" name="novoValorUnitario" id="valor_edit" step="0.01" required>

                <label for="qtde_edit">Estoque:</label>
                <input type="number" name="novoEstoque" id="qtde_edit" required>
                
                <button type="submit">Salvar Alterações</button>
            </form>
        </div>
    </div>

    <script>
       
        function abrirModal(nome, valor, estoque) {
            document.getElementById('modalEditar').style.display = 'block';
            document.getElementById('nome_original').value = nome;
            document.getElementById('nome_edit').value = nome;
            document.getElementById('valor_edit').value = valor;
            document.getElementById('qtde_edit').value = estoque;
        }

    
        document.querySelector('.fechar').onclick = function() {
            document.getElementById('modalEditar').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('modalEditar')) {
                document.getElementById('modalEditar').style.display = 'none';
            }
        }
    </script>
</body>
</html>