<?php
require_once 'database.php';
class  DatabaseObject {}
class Photograph extends DatabaseObject {
    
    protected static $table_name = "photographs";
    protected static $db_fields = array("id", "filename", "type", "size", "caption");
    public $id;
    public $filename;
    public $type;
    public $size;
    public $caption;
    
    private $temp_path;
    protected $upload_dir ="images";
    public $errors = array();

    protected $upload_errors = array(
    0 =>"No errors.",
    1 => "Larger than upload_max_filesize.",
    2 =>"Larger than form MAX_FILE_SIZE.",
    3 => "Partial upload.",
    4 => "No file.",
    6 => "No temporary directory",
    7 => "Can't write to disk.",
    8 => "File upload stopped by extension."
);

 //Pass in $_FILE([uploaded_file]) as an argument
public function attach_file($file) {
        //some error checking 
        if(!$file or empty($file) or !is_array($file)){
            //error: nothing uploaded or wrong argument usage
            $this->errors[] = "No file was uploaded.";
            return false;
        }
        elseif($file["error"] !=0){
            //error: report what PHP says went wrong
            $this->errors[] = $this->upload_errors[$file["error"]];
            return false;
        }
        else {
        $this-> temp_path = $file["tmp_name"];
        $this-> filename = basename($file["name"]);
        $this-> type =$file["type"];
        $this-> size = $file["size"];
        
        return true;
        }
    
    }
    
public function save() {
    //A new record won't have an id yet.
    if(isset($this->id)){
            //just to update the caption
        $this->update();
    }
    else{
        //Make sure there are no errors
        if(!empty($this->errors)) {return false;}
        
        //Make sure thecapiton is not too long for the DB
        
        if(strlen($this->caption)>255){
            $this->errors[] = "The caption can only be 255 characters long";
            return false;
        }
        
        //Can't save without filename or temp location 
        if(empty($this->filename) || empty($this->temp_path)){
            $this->errors[] = "The file location was not available.";
            return false;
        }
        
        //Determine the target path
        $target_path = "../{$this->upload_dir}/{$this->filename}";
        
        //Make sure a filr doesn't alredy exists in the target location
        if(file_exists($target_path)){
            $this->errors[] = "The file {$this->filename} already exists";
            return false;
        }
        //Attempt to move the file
        if(move_uploaded_file($this->temp_path, $target_path)){
            //Succes
            ////Save a corresponding entry to the database
            if($this->create()){
                //temp path deleted, because the file isn't there anymore
                unset($this->temp_path);
                return true;
            }
        }
        else{
            //file was not moved
            $this->errors[] = "The file upload failed, possibly due to incorrect permisions"
                    . "on the upload folder.";
            return false;
                    
        }
        
        $this->create();
    }
}

public function destroy() {
    //First remove database entry
    if($this -> delete()){
       //then remove the file
        $target_path = $this->image_path();
        return unlink($target_path) ? true : false;
    }
    else{
        //database delete failed
        return false;
    }
    
}

public function image_path() {
    return "../public/{$this->upload_dir}/{$this->filename}";
}

public function admin_image_path() {
    return "../{$this->upload_dir}/{$this->filename}";
}

public function size_as_text() {
    if($this->size < 1024){
        return "$this->size bytes";
    }
    elseif ($this->size <1048576) {
        $size_kb = round($this->size/1024);
        return "$size_kb KB";
    }
    else{
        $size_mb = round($this->size/1048576, 1);
        return "$size_mb MB";
    }
    
}

public function comments() {
    return Comment::find_comments_on($this->id);
}


//Common database Methods
public static function find_all() {
        //global $database;
       $table_name = self::$table_name;
       return self::find_by_sql("SELECT * FROM $table_name");
        //$result_set = $database->query("SELECT * FROM users");
       // return $result_set;
    }
    
public static function find_by_id($id=0){
        global $database;
        $table_name = self::$table_name;
        $id = $database->escape_string($id);
        $result_array = self::find_by_sql("SELECT * FROM $table_name WHERE id={$id} LIMIT 1");
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

//replaced with a custom save
//public function save() {
//    //A new record won't have an id yet.
//    return isset($this->id)? $this->update() : $this->create();
//}

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