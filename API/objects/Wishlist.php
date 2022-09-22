<?php
class Wishlist{

    // database connection and table name
    private $conn;
    private $table_name = "Wishlist";

    // object properties
    public $id;
    public $title;
    public $description;
    public $users_id;
    public $wishcount;
    public $name;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

// read products
function read(){

    // select all query
    $query = "SELECT
                wl.id, wl.title, wl.description, (SELECT COUNT(*) FROM Wish w WHERE w.wishlist_id= wl.id) as wishcount, wl.users_id, u.name
            FROM
                " . $this->table_name . " wl
                INNER JOIN
                    Users u
                        ON wl.users_id = u.id";


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
                title=:title, description=:description, users_id=:users_id";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->users_id=htmlspecialchars(strip_tags($this->users_id));

    // bind values
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":users_id", $this->users_id);

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
    wl.id, wl.title, wl.description, (SELECT COUNT(*) FROM Wish w WHERE w.wishlist_id= wl.id) as wishcount, wl.users_id, u.name
FROM
    " . $this->table_name . " wl
    INNER JOIN
        Users u
            ON wl.users_id = u.id
            WHERE
                wl.id = ?
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
    $this->title = $row['title'];
    $this->description = $row['description'];
    $this->wishcount = $row['wishcount'];
    $this->users_id = $row['users_id'];
    $this->name = $row['name'];
}

// used when filling up the update product form
function readAllWhere(){

    // select all query
    $query = "SELECT
                wl.id, wl.title, wl.description, (SELECT COUNT(*) FROM Wish w WHERE w.wishlist_id= wl.id) as wishcount, wl.users_id, u.name
            FROM
                " . $this->table_name . " wl
                INNER JOIN
                    Users u
                        ON wl.users_id = u.id
                    WHERE users_id = ?";


    // prepare query statement
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->id);

    // execute query
    $stmt->execute();

    return $stmt;
}

// update the product
function update(){

    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                title = :title,
                description = :description
            WHERE
                id = :id";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind new values
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':description', $this->description);
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
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

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
