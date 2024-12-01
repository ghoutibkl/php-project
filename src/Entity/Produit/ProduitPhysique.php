<?php

/**
 * Classe représentant un produit physique.
 */
class ProduitPhysique extends Produit {
    private float $poids;
    private float $longueur;
    private float $largeur;
    private float $hauteur;

    public function __construct(?int $id, string $nom, string $description, float $prix, int $stock, float $poids, float $longueur, float $largeur, float $hauteur) {
        parent::__construct($id, $nom, $description, $prix, $stock);
        $this->poids = $poids;
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
    }

    /** Calcule le volume du produit en cm³. */
    public function calculerVolume(): float {
        return $this->longueur * $this->largeur * $this->hauteur;
    }

    /** Calcule les frais de livraison basés sur le poids. */
    public function calculerFraisLivraison(): float {
        return $this->poids * 2.0; // Par exemple, 2€ par kg.
    }

    /** Affiche les détails du produit physique. */
    public function afficherDetails(): string {
        return "Produit Physique: {$this->nom}, Volume: " . $this->calculerVolume() . " cm³, Poids: {$this->poids} kg";
    }
}

?>