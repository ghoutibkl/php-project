<?php

/**
 * Classe abstraite représentant un utilisateur du système.
 */
abstract class Utilisateur {
    /** @var int|null $id L'identifiant unique de l'utilisateur, nullable. */
    protected ?int $id;

    /** @var string $nom Le nom de l'utilisateur. */
    protected string $nom;

    /** @var string $email L'adresse email de l'utilisateur. */
    protected string $email;

    /** @var string $motDePasse Le mot de passe de l'utilisateur. */
    protected string $motDePasse;

    /** @var DateTime $dateInscription La date d'inscription de l'utilisateur. */
    protected DateTime $dateInscription;

    /** @var array $roles Les rôles attribués à l'utilisateur. */
    protected array $roles;

    /**
     * Constructeur de la classe Utilisateur.
     *
     * @param int|null $id L'identifiant de l'utilisateur.
     * @param string $nom Le nom de l'utilisateur.
     * @param string $email L'email de l'utilisateur.
     * @param string $motDePasse Le mot de passe de l'utilisateur.
     * @param DateTime $dateInscription La date d'inscription.
     * @param array $roles Les rôles attribués à l'utilisateur.
     */
    public function __construct(?int $id, string $nom, string $email, string $motDePasse, DateTime $dateInscription, array $roles) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->dateInscription = $dateInscription;
        $this->roles = $roles;
    }

    /**
     * Méthode abstraite pour afficher les rôles d'un utilisateur.
     * @return void
     */
    abstract public function afficherRoles(): void;

    // Getters et setters pour les propriétés communes

    public function getId(): ?int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getMotDePasse(): string {
        return $this->motDePasse;
    }

    public function getDateInscription(): DateTime {
        return $this->dateInscription;
    }

    public function getRoles(): array {
        return $this->roles;
    }
}

?>
