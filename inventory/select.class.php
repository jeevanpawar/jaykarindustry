<?php
class SelectList
{
    protected $conn;
 
        public function __construct()
        {
            $this->DbConnect();
        }
 
        protected function DbConnect()
        {
            include "db_config.php";
            $this->conn = mysql_connect($host,$user,$password) OR die("Unable to connect to the database");
            mysql_select_db($db,$this->conn) OR die("can not select the database $db");
            return TRUE;
        }
 
        public function ShowCategory()
        {
            $sql = "SELECT * FROM category";
            $res = mysql_query($sql,$this->conn);
            $category = '<option value="0">choose...</option>';
            while($row = mysql_fetch_array($res))
            {
                $category .= '<option value="' . $row['id_cat'] . '">' . $row['name'] . '</option>';
            }
            return $category;
        }
 
        public function ShowType()
        {
            $sql = "SELECT * FROM type WHERE id_cat=$_POST[id]";
            $res = mysql_query($sql,$this->conn);
            $type = '<option value="0">choose...</option>';
            while($row = mysql_fetch_array($res))
            {
                $type .= '<option value="' . $row['id_type'] . '">' . $row['name'] . '</option>';
            }
            return $type;
        }
}
 
$opt = new SelectList();
?>