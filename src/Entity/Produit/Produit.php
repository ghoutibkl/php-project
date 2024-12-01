<?php

/*namespace App\Models\;*/

/**
 * Classe abstraite représentant un produit dans un catalogue.
 * 
 * Contient les propriétés et méthodes communes à tous les produits.
 */
abstract class Produit {
    protected ?int $id;
    protected string $nom;
    protected string $description;
    protected float $prix;
    protected int $stock;

    /**
     * Constructeur de la classe Produit.
     *
     * @param int|null $id L'identifiant du produit.
     * @param string $nom Le nom du produit.
     * @param string $description La description du produit.
     * @param float $prix Le prix du produit (doit être positif).
     * @param int $stock Le stock du produit (doit être positif ou nul).
     * @throws InvalidArgumentException Si une validation échoue.
     */
    public function __construct(?int $id, string $nom, string $description, float $prix, int $stock) {
        $this->setId($id);
        $this->setNom($nom);
        $this->setDescription($description);
        $this->setPrix($prix);
        $this->setStock($stock);
    }

    /** @return int|null L'identifiant du produit. */
    public function getId(): ?int {
        return $this->id;
    }

    /** Définit l'identifiant du produit. */
    public function setId(?int $id): void {
        $this->id = $id;
    }

    /** @return string Le nom du produit. */
    public function getNom(): string {
        return $this->nom;
    }

    /**
     * Définit le nom du produit.
     *
     * @param string $nom Le nom du produit.
     * @throws InvalidArgumentException Si le nom est vide.
     */
    public function setNom(string $nom): void {
        if (empty(trim($nom))) {
            throw new InvalidArgumentException("Le nom ne doit pas être vide.");
        }
        $this->nom = $nom;
    }

    /** @return string La description du produit. */
    public function getDescription(): string {
        return $this->description;
    }

    /** Définit la description du produit. */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /** @return float Le prix du produit. */
    public function getPrix(): float {
        return $this->prix;
    }

    /**
     * Définit le prix du produit.
     *
     * @param float $prix Le prix du produit (doit être positif).
     * @throws InvalidArgumentException Si le prix est négatif ou nul.
     */
    public function setPrix(float $prix): void {
        if ($prix <= 0) {
            throw new InvalidArgumentException("Le prix doit être positif.");
        }
        $this->prix = $prix;
    }

    /** @return int Le stock disponible du produit. */
    public function getStock(): int {
        return $this->stock;
    }

    /**
     * Définit le stock du produit.
     *
     * @param int $stock Le stock du produit (doit être positif ou nul).
     * @throws InvalidArgumentException Si le stock est négatif.
     */
    public function setStock(int $stock): void {
        if ($stock < 0) {
            throw new InvalidArgumentException("Le stock doit être positif ou nul.");
        }
        $this->stock = $stock;
    }

    /**
     * Méthode abstraite pour calculer les frais de livraison.
     * 
     * @return float Les frais de livraison.
     */
    abstract public function calculerFraisLivraison(): float;

    /**
     * Méthode abstraite pour afficher les détails du produit.
     * 
     * @return string Les détails du produit.
     */
    abstract public function afficherDetails(): string;
}

?>


