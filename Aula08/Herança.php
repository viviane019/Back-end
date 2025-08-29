<?php

class Imovel {
    private $categoria;
    private $N_comodos;
    private $valor;
    private $estado_conservacao;

    public function __construct($categoria, $N_comodos, $valor, $estado_conservacao) {
        $this->categoria = $categoria;
        $this->N_comodos = $N_comodos;
        $this->valor = $valor;
        $this->estado_conservacao = $estado_conservacao;

    }
}

class Casa extends Imovel{
    private $tem_quintal; //atributos booleano - true false 

public function __construct($categoria, $n_comodos, $valor, $estado_conservacao, $tem_quintal) {
    parent::__construct($categoria, $n_comodos, $valor, $estado_conservacao);

    $this->tem_quintal =$tem_quintal;
    }
}

class apartamento extends Imovel{
    private $andar;

    public function __construct($categoria, $n_comodos, $valor, $estado_conservacao, $andar) {
        parent::__construct($categoria, $n_comodos, $valor, $estado_conservacao);

        $this->andar = $andar;
    }
}

//Crie uma subclasse chamada "Escola" com o atributos $seguimento.
class Escola extends Imovel{
    private $seguimento;

    public function __construct($categoria, $n_comodos, $valor, $estado_conservacao, $seguimento) {
        parent::__construct($categoria, $n_comodos, $valor, $estado_conservacao);

        $this->seguimento = $seguimento;
    }
}
