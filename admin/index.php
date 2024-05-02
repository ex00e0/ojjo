<?php
require "../connectdb.php";
$queryProduct = mysqli_query($conn, "SELECT * FROM jewelery inner join category on jew_cat=category_id");
$productsAll = mysqli_fetch_all($queryProduct);
$search = isset($_GET['search'])?$_GET['search']:false;
$sort = isset($_GET['sort'])?$_GET['sort']:false;
$filter = isset($_GET['filter'])?$_GET['filter']:false;
?>
<?php 
require "../HEADER.php";
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление товара</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
      <form method='post' enctype='multipart/form-data' action='checkCreateJew.php' id='createJewForm'>
            <label for='jew_name'>Название товара</label>
            <input required id='jew_name' name='jew_name'>
            <label for='jew_cat'>Категория</label>
            <select id='jew_cat' name='jew_cat'>
            <?php
                $categories = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM category"));
                foreach ($categories as $catt) {?>
                <option value="<?=$catt[0]?>"><?=$catt[1]?></option>
                <?php }  ?>
            </select>
            <label for='jew_descr'>Описание</label>
            <input required id='jew_descr' name='jew_descr'>
            <label for='jew_img'>Изображение</label>
            <input type='file' required id='jew_img' name='jew_img'>
            <label for='jew_price'>Цена</label>
            <input required id='jew_price' name='jew_price'>
            <input type='submit' value='Отправить' id='submitCreateJew' style='display:none;'>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" onclick='submitCreateJew.click();'>Сохранить изменения</button>
      </div>
    </div>
  </div>
</div>
<div class='voidCart'></div>
<div class='navCartSpUsers'>
    <div id='navBlock'>
        <div id='curNav'><a href='index.php' style='text-decoration:none;'>Товары</a></div>
        <div><a href='users.php' style='text-decoration:none;'>Пользователи</a></div>
        <div><a href='category.php' style='text-decoration:none;'>Категории</a></div>
    </div>
    <div id="orderContent" class='orderContentForADMIN'>
<?php
    // $order_no = isset($_GET['order'])?$_GET['order']:false;
    // if ($order_no) {echo "<div id='rowOrder'><div class='headline'>Заказ № $order_no</div></div>";}
        $id_user = $_SESSION['id'];
        $queryJewAdm = "SELECT jew_name, jew_img, jew_price, jew_descr, jew_status, jew_cat, jew_id FROM jewelery";
        if ($search && $filter) {$queryJewAdm.=" WHERE jew_name LIKE '%$search%' AND jew_cat=$filter";}
        else if ($search) {$queryJewAdm.=" WHERE jew_name LIKE '%$search%'";}
        else if ($filter) {$queryJewAdm.=" WHERE jew_cat=$filter";}
        if ($sort) {$queryJewAdm.=" ORDER BY $sort";}
        $queryJewAdm = mysqli_fetch_all(mysqli_query($conn, $queryJewAdm));

        $queryCategories = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM category"));
        if ($queryJewAdm!=null) {
         $i = count($queryJewAdm)+3;
         $ii=0;
         echo "<script> let numRows = document.getElementById('orderContent');
                               numRows.style.gridTemplateRows='repeat($i,4vmax) 1fr'; </script>";
            echo "<div id='rowOrder' class='rowOrderForADMIN'>";
            //здесь убрать data-bs, если нужно будет вернуться + добавить тег a href='createJew.php'
            echo "<form action='index.php' method='get' id='formSearch'>";
            echo "<input name='search' type='text' value='$search'>";
            echo "<input type='hidden' value='$sort' name='sort'>";
            echo "<input type='hidden' value='$filter' name='filter'>";
            echo "<input type='submit' value='Искать' id='buttonSearch'>";
            echo "</form>";
            echo "<div id='buttonCreateJew' data-bs-toggle='modal' data-bs-target='#exampleModal'>Добавить новый товар</div>";
            echo "</div>";

            echo "<div id='rowOrder' class='rowOrderForADMIN'>";
            echo "<form action='index.php' method='get' id='formSort'>";
            echo "<div style='font-size:1vmax;'>Сортировать по:</div>";
            echo "<select name='sort'>"; ?>
                     <option value=''>без сортировки</option>
                     <option value='jew_name ASC' <?=($sort and $sort == "jew_name ASC") ? "selected" : "";?>>названию (а-я)</option>
                     <option value='jew_name DESC' <?=($sort and $sort == "jew_name DESC") ? "selected" : "";?>>названию (я-а)</option>
                     <option value='jew_price ASC' <?=($sort and $sort == "jew_price ASC") ? "selected" : "";?>>цене (по возрастанию)</option>
                     <option value='jew_price DESC' <?=($sort and $sort == "jew_price DESC") ? "selected" : "";?>>цене (по убыванию)</option>
            <?php 
            echo "</select>";
            echo "<div></div>";
            echo "<div style='font-size:1vmax;'>Показывать категории:</div>";
            echo "<select name='filter'>
                     <option value=''>все</option>";
                    foreach ($queryCategories as $fi_cat) { 
                    if ($fi_cat[0]==$filter) {echo "<option value='$fi_cat[0]' selected>$fi_cat[1]</option>";}
                    else {echo "<option value='$fi_cat[0]'>$fi_cat[1]</option>";} }
            echo "</select>";
            echo "<div></div>";
            echo "<input type='hidden' value='$search' name='search'>";
            echo "<input type='submit' value='Отправить'>";
            echo "</form>";
            echo "</div>";

            echo "<div id='rowOrder' class='rowOrderForADMIN'>";
            echo "<div id='numberOrder'>№</div>"; 
            echo "<div id='getOrder'>Фото</div>";
            echo "<div id='sumOrder'>Название</div>"; 
            echo "<div></div>"; 
           echo "<div>Цена</div>";
           echo "<div></div>"; 
           echo "<div>Описание</div>";  
           echo "<div></div>"; 
           echo "<div>Категория</div>";
            echo "</div>";
            foreach ($queryJewAdm as $orders) {
                $ii++;
                if ($orders[4]=='deleted') {$class_st='classDeleted';
                    $class_st2='classDeleted2';}
                else {$class_st='classAvailable';  
                    $class_st2='classAvailable2';}
                echo "<form id='rowOrder' class='rowOrderForADMIN' action='checkJewEdit.php' method='post' enctype='multipart/form-data'>";
                                                                    echo "<div id='numberOrder' class='$class_st2'>$ii</div>"; 
                                                                     echo "<input type='file' id='file' style='display:none;' name='jew_img'>
                                                                     <img src='../resources/$orders[1]' id='imgOrder' onclick='file.click()' title='изображение'>"; 
                                                                    // echo "<div id='getOrder'>$orders[0]</div>";
                                                                    echo "<input id='getOrder' value='$orders[0]' class='$class_st' name='jew_name' required title='название'>";
                                                                    // echo "<div id='sumOrder'>$orders[2] ₽</div>";   
                                                                    echo "<div></div>";
                                                                    echo "<input value='$orders[2]' class='$class_st' name='jew_price' required title='цена'> ₽";  
                                                                    echo "<input value='$orders[3]' class='$class_st' name='jew_descr' required title='описание'>";
                                                                    echo "<div></div>";
                                                                    echo "<select class='$class_st' name='jew_cat' title='категория'>";
                                                                          foreach ($queryCategories as $category) {if ( $orders[5] == $category[0]) {$sel = 'selected';}
                                                                                                                   else {$sel = '';}
                                                                            echo "<option $sel>$category[1]</option>";}
                                                                    echo "</select>";
                                                                    echo "<input type='submit' value='OK' class='$class_st' id='buttonOK'>";
                                                                    if ($orders[4]=='deleted') {echo "<a href='preEditJewStatus.php?edit=recover&id=$orders[6]' class='aDelRec'><img src='../recover.png' class='buttonRecover'></a>";}
                                                                    else {echo "<a href='preEditJewStatus.php?edit=delete&id=$orders[6]'><img src='../delete.png' class='buttonDelete'></a>";}
                                                                    echo "<input type='hidden' value='$orders[6]' name='jew_id'>";
                                                                    echo  "</form>";}} 
        else {echo "<script> let numRows = document.getElementById('orderContent');
            numRows.style.gridTemplateRows='repeat(2,4vmax) 1fr'; </script>";
            echo "<div id='rowOrder' class='rowOrderForADMIN'>";
            //здесь убрать data-bs, если нужно будет вернуться + добавить тег a href='createJew.php'
            echo "<form action='index.php' method='get' id='formSearch'>";
            echo "<input name='search' type='text' value='$search'>";
            echo "<input type='hidden' value='$sort' name='sort'>";
            echo "<input type='hidden' value='$filter' name='filter'>";
            echo "<input type='submit' value='Искать' id='buttonSearch'>";
            echo "</form>";
            echo "<div id='buttonCreateJew' data-bs-toggle='modal' data-bs-target='#exampleModal'>Добавить новый товар</div>";
            echo "</div>";

            echo "<div id='rowOrder' class='rowOrderForADMIN'>";
            echo "<form action='index.php' method='get' id='formSort'>";
            echo "<div style='font-size:1vmax;'>Сортировать по:</div>";
            echo "<select name='sort'>"; ?>
                     <option value=''>без сортировки</option>
                     <option value='jew_name ASC' <?=($sort and $sort == "jew_name ASC") ? "selected" : "";?>>названию (а-я)</option>
                     <option value='jew_name DESC' <?=($sort and $sort == "jew_name DESC") ? "selected" : "";?>>названию (я-а)</option>
                     <option value='jew_price ASC' <?=($sort and $sort == "jew_price ASC") ? "selected" : "";?>>цене (по возрастанию)</option>
                     <option value='jew_price DESC' <?=($sort and $sort == "jew_price DESC") ? "selected" : "";?>>цене (по убыванию)</option>
            <?php 
            echo "</select>";
            echo "<div></div>";
            echo "<div style='font-size:1vmax;'>Показывать категории:</div>";
            echo "<select name='filter'>
                     <option value=''>все</option>";
                    foreach ($queryCategories as $fi_cat) { 
                    if ($fi_cat[0]==$filter) {echo "<option value='$fi_cat[0]' selected>$fi_cat[1]</option>";}
                    else {echo "<option value='$fi_cat[0]'>$fi_cat[1]</option>";} }
            echo "</select>";
            echo "<div></div>";
            echo "<input type='hidden' value='$search' name='search'>";
            echo "<input type='submit' value='Отправить'>";
            echo "</form>";
            echo "</div>";
             echo "<p id='empty'>Пока пусто..</p>";
        }
    ?>
</div>
</div>

<!-- <div class='listEl'></div> -->

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
            <img src="../Rectangle 13.png" id="h102">
            <img src="../Rectangle 14.png" id="h103">
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
    <?php require ("../modal.php"); ?>
</body>
</html>