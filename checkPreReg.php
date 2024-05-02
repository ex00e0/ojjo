<?php
require "connectdb.php";
$phone = isset($_POST['phone']) ? trim($_POST['phone']) :false;
$pass = isset($_POST['password']) ? trim($_POST['password']) :false;
$name = trim($_POST['name']);
?>
<script>
    let phone ='<?php if ($phone) echo $phone; ?>';
if (phone!='') {if (phone.match(/7[0-9]{10}/)) {<?php session_start();
                                                      $_SESSION['phone']=$phone; 
                                                      $_SESSION['name']=$name;
                                                      $_SESSION['pass']=$pass; ?>
                         location.href='checkReg.php';} 
                    else {//alert("Номер телефона не соответствует шаблону");
                        <?php session_start();
                          $_SESSION['formAuto']='one'; ?>
                            location.href='catalogue.php';} }
</script>

<?php
// if (mail($to, $subject, $message, $headers, $parameters)) {echo "";} //проверять на @mail.ru
?>
