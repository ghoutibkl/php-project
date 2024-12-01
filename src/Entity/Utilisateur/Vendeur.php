<?php


/**
 * Classe représentant un vendeur dans le système.
 */
class Vendeur extends Utilisateur {
    /** @var string $boutique Le nom de la boutique du vendeur. */
    private string $boutique;

    /** @var float $commission Le pourcentage de commission du vendeur. */
    private float $commission;

    /**
     * Constructeur de la classe Vendeur.
     *
     * @param int|null $id
     * @param string $nom
     * @param string $email
     * @param string $motDePasse
     * @param DateTime $dateInscription
     * @param array $roles
     * @param string $boutique
     * @param float $commission
     */
    public function __construct(?int $id, string $nom, string $email, string $motDePasse, DateTime $dateInscription, array $roles, string $boutique, float $commission) {
        parent::__construct($id, $nom, $email, $motDePasse, $dateInscription, $roles);
        $this->boutique = $boutique;
        $this->commission = $commission;
    }

    /** @return void */
    public function afficherRoles(): void {
        echo "Rôles du vendeur : " . implode(", ", $this->roles) . PHP_EOL;
    }

    /** @return void */
    public function ajouterProduit(Produit $produit): void {
        // Implémentation à venir
    }

    /** @return void */
    public function gererStock(Produit $produit, int $quantite): void {
        // Implémentation à venir
    }
}

?>