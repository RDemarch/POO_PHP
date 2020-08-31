<?php

class Animal
{

  public function respire()
  {
    echo "IT'S ALIVE";
  }
}

class Oiseau extends Animal {
  private $_nom;
  private $_niveau = 1;
  private $_experience = 0;
  private $_degats;
  private $_defense;
  private $_vie;

  public function __construct($nom, $degats, $defense, $vie){
    $this->setNom($nom);
    $this->setDegat($degats);
    $this->setDefense($defense);
    $this->setVie($vie);
  }
  public function setNom($nom) {
    $this->$_nom = $nom;
  }
  public function setDegats($degats) {
    $this->$_degats = $degats;
  }
  public function setDefense($defense) {
    $this->$_defense = $defense;
  }
  public function setVie($vie) {
    $this->$_vie = $vie;
  }
  public function getNom() {
    return $this->$_nom;
  }
  public function getDegats() {
    return $this->$_degats;
  }
  public function getDefense() {
    return $this->$_defense;
  }
  public function getVie() {
    return $this->$_vie;
  }
  public function perdreVie($degatsRecu) {
    $this->$_vie -= $degatsRecu;
  }
}
