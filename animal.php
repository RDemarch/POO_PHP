<?php

class Animal
{
  private $_nom;
  private $_niveau = 1;
  private $_experience = 0;
  private $_degats;
  private $_defense;
  private $_vie;
  private $_vulnerable = true;
  private $_touch = false;

  public function __construct($nom, $degats, $defense, $vie){
    $this->setNom($nom);
    $this->setDegats($degats);
    $this->setDefense($defense);
    $this->setVie($vie);
  }
  public function setNom($nom) {
    $this->_nom = $nom;
  }
  public function setDegats($degats) {
    $this->_degats = $degats;
  }
  public function setDefense($defense) {
    $this->_defense = $defense;
  }
  public function setVulnerable($vulnerable) {
    $this->_vulnerable = $vulnerable;
  }
  public function setTouch($touch) {
    $this->_touch = $touch;
  }
  public function setVie($vie) {
    $this->_vie = $vie;
  }
  public function getNom() {
    return $this->_nom;
  }
  public function getDegats() {
    return $this->_degats;
  }
  public function getDefense() {
    return $this->_defense;
  }
  public function getVie() {
    return $this->_vie;
  }
  public function getVulnerable() {
    return $this->_vulnerable;
  }
  public function getTouch() {
    return $this->_touch;
  }
  public function perdreVie($degatsRecu) {
    $this->_vie -= $degatsRecu;
  }
  public function infligerDegats(Animal $adversaire) {
    $adversaire->perdreVie($this->_degats);
  }
  public function respire()
  {
    echo "IT'S ALIVE";
  }
  public function diminueDefense($value) {
    $this->_defense -= $value;
  }
}

class Oiseau extends Animal {

  public function __construct($nom, $degats, $defense, $vie) {
    parent::__construct($nom, $degats, $defense, $vie);
  }

  public function voler(){
    $this->setVulnerable(false);
    echo $this->getNom() . " s'envole <br>";
  }
  public function coupDeBec(Animal $adversaire){
    echo $this->getNom() . " donne des coups de bec à " . $adversaire->getNom() . "<br>";
    $this->setVulnerable(true);
    if ($adversaire->getVulnerable() || $this->getTouch()) {
      $degats = ($this->getDegats() + 10) - $adversaire->getDefense();
      if ($degats < 1) $degats = 1;
      $adversaire->perdreVie($degats);
      echo $this->getNom() . " a infligé " . $degats . " dégats à " . $adversaire->getNom() . "<br>";
    }
    else {
      echo "l'attaque échoue <br>";
    }
  }
}
class Reptile extends Animal {

  public function __construct($nom, $degats, $defense, $vie) {
    parent::__construct($nom, $degats, $defense, $vie);
  }

  public function peauEcailleuse(){
    $this->_defense += 10;
    echo $this->getNom() . "renforce sa défense <br>";
  }
  public function crocReptilien(Animal $adversaire){
    $this->setVulnerable(true);
    echo $this->getNom() . " tente de mordre " . $adversaire->getNom() . "<br>";
    if ($adversaire->getVulnerable() || $this->getTouch()) {
      $degats = ($this->getDegats() + 5) - $adversaire->getDefense();
      if ($degats < 1) $degats = 1;
      $adversaire->perdreVie($degats);
      echo $this->getNom() . " a infligé " . $degats . " dégats à " . $adversaire->getNom() . "<br>";
    }
    else {
      echo "l'attaque échoue <br>";
    }
  }
}
class Aigle extends Oiseau {

  public function __construct($nom) {
    parent::__construct($nom, 15, 5, 20);
  }
  public function serreDaigle(Animal $adversaire){
    $this->setVulnerable(true);
    echo $this->getNom() . " attaque " . $adversaire->getNom() . " avec ses serres <br>";
    if ($adversaire->getVulnerable() || $this->getTouch()) {
      $degats = ($this->getDegats() + 25) - $adversaire->getDefense();
      $this->diminueDefense(5);
      if ($degats < 1) $degats = 1;
      $adversaire->perdreVie($degats);
      echo $this->getNom() . " a infligé " . $degats . " dégats à " . $adversaire->getNom() . "<br>";
    }
    else {
      echo "l'attaque échoue <br>";
    }
  }
}
class Faucon extends Oiseau {

  public function __construct($nom) {
    parent::__construct($nom, 20, 5, 17);
  }
  public function oeilDeFaucon(){
    $this->setVulnerable(true);
    $this->setTouch(true);
    echo $this->getNom() . " ne ratera pas sa cible <br>";
  }
}
class Tortue extends Reptile {

  public function __construct($nom) {
    parent::__construct($nom, 5, 25, 20);
  }
  public function carapaceDur(){
    $this->setVulnerable(false);
    echo $this->getNom() . " se protège <br>";
  }
}
class Crocodile extends Reptile {

  public function __construct($nom) {
    parent::__construct($nom, 15, 10, 17);
  }
  public function machoireLourde(Animal $adversaire){
    echo $this->getNom() . " donne un violent coup de machoire à " . $adversaire->getNom() . "<br>";
    $rand = rand(1, 100);
    if ($adversaire->getVulnerable() || $this->getTouch()) {
      $degats = ($this->getDegats() + 30) - $adversaire->getDefense();
      if ($degats < 1) $degats = 1;
      $adversaire->perdreVie($degats);
      echo $this->getNom() . " a infligé " . $degats . " dégats à " . $adversaire->getNom() . "<br>";
    }
    else {
      echo "l'attaque échoue <br>";
    }
  }
}

$aigle = new Aigle("aigle");
$faucon = new Faucon("faucon");
$tortue = new Tortue("tortue");
$croco = new Crocodile("croco");

$gameState = true;

$aigle->serreDaigle($croco);
$faucon->voler();
$tortue->crocReptilien($faucon);
$croco->machoireLourde($aigle);
$faucon->oeilDeFaucon();
$aigle->voler();
$faucon->coupDeBec($aigle);
