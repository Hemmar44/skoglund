<?php

require 'config.php';

class MySQLDatabase {
    
    private $connection;
    public  $last_query;


    //open connection everytime object is instantiated
    function __construct(){
        $this->open_connection();
    }
    
    function escape_string($value){
        return $value = mysqli_real_escape_string($this->connection, $value);
    }


    //open conection
    public function open_connection(){
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        if(!$this->connection){
            die("Database connection failed: " .mysqli_error($this->connection));
        }
        //select database if connection is ok.
        else{
            $db_select = mysqli_select_db($this->connection, DB_NAME);
                if(!$db_select){
                    die("Database selection failed: ". mysqli_error($this->connection));
                }
        }
    }
    
    //close connection
    public function close_connection(){
        if(isset($this->connection)){
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }
    
    public function  query($sql){
        $this->last_query = $sql;
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
        }
        
    private function confirm_query($result){
            if(!$result){
                $output = "Database query failed: " .mysqli_error($this->connection)."<br/><br/>";
                $output .= "Last SQL query: " .$this->last_query;
                die($output);
            }
           // else echo "ok";
        }
   
    public function fetch_array($result_set) {
            return mysqli_fetch_array($result_set);
        }
        
    public function num_rows($result_set){
        return mysqli_num_rows($result_set);
    }
    
    public function insert_id(){
        //get the last inserted over the current db connection
        return mysqli_insert_id($this->connection);
    }
    
    public function  affected_rows() {
        return mysqli_affected_rows($this->connection);
    }








    //tu jeszcze coś odnośnie starych php chyba nie potrzebne odc 2-3 lekcja 6
}

$database = new MySQLDatabase;


?>