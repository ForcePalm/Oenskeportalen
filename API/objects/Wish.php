<?php
class Wish{

    // database connection and table name
    private $conn;
    private $table_name = "Wish";

    // object properties
    public $id;
    public $link;
    public $title;
    public $description;
    public $price;
    public $image;
    public $wishlist_id;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

// read products
function read(){

    // select all query
    $query = "SELECT
                w.id, w.link, w.title, w.description, w.price, w.image, w.wishlist_id, (wl.title) AS listtitle
            FROM
                " . $this->table_name . " w
                INNER JOIN
                    Wishlist wl
                        ON w.wishlist_id = wl.id";


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
                link=:link, title=:title, description=:description, price=:price, image=:image, wishlist_id=:wishlist_id";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->link=htmlspecialchars(strip_tags($this->link));
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->image=htmlspecialchars(strip_tags($this->image));
    $this->wishlist_id=htmlspecialchars(strip_tags($this->wishlist_id));

    // bind values
    $stmt->bindParam(":link", $this->link);
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":image", $this->image);
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
    w.id, w.link, w.title, w.description, w.price, w.image, w.wishlist_id
FROM
    " . $this->table_name . " w
            WHERE
                w.id = ?
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
    $this->link = $row['link'];
    $this->title = $row['title'];
    $this->description = $row['description'];
    $this->price = $row['price'];
    $this->image = $row['image'];
    $this->wishlist_id = $row['wishlist_id'];
}

// used when filling up the update product form
function readAllWhere(){

    // select all query
    $query = "SELECT
                w.id, w.link, w.title, w.description, w.price, w.image, w.wishlist_id, (wl.title) AS listtitle
            FROM
                " . $this->table_name . " w
                INNER JOIN
                    Wishlist wl
                    ON w.wishlist_id = wl.id
                WHERE w.wishlist_id = ?";


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
                link = :link,
                title = :title,
                description = :description,
                price = :price,
                image = :image
            WHERE
                id = :id";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->link=htmlspecialchars(strip_tags($this->link));
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->image=htmlspecialchars(strip_tags($this->image));
    $this->id=htmlspecialchars(strip_tags($this->id));

    // bind new values
    $stmt->bindParam(':link', $this->link);
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':image', $this->image);
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
