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
$array = [
    0 => 0,
    1 => 0,
    2 => 1,
	3 => 1,
	4 => 1,
	5 => 2,
	6 => 2,
	7 => 3,
	8 => 3,
	9 => 4,
	10 => 4,
	11 => 4,
    12 => 5,
    13 => 5,
	14 => 6,
	15 => 6,
	16 => 7,
	17 => 7,
	18 => 8,
	19 => 8,
	20 => 9,
	21 => 9,
    22 => 10,
	23 => 10,
	24 => 11,
	25 => 11,
	26 => 12,
	27 => 12,
	28 => 12,
	29 => 13,
	30 => 13,
	31 => 14,
    32 => 14,
	33 => 14,
	34 => 15,
	35 => 15,
	36 => 16,
	37 => 16,
	38 => 17,
	39 => 17,
	40 => 18,
	41 => 18,
    42 => 19,
	43 => 19,
	44 => 20,
	45 => 20,
	46 => 20,
	47 => 21,
	48 => 21,
	49 => 22,
	50 => 22,
	51 => 22,
    52 => 23,
	53 => 23,
	54 => 24,
	55 => 24,
	56 => 25,
	57 => 25,
	58 => 25,
	59 => 26,
	60 => 26,
	];


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
<h1><v2><a href="/index1.php">Chronologie</a></v2></h1>
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
					<li><a href="boutique1.php" title="">Boutique</a></li>
					<li><a href="#" title="">Forum</a></li>
					<li><a href="#" title="">Bug Report</a></li>
				</ul>
			</o>
		</div>
		<div class="left-box">
			<h2 class="title">Annonces</h2>
				<ul>
					<li>
						<h3>19 Décembre 2016</h3>
						<v2>Ouverture du serveur au testeur</v2>
					</li>
					<li>
					<h3>19 Décembre 2016</h3>
					<v2>Première ébauche du site</v2>
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


			 <p> Vous voulez un serveur plus peuplé ? Alors votez ici !</p>



		</div>

		<div class="left-box" >



			 <p> Vous possédé actuellement : <?php echo ($pboutique); ?>  points boutique </p>



		</div>

	</div>




	<div id="center">
	<div class="mid-box">

			<div align="center"><h2>Bienvenue dans la boutique !</h2></div><br />


	<P><h3>Acheter des niveaux pour :	</h3>





	<?php
      $sql3 =$bdd->query('SELECT name FROM characters WHERE account=\''.$_SESSION['userid'].'\';') or die(mysql_error());
			$pigeon;


			while($char=$sql3->fetch())
			{

			echo ('<div align="left">'.$char['name']) ;

			$sql4 =$bdd->query('select level from characters where name =\''.$char['name'].'\';') or die(mysql_error());

			while($level=$sql4->fetch())
			{

			$cpt=60;
			$idlevel=$level['level'];
      echo (' (level actuel : '.$idlevel.' )');
      echo('<form action="bufferlevel.php" method="post">');
			echo '<select id="niveau" name="level">';
			$cout=0;
				while($cpt != $level['level'])
				{

					$cpt--;
					$idlevel++;
					$cout=$cout+$array[$idlevel];
          $gold=$gold+100000;

					echo ('<option value=\''.$idlevel.'|'.$cout.'|'.$char['name'].'|'.$gold.'\'>level '.$idlevel.'  prix :'.$cout.'</option>') ;
				}

				if($cpt==60)
				{
					echo ('<option value=\''.$idlevel.'|'.$cout.'|'.$char['name'].'\'> Vous êtes level Max </option></select>') ;
				}
				else{
          echo('</select>');
          echo ('<V2><input type="submit" value=\'Acheter pour '.$char['name'].'\'>');
				}

			echo '</div>';
      echo ('</form>');
			}
			}
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
