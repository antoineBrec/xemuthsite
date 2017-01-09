
 <?php
 session_start();

if(isset($_POST['name']))
{
    $_SESSION['renameachat']='1';
    $_SESSION['coutachat']='200';
    $_SESSION['buffer1']=$_POST['name'];
    header('Location: boutique1.php');
}
 ?>
