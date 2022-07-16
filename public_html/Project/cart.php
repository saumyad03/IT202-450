<?php
require(__DIR__ . "/../../partials/nav.php");
//If user isn't logged in, they cannot access cart features
if (!is_logged_in(false)) {
    flash("Please log in to or register account to access cart features", "warning");
    die(header("Location: $BASE_PATH" . "/login.php"));
}
//if there is a query parameter, adds item to the cart
if (isset($_GET["name"])) {
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
            $stmt2->execute([":prod_id" => $product_id, "user_id" => $user_id, ":price" => $unit_price]);
            flash("Successfully added $name to cart");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("This product is already in your cart.", "info");
            } else {
                flash("Unknown error occurred, please try again", "warning");
                error_log(var_export($e->errorInfo, true));
            }
        }
    } catch (PDOException $e) {
        flash("An unknown error occurred, please try again later", "warning");
        error_log(var_export($e->errorInfo, true));
    }
}
?>
<?php
//Gets cart items
$db = getDB();
$user_id = get_user_id();
$results = [];
//get name, unit_price, desired_quantity for card
$stmt = $db->prepare("SELECT Products.name, Products.unit_price, Cart.desired_quantity FROM Cart LEFT JOIN Products ON Cart.product_id = Products.id WHERE Cart.user_id = :user_id");
try {
    $stmt->execute([":user_id"=>$user_id]);
    $results=$stmt->fetchALL(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    flash("An unknown error occurred with displaying your cart, please try again later", "warning");
    error_log(var_export($e->errorInfo, true));
}
$total = 0;
?>
<h1>Cart</h1>
<table class="table">
    <thead>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">Cart is empty</td>
            </tr>
        <?php else : ?>
            <?php foreach ($results as $result) : ?>
                <?php $subtotal = se($result, "unit_price", "", false) * se($result, "desired_quantity", "", false); ?>
                <?php $total += $subtotal ?>
                <tr>
                    <th><a href="more_details.php?name=<?php se($result, "name"); ?>"><?php se($result, "name"); ?></a></th>
                    <th>$<?php se($result, "unit_price"); ?></th>
                    <th><?php se($result, "desired_quantity"); ?></th>
                    <th>Subtotal: $<?php echo (se($subtotal)); ?></th>
                </tr>
            <?php endforeach; ?>
            <td colspan="100%">Total: <?php se($total); ?></th>
        <?php endif; ?>
    </tbody>
</table>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>