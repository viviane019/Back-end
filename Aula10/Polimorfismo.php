
<?php 
//Polimorfismo:
// O termo Polimorfismo significa "várias formas". associado isso a Programação Orientada a objetos, o conceito se trata de várias classes e suas instanciãs (objetos) respondendo a um mesmo método de forma diferente. No exemplo do Interface da aula_09, temos um metodo CalcularArea() que responde de forma diferente a classe Quadrado, à classe Pentágono e a classe Circulo. Isso quer dizer que a função é a mesma - calcular a área da forma geometrica - mas a operação muda de acordo com a figura.
//Crie um método chamado "mover()", aonde ele responde de varias formas diferentes, para as sub-classes: carro, Avião, Barco e Elevador. Dica: ultilize interfaces.
//Crie ao menos 2 objeto para testar cada classe =D
interface Veiculo {
    public function mover(): void;
}
class Carro implements Veiculo {
    public function mover(): void {
        echo "O carro está dirigindo na estrada.\n";
    }
}
class Aviao implements Veiculo {
    public function mover(): void {
        echo "O avião está voando no céu.\n";
    }
}
class Barco implements Veiculo {
    public function mover(): void {
        echo "O barco está navegando.\n";
    }
}
class Elevador implements Veiculo {
    public function mover(): void {
        echo "O elevador está subindo ou descendo no prédio.\n";
    }
}

$carro1 = new Carro();
$carro2 = new Carro();

$aviao1 = new Aviao();
$aviao2 = new Aviao();

$barco1 = new Barco();
$barco2 = new Barco();

$elevador1 = new Elevador();
$elevador2 = new Elevador();

$carro1->mover();
$carro2->mover();

$aviao1->mover();
$aviao2->mover();

$barco1->mover();
$barco2->mover();

$elevador1->mover();
$elevador2->mover();
