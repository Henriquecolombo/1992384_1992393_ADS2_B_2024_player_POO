<?php
require_once './class/Item.php';
require_once './class/Inventario.php';
require_once './class/Player.php';
require_once './class/Ataque.php';
require_once './class/Defesa.php';
require_once './class/Magia.php';

$player1 = new Player("Joelma");
$player2 = new Player("Joaquim");

$itens = [
    new Ataque("Lança"),
    new Ataque("Sabre de luz"),
    new Ataque("Machado de guerra"),
    new Defesa("Armadura"),
    new Defesa("Escudo"),
    new Defesa("Capacete"),
    new Magia("Poçao de cura aliada"),
    new Magia("Poção de deteriorização inimiga")
];

$player1->exibirProgresso();
$player1->coletarItem($itens[0]);
$player1->coletarItem($itens[1]);
$player1->coletarItem($itens[2]);
$player1->coletarItem($itens[3]);
$player1->coletarItem($itens[4]);
$player1->coletarItem($itens[7]);
$player1->subirNivel();
$player1->exibirProgresso();
$player1->soltarItem("Lança");


$player2->exibirProgresso();
$player2->coletarItem($itens[6]);
$player2->coletarItem($itens[2]);
$player2->coletarItem($itens[4]);
$player2->coletarItem($itens[5]);
$player2->subirNivel();
$player2->exibirProgresso();
$player2->soltarItem("Escudo");
