<?php
class author extends ACore{
    public function get_content() {
        echo'<div class="content">
             <div class="h2">
             <h2>Авторизация</h2>
             </div>
             <div class="cont">';
        session_start();
        echo'
            <form name="aut" method="post">
            <div class="field">
            <lable>Ваш логин</lable>
            <input type="text" name="login"/><br>
            </div>
            <div class="field">
            <lable>Ваш пароль</lable>
            <input type="text" name="password"/></br>
            </div>
            <div class="field">
            <input name="submit" type="submit", value="Войти"/>
            </div>';
        if(empty($_SESSION['login'])or empty($_SESSION['id_client'])){
            echo "Вы вошли на сайт, как гость<br>";
        }
        if (isset($_POST['login'])){
            $login = $_POST['login']; 
            if ($login == ''){ 
                unset($login);
             } 
        }
        if (isset($_POST['password'])){ 
            $password=$_POST['password']; 
            if ($password ==''){ 
                unset($password);
            } 
        }
        if (empty($login) or empty($password)){
            exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
        }
        $login = trim(htmlspecialchars(stripslashes($login)));
        $password = trim(htmlspecialchars(stripslashes($password)));
        
        $result = mysql_query("SELECT * FROM client WHERE login='$login'");
        $myrow = mysql_fetch_array($result,MYSQL_ASSOC);
        if (empty($myrow['login'])||empty($myrow['password'])){
            exit ("Извините, введённый вами login или пароль неверный.");
        }
        if ($login == $myrow['login']) {
            $results = mysql_query("SELECT * FROM dostyp WHERE login='$login'");
            $myrows = mysql_fetch_array($results,MYSQL_ASSOC);
            if($login == $myrows['login']){
            header("Location:?option=admin");
            }
            else{
                $_SESSION['login'] = $login;
                $_SESSION['id_client'] = $myrow['id_client'];
                header("Location:?option=main");
            }
              
    }
       
        echo' </div>
            </div>';
        
    }
}
?>
