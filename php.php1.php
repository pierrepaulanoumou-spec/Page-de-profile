<?php
$_hote = 'localhost';
$_base = 'test';
$_user = 'root';
$_password = '';
try{
    $pdo = new PDO ("mysql:host=$_hote;dbname=$_base",$_user,$_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //	----	Récupération	des	données	POST	----
$nom =	$_POST['nom'];
$possesseur =	$_POST['possesseur'];
$console =	$_POST['console'];
$prix_max =	$_POST['prix_max'];
$nbre_joueurs=	$_POST['nbre_joueurs_max'];
$commentaires=	$_POST['commentaires'];
//	----	Requête	préparée	(sécurisée	contre	les	injections	SQL)	----
$sql	=	"INSERT	INTO	jeux_video
(nom,	possesseur,	console,	prix_max,	nbre_joueurs_max,	commentaires)
VALUES	(:nom,	:possesseur,	:console,	:prix_max,	:nbre_joueurs_max,	
:commentaires)";
$stmt	=	$pdo->prepare($sql);
//	Liaison	des	paramètres
$stmt->bindParam(':nom',     $nom);
$stmt->bindParam(':possesseur',      $possesseur);
$stmt->bindParam(':console',    $console);
$stmt->bindParam(':prix_max',       $prix_max);
$stmt->bindParam(':nbre_joueurs_max',           $nbre_joueurs);
$stmt->bindParam(':commentaires',              $commentaires);
//	Exécution
$stmt->execute();
echo ("<p>✔ Le	jeu	vidéo a bien été	inséré	dans la	base de données.</p>");

}	catch(PDOException	$e)	{
echo("<p>Erreur	de	connexion	ou	d'insertion	:".$e->getMessage()."</p>");
}
?>
