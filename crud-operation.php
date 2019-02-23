<?php 

include "connection.php";

class DataOperation extends Database{
    
    public function insert_record($table,$fields){
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fields)).") VALUES ";
        $sql .= "('".implode("','", array_values($fields))."')"; 
        echo $sql;
        $query = mysqli_query($this->con,$sql);
        if($query){
            return true;
        }
        
    }
    
    public function fetch_record($table){
        $sql = "SELECT * FROM ".$table;
        $array = array();
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function fetch_sort_record($table,$order,$sort){
        $sql = "SELECT * FROM ".$table." ORDER BY ".$order." ".$sort;
        $array = array();
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function fetch_record_groupby($table,$groupby){
        $sql = "";
        $sql .= "SELECT * FROM " . $table . " GROUP BY ".$groupby;
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function select_record($table,$where){
        $sql = "";
        $condition = "";
        $array = array();
        foreach ($where as $key => $value){
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= "SELECT * FROM " . $table . " WHERE " .$condition;
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function select_record_not($table,$where,$not){
        $sql = "";
        $condition = "";
        $array = array();
        foreach ($where as $key => $value){
            $condition .= $key . "='" . $value . "' AND ";
        }

        foreach ($not as $key => $value){
            $condition .= $key . "!='" . $value . "' AND ";
        }

        $condition = substr($condition, 0, -5);
        $sql .= "SELECT * FROM " . $table . " WHERE " .$condition;
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function select_sort_record($table,$where,$order,$sort){
        $sql = "";
        $condition = "";
        $array = array();
        foreach ($where as $key => $value){
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= "SELECT * FROM " . $table . " WHERE " .$condition. " ORDER BY " .$order. " ".$sort;
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function update_record($table,$where,$fields){
        $sql="";
        $condition="";
        foreach($where as $key => $value){
            $condition .= $key."='".$value."' AND ";
        }
        $condition = substr($condition,0, -5);
        foreach ($fields as $key => $value){
            $sql .= $key . "='".$value."', ";
        }
        $sql = substr($sql,0,-2);
        $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;

        if(mysqli_query($this->con,$sql)){
            return true;
        }
    }
    
    public function delete_record($table,$where){
        $sql="";
        $condition="";
        foreach($where as $key => $value){
            $condition .= $key."='".$value."' AND ";
        }
        $condition = substr($condition,0, -5);
        $sql = "DELETE FROM ".$table." WHERE ".$condition;
    //    echo $sql;
        if(mysqli_query($this->con,$sql)){
            return true;
        }
    }
    
    public function select_question($table,$where,$fields){
        
        $sql="";
        $condition="";
        foreach($where as $key => $value){
            $condition .= $key."='".$value."' AND ";
        }
        $condition = substr($condition,0, -5);
        foreach ($fields as $key => $value){
            $sql .= $key . "='".$value."', ";
        }
        $sql = substr($sql,0,-2);
        $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
       // echo $sql;
        mysqli_query($this->con,$sql);

    }
    
    public function update_selected($sql){
        mysqli_query($this->con,$sql);
    }
    
    public function query_record($sql){
        $array = array();
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function query_item($sql){
        $item = "";
       $item = mysqli_query($this->con,$sql);
        return $item;
    }
    
    
    
}

$obj = new DataOperation;


?>