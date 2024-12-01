<?php

/**
 * Classe représentant un produit numérique.
 */
class ProduitNumerique extends Produit {
    private string $lienTelechargement;
    private float $tailleFichier;
    private string $formatFichier;

    public function __construct(?int $id, string $nom, string $description, float $prix, int $stock, string $lienTelechargement, float $tailleFichier, string $formatFichier) {
        parent::__construct($id, $nom, $description, $prix, $stock);
        $this->lienTelechargement = $lienTelechargement;
        $this->tailleFichier = $tailleFichier;
        $this->formatFichier = $formatFichier;
    }

    /** Génère un lien de téléchargement unique. */
    public function genererLienTelechargement(): string {
        return $this->lienTelechargement . "?token=" . bin2hex(random_bytes(16));
    }

    /** Retourne toujours 0 pour les frais de livraison. */
    public function calculerFraisLivraison(): float {
        return 0.0;
    }

    /** Affiche les détails du produit numérique. */
    public function afficherDetails(): string {
        return "Produit Numérique: {$this->nom}, Taille: {$this->tailleFichier} MB, Format: {$this->formatFichier}";
    }
}

?>