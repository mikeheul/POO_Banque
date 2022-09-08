<?php

class Titulaire {

    // propriétés
    private string $nom;
    private string $prenom;
    private string $sexe;
    private DateTime $dateNaissance;
    private array $comptes;

    // constructeur
    public function __construct(string $nom = "", string $prenom = "", string $sexe = "", string $dateNaissance = "now") 
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        // on instancie un nouvel objet DateTime
        $this->dateNaissance = new DateTime($dateNaissance);
        $this->comptes = [];
    }

    /**
     * Get the value of nom
     */ 
    public function getNom():string
    {
        return $this->nom;
    }
    
    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    
    /**
     * Get the value of prenom
     */ 
    public function getPrenom():string
    {
        return $this->prenom;
    }
    
    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }
    
    /**
     * Get the value of sexe
     */ 
    public function getSexe():string
    {
        return $this->sexe;
    }
    
    /**
     * Set the value of sexe
     *
     * @return  self
     */ 
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
        return $this;
    }
    
    /**
     * Get the value of dateNaissance
     */ 
    public function getDateNaissance():DateTime
    {
        return $this->dateNaissance;
    }
    
    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    public function getAge():string
    {
        return date_diff(new DateTime(), $this->dateNaissance)->format("%Y");
    }

    // Ajouter un nouveau Compte dans le tableau "comptes" du Titulaire (+ message de confirmation)
    public function ajouterCompte(Compte $compte) 
    {
        $this->comptes[] = $compte;
        echo "Le compte <strong>$compte</strong> a été ajouté<br>";
    }

    public function afficherComptes() 
    {
        //  terminaison singulier ou pluriel en fonction du nombre de comptes du titulaire (ternaire)
        $term = (count($this->comptes) > 1 ? "s" : "");
        $result = "<br>Compte$term de $this<br>";
        $result .= count($this->comptes). " compte$term";
        $result .= "<ul>";
        foreach ($this->comptes as $compte) {
            $result .= "<li>$compte</li>";
        }
        $result .= "</ul>";
        return $result;
    }

    public function __toString() 
    {
        return "<strong>$this->prenom $this->nom</strong>"." (".$this->getAge()." ans)";
    }
}