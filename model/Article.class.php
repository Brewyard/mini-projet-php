<?php // Classe temporaire pour tester

    // Un article en vente
    class Article {
        private $ref;       // Référence unique
        private $intitule;   // Nom de l'article
        private $infos
        private $idMere; // identifiant de catégorie
        private $prix;      // le prix
        private $urlPhoto;     // Nom du fichier image

        public function __get($property) {
          if (property_exists($this, $property)) {
            return $this->$property;
          }
        }
    }

?>
