<?php

/**
 * Classe représentant un client du système.
 */
class Client extends Utilisateur {
    /** @var string $adresseLivraison L'adresse de livraison du client. */
    private string $adresseLivraison;

    /** @var Panier $panier Le panier du client. */
    private Panier $panier;

    /**
     * Constructeur de la classe Client.
     *
     * @param int|null $id
     * @param string $nom
     * @param string $email
     * @param string $motDePasse
     * @param DateTime $dateInscription
     * @param array $roles
     * @param string $adresseLivraison
     * @param Panier $panier
     */
    public function __construct(?int $id, string $nom, string $email, string $motDePasse, DateTime $dateInscription, array $roles, string $adresseLivraison, Panier $panier) {
        parent::__construct($id, $nom, $email, $motDePasse, $dateInscription, $roles);
        $this->adresseLivraison = $adresseLivraison;
        $this->panier = $panier;
    }

    /** @return void */
    public function afficherRoles(): void {
        echo "Rôles du client : " . implode(", ", $this->roles) . PHP_EOL;
    }

    /** @return void */
    public function passerCommande(): void {
        // Implémentation à venir
    }

    /** @return array */
    public function consulterHistorique(): array {
        // Implémentation à venir
        return [];
    }
}

?>