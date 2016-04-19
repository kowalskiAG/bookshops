<?php
abstract class ACore{
    protected $db;
    public function __construct() {
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
        include "menu.php";
    }
    protected function get_bar(){
        include "bar.php";
    }
    protected function get_footer(){
        include "footer.php";
    }
    public function get_body(){
        $this->get_header();
        $this->get_menu();
        $this->get_content();
        $this->get_bar();
        $this->get_footer();
    }
    abstract function get_content();
}

?>
