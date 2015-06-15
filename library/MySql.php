<?php  
class MySQL {  
    private $connection;  
    private $num_queries;  
    public function open()
    {  
        if(!isset($this->connection)){  
                $this->connection = (mysql_connect(_host,_user,_password)) or die(mysql_error());  
                mysql_select_db(_database,$this->connection) or die(mysql_error());  
        }  
    }  

    public function dbQuery($dbQuery)
    {  
        $this->num_queries++;  
        $result = mysql_query($dbQuery,$this->connection);  
        if(!$result){  
            echo 'MySQL Error: ' . mysql_error().'<br>'.$dbQuery;  
            exit;  
        }  
        return $result;   
    }  

    public function fetch_array($dbQuery)
    {   
        return mysql_fetch_array($dbQuery);  
    }  
    public function num_rows($dbQuery)
    {   
        return mysql_num_rows($dbQuery);  
    }  
    public function getTotaldbQuerys()
    {  
        return $this->num_queries;  
    }
    public function close()
    { 
        if ($this->connection){ 
            return mysql_close($this->connection); 
        } 
    }  
}