<?php
class Reserved{

    // database connection and table name
    private $conn;
    private $table_name = "Reserved";

    // object properties
    public $id;
    public $users_id;
    public $Wish_id;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

// read products
function read(){

    // select all query
    $query = "SELECT
                r.id, r.users_id, r.Wish_id
            FROM
                " . $this->table_name . " r";


    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
}

// create product
function create(){

    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                users_id=:users_id, Wish_id=:Wish_id";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->users_id=htmlspecialchars(strip_tags($this->users_id));
    $this->Wish_id=htmlspecialchars(strip_tags($this->Wish_id));

    // bind values
    $stmt->bindParam(":users_id", $this->users_id);
    $stmt->bindParam(":Wish_id", $this->Wish_id);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;

}

// used when filling up the update product form
function readOne(){

    // query to read single record
    $query = "SELECT
    r.id, r.users_id, r.Wish_id
FROM
    " . $this->table_name . " r
            WHERE
                r.id = ?
            LIMIT
                0,1";

    // prepare query statement
    $stmt = $this->conn->prepare( $query );

    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);

    // execute query
    $stmt->execute();

    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // set values to object properties
    $this->id = $row['id'];
    $this->users_id = $row['users_id'];
    $this->Wish_id = $row['Wish_id'];
}

// update the product
function update(){

    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                users_id = :users_id,
                Wish_id = :Wish_id
            WHERE
                id = :id";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->users_id=htmlspecialchars(strip_tags($this->users_id));
    $this->Wish_id=htmlspecialchars(strip_tags($this->Wish_id));
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind new values
    $stmt->bindParam(':users_id', $this->users_id);
    $stmt->bindParam(':Wish_id', $this->Wish_id);
    $stmt->bindParam(':id', $this->id);

    // execute the query
    if($stmt->execute()){
        return true;
    }

    return false;
}

// delete the product
function delete(){

    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE users_id = ?";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind id of record to delete
    $stmt->bindParam(1, $this->id);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;
}

}
?>
