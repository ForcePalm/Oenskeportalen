<?php
class Users{

    // database connection and table name
    private $conn;
    private $table_name = "Users";

    // object properties
    public $id;
    public $name;
    public $email;
    public $password;
    public $birthday;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

// read products
function read(){

    // select all query
    $query = "SELECT
                u.id, u.name, u.email, u.password, u.birthday
            FROM
                " . $this->table_name . " u";


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
                name=:name, email=:email, password=:password, birthday=:birthday";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->birthday=htmlspecialchars(strip_tags($this->birthday));

    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":birthday", $this->birthday);

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
    u.id, u.name, u.email, u.password, u.birthday
FROM
    " . $this->table_name . " u
            WHERE
                u.email = ?
            LIMIT
                0,1";

    // prepare query statement
    $stmt = $this->conn->prepare( $query );

    // bind id of product to be updated
    $stmt->bindParam(1, $this->email);

    // execute query
    $stmt->execute();

    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // set values to object properties
    $this->id = $row['id'];
    $this->name = $row['name'];
    $this->email = $row['email'];
    $this->password = $row['password'];
    $this->birthday = $row['birthday'];
}

// update the product
function update(){

    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                email = :email,
                password = :password,
                birthday = :birthday
            WHERE
                id = :id";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->birthday=htmlspecialchars(strip_tags($this->birthday));
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind new values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':birthday', $this->birthday);
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

// search products
function search($email){

    // select all query
    $query = "SELECT
                u.id, u.name, u.email, u.password, u.birthday
            FROM
                " . $this->table_name . " u
            WHERE
                u.email LIKE ?
            LIMIT
                0,1";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $email=htmlspecialchars(strip_tags($email));
    $email = "%{$email}%";

    // bind
    $stmt->bindParam(1, $email);

    // execute query
    $stmt->execute();

    return $stmt;
}

function authentication(){
    // query to read single record
    $query = "SELECT
    u.id, u.name, u.email, u.password, u.birthday
FROM
    " . $this->table_name . " u
            WHERE
                u.email = :email
            LIMIT
                0,1";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->email=htmlspecialchars(strip_tags($this->email));

    // bind new values
    $stmt->bindParam(':email', $this->email);

     // execute query
    $stmt->execute();

         // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->password = $row['password'];
    //return false;

}
}