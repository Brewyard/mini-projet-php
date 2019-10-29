<?php

    require_once("../model/Categorie.class.php");
    require_once("../model/Article.class.php");

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $database = 'sqlite:../data/site.db';

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
            try{
              $this->db = new PDO($this->database);
            }
            catch(Exception $e){
              die("Exception : $e");
            }
        }


        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat() : array {
            $q = $this->db->query('SELECT * FROM Categorie WHERE idMere IS NULL');
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Categorie');
            return $res;
        }

        // Accès à toutes les catégories les plus basses (qui n'ont pas de catégorie fille)
        // Retourne une table d'objets de type Categorie
        function getCatFilles() : array {
            $q = $this->db->query('SELECT id, intitule FROM Categorie WHERE id <> (SELECT idMere FROM Categorie)');
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Categorie');
            return $res;
        }



        // Accès aux n premiers articles
        // Cette méthode retourne un tableau contenant les n permier articles de
        // la base sous la forme d'objets de la classe Article.
        function firstN(int $n) : array {
            $q = $this->db->query("SELECT * FROM Article ORDER BY ref LIMIT $n");
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $res;
        }

        // Acces au n articles à partir de la reférence $ref
        // Cette méthode retourne un tableau contenant n  articles de
        // la base sous la forme d'objets de la classe Article.
        function getN(int $ref,int $n) : array {
            $q = $this->db->query("SELECT * FROM Article WHERE ref >= $ref ORDER BY ref LIMIT $n");
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $res;
        }

        // Acces à la référence qui suit la référence $ref dans l'ordre des références
        // Retourne -1 si $ref est la dernière référence
        function next(int $ref) : int {
            $q = $this->db->query("SELECT ref FROM Article WHERE ref > $ref ORDER BY ref LIMIT 1");
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Article');
            if(count($res) == 1) return $res[0]->getRef();
            else                 return -1;
        }

        // Acces aux n articles qui précèdent de $n la référence $ref dans l'ordre des références
        // Retourne -1 si $ref est la première référence
        function prevN(int $ref,int $n): int {
            $q = $this->db->query("SELECT ref FROM Article WHERE ref < $ref ORDER BY ref DESC LIMIT $n");
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Article');
            if(count($res) == $n) return $res[$n-1]->getRef();
            else                 return -1;
        }



        // Acces à une catégorie
        // Retourne un objet de la classe Categorie connaissant son identifiant
        function getCat(int $id): Categorie {
            $q = $this->db->query("SELECT * FROM Categorie WHERE id=$id");
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Categorie');
            return $res;
        }

        //Retourne tous les articles de la catégorie sans se préoccuper des catégories filles
        function getArticlesFromCat(int $id) : array {
            $q = $this->db->query("SELECT * FROM Article WHERE idMere=$id");
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $res;
        }

        //Retourne les $n articles les plus commandés toute catégorie confondue
        function getArticlesPlusCommandes(int $n) : array{
            $q = $this->db->query("SELECT a.ref, intitule, infos, prix, urlPhoto, idMere
                                   FROM (
                                          SELECT c.ref, sum(quantite) as sommeQuantites
                                          FROM Commande c
                                          GROUP BY c.ref
                                          ORDER BY sommeQuantites DESC
                                   ) b, Article a
                                   WHERE b.ref = a.ref
                                   LIMIT $n");
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $res;
        }

        //Retourne la ref qui précède de 12 l'article $ref
        function prevNPlusCommande($ref, $n) : int { //A modifier quand on aura les commandes
            $q = $this->db->query("SELECT ref FROM Article WHERE ref < $ref ORDER BY ref DESC LIMIT $n");
            $res = $q->fetchAll(PDO::FETCH_CLASS, 'Article');
            if(count($res) == $n) return $res[$n-1]->ref;
            else                 return -1;
        }

        //Retourne le prochain article le plus commande après $ref
        function nextPlusCommande(int $ref){ //A modifier en fonction des commandes

        }

        function getPanierClient($mail) {
          $stmt = $this->db->prepare("SELECT ref, quantite FROM Panier WHERE email = ? ORDER BY ref");
          $stmt->execute([$mail]);
          $res = $stmt->fetchAll();

          if ($res) {
          $articlesAvecQuantite = array();

            foreach ($res as $article) {
              $articleAvecQuantite = $this->getArticle($article[0]);
              $articleAvecQuantite->quantite = $article[1];
              $articlesAvecQuantite[] = $articleAvecQuantite;
            }
            return $articlesAvecQuantite;
          } else {
            return 0;
          }

        }

        function inscrire($email, $nom, $prenom, $mdp, $adresse, $tel) {
          $sql = "INSERT INTO Client (email, nom, prenom, mdp, adresse, tel)
                  values (:email, :nom, :prenom, :mdp, :adresse, :tel)";
          $stmt = $this->db->prepare($sql);

          $stmt->BindParam(':email', $email);
          $stmt->BindParam(':nom', $nom);
          $stmt->BindParam(':prenom', $prenom);
          //crypte le mdp
          $hashMDP = password_hash($mdp, PASSWORD_DEFAULT);
          $stmt->BindParam(':mdp', $hashMDP);
          $stmt->BindParam(':adresse', $adresse);
          $stmt->BindParam(':tel', $tel);

          $success = $stmt->execute();
          return $success;
        }

        function connecter($email,$mdp) { // retourne vrai si l'utilisateur existe
            $sql = "SELECT * FROM Client WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->BindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch();
            return password_verify($mdp, $result["mdp"]); //compare les hash
        }

        function getArticle($ref) : Article {
          $sql = "SELECT * FROM Article WHERE ref = :ref";
          $stmt = $this->db->prepare($sql);
          $stmt->BindParam(':ref', $ref);
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
          return $result[0];
        }

        function rechercheArticles($recherche) {
            // Recherche sur l'intitulé
            $sql = "SELECT *
                    FROM Article
                    WHERE intitule
                    LIKE :recherche ";
            $stmt = $this->db->prepare($sql);
            $recherche = '%'.$recherche.'%';
            $stmt->BindParam(':recherche', $recherche);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
            // Recherche sur la ref
            $sql2 = "SELECT *
                     FROM Article
                     WHERE ref
                     LIKE :recherche ";
            $stmt2 = $this->db->prepare($sql2);
            $stmt2->BindParam(':recherche', $recherche);
            $stmt2->execute();
            $res += $stmt2->fetchAll(PDO::FETCH_CLASS, 'Article');
            if(count($res) > 0)
              return $res;
            else
              return -1;
        }

        function ajoutPanier($mail, $ref, $quantite) {
          $sql = "INSERT INTO Panier (email, ref, quantite)
                  values (:email, :ref, :quantite)";
          $stmt = $this->db->prepare($sql);
          $stmt->BindParam(':email', $mail);
          $stmt->BindParam(':ref', $ref);
          $stmt->BindParam(':quantite', $quantite);
          return $stmt->execute();
        }

    }

    ?>
