<?php
class delete_data extends ACore_Admin{
    public function get_content() {
        echo'<div class="content">';
        echo" <form  method='post'>
           <p> Название книги: <input type='text' name='title_book'/></p>
           <input type='submit' value='Удалить'/>
           </form>";
        @$title_book = $_POST['title_book'];
        $query = "DELETE FROM books WHERE title_book='$title_book'";
        $result = mysql_query($query);
        if(!$result){
            exit(mysql_error());
        }
        echo' </div>
            </div>';
    }
}
?>
