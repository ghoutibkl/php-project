<?php

namespace App\Factory;

use InvalidArgumentException;
use DateTime;
use App\Models\ProduitPhysique;
use App\Models\ProduitNumerique;
use App\Models\ProduitPerissable;
use App\Models\Produit;


class ProduitFactory {
    /**
     * Crée un produit en fonction du type spécifié.
     *
     * @param string $type Le type de produit ("physique", "numerique", "perissable").
     * @param array $data Les données nécessaires pour créer le produit.
     * @return Produit Le produit créé.
     * @throws InvalidArgumentException Si le type ou les données sont invalides.
     */
    public static function creerProduit(string $type, array $data) {
        switch (strtolower($type)) {
            case 'physique':
                return self::creerProduitPhysique($data);
            case 'numerique':
                return self::creerProduitNumerique($data);
            case 'perissable':
                return self::creerProduitPerissable($data);
            default:
                throw new InvalidArgumentException("Type de produit invalide: $type");
        }
    }

    /**
     * Crée un produit physique.
     *
     * @param array $data Les données nécessaires pour créer un produit physique.
     * @return ProduitPhysique
     * @throws InvalidArgumentException Si les données sont invalides.
     */
    private static function creerProduitPhysique(array $data): ProduitPhysique {
        if (!isset($data['id'], $data['nom'], $data['description'], $data['prix'], $data['stock'], $data['poids'], $data['longueur'], $data['largeur'], $data['hauteur'])) {
            throw new InvalidArgumentException("Données manquantes pour le produit physique.");
        }

        return new ProduitPhysique(
            $data['id'],
            $data['nom'],
            $data['description'],
            $data['prix'],
            $data['stock'],
            $data['poids'],
            $data['longueur'],
            $data['largeur'],
            $data['hauteur']
        );
    }

    /**
     * Crée un produit numérique.
     *
     * @param array $data Les données nécessaires pour créer un produit numérique.
     * @return ProduitNumerique
     * @throws InvalidArgumentException Si les données sont invalides.
     */
    private static function creerProduitNumerique(array $data): ProduitNumerique {
        if (!isset($data['id'], $data['nom'], $data['description'], $data['prix'], $data['stock'], $data['lienTelechargement'], $data['tailleFichier'], $data['formatFichier'])) {
            throw new InvalidArgumentException("Données manquantes pour le produit numérique.");
        }

        return new ProduitNumerique(
            $data['id'],
            $data['nom'],
            $data['description'],
            $data['prix'],
            $data['stock'],
            $data['lienTelechargement'],
            $data['tailleFichier'],
            $data['formatFichier']
        );
    }

    /**
     * Crée un produit périssable.
     *
     * @param array $data Les données nécessaires pour créer un produit périssable.
     * @return ProduitPerissable
     * @throws InvalidArgumentException Si les données sont invalides.
     */
    private static function creerProduitPerissable(array $data): ProduitPerissable {
        if (!isset($data['id'], $data['nom'], $data['description'], $data['prix'], $data['stock'], $data['dateExpiration'], $data['temperatureStockage'])) {
            throw new InvalidArgumentException("Données manquantes pour le produit périssable.");
        }

        $dateExpiration = DateTime::createFromFormat('Y-m-d', $data['dateExpiration']);
        if (!$dateExpiration) {
            throw new InvalidArgumentException("Format de date d'expiration invalide. Utilisez 'Y-m-d'.");
        }

        return new ProduitPerissable(
            $data['id'],
            $data['nom'],
            $data['description'],
            $data['prix'],
            $data['stock'],
            $dateExpiration,
            $data['temperatureStockage']
        );
    }
}

?>
