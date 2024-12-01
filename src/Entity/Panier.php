<?php

use App\Models\Produit;

/**
 * Classe représentant un panier d'achats.
 */
class Panier {
    private array $articles = []; // Format: [produitId => ['produit' => Produit, 'quantite' => int]]
    private DateTime $dateCreation;

    public function __construct() {
        $this->dateCreation = new DateTime();
    }

    /** Ajoute un article au panier avec une quantité spécifiée. */
    public function ajouterArticle(Produit $produit, int $quantite): void {
        $produitId = $produit->getId();
        if (isset($this->articles[$produitId])) {
            $this->articles[$produitId]['quantite'] += $quantite;
        } else {
            $this->articles[$produitId] = ['produit' => $produit, 'quantite' => $quantite];
        }
    }

    /** Retire une quantité spécifiée d'un produit du panier. */
    public function retirerArticle(Produit $produit, int $quantite): void {
        $produitId = $produit->getId();
        if (isset($this->articles[$produitId])) {
            $this->articles[$produitId]['quantite'] -= $quantite;
            if ($this->articles[$produitId]['quantite'] <= 0) {
                unset($this->articles[$produitId]);
            }
        }
    }

    /** Vide le panier de tous ses articles. */
    public function vider(): void {
        $this->articles = [];
    }

    /** Calcule et retourne le total TTC du panier. */
    public function calculerTotal(): float {
        $total = 0.0;
        foreach ($this->articles as $article) {
            $produit = $article['produit'];
            $quantite = $article['quantite'];
            $total += $produit->getPrix() * $quantite; // Prix TTC supposé inclus dans getPrix()
        }
        return $total;
    }

    /** Retourne le nombre total d'articles dans le panier. */
    public function compterArticles(): int {
        $totalArticles = 0;
        foreach ($this->articles as $article) {
            $totalArticles += $article['quantite'];
        }
        return $totalArticles;
    }
}

?>