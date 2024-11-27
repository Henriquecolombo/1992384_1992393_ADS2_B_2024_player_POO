<?php

class Player
{
    private string $nickname;
    private int $nivel;
    private Inventario $inventario;
    private bool $login = false;
    private int $espaçoadicional = 0;

    public function __construct(string $nickname)
    {
        $this->setNickname($nickname);
        $this->nivel = 1;
        $this->inventario = new Inventario();
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): void
    {
        if (!empty($nickname)) {
            $this->nickname = $nickname;
        } else {
            $this->nickname = "Insira um nome válido, este espaço não pode esta em branco!";
        }
    }



    public function coletarItem(Item $item): void
    {
        $itens = $this->inventario->getItens();
        $slotUtilizado = 0;
        foreach ($itens as $itemX) {
            $slotUtilizado += $itemX->getTamanho();
        }
        $capacidadeMaxima = $this->inventario->getCapacidadeMaxima();
        $slotDisponivel = $capacidadeMaxima - $slotUtilizado;
        if ($item->getTamanho() > $slotDisponivel) {
            echo "<p>O player {$this->nickname} coletou: <b>{$item->getName()}</b> mas foi impossível carregar o item {$item->getName()}.<br> Não há espaço suficiente no inventário!<br></p>";
        } else {
            $this->inventario->adicionar($item);
            echo "<p>O player {$this->nickname} coletou: <b>{$item->getName()}</b><br> Item {$item->getName()} adicionado ao inventário!<br></p>";
        }
    }

    public function soltarItem(string $nomeItem): void
    {
        echo "<p>O player {$this->getNickname()} dropou um item</p>";
        $this->inventario->removerItem($nomeItem);
    }



    public function subirNivel(): void
    {
        echo "<hr><p>Inventário do player {$this->getNickname()}<br>";
        $this->exibeInventario();

        $this->nivel++;
        $this->espaçoadicional = $this->nivel * 3;
        echo "<hr><p>O player {$this->getNickname()} está avançando de nível<br>";
        echo "{$this->nickname} subiu para o nível {$this->nivel}<br>";
        echo "A capacidade do inventário avançou para {$this->espaçoadicional}.<br>";
        $this->upgradeCapacidadeInv();
    }

    private function upgradeCapacidadeInv(): void
    {
        $novaCapacidade = 20 + $this->espaçoadicional;
        $this->inventario->setCapacidadeMaxima($novaCapacidade);
        echo "Capacidade máxima de inventário teve um upgrade para {$this->inventario->getCapacidadeMaxima()}<br>";
        $this->exibeInventario();
        echo "</p>";
    }

    public function exibirProgresso(): void
    {
        if (!$this->login) {
            echo "----------\\----------\\----------\\----------\\----------\\----------\\----------\\----------";
            echo "<br> O player {$this->nickname} iniciou no nível {$this->nivel}<br>";
            echo "Capacidade máxima do seu inventário: {$this->inventario->getCapacidadeMaxima()}<br>";
            echo "----------\\----------\\----------\\----------\\----------\\----------\\----------\\----------";

            $this->login = true;
        }
    }

    public function exibeInventario(): void
    {
        $itens = $this->inventario->getItens();
        $capacidadeMaxima = $this->inventario->getCapacidadeMaxima();
        $slotUtilizado = 0;

        foreach ($itens as $item) {
            $slotUtilizado += $item->getTamanho();
        }

        echo "Itens no inventário: ({$slotUtilizado}/{$capacidadeMaxima})<br>";

        if ($slotUtilizado == $capacidadeMaxima) {
            echo "O inventário está cheio!<br>";
        }

        if (empty($itens)) {
            echo "O inventário está vazio!<br>";
        } else {
            foreach ($itens as $item) {
                echo "<li> {$item->getName()}, slot: {$item->getTamanho()}, classe: {$item->getClasse()}<br>";
            }
            echo "</p>";
        }
    }
}
