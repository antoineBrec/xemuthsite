
 <?php
 session_start();

if(isset($_POST['gold']))
{
    $data=explode('|',$_POST['gold']);
    $_SESSION['orachat'] =$data[0];
    $_SESSION['orachat']=($_SESSION['orachat'].'0000');
    $_SESSION['coutachat']=$data[1];
    $_SESSION['buffer1']=$data[2];
    header('Location: boutique1.php');
}
 ?>
