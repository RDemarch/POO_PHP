<?php

class Film
{
  private $_id;
  private $_nom;
  private $_realisateur;
  private $_annee;
  public function __construct($id, $titre, $realisateur, $annee){
         $this->setId($id);
         $this->setNom($titre);
         $this->setRealisateur($realisateur);
         $this->setAnnee($annee);
      }

  public function getId()
  {
    return $this->_id;
  }
  public function getNom()
  {
    return $this->_nom;
  }
  public function getRealisateur()
  {
    return $this->_realisateur;
  }
  public function getAnnee()
  {
    return $this->_Annee;
  }
  public function setId($id)
  {
    $this->_id = $id;
  }
  public function setNom($nom)
  {
    $this->_nom = $nom;
  }
  public function setRealisateur($realisateur)
  {
    $this->_realisateur = $realisateur;
  }
  public function setAnnee($annee)
  {
    $this->_annee = $annee;
  }
}

$starWars = new Film('1', 'Star Wars', 'Geoges Lucas', '1973');
echo $starWars->getNom();
