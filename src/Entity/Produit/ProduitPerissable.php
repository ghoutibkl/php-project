<?php

/**
 * Classe représentant un produit périssable.
 */
class ProduitPerissable extends Produit {
    private DateTime $dateExpiration;
    private float $temperatureStockage;

    public function __construct(?int $id, string $nom, string $description, float $prix, int $stock, DateTime $dateExpiration, float $temperatureStockage) {
        parent::__construct($id, $nom, $description, $prix, $stock);
        $this->dateExpiration = $dateExpiration;
        $this->temperatureStockage = $temperatureStockage;
    }

    /** Vérifie si le produit est périmé. */
    public function estPerime(): bool {
        return new DateTime() > $this->dateExpiration;
    }

    /** Calcule les frais de livraison avec une majoration pour produits frais. */
    public function calculerFraisLivraison(): float {
        return 5.0 + ($this->prix * 0.02); // Majoration de 5€.
    }

    /** Affiche les détails du produit périssable. */
    public function afficherDetails(): string {
        return "Produit Périssable: {$this->nom}, Expire le: " . $this->dateExpiration->format('Y-m-d') . ", Température: {$this->temperatureStockage}°C";
    }
}

?>