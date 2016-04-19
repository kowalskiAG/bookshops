<?php
class main extends ACore{
    public function get_content() {
        $query ="SELECT id_book,title_book, avtor, zhanr, opisanie FROM books WHERE god_izdan >'2014-12-31'";
        $result = mysql_query($query);
        if(!$result){
            exit(mysql_error());
        }
        echo'
            <div class="content">
            <div class="h2">
                <h2>Новинки</h2>
            </div>
            <div class="cont">';
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
        echo'
            </br></div>
            </div>
            </div>';
    }
}
?>
