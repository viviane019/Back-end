<?php
class Carro {
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $N_Donos;

    public function __construct($marca, $modelo, $ano, $revisao, $N_Donos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->N_Donos = $N_Donos;
    }



 //Método pra exibir as informações do carro
 public function exibirInfo(): void {
    echo "Marca: $this->marca, Modelo: $this->modelo, Ano: $this->ano\n";
 }

  //Metodo para ligar o carro
  public function ligar(): void {
    echo " O carro $this->modelo está ligad!\n";
  }
}

$carro2->ligar(); //Chama o método para ligar carro 2
$carro4->exibirInfo();//Chamado método para exibir informações do carro 4
?>  