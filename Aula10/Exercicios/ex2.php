<?php


class Animal {
    public function fazerSom() {
        return "Som genérico de animal.";
    }
}

class Cachorro extends Animal {
    public function fazerSom() {
        return "Au au!";
    }
}

class Gato extends Animal {
    public function fazerSom() {
        return "Miau!";
    }
}

class Vaca extends Animal {
    public function fazerSom() {
        return "Muuu!";
    }
}

// Teste interativo no terminal
echo "Escolha o animal (Cachorro, Gato, Vaca): ";
$animal = trim(fgets(STDIN));

switch (strtolower($animal)) {
    case "cachorro":
        $obj = new Cachorro();
        break;
    case "gato":
        $obj = new Gato();
        break;
    case "vaca":
        $obj = new Vaca();
        break;
    default:
        $obj = null;
        break;
}

if ($obj) {
    echo $obj->fazerSom() . PHP_EOL;
} else {
    echo "Animal inválido!" . PHP_EOL;
}
?>