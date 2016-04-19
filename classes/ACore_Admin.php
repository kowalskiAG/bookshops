<?php
abstract class ACore_Admin {
    protected $db;
    public function __construct() {
        if(!$_SESSION['user']){
            header("Location:?option=author ");
        }
        
        $this->db = mysql_connect(HOST,USER,PASS);
        if(!$this->db){
            exit("Ошибка подключения к базе данных".mysql_error());
        }
        if(!mysql_select_db(DB,$this->db)){
            exit("Нет такой базы данных".mysql_error());
        }
        mysql_query("SET NAMES 'UTF8'");
    }

    protected function get_header(){
        include "header.php";
    }
    
    protected function get_menu(){
        echo"<div id='body'>
            <div class='menu'>
                <ul id='bar'>
                    <li><a href='?option=edit_data'>Редактирование</a></li>
                    <li><a href='?option=insert_data'>Добавление</a></li>
                    <li><a href='?option=delete_data'>Удаление</a></li>
                </ul>
            </div>";
    }
    protected function get_footer(){
        include "footer.php";
    }
    public function get_body(){
        $this->get_header();
        $this->get_menu();
        $this->get_content();
        $this->get_footer();
    }
    abstract function get_content();
}

?>
