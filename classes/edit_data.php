<?php
class edit_data extends ACore_Admin{
    public function get_content() {
        echo'<div class="content">';
        echo" <form  method='post'>
           <p> ID Издателя: <input type='text' name='id_izdatel'/></p>
           <p> Название книги: <input type='text' name='title_book'/></p>
           <p> Автор: <input type='text' name='avtor'/></p>
           <p> Жанр: <input type='text' name='zhanr'/></p>
           <p> Год издания: <input type='text' name='god_izdan'/></p>
           <p> Количество страниц: <input type='text' name='kolvo_str'/></p>
           <p> Цена: <input type='text' name='sale'/></p>
           <p> Описание: <input type='text' name='opisanie'/></p>
           <input type='submit' value='Добавить'/>
           </form>";
        @$id_izdatel = $_POST['id_izdatel'];
        @$title_book = $_POST['title_book'];
        @$avtor = $_POST['avtor'];
        @$zhanr = $_POST['zhanr'];
        @$god_izdan = $_POST['god_izdan'];
        @$kolvo_str = $_POST['kolvo_str'];
        @$sale = $_POST['sale'];
        @$opisanie = $_POST['opisanie'];
        $query = "INSERT INTO books (id_izdatel, title_book, avtor, zhanr, god_izdan, kolvo_str, sale, opisanie) 
            VALUES ('$id_izdatel','$title_book','$avtor','$zhanr','$god_izdan','$kolvo_str', '$sale', '$opisanie')";
        $result = mysql_query($query);
        if(!$result){
            exit(mysql_error());
        }
        echo' </div>
            </div>';
    }
}

?>
