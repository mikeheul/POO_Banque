<?php

class Compte {

    // propriétés
    private string $libelle;
    private float $soldeInitial;
    private string $devise;
    private Titulaire $titulaire;

    // constructeur
    public function __construct(string $libelle = "", float $soldeInitial = 0, string $devise = "€", Titulaire $titulaire = null)
    {
        $this->libelle = $libelle;
        $this->soldeInitial = $soldeInitial;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        // à la création d'un compte, on l'ajoute chez le titulaire
        $this->titulaire->ajouterCompte($this);
    }
   
    /**
     * Get the value of libelle
     */ 
    public function getLibelle():string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of soldeInitial
     */ 
    public function getSoldeInitial():float
    {
        return $this->soldeInitial;
    }

    /**
     * Set the value of soldeInitial
     *
     * @return  self
     */ 
    public function setSoldeInitial($soldeInitial)
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }

    /**
     * Get the value of devise
     */ 
    public function getDevise():string
    {
        return $this->devise;
    }

    /**
     * Set the value of devise
     *
     * @return  self
     */ 
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get the value of titulaire
     */ 
    public function getTitulaire():Titulaire
    {
        return $this->titulaire;
    }

    /**
     * Set the value of titulaire
     *
     * @return  self
     */ 
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    public function crediter(float $montant) 
    {
        $this->soldeInitial += $montant;
    }

    public function debiter(float $montant) 
    {
        $this->soldeInitial -= $montant;
    }

    public function virement(float $montant, Compte $compte) 
    {
        $this->debiter($montant);
        $compte->crediter($montant);
    }

    public function __toString() 
    {
        return "$this->libelle ($this->soldeInitial $this->devise)"; 
    }
}