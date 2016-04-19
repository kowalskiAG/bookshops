<?php
class search extends ACore{
    public function get_content() {
        echo'<div class="content">
             <div class="h2">
             <h2>Поиск</h2>
             </div>
             <div class="cont">
             <form name="search" method="post">
             <label>Название книги:</label>
             <input type="text" name="title_book"/><br>
             <label>Автор</label>
             <input type="text" name="avtor"/><br>
             <input name="submit" type="submit", value="Поиск"/>
             </form>';
        if (isset($_POST['search'])){
            $title_book = $_POST['search']; 
            if ($title_book == ''){ 
                unset($title_book);
             } 
        }
       
         @$title_book = htmlspecialchars($title_book);
         $result = mysql_query("SELECT * FROM books WHERE title_book='$title_book'");
         if(!empty($result)){
            for($i=0;$i < mysql_num_rows($result);$i++){
                $row = mysql_fetch_array($result,MYSQLI_ASSOC);
                printf(" 
                <div class='lis'>
                <p><a id='lisa' href='?option=view&id_book=%s'>%s</a></p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
            </div>    
            ",$row['id_book'],$row['title_book'],$row['avtor'],$row['zhanr'],$row['opisanie']);
            }
         }
         else{
             echo 'Нет так книги';
         }
        
        echo'</br></div> 
            </div>
            </div>';
    }
}

?>
