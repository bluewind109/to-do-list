<?php 
  class Db{
    public $mysql;
    
    function __construct(){
      //server info
      $server = 'localhost';
      $user = 'root';
      $pass = '';
      $db = 'to-do-list';
      $this->mysql = new mysqli($server, $user, $pass, $db) or die("Can't connect to this database.");
    }

    function delete_by_id($id){
      $query = "DELETE from todo WHERE id = $id";
      $result = $this->mysql->query($query) or die("Error on $result.");

      if($result){
        return 'Successed.';
      }
    }

    function update_by_id($id, $description){
      $query = "UPDATE todo
                SET description = ?
                WHERE id = ?
                LIMIT 1";

      if($stmt = $this->mysql->prepare($query)){
        $stmt->bind_param('si', $description, $id);
        $stmt->execute();
        return 'Updated!';
      }
    }
  }
  ?>
