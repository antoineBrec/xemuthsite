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
<h1><v2><a href="/base1.php">Chronologie</a></v2></h1>
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
		
	</div>	

	
	

	<div id="center">
	<div class="mid-box">
<?php
	 if(isset($_POST['actuelpassword'], $_POST['password'],$_POST['checkpassword']))
        {
                
                        $actuelpass = stripslashes($_POST['actuelpassword']);
                        $password = stripslashes($_POST['password']);
                        $checkpassword = stripslashes($_POST['checkpassword']);
                
				$actuelpass = strtoupper($actuelpass);
				
				
				$bdd2 = new PDO('mysql:host=xemuth.maitremechant.com;dbname=realmd;charset=utf8', 'root', 'admin'); 
                 
				
				
                $req = $bdd2->query('select id,sha_pass_hash from account where username=\''.$_SESSION['username'].'\';');
                $TEST= $req->fetch();
                //On le compare a celui quil a entre et on verifie si le membre existe
				$buff2=strtoupper($_SESSION['username']);
				$str=($buff2.':'.$actuelpass);
				$lemdp =sha1($str);
			
				$bddmdp=$TEST['sha_pass_hash'];
                if($bddmdp==$lemdp)
                {
                        //Si le mot de passe es bon, on ne vas pas afficher le formulaire
                       
                        
						if($password==$checkpassword)
						{	
						$password=strtoupper($password);
						$buff=strtoupper($_SESSION['username']);
						$newmdp=sha1($buff.':'.$password);
                        $bdd2->query('update account set sha_pass_hash=\''.$newmdp.'\' where username=\''.$_SESSION['username'].'\';');
						$form=false;
						}
						else
						{
						$form = true;
						$message ='<v1>Les deux nouveaux mots de passe ne correspond pas</v1>';	
						}


                }
                else
                {
                        //Sinon, on indique que la combinaison nest pas bonne
                        $form = true;
                        $message = '<v1>Mauvais mot de passe</v1>';
                }
        }
        else
        {
                $form = true;
        }
        if(isset($message))
        {
                 echo '<div align="right">'.$message.'</div>';
		}
        if($form)
        {
               
				
				echo'<form action="changepass.php" method="post"><br />';
				echo'<div align="right"><v1>Mdp actuel :<input type="password" name="actuelpassword" id="actuelpassword")</v1></div>';
				echo'<div align="right"><v1>Nouveau Mdp :<input type="password" name="password" id="password")/></v1></div> ';
				echo'<div align="right"><v1>confirmation Mdp :<input type="password" name="checkpassword" id="checkpassword")/></v1></div> ';
				echo'<div align="right"><v1><input type="submit" value="Valider" /></v1></div>';
				echo'<div id="second">';
				echo'</form>';				
        }
		else
		{
			echo '<div align="center"><v1> Le Mdp a bien été changé !</v1></div>';
			echo '<div align="center"><v1> Redirection en cours</v1></div>';
			echo '<meta http-equiv="refresh" content="3; URL=base1.php">';
		}

				
?>	
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