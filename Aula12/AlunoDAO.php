<?php

class AlunoDAO {
    private $aluno = [];
    public function criarAluno(Aluno $aluno){
        $this->aluno[$aluno->getId()]= $aluno;
    }

    public function lerAluno(){
        return $this->aluno;
    public function atualizarAluno(){
    }

    public function excluirAluno(Aluno $aluno){
        unset($this->aluno[$id]);
    }
}