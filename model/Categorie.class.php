<?php

    class Categorie {
        private $id;   // Identifiant
        private $libelle;  // nom de la catégorie
        private $idMere; // catégorie parente

        public function __get($property) {
          if (property_exists($this, $property)) {
              return $this->$property;
          }
          else{
              die("La propriété n'existe pas");
          }
        }
    }
    
?>
