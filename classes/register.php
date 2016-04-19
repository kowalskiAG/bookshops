<?php
class register extends ACore{
    public function get_content() {
        echo' <div class="content">
            <h2>Регистрация пользователя</h2>
            <form name="reg" method="post">
            <label>Фамилия</label>
            <input type="text" name="fam"/><br>
            <label>Имя</label>
            <input type="text" name="name"/><br>
            <label>Элекронная почта</label>
            <input type="text" name="mail"/><br>
            <label>Ваш логин</label>
            <input type="text" name="login"/><br>
            <label>Ваш пароль</label>
            <input type="text" name="password"/><br>
            <label>Повторите пароль</label>
            <input type="text" name="password_again"/></p>
            <input name="submit" type="submit", value="Зарегистрироваться"/>
           </form>';
        if (isset($_POST['fam'])){ 
            $fam=$_POST['fam']; 
            if ($fam ==''){
                unset($fam);
            } 
         }
         if (isset($_POST['name'])){ 
            $name=$_POST['name']; 
            if ($name ==''){
                unset($name);
            } 
         }
         if (isset($_POST['mail'])){ 
            $mail=$_POST['mail']; 
            if ($mail ==''){
                unset($mail);
            } 
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
         if(empty($login)or empty($password)){
             exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля");
         }
         $fam = trim(htmlspecialchars(stripcslashes($fam)));
         $name = trim(htmlspecialchars(stripcslashes($name)));
         $mail = trim(htmlspecialchars(stripcslashes($mail)));
         $login = trim(htmlspecialchars(stripcslashes($login)));
         $password = trim(htmlspecialchars(stripcslashes($password)));
        
         $result = mysql_query("SELECT id_client FROM client WHERE login='$login'");
         $myrow = mysql_fetch_array($result);
         if(!empty($myrow['id_client'])){
             exit("Пользователь с таким логином уже существует");
         }
         $result2 = mysql_query("INSERT INTO client (fam, name, mail, login, password) VALUES ('$fam','$name','$mail','$login','$password')");
        if($result2 == true){
            echo 'Вы успешно зарегистрированы';
        }
        else{
            echo 'Ошибка! Вы не зарегистрированы.';
        }
        
         echo' </div>
            </div>';
        }
}
?>