<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>

   <form method="post" action="index.php?action=add&entity=post">
      <label>Titre du post: </label><input type="text" name="titlePost" id="titre_post"/>
      </br><label>Votre pseudo: </label><input type="text" name="authorPost" id="auteur_post"/>
      </br><label>Description : </label><textarea type="text" name="descriptionPost" id="description"></textarea>
      </br><input type="submit"/>
   </form>

</body>
</html>