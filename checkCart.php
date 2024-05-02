<?php
session_start();
$id_item = isset($_GET['item'])?$_GET['item']:false;
if (!isset($_SESSION['arrItems'])) {$_SESSION['arrItems']=[];}

for ($i=0; $i<count($_SESSION['arrItems']); $i++)
 {if ($_SESSION['arrItems'][$i]['id_item'] == $id_item) 
    {$_SESSION['arrItems'][$i]['amount']++;
    echo "<script>alert('Товар добавлен в корзину!');
              location.href='tovar.php?id_item=$id_item'; </script>";
    exit();}
 }
//  $count = count($_SESSION['arrItems']);
// array_push($_SESSION['arrItems'][$count]['amount'], 1);
// array_push($_SESSION['arrItems'][$count]['id_item'], $id_item);
array_push($_SESSION['arrItems'], ["id_item"=>$id_item, "amount"=>1]);
    echo "<script>alert('Товар добавлен в корзину!');
              location.href='tovar.php?id_item=$id_item'; </script>";

// array_push($_SESSION['arrItems']['id_item'], $id_item);

?>