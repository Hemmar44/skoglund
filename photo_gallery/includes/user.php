<?php

require_once 'database.php';

class User {
    
    protected static $table_name = "users";
    protected static $db_fields = array("id", "username", "password", "first_name", "last_name");
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

public static function find_all() {
        //global $database;
       $table_name = self::$table_name;
       return self::find_by_sql("SELECT * FROM $table_name");
        //$result_set = $database->query("SELECT * FROM users");
       // return $result_set;
    }
    
public static function find_by_id($id=0){
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM users WHERE id={$id} LIMIT 1");
        //$result_set = $database->query("SELECT * FROM users WHERE id={$id}");
        return !empty($result_array) ? array_shift($result_array) : false;
        
    }
    
public static function find_by_sql($sql=""){
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while($row = $database->fetch_array($result_set)){
            $object_array[]= self::instantiate($row);
        }
       return $object_array;
    }
 
public static function count_all() {
    global $database;
    $table_name = self::$table_name;
    $sql = "SELECT COUNT(*) FROM $table_name";
    $result_set = $database->query($sql);//returns a number inside a field inside a row;
    $row = $database->fetch_array($result_set);
    return array_shift($row);
}

public static function authenticate($username="", $password=""){
    global $database;
    //pomysl o escape string innym sposobem
    
    $sql = "SELECT * FROM users WHERE username ='{$username}' AND password = '{$password}' LIMIT 1";
    $result_array = self::find_by_sql($sql);
    return !empty($result_array) ? array_shift($result_array) : false;
}

public function full_name(){
       if(isset($this->first_name) and isset($this->last_name)){
            return $this->first_name. " " . $this->last_name;
        }
       else {
            return "";
        }
     }

private static function instantiate($record){
    $object = new self;
//$object->id = $record['id'];
//$object->username = $record["username"];
//$object->password = $record["password"];
//$object->first_name = $record["first_name"];
//$object->last_name = $record["last_name"];
//return $object;
    
    foreach ($record as $attribute=>$value){
        if($object->has_attribute($attribute)){
              $object->$attribute = $value;
              }
         }
         return $object;
}
 
private function has_attribute($attribute){
    //Nazwy wszystkich atrybutów znajdujących się w tej klasie
    $object_vars =  $this->attributes();
    //interesuje czy one istnieją, nie jest ważna ich wartość;
    return array_key_exists($attribute,$object_vars);
    
    
}

public function attributes() {
    //return an array of attribute keys and their values
    $attributes = array();
    foreach(self::$db_fields as $field){
        if(property_exists($this, $field)){
            $attributes[$field] = $this->$field;
        }
    }
    return $attributes;
    //return get_object_vars($this);
}

protected function sanitized_attributes() {
    global $database;
    $clean_attibutes = array();
    //sanitize the values before submiting;
    foreach($this->attributes() as $key => $value){
        $clean_attibutes[$key] = $database->escape_string($value);
    }
    return $clean_attibutes;
}

public function save() {
    //A new record won't have an id yet.
    return isset($this->id)? $this->update() : $this->create();
}

//create and update can as well be protected. We are using save() now.
public function create() {
    global $database;
    //Don't forget good habits"
    // - INSERT INTO table (key, key) VALUES ('value', 'value')
    // - single quotes around all vallues
    // - escape all values to prevent SQL injection
    
    $attributes = $this -> sanitized_attributes();
    //print_r($attributes);
    $table_header = join(", ", array_keys($attributes));
    $values = join("', '",  array_values($attributes));
    //print_r($inna);
    //print_r($values);
    
   // $username = $this->username = $database -> escape_string($this->username);
   // $password = $this->password = $database -> escape_string($this->password);
   // $first_name = $this -> first_name = $database -> escape_string($this->first_name);
   // $last_name = $this -> last_name = $database -> escape_string($this->last_name);
    
    echo "<br/>";
    $sql = "INSERT INTO ".self::$table_name." ($table_header)";
    $sql .= " VALUES ('$values')";
    
    if($database->query($sql)){
        $this->id = $database->insert_id();
        return true;
    }
    else {
        return false;
    }
    
   //echo $sql;
     
     
     
}
    
public function update() {
    global $database;
    
    $attributes = $this-> sanitized_attributes();
    $attribute_pairs = array();
    foreach ($attributes as $key => $value) {
        $attribute_pairs[] = "$key = '{$value}'";
    }
    $id = array_shift($attribute_pairs);//removing id from array
    //echo $first;
    $pairs = join(", ", $attribute_pairs);
    //print_r($pairs);
//    
//    $username = $this->username = $database -> escape_string($this->username);
//    $password = $this->password = $database -> escape_string($this->password);
//    $first_name = $this -> first_name = $database -> escape_string($this->first_name);
//    $last_name = $this -> last_name = $database -> escape_string($this->last_name);
//    
    //$id = $this->id; 
    ///*
    $sql = "UPDATE  ".self::$table_name." SET $pairs WHERE $id  ";
    $database->query($sql);
    // echo $sql;
    return ($database->affected_rows() == 1) ? true : false;//wont run if doesn't find id;
    
    
     
    }
    
public function delete() {
    global $database;
    //use LIMIT when deleting
    $id = $this->id;
    $sql = "DELETE FROM  ".self::$table_name." WHERE id = '$id' LIMIT 1";
    $database -> query($sql);
    return ($database -> affected_rows() == 1)  ? true : false; 
    
}
    
}


?>