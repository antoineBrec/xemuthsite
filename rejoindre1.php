<?php
session_start();
?>

<?php

			$sqlip='xemuth.maitremechant.com';
			$sqluser='root';
			$sqlpass='admin';
			$port='3306';
			$chardb = "characters";
                        try {

			$bdd = new PDO('mysql:host=xemuth.maitremechant.com;dbname=characters;charset=utf8', 'root', 'admin');




			$sql = $bdd->query("SELECT * FROM characters WHERE online='1';") or die(mysql_error());
			$variable=0;
			$ally=0;
			$horde=0;
			while($numrows=$sql->fetch()){
			$variable++;

			switch ($numrows['race']) {
    			case 1:
       		        	$ally++;
       			 break;
   			 case 3:
     				$ally++;
       			 break;
    			 case 4:
       				$ally++;
        		 break;
        		 case 7:
       			 	$ally++;
        		 break;
        		 default:
     			  $horde++;
			}
	}


  }
                            catch( PDOException $Exception ) {


                           }


?>


<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Serveur Chronologie</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="shortcut icon" href="/thunder.png">
<link rel="stylesheet" type="text/css" href="css2.css">
</head>

<body class="body" background="background2.jpg" >



<div id="container">
 <div id="first">
<h1><v2><a href="base1.php">Chronologie</a></v2></h1>
<h2><v2>Serveur dynamique World of Warcraft</v2></h2>
</div>




<div align="right"><v1>Vous avez bien &eacute;t&eacute; connect&eacute;. Vous pouvez acc&eacute;der &agrave; votre espace membre!</v1><br />
<div align="right"><v1>Bienvenue <?php echo ($_SESSION['username']); ?> !</v1></div><br>
<div align="right">

<li><y1><a href="#" title="">Changer mdp</a></y1></li>
<li><y><a href="#" title="">Changer Email</a></y></li>
<li><y2><a href="base.php" title="">Déconnexion</a></y2></li>

</div>
 <div id="clear"></div>
</div>
</div>

<div id="sidebar">
<div class="left-box">
			<o>
				<ul>
					<li><a href="rejoindre1.php" title="">Nous rejoindre</a></li>
					<li><a href="#" title="">Avancée PVE</a></li>
					<li><a href="boutique1.php" title="">Boutique</a></li>
					<li><a href="#" title="">Forum</a></li>
					<li><a href="sign_up.php" title="">Bug Report</a></li>
				</ul>
			</o>
		</div>
		<div class="left-box">
			<h2 class="title">Annonces</h2>
				<ul>
					<li>
						<h3>9 Janvier 2017</h3>
						<v2>Site presque terminé, ouverture Iminente !</v2>
					</li>
					<li>
						<h3>19 Décembre 2016</h3>
						<v2>Ouverture du serveur au testeur</v2>
					</li>

				</ul>
			</div>
		<div class="left-box" >
			<v2><h2 class="title">Joueur en ligne : </h2></v2>

			<div class="content">

		        <br><v2>Joueur de l'alliance : <?php echo $ally; ?></v2>
			<br><v2>Joueur de la horde :<?php echo $horde; ?></v2>
			<br><v2>Total : <?php echo $variable; ?></v2>



			</div>
		</div>
	</div>








	<div id="sidebar2">
		<div class="left-box" >
			<h2 >Passage à la prochaine extension :</h2>

				<p>Temps restant avant l'ouverture de la porte des ténèbres :
                                 <iframe src="http://www.decompte.net/compte-a-rebours.php?c=1514172240&s=1&r=0" width="240" height="26" marginheight="0" marginwidth="0" align="middle" scrolling="No" frameborder="0">iframe                  désactivée</iframe>




		</div>

                     <div class="left-box" >
			<h2 >Votez pour le serveur !</h2>


			 <p> Vous voulez un serveur plus peuplé ? Alors votez <a href="sign_up.php" title="">ici</a> !</p>



		</div>

	</div>




	<div id="center">
	<div class="mid-box">

		<div align="center"><h2>Nous rejoindre</h2></div>

		<p>Pour nous rejoindre vous devez télécharger World of Warcraft 1.12 !</p>
		<v2><a href="https://owncloud.dedikam.com/public.php?service=files&t=f52bd6e23b0cc0228e2f526fb42969ea" title="">-World Of Warcraft1.12.zip ≈6Go</a></v2>

		<p>Une fois téléchargé, dézipper le fichier et trouver le "Realmlist.wtf", ouvrez le avec le bloc-note et remplacer ce qui est écrit par "set realmlist xemuth.maitremechant.com" sauvegarder, puis lancer le jeu avec "wow.exe" puis connecter vous avec vos identifiants </p>

		<div align="right"><v2>Enjoy</v2></div>

	</div>
</div>


</div>
<div id="footer">
<div class="mid-box">Certains éléments de ce site sont la propriété intellectuelle de Blizzard Entertainement et sont utilisés avec l'accord de ceux ci, <a href='http://all-free-download.com/free-website-templates/'>voir ici </a>
Ces éléments peuvent être retirés sur simple demande de l'auteur. Blizzard Entertainment® est une marque commerciale,
ou une marque déposée de Blizzard Entertainment aux Etats-Unis et/ou dans d'autres pays. Tous droits réservés.
Ce site n'est ni associé ni approuvé d'aucune façon par Blizzard Entertainment.
</div></body>
</html>
