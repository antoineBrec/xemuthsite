<?php
session_start();
if($_SESSION['username']!=null)
{
}
else
{
header('Location: base.php');
}


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

<?php

$bdd2 = new PDO('mysql:host=xemuth.maitremechant.com;dbname=realmd;charset=utf8', 'root', 'admin');

$sql2 = $bdd2->query('SELECT pboutique FROM account WHERE username=\''.$_SESSION['username'].'\';') or die(mysql_error());
$result=$sql2->fetch();
$pboutique=$result['pboutique'];
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

<li><y1><a href="changepass.php" title="">Changer mdp</a></y1></li>
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
					<li><a href="#" title="">Boutique</a></li>
					<li><a href="#" title="">Forum</a></li>
					<li><a href="#" title="">Bug Report</a></li>
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


			  <p> Vous voulez un serveur plus peuplé ? Alors votez <a href="vote.php" title="">ici</a> !</p>



		</div>

		<div class="left-box" >



			 <p> Vous possédé actuellement : <?php echo ($pboutique); ?>  points boutique </p>



		</div>

	</div>




	<div id="center">
	<div class="mid-box">

			<div align="center"><h2>Bienvenue dans la boutique !</h2></div>


	<P><h3>Rennomer un personnage	!</h3>





	<?php
      $sql3 =$bdd->query('SELECT name FROM characters WHERE account=\''.$_SESSION['userid'].'\';') or die(mysql_error());

  		echo('<form action="bufferrename" method="post">');
			echo '<select id="nom" name="name">';
			while($char=$sql3->fetch())
			{
			echo ('<option value=\''.$char['name'].'\'>'.$char['name'].'</option>');
			}
			echo('</select>');

      echo ('<input type="submit" value=\'Renommer pour : 200 points boutique\'>');
echo ('</form>');





	?>



								</p>



			</div>


</div>


</div>
<div id="footer">
<div class="mid-box">Certains éléments de ce site sont la propriété intellectuelle de Blizzard Entertainement et sont utilisés avec l'accord de ceux ci, <a href='http://all-free-download.com/free-website-templates/'>voir ici </a>
Ces éléments peuvent être retirés sur simple demande de l'auteur. Blizzard Entertainment® est une marque commerciale,
ou une marque déposée de Blizzard Entertainment aux Etats-Unis et/ou dans d'autres pays. Tous droits réservés.
Ce site n'est ni associé ni approuvé d'aucune façon par Blizzard Entertainment.
</div></div></body>
</html>
