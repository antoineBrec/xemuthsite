<?php
session_start();
$form=true;
//Si lutilisateur est connecte, on le deconecte
if(isset($_SESSION['username']))
{
        //On le deconecte en supprimant simplement les sessions username et userid
        unset($_SESSION['username'], $_SESSION['userid']);

}
else
{
        $ousername = '';
        //On verifie si le formulaire a ete envoye
        if(isset($_POST['username'], $_POST['password']))
        {
                
                        $ousername = stripslashes($_POST['username']);
                        $username = stripslashes($_POST['username']);
                        $password = stripslashes($_POST['password']);
                
				$username = strtoupper($username);
				$password = strtoupper($password);
				
				$bdd2 = new PDO('mysql:host=xemuth.maitremechant.com;dbname=realmd;charset=utf8', 'root', 'admin'); 
                 //On recupere le mot de passe de lutilisateur
				
				
                $req = $bdd2->query('select id,sha_pass_hash from account where username=\''.$username.'\';');
                $TEST= $req->fetch();
                //On le compare a celui quil a entre et on verifie si le membre existe
				
				$str=($username.':'.$password);
				$lemdp =sha1($str);
			
				$bddmdp=$TEST['sha_pass_hash'];
                if($bddmdp==$lemdp)
                {
                        //Si le mot de passe es bon, on ne vas pas afficher le formulaire
                        $form = false;
                        //On enregistre son pseudo dans la session username et son identifiant dans la session userid
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['userid'] = $TEST['id'];
					

					header('Location: base1.php'); 
					
					}
                else
                {
                        //Sinon, on indique que la combinaison nest pas bonne
                        $form = true;
                        $message = 'La combinaison que vous avez entr&eacute; n\'est pas bonne.';
                }
        }
        else
        {
                $form = true;
        }
					

}	
                     

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
<h1><v2><a href="base.php">Chronologie</a></v2></h1>
<h2><v2>Serveur dynamique World of Warcraft</v2></h2>
</div>
<form action="base.php" method="post">

<?php


                
        if($form)
        {
                //On affiche un message sil y a lieu
        if(isset($message))
        {
                echo '<div align="right">'.$message.'</div>';
        }
        //On affiche le formulaire

        }

	if(isset($_SESSION['username']))
		{
    echo '<div align="right"><v1>Bienvenue '.$ousername.' !</v1></div>';
	
	echo '<li><v1><a href="#" title="">Changer mdp</a></v1></li>';

	echo '<li><v1><a href="/base.php?compna='.urlencode($deco).'">'.$deco.'>Déconnexion</a></v1></li>';
	
		}
	else
	{

	echo '<div align="right"><v1>Pseudo : <input type="text" name="username" id="username")</v1></div>';
	echo '<div align="right"><v1>Mot de passe :<input type="password" name="password" id="password" /></v1></div> ';
	echo '<div align="right"><v1><input type="submit" value="Connection" /></v1></div>';
	echo '<div align="right"><v1>Pas encore de compte ? <a href="/FormulaireCreeCompte.php">c\'est par ici !</a></c1></div>';
    echo' <div id="second">';
	echo '</form>';
		
		
	}	
?>
</div>
    <div id="clear"></div>
</div>
	

<div id="sidebar">
<div class="left-box">
			<o>
				<ul>
					<li><a href="rejoindre.php" title="">Nous rejoindre</a></li>
					<li><a href="#" title="">Avancée PVE</a></li>
					<li><a href="sign_up.php" title="">Boutique</a></li>
					<li><a href="#" title="">Forum</a></li>
					<li><a href="sign_up.php" title="">Bug Report</a></li>
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
			   

			 <p> Vous voulez un serveur plus peuplé ? Alors votez <a href="sign_up.php" title="">ici</a> !</p>	


		
		</div>
		
	</div>	
	
	

	<div id="center">
	<div class="mid-box">
			
	<form action="sign_up.php" method="post">
	
	


<?php
        if($form)
        {
                //On affiche un message sil y a lieu
        if(isset($message))
        {
                echo '<div align="right">'.$message.'</div>';
        }
        //On affiche le formulaire

        }

?>

	
	
	
	<br /><div align="center"><v3>Pseudo : <input type="text" name="username" id="username")</v3></div>
	<div align="center"><v1>Mot de passe : <input type="password" name="password" id="password" /></v1></div> <br/>
    <div align="center"><v1><input type="submit" value="Connection" /></v1></div>
	<div align="center"><v1>Pas encore de compte ? <a href="/FormulaireCreeCompte.php">c'est par ici !</a></c1></div>
    <div id="second">
	</form>
	
	
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
