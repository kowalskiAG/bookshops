<?php
class view extends ACore{
    public function get_content(){
        echo' <div class="content">';
        if(!$_GET['id_book']){
            echo 'Неправильные данные для вывода информации';
        }
        else{
            $id_book = (int)$_GET['id_book'];
            if(!$id_book){
                echo 'Неправильные данные для вывода информации';
            }
            else{
                $query ="SELECT title_book, avtor, opisanie FROM books WHERE id_book='$id_book'";
                $result = mysql_query($query);
                if(!$result){
                    exit(mysql_error());
                }
                $row = mysql_fetch_array($result, MYSQLI_ASSOC);
                printf("
                <div class='lis'>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                </div>
                ",$row['title_book'],$row['avtor'],$row['opisanie']);
            }
        }
        echo' </div>
            </div>';
    }
    
}
?>
