<?php

/**
 * Classe représentant un administrateur du système.
 */
class Admin extends Utilisateur {
    /** @var int $niveauAcces Le niveau d'accès de l'admin. */
    private int $niveauAcces;

    /** @var DateTime $derniereConnexion La date et heure de la dernière connexion de l'admin. */
    private DateTime $derniereConnexion;

    /**
     * Constructeur de la classe Admin.
     *
     * @param int|null $id
     * @param string $nom
     * @param string $email
     * @param string $motDePasse
     * @param DateTime $dateInscription
     * @param array $roles
     * @param int $niveauAcces
     * @param DateTime $derniereConnexion
     */
    public function __construct(?int $id, string $nom, string $email, string $motDePasse, DateTime $dateInscription, array $roles, int $niveauAcces, DateTime $derniereConnexion) {
        parent::__construct($id, $nom, $email, $motDePasse, $dateInscription, $roles);
        $this->niveauAcces = $niveauAcces;
        $this->derniereConnexion = $derniereConnexion;
    }

    /** @return void */
    public function afficherRoles(): void {
        echo "Rôles de l'admin : " . implode(", ", $this->roles) . PHP_EOL;
    }

    /** @return void */
    public function gererUtilisateurs(): void {
        // Implémentation à venir
    }

    /** @return array */
    public function accederJournalSysteme(): array {
        // Implémentation à venir
        return [];
    }
}

?>