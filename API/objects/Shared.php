<?php
class Shared{

    // database connection and table name
    private $conn;
    private $table_name = "Shared";

    // object properties
    public $id;
    public $users_id;
    public $wishlist_id;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

// read products
function read(){

    // select all query
    $query = "SELECT
                s.id, s.users_id, s.wishlist_id
            FROM
                " . $this->table_name . " s";


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
                users_id=:users_id, wishlist_id=:wishlist_id";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->users_id=htmlspecialchars(strip_tags($this->users_id));
    $this->wishlist_id=htmlspecialchars(strip_tags($this->wishlist_id));

    // bind values
    $stmt->bindParam(":users_id", $this->users_id);
    $stmt->bindParam(":wishlist_id", $this->wishlist_id);

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
    s.id, s.user_id, s.wishlist_id
FROM
    " . $this->table_name . " s
            WHERE
                s.id = ?
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
    $this->wishlist_id = $row['wishlist_id'];
}

// update the product
function update(){

    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                users_id = :users_id,
                wishlist_id = :wishlist_id
            WHERE
                id = :id";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->users_id=htmlspecialchars(strip_tags($this->users_id));
    $this->wishlist_id=htmlspecialchars(strip_tags($this->wishlist_id));
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind new values
    $stmt->bindParam(':users_id', $this->users_id);
    $stmt->bindParam(':wishlist_id', $this->wishlist_id);
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
