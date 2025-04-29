<?php
include 'db_config.php';
class db_query extends db_config{
    
    public function inserttwocols($table, $v1, $v2) {
            $sql = "INSERT INTO `$table`  VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $query=$stmt->execute(array($v1, $v2));            
            return $query;

    }
    public function insertThreecols($table, $v1, $v2, $v3) {
        $sql = "INSERT INTO `$table`  VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $query=$stmt->execute(array($v1, $v2, $v3));
        return $query;

}
    public function insertfourcols($table, $v1, $v2, $v3, $v4) {
            $sql = "INSERT INTO `$table`  VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $query=$stmt->execute(array($v1, $v2, $v3, $v4));
            return $query;
    }
    public function insertfivecols($table, $v1, $v2, $v3, $v4, $v5) {
            $sql = "INSERT INTO `$table`  VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $query=$stmt->execute(array($v1, $v2, $v3, $v4, $v5));
            return $query;
    }
    public function readAll($table, $flds) {
        try {
            $sql = "SELECT * FROM `$table` ORDER BY `$flds` ASC"; // Construct the SQL query
            $stmt = $this->db->query($sql); // Pass the SQL query to PDO::query()
            return $stmt; // Return the PDOStatement object
        } catch (PDOException $e) {
            die("Error reading records: " . $e->getMessage());
        }
    }
       public function DeleteOneCond($table, $flds, $v1) {
            $sql = "DELETE FROM `$table` WHERE `$flds` = ?";
            $stmt = $this->db->prepare($sql);
            $query=$stmt->execute(array($v1));
            return $query;
       }
         public function Updatethreecols($table, $flds1, $flds2, $flds3, $v1, $v2, $v3) {
            $sql = "UPDATE `$table` SET `$flds1` = ?, `$flds2` = ? WHERE `$flds3` = ?";
            $stmt = $this->db->prepare($sql);
            $query=$stmt->execute(array($v1, $v2, $v3));
            return $query;
       }
       public function readOneRow($table, $flds, $value) {
            $sql = "SELECT * FROM `$table` WHERE `$flds` = ?";
            $query = $this->db->prepare($sql);
            $query->execute(array($value));
            return $query;
       }
 

    }
?>