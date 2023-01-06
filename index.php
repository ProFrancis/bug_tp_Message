<?php require_once('./messageController.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Tp_message</title>
</head>
<body>
  <?php foreach($arrayMessages as $values ):  ?> <!-- ETAPE SELECT (6) On itère notre tableau ($arrayMessages) pour en extraire les données -->

      <?= $values['pseudo']; ?> <!-- ETAPE SELECT (7) On récupère l'index pseudo de notre tableau ($value) et on affiche son contenu  -->

      <?= $values['content']; ?> <!-- ETAPE SELECT (7) On récupère l'index content de notre tableau ($value) et on affiche son contenu -->

  <?php endforeach; ?> <!-- ETAPE SELECT (8) On close le foreach -->

  <form method="POST">   <!-- ETAPE INSERT INTO (1) On précise la methode du formulaire -->
    <input type="text" placeholder="pseudo" name="pseudo"> <!-- ETAPE INSERT INTO (2) On définit l'attribut name (pseudo) qui sera récupéré par la super global ($_POST), grâce â la methode POST définit juste au-dessus, ce qui nous permettra de récupérer les valeurs saisie par l'internaute dans cet input -->
    <input type="text" placeholder="Message" name="mesage">  <!-- ETAPE INSERT INTO (2) On définit l'attribut name (message) qui sera récupéré par la super global ($_POST), grâce â la methode POST définit juste au-dessus, ce qui nous permettra de récupérer les valeurs saisie par l'internaute dans cet input -->
    <button name="valider">Valider</button> <!-- ETAPE INSERT INTO (3) Button qui permet d'envoyer notre formulaire, le name (valider) nous permettra de savoir quand on clic sur le button -->
  </form>

</body>

</html>