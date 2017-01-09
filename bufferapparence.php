
 <?php
 session_start();

if(isset($_POST['name']))
{
    $_SESSION['apparenceachat']='1';
    $_SESSION['coutachat']='300';
    $_SESSION['buffer1']=$_POST['name'];
    header('Location: boutique1.php');
}
 ?>
