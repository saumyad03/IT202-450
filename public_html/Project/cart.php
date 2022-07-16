<?php
require(__DIR__ . "/../../partials/nav.php");
//If user isn't logged in, they cannot access cart features
if (!is_logged_in(false)) {
    flash("Please log in to or register account to access cart features", "warning");
    die(header("Location: $BASE_PATH" . "/login.php"));
}
//if no query parameter redirect to home page
if (!isset($_GET["name"])) {
    die(header("Location: $BASE_PATH" . "/home.php"));
} //Adds to cart
else {
    $name = $_GET["name"];
    $db = getDB();
    //get product details using name
    $stmt1 = $db->prepare("SELECT id, unit_price FROM Products WHERE name=:name");
    try {
        $stmt1->execute([":name" => $name]);
        $product_info = $stmt1->fetch(PDO::FETCH_ASSOC);
        $product_id = $product_info["id"];
        $unit_price = $product_info["unit_price"];
        $user_id = get_user_id();
        //insert product into cart
        $stmt2 = $db->prepare("INSERT INTO Cart (product_id, user_id, unit_price) VALUES (:prod_id, :user_id, :price)");
        try {
            $stmt2->execute([":prod_id"=>$product_id, "user_id"=>$user_id, ":price"=>$unit_price]);
            flash("Successfully added $name to cart");
        } catch (PDOException $e) {
            flash("An unknown error occurred, please try again later", "warning");
            error_log(var_export($e->errorInfo, true));
        }
    } catch (PDOException $e) {
        flash("An unknown error occurred, please try again later", "warning");
        error_log(var_export($e->errorInfo, true));
    }
}
//TODO Show cart
?>
<h1>Cart</h1>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>