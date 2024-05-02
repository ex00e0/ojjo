<?php
require "connectdb.php";
$queryProduct = mysqli_query($conn, "SELECT * FROM jewelery inner join category on jew_cat=category_id");
$productsAll = mysqli_fetch_all($queryProduct);
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oppo</title>
    <style>
        #wrapper2 {display: grid;
                    height: 55vmax;
                    grid-template-rows: 9% 4.5% 9% 6% 5% 55% auto;
                    grid-template-columns: 21% 1fr 21%;}
        #c1 {grid-row:2;
             grid-column:1/span all;
             text-align: center;
             color:#333333;
             font-family:"Gilroy";
             font-size:1.1vmax;}
        #c2 {grid-row:3;
             grid-column:1/span all;
             text-align: center;
             color:#333333;
             font-family:"Noto Serif B";
             font-size:1.6vmax;}
        #c3 {grid-row:4;
            grid-column:2;
            display:grid;
            grid-template-columns: repeat(6,1fr);
            column-gap:1.65%;
            grid-template-rows: 100%;}
        .c3grid {display:grid;
                grid-template-columns: 5% 1fr;
                grid-template-rows: 10% 1fr;}
        .c3active {font-family:"Gilroy M";
                   font-size:1.1vmax;
                   color:white;
                   border:none;
                   grid-row:1/span all;
                   grid-column:1/span all;
                   background-color: #333333;}
        .c3disabled1 {font-family:"Gilroy M";
                   font-size:1.1vmax;
                   color:#333333;
                   background-color: #F9F9F9;
                   border:0.1vmax solid #d6d6d6;
                   grid-row:1/span all;
                   width:95%;
                   height:90%;
                   grid-column:1/span all;}
        .c3disabled2 {font-family:"Gilroy M";
                   font-size:1.1vmax;
                   color:#333333;
                   background-color: #F9F9F9;
                   border:0.1vmax solid #d6d6d6;
                   grid-row:2;
                   grid-column:2;}
        #c4 {grid-row:6;
            grid-column:2;
            display:grid;
            grid-template-columns: repeat(3,1fr);
            column-gap:3%;
            row-gap:5%;
            grid-template-rows: repeat(2,1fr);}
        #c4 > div {display: grid;
                    grid-template-columns: 100%;
                    grid-template-rows: 80% 1fr;}
        .c4image {grid-row:1/span all;
                 grid-column:1/span all;
                 width:100%;}
        .c4text {font-family:"Gilroy M";
                   font-size:1.3vmax;
                   color:white;
                   grid-row:2;
                   text-align: center;
                 grid-column:1/span all;}
        #wrapper3 {display: grid;
                    height: 28vmax;
                    background-image: url("Rectangle\ 6.png");
                    background-size: cover;
                    grid-template-rows: 18% 8% 16% 29% 10% 1fr;
                    grid-template-columns: 100%;
                    text-align: center;}
        #d1 {font-family:"Gilroy";
            font-size:1.1vmax;
            color:white;
            grid-row:2;}
        #d2 {font-family:"Noto Serif B";
            font-size:1.5vmax;
            color:white;
            grid-row:3;}
        #d3 {font-family:"Gilroy";
            font-size:0.95vmax;
            color:white;
            grid-row:4;
            line-height:1.3vmax;}
        #d4 {font-family:"Gilroy M";
                   font-size:1.1vmax;
                   color:#333333;
                   border:none;
                   grid-row:5;
                   height:100%;
                   width:12%;
                   justify-self: center;
                   background-color: white;}
        #wrapper4 {display: grid;
                    height: 44vmax;
                    grid-template-rows: 14% 5% 11% 43.5% 7% 6% 1fr;
                    grid-template-columns: 21% 1fr 21%;
                    text-align: center;}
        #e1 {grid-row:2;
             grid-column:1/span all;
             text-align: center;
             color:#333333;
             font-family:"Gilroy";
             font-size:1.1vmax;}
        #e2 {grid-row:3;
             grid-column:1/span all;
             text-align: center;
             color:#333333;
             font-family:"Noto Serif B";
             font-size:1.6vmax;}
        #e3 {grid-row:4;
             grid-column:2;
             display:grid;
             grid-template-rows: 100%;
             grid-template-columns: repeat(3,1fr);
             column-gap:3%;}
        #e3 > div {display:grid;
                 grid-template-rows:68% 1fr;
                 grid-template-columns: 100%;}
        .e3image {width:100%;
                  grid-row:1/span all;
                  grid-column: 1;}
        .e3text {grid-row:2;
                color:white;
                line-height: 1.5vmax;
                font-family:"Gilroy";
                font-size:1.1vmax;
                text-align: center;
                grid-column: 1;}
        #e4 {font-family:"Gilroy M";
                   font-size:1.1vmax;
                   color:white;
                   border:none;
                   grid-row:6;
                   grid-column: 1/span all;
                   height:100%;
                   width:13%;
                   justify-self: center;
                   background-color: #333333;}
        #wrapper5 {display: grid;
                    height: 46vmax;
                    grid-template-rows: 5% 11.5% 67% 1fr;
                    grid-template-columns: 21% 1fr 21%;
                    text-align: center;}
        #f1 {grid-column:1/span all;
             text-align: center;
             color:#333333;
             font-family:"Gilroy";
             font-size:1.1vmax;}
        #f2 {grid-column:1/span all;
             text-align: center;
             color:#333333;
             font-family:"Noto Serif B";
             font-size:1.6vmax;}
        #f3 {grid-column:2;
             grid-row:3;
             display:grid;
            grid-template-columns: repeat(4,1fr);
            grid-template-rows:repeat(2,1fr);}
        #f31 {grid-row:1;
             display:grid;
             grid-column:1/3;
             background-image: url("f31.png");
             background-size: cover;}
        #f32 {grid-row:1;
             grid-column:3;
             width:100%;
             height:100%;}
        #f33 {grid-row:1;
             grid-column:4;
             width:100%;}
        #f34 {grid-row:2;
             grid-column:1;
             width:100%;}
        #f35 {grid-row:2;
             grid-column:2;
             width:100%;}
        #f36 {grid-row:2;
             display:grid;
             grid-column:3/5;
             background-image: url("f36.png");
             background-size: cover;}
        #f31 svg, #f36 svg {align-self: center;
                            width:12%;
                            justify-self: center;}
    </style>
</head>
<body>


<div id="background"></div>
    <section id="logInModal">
        <form action="checkLogin.php" method="POST">
            <img src="x.png" alt="christ" class="christ">
            <p id="headerForm">Войти</p>
            <label for="phone" class='labelModal'>Телефон :
                <input type="text" name="phone" id="phone" class='inputModal'>
            </label>
            <label for="password" class='labelModal'>Пароль :
                <input type="password" name="password" id="password" class='inputModal'>
            </label>
            <div id="btns">
                <span id="toSignIn">Зарегистрироваться</span>
                <input type="submit" value="Войти">
            </div>
        </form>
    </section>

    <section id="signInModal">
        <form action="checkReg.php" method="POST">
            <img src="x.png" alt="christ" class="christ">
            <p id="headerForm">Зарегистрироваться</p>
            <label for="nameForm" class='labelModal'>ФИО :
                <input type="text" name="name" id="name" class='inputModal'>
            </label>
            <label for="postForm" class='labelModal'>Телефон :
                <input type="text" name="phone" id="phone" class='inputModal'>
            </label>
            <label for="passwordForm" class='labelModal'>Пароль :
                <input type="password" name="password" id="password" class='inputModal'>
            </label>
            <div id="btns">
                <span id="toLogIn">Войти</span>
                <input type="submit" value="Зарегистрироваться">
            </div>
            
        </form>
    </section>
    <div id="wrapper1FOROPPO">
        <div id="blockA">
            <div id="a1"><a href="">Контрагентам</a></div>
            <div id="a2"><a href="">Дизайнерам</a></div>
            <div id="a3"><a href="">Вакансии</a></div>
            <img src="logo.png" id="a4">
            <svg id="a5" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 16L12.846 10.846C13.7988 9.39788 14.1805 7.64774 13.917 5.93442C13.6536 4.22111 12.7638 2.66648 11.4199 1.57154C10.076 0.476593 8.37369 -0.0807732 6.64247 0.00734836C4.91125 0.09547 3.27431 0.822811 2.04857 2.04855C0.822834 3.27429 0.0954928 4.91123 0.00737125 6.64245C-0.0807504 8.37366 0.476616 10.076 1.57156 11.4199C2.6665 12.7637 4.22113 13.6535 5.93445 13.917C7.64777 14.1804 9.3979 13.7988 10.846 12.846L16 18L18 16ZM2 6.99998C2 4.24298 4.243 1.99998 7 1.99998C9.757 1.99998 12 4.24298 12 6.99998C12 9.75698 9.757 12 7 12C4.243 12 2 9.75698 2 6.99998Z" fill="white"/>
            </svg>
            <div id="a6"><a href="">Поиск</a></div>
            <div id="a7"><?php if (isset($_SESSION['id'])) {echo "<a href='../exit.php'>Выйти</a>";} else {echo "Вход/Регистрация";} ?></div>
            <svg id="a8" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 0C9.06087 0 10.0783 0.421427 10.8284 1.17157C11.5786 1.92172 12 2.93913 12 4C12 5.06087 11.5786 6.07828 10.8284 6.82843C10.0783 7.57857 9.06087 8 8 8C6.93913 8 5.92172 7.57857 5.17157 6.82843C4.42143 6.07828 4 5.06087 4 4C4 2.93913 4.42143 1.92172 5.17157 1.17157C5.92172 0.421427 6.93913 0 8 0ZM8 10C12.42 10 16 11.79 16 14V16H0V14C0 11.79 3.58 10 8 10Z" fill="white"/>
            </svg>
            <svg id="a9" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.97342 2.59641C6.21857 -1.65888 0.642853 0.659263 0.642853 5.29469C0.642853 8.77555 8.28685 14.2205 8.97342 14.9285C9.66471 14.2205 16.9286 8.77555 16.9286 5.29469C16.9286 0.694406 11.7334 -1.65888 8.97342 2.59641Z" fill="white"/>
            </svg>
        </div>
        <div id="no1">Долго, дорого, богато!</div>
        <button id="no2" onclick="document.location = 'catalogue.php' ">КАТАЛОГ ИЗДЕЛИЙ</button>
        <div id="b0"></div>
        <div id="blockBFOROPPO">
            <img src="Rectangle 2.png" class="b1">
            <div class="b2"></div>
            <img src="Rectangle 2.png" class="b1">
            <div class="b2"></div>
            <img src="Rectangle 2.png" class="b1">
            <div class="b2"></div>
            <img src="Rectangle 2.png" class="b1">
            <div class="b2"></div>
            <img src="Rectangle 2.png" class="b1">
            <div class="b2"></div>
            <img src="Rectangle 2.png" class="b1">
        </div>
    </div>
    <div id="wrapper2">
        <div id="c1">К мероприятиям</div>
        <div id="c2">Настоящая красота здесь!</div>
        <div id="c3">
            <div class="c3grid">
                <button class="c3active">СВАДЬБА</button>
            </div>
            <div class="c3grid">
                <button class="c3disabled2"></button>
                <button class="c3disabled1">МУЖУ</button>
            </div>
            <div class="c3grid">
                <button class="c3disabled2"></button>
                <button class="c3disabled1">ЖЕНЕ</button>
            </div>
            <div class="c3grid">
                <button class="c3disabled2"></button>
                <button class="c3disabled1">ПАРТНЕРУ</button>
            </div>
            <div class="c3grid">
                <button class="c3disabled2"></button>
                <button class="c3disabled1">КОЛЛЕКЦИИ</button>
            </div>
            <div class="c3grid">
                <button class="c3disabled2"></button>
                <button class="c3disabled1">РЕДКОСТЬ</button>
            </div>
        </div>
        <div id="c4">
            <div>
                <img src="cc1.png" class="c4image">
                <div class="c4text">КОЛЬЦА</div>
            </div>
            <div>
                <img src="cc2.png" class="c4image">
                <div class="c4text">СЕРЬГИ</div>
            </div>
            <div>
                <img src="cc3.png" class="c4image">
                <div class="c4text">ПОДВЕСКИ</div>
            </div>
            <div>
                <img src="cc4.png" class="c4image">
                <div class="c4text">ЗАПОНКИ</div>
            </div>
            <div>
                <img src="cc5.png" class="c4image">
                <div class="c4text">БРАСЛЕТЫ</div>
            </div>
            <div>
                <img src="cc6.png" class="c4image">
                <div class="c4text">ЧАСЫ</div>
            </div>
        </div>
    </div>
    <div id="wrapper3">
        <div id="d1">Не знаете, что выбрать?</div>
        <div id="d2">Посетите наши салоны в Москве</div>
        <div id="d3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut duis tortor vitae pellentesque <br> egestas quam pulvinar. Pellentesque porttitor velit sit pellentesque. Suspendisse donec <br> pretium id dignissim. Dignissim ultrices eget orci viverra. Egestas quis et ut ultrices <br> imperdiet lectus nulla tempus. Pharetra lorem sem purus nisi libero viverra ipsum.</div>
        <button id="d4">НАШИ САЛОНЫ</button>
    </div>
    <div id="wrapper4">
        <div id="e1">Полезные статьи</div>
        <div id="e2">Лучшие советы по подбору дорогих подарков</div>
        <div id="e3">
            <div>
                <img src="ee1.png" class="e3image">
                <div class="e3text">Как выбрать <br> часы для своей <br> будущей жены</div>
            </div>
            <div>
                <img src="ee2.png" class="e3image">
                <div class="e3text">Запонки для мужа: <br> 7 ключевых правил <br> покупки аксессуара</div>
            </div>
            <div>
                <img src="ee3.png" class="e3image">
                <div class="e3text">Как выбрать <br> обручальные кольца <br> молодоженам</div>
            </div>
        </div>
        <button id="e4">ЧИТАТЬ НАШ БЛОГ</button>
    </div>
    <div id="wrapper5">
        <div id="f1">#ojjo_jewerly</div>
        <div id="f2">Мы в социальных сетях</div>
        <div id="f3">
            <div id="f31">
                <svg viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35 0C15.6719 0 0 15.6719 0 35C0 54.3281 15.6719 70 35 70C54.3281 70 70 54.3281 70 35C70 15.6719 54.3281 0 35 0ZM46.2578 35.5391L29.1953 47.9531C29.1018 48.0203 28.9915 48.0605 28.8766 48.0691C28.7618 48.0777 28.6468 48.0545 28.5442 48.0021C28.4417 47.9496 28.3556 47.8699 28.2954 47.7716C28.2352 47.6734 28.2033 47.5605 28.2031 47.4453V22.6328C28.2027 22.5174 28.2343 22.4041 28.2944 22.3056C28.3544 22.207 28.4406 22.127 28.5434 22.0744C28.6461 22.0218 28.7614 21.9987 28.8765 22.0076C28.9916 22.0166 29.1019 22.0572 29.1953 22.125L46.2578 34.5312C46.3384 34.5883 46.4042 34.6638 46.4496 34.7515C46.4949 34.8391 46.5186 34.9364 46.5186 35.0352C46.5186 35.1339 46.4949 35.2312 46.4496 35.3189C46.4042 35.4065 46.3384 35.4821 46.2578 35.5391Z" fill="white"/>
                </svg>
            </div>
            <img src="f32.png" id="f32">
            <img src="f33.png" id="f33">
            <img src="f34.png" id="f34">
            <img src="f35.png" id="f35">
            <div id="f36">
                <svg viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35 0C15.6719 0 0 15.6719 0 35C0 54.3281 15.6719 70 35 70C54.3281 70 70 54.3281 70 35C70 15.6719 54.3281 0 35 0ZM46.2578 35.5391L29.1953 47.9531C29.1018 48.0203 28.9915 48.0605 28.8766 48.0691C28.7618 48.0777 28.6468 48.0545 28.5442 48.0021C28.4417 47.9496 28.3556 47.8699 28.2954 47.7716C28.2352 47.6734 28.2033 47.5605 28.2031 47.4453V22.6328C28.2027 22.5174 28.2343 22.4041 28.2944 22.3056C28.3544 22.207 28.4406 22.127 28.5434 22.0744C28.6461 22.0218 28.7614 21.9987 28.8765 22.0076C28.9916 22.0166 29.1019 22.0572 29.1953 22.125L46.2578 34.5312C46.3384 34.5883 46.4042 34.6638 46.4496 34.7515C46.4949 34.8391 46.5186 34.9364 46.5186 35.0352C46.5186 35.1339 46.4949 35.2312 46.4496 35.3189C46.4042 35.4065 46.3384 35.4821 46.2578 35.5391Z" fill="white"/>
                </svg>
            </div>
        </div>
    </div>
    <div id="wrapper6">
        <div id="g1">Полезные советы и персональные предложения</div>
        <div id="g2">Эксклюзивная рассылка</div>
        <svg id="g3" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 8.5L7.25 10.6651L7.25 6.33494L11 8.5Z" fill="white"/>
            <path d="M4.75 2.00481L16 8.5L4.75 14.9952L4.75 2.00481Z" stroke="white"/>
        </svg>
        <svg id="g4" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 8.5L7.25 10.6651L7.25 6.33494L11 8.5Z" fill="white"/>
            <path d="M4.75 2.00481L16 8.5L4.75 14.9952L4.75 2.00481Z" stroke="white"/>
        </svg>
        <svg id="g5" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 8.5L7.25 10.6651L7.25 6.33494L11 8.5Z" fill="white"/>
            <path d="M4.75 2.00481L16 8.5L4.75 14.9952L4.75 2.00481Z" stroke="white"/>
        </svg>
        <div id="g6">Личный менеджер</div>
        <div id="g7">Доставка и оформление</div>
        <div id="g8">Индивидуальный дизайн</div>
        <div id="g9">
            <div id="blockG9">
                <input type="text" id="g91" placeholder="ВАШ E-MAIL">
                <button id="g92">ОТПРАВИТЬ</button>
            </div>
        </div>
    </div>
    <div id="wrapper7">
        <div id="h1">ПОЛЕЗНЫЕ ССЫЛКИ</div>
        <div id="h2">ОПЛАТА</div>
        <div id="h3">КОНТАКТЫ</div>
        <div id="h4">СОЦИАЛЬНЫЕ СЕТИ</div>
        <div id="h5"></div>
        <div id="h6"></div>
        <div id="h7"></div>
        <div id="h8"></div>
        <div id="h9">
            <div>Доставка</div>
            <div>Оплата</div>
            <div>Акции</div>
            <div>Политика конфиденциальности</div>
        </div>
        <div id="h10">
            <div id="h101">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit. Ullamcorper <br> justo, nec, pellentesque.</div>
            <img src="Rectangle 13.png" id="h102">
            <img src="Rectangle 14.png" id="h103">
        </div>
        <div id="h11">
            <svg viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.256 10.253C17.16 9.586 16.645 9.066 15.982 8.911C13.405 8.307 12.759 6.823 12.65 5.177C12.193 5.092 11.38 5 10 5C8.62 5 7.807 5.092 7.35 5.177C7.241 6.823 6.595 8.307 4.018 8.911C3.355 9.067 2.84 9.586 2.744 10.253L2.247 13.695C2.072 14.907 2.962 16 4.2 16H15.8C17.037 16 17.928 14.907 17.753 13.695L17.256 10.253ZM10 13.492C8.605 13.492 7.474 12.372 7.474 10.992C7.474 9.612 8.605 8.492 10 8.492C11.395 8.492 12.526 9.612 12.526 10.992C12.526 12.372 11.394 13.492 10 13.492ZM19.95 4C19.926 2.5 16.108 0.001 10 0C3.891 0.001 0.0729981 2.5 0.0499981 4C0.0269981 5.5 0.0709982 7.452 2.585 7.127C5.526 6.746 5.345 5.719 5.345 4.251C5.345 3.227 7.737 2.98 10 2.98C12.263 2.98 14.654 3.227 14.655 4.251C14.655 5.719 14.474 6.746 17.415 7.127C19.928 7.452 19.973 5.5 19.95 4Z" fill="#333333"/>
            </svg>
            <div>8 (812) 234-56-55</div>
            <svg viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.256 10.253C17.16 9.586 16.645 9.066 15.982 8.911C13.405 8.307 12.759 6.823 12.65 5.177C12.193 5.092 11.38 5 10 5C8.62 5 7.807 5.092 7.35 5.177C7.241 6.823 6.595 8.307 4.018 8.911C3.355 9.067 2.84 9.586 2.744 10.253L2.247 13.695C2.072 14.907 2.962 16 4.2 16H15.8C17.037 16 17.928 14.907 17.753 13.695L17.256 10.253ZM10 13.492C8.605 13.492 7.474 12.372 7.474 10.992C7.474 9.612 8.605 8.492 10 8.492C11.395 8.492 12.526 9.612 12.526 10.992C12.526 12.372 11.394 13.492 10 13.492ZM19.95 4C19.926 2.5 16.108 0.001 10 0C3.891 0.001 0.0729981 2.5 0.0499981 4C0.0269981 5.5 0.0709982 7.452 2.585 7.127C5.526 6.746 5.345 5.719 5.345 4.251C5.345 3.227 7.737 2.98 10 2.98C12.263 2.98 14.654 3.227 14.655 4.251C14.655 5.719 14.474 6.746 17.415 7.127C19.928 7.452 19.973 5.5 19.95 4Z" fill="#333333"/>
            </svg>
            <div>8 (812) 234-56-55</div>
            <svg viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.574002 1.286L8.074 5.315C8.326 5.45 8.652 5.514 8.98 5.514C9.308 5.514 9.634 5.45 9.886 5.315L17.386 1.286C17.875 1.023 18.337 0 17.44 0H0.521002C-0.375998 0 0.0860016 1.023 0.574002 1.286ZM17.613 3.489L9.886 7.516C9.546 7.694 9.308 7.715 8.98 7.715C8.652 7.715 8.414 7.694 8.074 7.516C7.734 7.338 0.941002 3.777 0.386002 3.488C-0.00399834 3.284 1.61606e-06 3.523 1.61606e-06 3.707V11C1.61606e-06 11.42 0.566002 12 1 12H17C17.434 12 18 11.42 18 11V3.708C18 3.524 18.004 3.285 17.613 3.489Z" fill="#333333"/>
            </svg>
            <div>ojjo@ojjo.ru</div>
        </div>
        <div id="h12">
            <div id="h120">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit. Ullamcorper <br> justo, nec, pellentesque.</div>
            <svg id="h121" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.8956 2.52385C22.7662 2.04288 22.5127 1.60435 22.1605 1.25215C21.8083 0.899951 21.3697 0.646434 20.8888 0.516973C19.1175 0.0375978 12 0.0375977 12 0.0375977C12 0.0375977 4.8825 0.0375978 3.11125 0.516973C2.63029 0.646434 2.19176 0.899951 1.83956 1.25215C1.48736 1.60435 1.23384 2.04288 1.10438 2.52385C0.773648 4.33025 0.613153 6.1637 0.625005 8.0001C0.613153 9.83649 0.773648 11.6699 1.10438 13.4763C1.23384 13.9573 1.48736 14.3958 1.83956 14.748C2.19176 15.1002 2.63029 15.3538 3.11125 15.4832C4.8825 15.9626 12 15.9626 12 15.9626C12 15.9626 19.1175 15.9626 20.8888 15.4832C21.3697 15.3538 21.8083 15.1002 22.1605 14.748C22.5127 14.3958 22.7662 13.9573 22.8956 13.4763C23.2264 11.6699 23.3869 9.83649 23.375 8.0001C23.3869 6.1637 23.2264 4.33025 22.8956 2.52385ZM9.72501 11.4126V4.5876L15.6319 8.0001L9.72501 11.4126Z" fill="#333333"/>
            </svg>
            <svg id="h122" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.3624 9.75765C21.3624 9.75765 23.3028 11.6741 23.7828 12.5609C23.7922 12.5736 23.7994 12.5878 23.8044 12.6029C24 12.9305 24.048 13.1873 23.952 13.3769C23.79 13.6901 23.2416 13.8473 23.0556 13.8605H19.626C19.3872 13.8605 18.8904 13.7981 18.2856 13.3805C17.8236 13.0577 17.364 12.5261 16.9188 12.0065C16.254 11.2349 15.6792 10.5653 15.0972 10.5653C15.0237 10.5651 14.9507 10.5773 14.8812 10.6013C14.4408 10.7405 13.8816 11.3681 13.8816 13.0397C13.8816 13.5629 13.4688 13.8605 13.1796 13.8605H11.6088C11.0736 13.8605 8.28722 13.6733 5.81642 11.0681C2.78882 7.87845 0.0696241 1.48005 0.0432241 1.42365C-0.125976 1.00965 0.229224 0.784049 0.613224 0.784049H4.07642C4.54082 0.784049 4.69202 1.06485 4.79762 1.31685C4.92002 1.60605 5.37362 2.76285 6.11762 4.06245C7.32242 6.17685 8.06282 7.03725 8.65442 7.03725C8.76557 7.03758 8.87484 7.0086 8.97122 6.95325C9.74402 6.52845 9.60002 3.76845 9.56402 3.19965C9.56402 3.08925 9.56282 1.96725 9.16682 1.42485C8.88362 1.03605 8.40122 0.884848 8.10962 0.829648C8.18762 0.716848 8.35322 0.544048 8.56562 0.442048C9.09482 0.178048 10.0512 0.139648 11.0004 0.139648H11.5272C12.5568 0.154048 12.8232 0.220048 13.1976 0.314848C13.9512 0.494848 13.9656 0.983249 13.8996 2.64645C13.8804 3.12165 13.86 3.65685 13.86 4.28685C13.86 4.42125 13.854 4.57125 13.854 4.72365C13.8312 5.57685 13.8012 6.53805 14.4036 6.93285C14.4818 6.98152 14.572 7.0073 14.664 7.00725C14.8728 7.00725 15.498 7.00725 17.1936 4.09725C17.9376 2.81205 18.5136 1.29645 18.5532 1.18245C18.5868 1.11885 18.6876 0.940048 18.81 0.868048C18.8971 0.821723 18.9946 0.798581 19.0932 0.800849H23.1672C23.6112 0.800849 23.9124 0.868049 23.9712 1.03605C24.0696 1.30845 23.952 2.14005 22.092 4.65525C21.7788 5.07405 21.504 5.43645 21.2628 5.75325C19.5768 7.96605 19.5768 8.07765 21.3624 9.75765Z" fill="#333333"/>
            </svg>
            <svg id="h123" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.51341 19.7467V10.8677H10.5088L10.9541 7.39127H7.51341V5.17694C7.51341 4.17377 7.79291 3.48694 9.23266 3.48694H11.057V0.387523C10.1694 0.292396 9.27713 0.246465 8.38441 0.249939C5.73674 0.249939 3.91891 1.86627 3.91891 4.83352V7.38477H0.942993V10.8612H3.92541V19.7467H7.51341Z" fill="#333333"/>
            </svg>
            <svg id="h124" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.665 0.717064L0.935003 7.55406C-0.274997 8.04006 -0.267997 8.71506 0.713003 9.01606L5.265 10.4361L15.797 3.79106C16.295 3.48806 16.75 3.65106 16.376 3.98306L7.843 11.6841H7.841L7.843 11.6851L7.529 16.3771C7.989 16.3771 8.192 16.1661 8.45 15.9171L10.661 13.7671L15.26 17.1641C16.108 17.6311 16.717 17.3911 16.928 16.3791L19.947 2.15106C20.256 0.912064 19.474 0.351064 18.665 0.717064Z" fill="#333333"/>
            </svg>  
            <svg id="h125" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.70932 1.63C4.70932 1.41333 4.73132 1.28333 5.10265 1.28333H10.0793C10.946 1.28333 11.426 2.02333 11.7727 3.412L12.0527 4.52267H12.8993C13.0527 1.37067 13.186 0 13.186 0C13.186 0 11.0553 0.24 9.79265 0.24H3.42665L0.0173187 0.130667V1.044L1.16732 1.26133C1.97399 1.42133 2.16732 1.592 2.23399 2.332C2.23399 2.332 2.30732 4.512 2.30732 8.092C2.30732 11.682 2.24732 13.832 2.24732 13.832C2.24732 14.4807 1.98732 14.7207 1.18732 14.8807L0.0393187 15.1007V16L3.45932 15.89H9.15932C10.4493 15.89 13.4193 16 13.4193 16C13.4893 15.22 13.9193 11.68 13.9893 11.2907H13.1893L12.3333 13.2307C11.6633 14.7507 10.6827 14.8607 9.59332 14.8607H6.32265C5.23599 14.8607 4.71265 14.434 4.71265 13.494V8.53333C4.71265 8.53333 7.12599 8.53333 7.90598 8.59733C8.51398 8.64 8.88132 8.814 9.07932 9.66267L9.33932 10.7927H10.2793L10.2193 7.94067L10.3473 5.07067H9.41998L9.11998 6.33067C8.93132 7.16 8.79998 7.31067 7.95065 7.39733C6.83998 7.51067 4.74065 7.49067 4.74065 7.49067V1.63333H4.70732L4.70932 1.63Z" fill="#333333"/>
            </svg>      
        </div>
        <div id="h13"></div>
        <div id="h14">
            <div>(c) 2020 OJJO jewelry</div>
            <div>Договор публичной оферты</div>
            <div>Контрагентам</div>
            <div id="h14Sp">Сделано Figma.info</div>
        </div>
    </div>
    <?php require "modal.php"; ?>
</body>
</html>