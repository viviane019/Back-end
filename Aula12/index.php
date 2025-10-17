<?php

require_once "CRUD.php";
require_once "AlunoDAO.php";

//Objeto da classe AlunoDAO para gerenciar os métodos do CRUD

$dao = new AlunoDAO();

//Create
$dao->criarAluno(new Aluno(1, "Maria", "Design"));
$dao->criarAluno(new Aluno(2, "Gabriel", "Moda"));
$dao->criarAluno(new Aluno(3, "Eduardo", "Manicure"));

//Crie mais 6 objetos obedecendo a seguinte lista:
//id-nome-curso
//4-Aurora-Arquitetura
//5-Oliver-Director
//6-Amanda-Lutadora
//7-Geysa-Engenheira
//8-Joab-Professor
//9-Bernardo-Streamer


$dao->criarAluno(new Aluno(4, "Aurora", "Arquitetura"));
$dao->criarAluno(new Aluno(5, "Oliver", "Director"));
$dao->criarAluno(new Aluno(6, "Amanda", "Lutadora"));
$dao->criarAluno(new Aluno(7, "Geysa", "Engenheira"));
$dao->criarAluno(new Aluno(8, "Joab", "Professor"));
$dao->criarAluno(new Aluno(9, "Bernardo", "Streamer"));


//Read
echo "listagem inical:\n";

foreach ($dao->lerAluno()as $aluno){
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()} \n";
}

//Update
$dao->atualizarAluno(3,"Viviane","Eleticista");
echo "\nApós Atualização:\n";
foreach ($dao->lerAluno()as $aluno){
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()} \n";
}
//Faça as seguintes atualizações:
// - Alterar nome da geysa para Clotilde
// - Alterar o nome do Joab para Joana
// - Alterar o curso do Bernardo para Dev
// - Alterar o curso da Amanda para Logística
// - alterar o nome do Oliver para Eletrica 

$dao->atualizarAluno(7,"Clotilde","Engenheira");
$dao->atualizarAluno(8,"Joana","Professor");
$dao->atualizarAluno(9,"Bernardo","Dev");
$dao->atualizarAluno(6,"Amanda","Logística");
$dao->atualizarAluno(5,"Oliver","Elétrica");
echo "\nApós Atualizações adicionais:\n";
foreach ($dao->lerAluno()as $aluno){
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()} \n";
}


//Delete
$dao->excluirAluno(2);
echo "\nApós exclusão: \n";
foreach ($dao->lerAluno()as $aluno){
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()} \n";
 }
 ?>