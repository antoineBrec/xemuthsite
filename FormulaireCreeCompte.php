
<?php
			$sqlip='xemuth.maitremechant.com'; 
			$sqluser='root'; 
			$sqlpass='admin'; 
			$port='3306';
			$chardb = "characters";
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


<html xmlns="http://www.w3.org/1999/xhtml">
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
<h1><v2><a href="/base.php">Chronologie</a></v2></h1>
<h2><v2>Serveur dynamique World of Warcraft</v2></h2>
</div>

<form action="base.php" method="post">
    <div align="right"><v1>Pseudo : <input type="text" name="username" id="username")</v1></div>
	<div align="right"><v1>Mot de passe :<input type="password" name="password" id="password" /></v1></div> 
	<div align="right"><v1><input type="submit" value="Connection" /></v1></div>
	<div align="right"><v1>Pas encore de compte ? <a href="/FormulaireCreeCompte.php">c\'est par ici !</a></c1></div>
    <div id="second">
	</form>
		

</div>
    <div id="clear"></div>
</div>
	

<div id="sidebar">
<div class="left-box">
			<o>
				<ul>
					<li><a href="#" title="">Nous rejoindre</a></li>
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
		
	</div>	

	

	<div id="center">
	<div class="mid-box">

        <?php
//On verifie que le formulaire a ete envoye
if(isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email']) and $_POST['username']!='')
{
	//On enleve lechappement si get_magic_quotes_gpc est active
	if(get_magic_quotes_gpc())
	{
		$_POST['username'] = stripslashes($_POST['username']);
		$_POST['password'] = stripslashes($_POST['password']);
		$_POST['passverif'] = stripslashes($_POST['passverif']);
		$_POST['email'] = stripslashes($_POST['email']);
		
		
			
	}
	
		$username = strtoupper($_POST['username']);
		$password = strtoupper($_POST['password']);
		$passverif = strtoupper($_POST['passverif']);
		$email = strtoupper($_POST['email']);
	//On verifie si le mot de passe et celui de la verification sont identiques
	if($password==$passverif)
	{
		//On verifie si le mot de passe a 6 caracteres ou plus
		if(strlen($password)>=6)
		{
			//On verifie si lemail est valide
			if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$email))
			{
				$link=new PDO('mysql:host=xemuth.maitremechant.com;dbname=realmd;charset=utf8', 'root', 'admin'); 
				//On verifie sil ny a pas deja un utilisateur inscrit avec le pseudo choisis
				$dn =$link->query('select id from account where username="'.$username.'"');
				$dbn=$dn->fetch();
				if($dbn==0)
				{
					//On enregistre les informations dans la base de donnee
					if($link->query('Insert Into account (username,sha_pass_hash,gmlevel,expansion,email)values(\''.$username.'\',sha1(\''.$username.':'.$password.'\'),\'0\',\'0\',\''.$email.'\');'))
					{
						//Si ca a fonctionne, on naffiche pas le formulaire
					$form = false; 
?>
             <div class="message">Vous avez bien &eacute;t&eacute; inscrit. Vous pouvez dor&eacute;navant vous connecter.<br />
			 <div class="message">Redirection en cours</div>
			 <meta http-equiv="refresh" content="3; URL=http://maitremechant.com/base.php">
						
<?php
					}
					else
					{
						//Sinon on dit quil y a eu une erreur
						$form = true;
						$message = 'Une erreur est survenue lors de l\'inscription.';
					}
				}
				else
				{
					//Sinon, on dit que le pseudo voulu est deja pris
					$form = true;
					$message = 'Un autre utilisateur utilise d&eacute;j&agrave; le nom d\'utilisateur que vous d&eacute;sirez utiliser.';
				}
			}
			else
			{
				//Sinon, on dit que lemail nest pas valide
				$form = true;
				$message = 'L\'email que vous avez entr&eacute; n\'est pas valide.';
			}
		}
		else
		{
			//Sinon, on dit que le mot de passe nest pas assez long
			$form = true;
			$message = 'Le mot de passe que vous avez entr&eacute; contien moins de 6 caract&egrave;res.';
		}
	}
	else
	{
		//Sinon, on dit que les mots de passes ne sont pas identiques
		$form = true;
		$message = 'Les mots de passe que vous avez entr&eacute; ne sont pas identiques.';
	}
}
else
{
	$form = true;
}
if($form)
{
	//On affiche un message sil y a lieu
	if(isset($message))
	{
		echo ('<p>'.$message.'</p>');
	}
	//On affiche le formulaire
?>

<div class="content">
    <form action="FormulaireCreeCompte.php" method="post">
        Veuillez remplir ce formulaire pour vous inscrire:<br />
        <div class="center">
            <label for="username">Nom d'utilisateur</label><input type="text" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <label for="password">Mot de passe<span class="small">(6 caract&egrave;res min.)</span></label><input type="password" name="password" /><br />
            <label for="passverif">Mot de passe<span class="small">(v&eacute;rification)</span></label><input type="password" name="passverif" /><br />
            <label for="email">Email</label><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <input type="submit" value="Envoyer" />		
		</div>
    </form>	
</div>

<?php
}
?>


			
</div>	
</div>
<div id="footer">
<div class="mid-box">Certains éléments de ce site sont la propriété intellectuelle de Blizzard Entertainement et sont utilisés avec l'accord de ceux ci, <a href='http://all-free-download.com/free-website-templates/'>voir ici </a>
Ces éléments peuvent être retirés sur simple demande de l'auteur. Blizzard Entertainment® est une marque commerciale,
ou une marque déposée de Blizzard Entertainment aux Etats-Unis et/ou dans d'autres pays. Tous droits réservés. 
Ce site n'est ni associé ni approuvé d'aucune façon par Blizzard Entertainment.
</div></body>
</html>






































