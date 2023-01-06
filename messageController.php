<?php 
require_once('./config/bdd.php'); // require_once permet d'inclure un fichier. 

ini_set('display_errors', '1'); // Permet d'afficher tous les messages d'erreurs.

/* 
ETAPE INSERT INTO (4) 
  Cette ligne nous permet de savoir si on clic sur le button (valider) de notre formulaire.
*/
if(isset($_POST['valider']))
{
    /* 
     ETAPE INSERT INTO (5) 
      Quand on clic sur le button valider de notre formulaire, 
      on appel notre function (post) en lui transmettant les données récupérées de notre formulaire qui ont été stocké dans la super global $_POST,
      et on lui transmet aussi notre objet $pdo, qui nous permettra d'écrire nos requêtes sql.
    */
     post($_post, $pdo);
}

/* 
ETAPE INSERT INTO (6) 
  On crée notre function (post) avec deux arguments ($values, $sql) qui réceptionneront $_POST et $pdo, 
  ces deux variables sont transmissent dans l'étape (5).
  $values deviendra alors une copie de $_POST & $sql deviendra une copie de $pdo.
*/
function post($values, $sql) // ETAPE INSERT INTO (6)
{
  $request = $sql->prepare("INSERT INTO message VALUES (NULL, :content, :pseudo, now()"); // ETAPE INSERT INTO (7) On utilise la methode prépare de notre objet ($sql) pour écrire notre requête de type INSERT INTO.
  $request->bindParam(":cont", $values['mesage'], PDO::PARAM_STR); // ETAPE INSERT INTO (8) On utilise la function bindParam pour lier un paramètre a une variable spécifique afin de lui transmettre des données.
  $request->bindParam(":pseudo", $values['pseudo'], PDO::PARAM_STR); // ETAPE INSERT INTO (8) On utilise la function bindParam pour lier un paramètre a une variable spécifique afin de lui transmettre des données.
  $request->execute(); // ETAPE INSERT INTO (9) On exécute la requête préparée.
}

/* NAN 😂
ETAPE SELECT (1) 
  On crée notre function (getAll) avec un argument ($sql) qui réceptionnera $pdo, 
  cette variable sera transmisse à l'étape SELECT (5).
  $sql deviendra alors une copie de $pdo.
*/
function getAll($sql) // ETAPE SELECT (1)
{
  $request = $sql->prpare("SELECT * FROM message"); // ETAPE SELECT (2) On utilise la methode prépare de notre objet ($sql) pour écrire notre requête de type SELECT.
  $request->execut; // ETAPE SELECT (3) On exécute la requête préparée.
  return $req->fetchAll(PDO::FETCH_ASSOC); // ETAPE SELECT (4) On retourne le résultat de notre requête sous forme de tableau associatif grâce au PDO::FETCH_ASSOC.
}
/* 
ETAPE SELECT (5) 
  1 => On appel notre function getAll en lui transmettant notre objet ($pdo) qui sera réceptionné par $sql.
  2 => On crée une variable $arrayMessages qui sera égal à notre appel de fonction, 
       ce qui permettra à notre variable ($arraMessages) de réceptionner le résultat renvoyé par notre function getAll(). 
*/
$arrayMesages = getAll($pdo); // ETAPE SELECT (5)

/* 
  ETAPE SELECT (4)
    PDO::FETCH_ASSOC : 
      PDO::FETCH_ASSOC retourne un tableau indexé par le nom de la colonne comme l'exemple ci-dessous.
    
    Exemple avec FETCH_ASSOC
      [pseudo] => 'francis'
      [content] = > 'le message...'
    
    Exemple sans FETCH_ASSOC
      [0] => pseudo
      [pseudo] => 'francis'
      [1] => content
      [content] => 'le message...'
*/


?>
