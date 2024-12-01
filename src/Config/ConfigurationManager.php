<?php

namespace App\Config;

/**
 * Classe ConfigurationManager utilisant le Design Pattern Singleton.
 * Permet de gérer une configuration unique pour l'application.
 */
class ConfigurationManager {
    /** @var ConfigurationManager|null Instance unique de la classe */
    private static ?ConfigurationManager $instance = null;

    /** @var array Configuration actuelle */
    private array $config = [];

    /**
     * Constructeur privé pour empêcher l'instanciation directe.
     */
    private function __construct() {
        // Charger la configuration par défaut.
        $this->config = [
            'TVA' => 20.0,
            'devise' => 'EUR',
            'fraisLivraisonBase' => 5.0,
            'emailContact' => 'contact@example.com',
        ];
    }

    /**
     * Retourne l'instance unique de ConfigurationManager.
     *
     * @return ConfigurationManager
     */
    public static function getInstance(): ConfigurationManager {
        if (self::$instance === null) {
            self::$instance = new ConfigurationManager();
        }
        return self::$instance;
    }

    /**
     * Charge une configuration depuis un fichier ou un tableau.
     *
     * @param array|string $source Tableau de configuration ou chemin vers un fichier JSON.
     * @throws \InvalidArgumentException Si le fichier est introuvable ou le format est invalide.
     */
    public function chargerConfiguration($source): void {
        if (is_array($source)) {
            $this->config = array_merge($this->config, $source);
        } elseif (is_string($source) && file_exists($source)) {
            $contenu = file_get_contents($source);
            $configData = json_decode($contenu, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \InvalidArgumentException("Le fichier de configuration contient des erreurs JSON.");
            }
            $this->config = array_merge($this->config, $configData);
        } else {
            throw new \InvalidArgumentException("Source de configuration invalide.");
        }
    }

    /**
     * Retourne la valeur d'un paramètre de configuration.
     *
     * @param string $param Nom du paramètre.
     * @return mixed Valeur du paramètre.
     * @throws \InvalidArgumentException Si le paramètre n'existe pas.
     */
    public function get(string $param) {
        if (!array_key_exists($param, $this->config)) {
            throw new \InvalidArgumentException("Le paramètre '$param' n'existe pas dans la configuration.");
        }
        return $this->config[$param];
    }

    /**
     * Définit ou met à jour un paramètre de configuration.
     *
     * @param string $param Nom du paramètre.
     * @param mixed $valeur Valeur du paramètre.
     * @throws \InvalidArgumentException Si la validation échoue.
     */
    public function set(string $param, $valeur): void {
        switch ($param) {
            case 'TVA':
                if (!is_float($valeur) || $valeur < 0) {
                    throw new \InvalidArgumentException("La TVA doit être un nombre flottant positif.");
                }
                break;
            case 'devise':
                if (!is_string($valeur) || empty(trim($valeur))) {
                    throw new \InvalidArgumentException("La devise doit être une chaîne non vide.");
                }
                break;
            case 'fraisLivraisonBase':
                if (!is_float($valeur) || $valeur < 0) {
                    throw new \InvalidArgumentException("Les frais de livraison de base doivent être un nombre flottant positif.");
                }
                break;
            case 'emailContact':
                if (!filter_var($valeur, FILTER_VALIDATE_EMAIL)) {
                    throw new \InvalidArgumentException("L'email de contact n'est pas valide.");
                }
                break;
            default:
                throw new \InvalidArgumentException("Le paramètre '$param' n'est pas géré par la configuration.");
        }
        $this->config[$param] = $valeur;
    }

    /**
     * Retourne la configuration complète.
     *
     * @return array Configuration complète.
     */
    public function getConfiguration(): array {
        return $this->config;
    }

    /**
     * Empêche le clonage de l'instance.
     */
    private function __clone() {}

    /**
     * Empêche la désérialisation de l'instance.
     */
    private function __wakeup() {}
}

?>
