
 <?php
 session_start();

if(isset($_POST['level']))
{
    $data=explode('|',$_POST['level']);
    $_SESSION['levelachat'] =$data[0]; // make value
    $_SESSION['coutachat']=$data[1];
    $_SESSION['buffer1']=$data[2];
    $_SESSION['buffer2']=$data[3];
    header('Location: boutique1.php');
}
 ?>
