<?php
session_start();
$id_item = isset($_GET['item'])?$_GET['item']:false;
if (!isset($_SESSION['arrItems'])) {$_SESSION['arrItems']=[];}
array_push($_SESSION['arrItems'], $id_item);
echo "<script>alert('Товар добавлен в корзину!');
              location.href='tovar.php?id_item=$id_item'; </script>";
?>