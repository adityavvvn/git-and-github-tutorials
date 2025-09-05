<?php
class Records {
    private $recordsTable = "live_records";
    public $id;
    public $name;
    public $age;
    public $skills;
    public $address;
    public $designation;
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    // List Records
    public function listRecords(){
        $sqlQuery = "SELECT * FROM ".$this->recordsTable." ";
        if(!empty($_POST["search"]["value"])){
            $sqlQuery .= 'WHERE (id LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR designation LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR address LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR skills LIKE "%'.$_POST["search"]["value"].'%") ';
        }
        if(!empty($_POST["order"])){
            $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            $sqlQuery .= 'ORDER BY id DESC ';
        }
        if($_POST["length"] != -1){
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $result = $this->conn->query($sqlQuery);
        $records = array();
        while ($record = $result->fetch_assoc()) {
            $rows = array();
            $rows[] = $record['id'];
            $rows[] = ucfirst($record['name']);
            $rows[] = $record['age'];
            $rows[] = $record['skills'];
            $rows[] = $record['address'];
            $rows[] = $record['designation'];
            $rows[] = '<button type="button" class="btn btn-warning btn-xs update" id="'.$record["id"].'">Update</button>';
            $rows[] = '<button type="button" class="btn btn-danger btn-xs delete" id="'.$record["id"].'">Delete</button>';
            $records[] = $rows;
        }

        $output = array(
            "draw" => intval($_POST["draw"]),
            "iTotalRecords" => $result->num_rows,
            "iTotalDisplayRecords" => $this->conn->query("SELECT * FROM ".$this->recordsTable)->num_rows,
            "data" => $records
        );

        echo json_encode($output);
    }

    // Add Record
    public function addRecord(){
        $stmt = $this->conn->prepare("
            INSERT INTO ".$this->recordsTable."(`name`, `age`, `skills`, `address`, `designation`)
            VALUES(?,?,?,?,?)");
        $stmt->bind_param("sisss", $this->name, $this->age, $this->skills, $this->address, $this->designation);
        return $stmt->execute();
    }

    // Get Record
    public function getRecord(){
        $sqlQuery = "SELECT * FROM ".$this->recordsTable." WHERE id = ".$this->id;
        $result = $this->conn->query($sqlQuery);
        return $result->fetch_assoc();
    }

    // Update Record
    public function updateRecord(){
        $stmt = $this->conn->prepare("
            UPDATE ".$this->recordsTable." 
            SET name=?, age=?, skills=?, address=?, designation=? 
            WHERE id=?");
        $stmt->bind_param("sisssi", $this->name, $this->age, $this->skills, $this->address, $this->designation, $this->id);
        return $stmt->execute();
    }

    // Delete Record
    public function deleteRecord(){
        $stmt = $this->conn->prepare("DELETE FROM ".$this->recordsTable." WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}
?>
