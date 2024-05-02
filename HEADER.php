<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="../style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJJO</title>
</head>
<body>
<div id="background"></div>
<!-- форма регистрации и авторизации-->
    <section id="logInModal">
        <form action="../checkLogin.php" method="POST">
            <img src="../x.png" alt="christ" class="christ">
            <p id="headerForm">Войти</p>
            
            <div class='forLabel'>
                <label for="phone" class='label'>Телефон</label>
                <input type="text" name="phone" id="phone" class='input'>
            </div>
            
            <div class='forLabel'>
                <label for="password" class='label'>Пароль</label>
                <input type="password" name="password" id="password" class='input'>
            </div>
            
            <div id="btns">
                <span id="toSignIn">Зарегистрироваться</span>
                <input type="submit" value="Войти">
            </div>
        </form>
    </section>

    <section id="signInModal">
        <form action="../checkPreReg.php" method="POST">
            <img src="../x.png" alt="christ" class="christ">
            <p id="headerForm">Зарегистрироваться</p>
            <div class='forLabel'>
            <label for="nameForm" class='label'>Имя </label>
                <input type="text" name="name" id="nameREG" class='input'>
            </div>
            <div class='forLabel'>
            <label for="postForm" class='label'>Телефон</label>
                <input type="text" name="phone" id="phoneREG" class='input'>
            </div>
<!-- ВАЖНОЕ!!!  -->
            <div class='coffee' id='coffee'>Номер телефона не соответствует шаблону</div>
            <div class='forLabel'>
            <label for="passwordForm" class='label'>Пароль</label>
                <input type="password" name="password" id="passwordREG" class='input'>
            </div>
            <div id="btns">
                <span id="toLogIn">Войти</span>
                <input type="submit" value="Зарегистрироваться">
            </div>
            
        </form>
    </section>

    <div id="wrapper1">
        <div id="blockA">
            <div id="a1"><a href="../oppo.php" style='text-decoration:none;'>Главная</a></div>
            <div id="a2"><a href="../catalogue.php" style='text-decoration:none;'>Каталог</a></div>
            <div id="a3"><a href="" style='text-decoration:none;'></a></div>
            <a id='a4' href='../oppo.php'><img src="../logo.png" style='width:100%;'></a>
            <svg id="a5" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 16L12.846 10.846C13.7988 9.39788 14.1805 7.64774 13.917 5.93442C13.6536 4.22111 12.7638 2.66648 11.4199 1.57154C10.076 0.476593 8.37369 -0.0807732 6.64247 0.00734836C4.91125 0.09547 3.27431 0.822811 2.04857 2.04855C0.822834 3.27429 0.0954928 4.91123 0.00737125 6.64245C-0.0807504 8.37366 0.476616 10.076 1.57156 11.4199C2.6665 12.7637 4.22113 13.6535 5.93445 13.917C7.64777 14.1804 9.3979 13.7988 10.846 12.846L16 18L18 16ZM2 6.99998C2 4.24298 4.243 1.99998 7 1.99998C9.757 1.99998 12 4.24298 12 6.99998C12 9.75698 9.757 12 7 12C4.243 12 2 9.75698 2 6.99998Z" fill="white"/>
            </svg>
            <div id="a6"><a href="" style='text-decoration:none;'>Поиск</a></div>
            <div id="a7"><?php if (isset($_SESSION['id'])) {echo "<a href='../exit.php' style='text-decoration:none;'>Выйти</a>";} else {echo "Вход/Регистрация";} ?> </div>
            <a href='../settings.php' id="a8"><svg  viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 0C9.06087 0 10.0783 0.421427 10.8284 1.17157C11.5786 1.92172 12 2.93913 12 4C12 5.06087 11.5786 6.07828 10.8284 6.82843C10.0783 7.57857 9.06087 8 8 8C6.93913 8 5.92172 7.57857 5.17157 6.82843C4.42143 6.07828 4 5.06087 4 4C4 2.93913 4.42143 1.92172 5.17157 1.17157C5.92172 0.421427 6.93913 0 8 0ZM8 10C12.42 10 16 11.79 16 14V16H0V14C0 11.79 3.58 10 8 10Z" fill="white"/>
            </svg></a>
            <a href='../cart.php' id="a9"><svg viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.97342 2.59641C6.21857 -1.65888 0.642853 0.659263 0.642853 5.29469C0.642853 8.77555 8.28685 14.2205 8.97342 14.9285C9.66471 14.2205 16.9286 8.77555 16.9286 5.29469C16.9286 0.694406 11.7334 -1.65888 8.97342 2.59641Z" fill="white"/>
            </svg>
            </a>
        </div>
    </div>
<!-- ВАЖНОЕ!!!!!!! js валидация-->
    <?php
    if (isset($_SESSION['formAuto'])) {echo "<script>let vhod = document.getElementById('a7');
        let bg=document.getElementById('background');
let toReg=document.getElementById('toSignIn');
let toSign=document.getElementById('toLogIn');
let modalLog=document.getElementById('logInModal');
let modalSign=document.getElementById('signInModal');
let christ=document.getElementsByClassName('christ');
let coffee = document.getElementById('coffee');
                                                    vhod.addEventListener('click', function(){
                                                        bg.style.visibility='visible';
                                                        modalLog.style.top='20vmax';
                                                    });
                                                    toReg.addEventListener('click', function(){
                                                        modalLog.style.top='-50vmax';
                                                        modalSign.style.top='20vmax';
                                                    })
                                                    
                                                    toSign.addEventListener('click', function(){
                                                        modalLog.style.top='20vmax';
                                                        modalSign.style.top='-50vmax';
                                                    })
                                                    
                                                    for(let i=0;i<christ.length;i++){
                                                        christ[i].addEventListener('click', function(){
                                                            modalLog.style.top='-50vmax';
                                                            modalSign.style.top='-50vmax';
                                                            bg.style.visibility='hidden';
                                                            inputs[3].style.borderColor='white';
                                                            coffee.style.display = 'none';
                                                        })
                                                    }
                                                                    let inputs = document.getElementsByClassName('input');//input
                                                                    let labels = document.getElementsByClassName('label');//label
                                                                    for(let i=0; i<inputs.length;i++) { 
                                                                                inputs[i].onfocus = function( ){
                                                                                    labels[i].style.top = '0vmax';
                                                                                    labels[i].style.color = 'white';
                                                                                    labels[i].style.paddingLeft = '0vmax';
                                                                                }
                                                                                inputs[i].onblur = function(){
                                                                                    labels[i].style.color = '#333';
                                                                                    labels[i].style.top = '1.6vmax';
                                                                                    labels[i].style.paddingLeft = '1vmax';
                                                    
                                                                        }}
                                                     vhod.click();
                                                     toReg.click();
                                                     inputs[3].style.borderColor='red';
                                                     coffee.style.display = 'block';
                                                     </script>";} 
    unset($_SESSION['formAuto']);
    ?>
<a href='#wrapper1'><div id='fixedButton'></div></a>