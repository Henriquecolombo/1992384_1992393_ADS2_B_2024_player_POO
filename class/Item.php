<?php

class Item
{
    private string $name;
    private int $tamanho;
    private string $classe;

    public function __construct(string $name, int $tamanho, string $classe)
    {
        $this->setName($name);
        $this->setTamanho($tamanho);
        $this->setClasse($classe);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if (!empty($name)) {
            $this->name = $name;
        } else {
            $this->name = "Informe o nome";
        }
    }

    public function getTamanho(): int
    {
        return $this->tamanho;
    }

    public function setTamanho(int $tamanho): void
    {
        if ($tamanho > 0) {
            $this->tamanho = $tamanho;
        } else {
            echo "Informe o valor do item que seja maior que 0<br>";
            $this->tamanho = 1;
        }
    }

    public function getClasse(): string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): void
    {
        if (!empty($classe)) {
            $this->classe = $classe;
        } else {
            $this->classe = "Informe uma Classe de Ataque, Defesa e Magia";
        }
    }
}
