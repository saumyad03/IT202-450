<?php
require(__DIR__ . "/../../partials/nav.php");
//If user isn't logged in, they cannot access cart features
if (!is_logged_in(false)) {
    flash("Please log in to or register account to access cart features", "warning");
    die(header("Location: $BASE_PATH" . "/login.php"));
}
?>
<h1 class="left-margin">Cart</h1>
<?php
$user_id = get_user_id();
//Deletes all items
if (isset($_POST["remove-all"]) && $_POST["remove-all"] == "true") {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM Cart WHERE user_id=:user_id");
    try {
        $stmt->execute([":user_id" => $user_id]);
        flash("Successfully deleted all cart items", "success");
    } catch (PDOException $e) {
        flash("An unknown error occurred when trying to delete all your cart items", "warning");
        error_log(var_export($e->errorInfo, true));
    }
}
//Deletes item
if (isset($_POST["remove-id"])) {
    $id = $_POST["remove-id"];
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM Cart WHERE user_id=:user_id AND product_id=:prod_id");
    try {
        $stmt->execute([":user_id" => $user_id, ":prod_id" => $id]);
        flash("Successfully removed item from your cart", "success");
    } catch (PDOException $e) {
        flash("An unknown error ocrrured when trying to update your cart", "warning");
        error_log(var_export($e->errorInfo, true));
    }
}
//Updates quantity
if (isset($_POST["quantity"]) && isset($_POST["id"])) {
    $quantity = $_POST["quantity"];
    $id = $_POST["id"];
    $db = getDB();
    //Server side validation
    if ($quantity < 0) {
        flash("This is an invalid quantity", "warning");
    } else if ($quantity == 0) {
        $stmt = $db->prepare("DELETE FROM Cart WHERE user_id=:user_id AND product_id=:prod_id");
        try {
            $stmt->execute([":user_id" => $user_id, ":prod_id" => $id]);
            flash("Successfully removed item from your cart", "success");
        } catch (PDOException $e) {
            flash("An unknown error ocrrured when trying to update your cart", "warning");
            error_log(var_export($e->errorInfo, true));
        }
    } else {
        $stmt = $db->prepare("UPDATE Cart SET desired_quantity=:quantity WHERE user_id=:user_id AND product_id=:prod_id");
        try {
            $stmt->execute([":quantity" => $quantity, ":user_id" => $user_id, ":prod_id" => $id]);
            flash("Successfully updated your cart", "success");
        } catch (PDOException $e) {
            flash("An unknown error occurred when trying to update your cart", "warning");
            error_log(var_export($e->errorInfo, true));
        }
    }
}
//if name is set, adds item to cart
if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $db = getDB();
    //get product details using name
    $stmt1 = $db->prepare("SELECT id, unit_price FROM Products WHERE name=:name");
    try {
        $stmt1->execute([":name" => $name]);
        $product_info = $stmt1->fetch(PDO::FETCH_ASSOC);
        $product_id = $product_info["id"];
        $unit_price = $product_info["unit_price"];
        //insert product into cart
        $stmt2 = $db->prepare("INSERT INTO Cart (product_id, user_id, unit_price) VALUES (:prod_id, :user_id, :price)");
        try {
            $stmt2->execute([":prod_id" => $product_id, "user_id" => $user_id, ":price" => $unit_price]);
            flash("Successfully added $name to cart", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("This product is already in your cart.", "info");
            } else {
                flash("An unknown error occurred, please try again", "warning");
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
$stmt = $db->prepare("SELECT Products.id, Products.name, Products.unit_price, Cart.desired_quantity FROM Cart LEFT JOIN Products ON Cart.product_id = Products.id WHERE Cart.user_id = :user_id");
try {
    $stmt->execute([":user_id" => $user_id]);
    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    flash("An unknown error occurred with displaying your cart, please try again later", "warning");
    error_log(var_export($e->errorInfo, true));
}
$total = 0;
?>
<script>
    function validate(form) {
        let isValid = true;
        if (form.quantity.value < 0) {
            flash("This is an invalid quantity", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<table class="table table-striped">
    <thead>
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
                    <th><a class="text-decoration-none text-dark" href="more_details.php?name=<?php se($result, "name"); ?>"><?php se($result, "name"); ?></a></th>
                    <?php if (has_role("Admin") || has_role("Shop Owner")) : ?>
                        <td><a href="edit_product.php?name=<?php se($result, "name"); ?>">
                                <div class="btn btn-secondary">Edit</div>
                            </a></td>
                    <?php endif; ?>
                    <th>$<?php se($result, "unit_price"); ?></th>
                    <th>
                        <form method="post" onsubmit="return validate(this)">
                            <input class="" name="quantity" type="number" min="0" value="<?php se($result, "desired_quantity"); ?>">
                            <input type="hidden" name="id" value="<?php se($result, "id"); ?>">
                            <input class="btn btn-primary" type="Submit" value="Update">
                        </form>
                    </th>
                    <th>
                        <form method="post">
                            <input type="hidden" name="remove-id" value="<?php se($result, "id"); ?>">
                            <input class="btn btn-danger" type="Submit" value="Remove">
                        </form>
                    </th>
                    <th>Subtotal: $<?php echo (se($subtotal)); ?></th>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<div id="total-label">Total: $<?php se($total); ?></div>
<form class="cart-footer" method="post">
    <input type="hidden" name="remove-all" value="true">
    <input id="cart-remove-all" class="btn btn-danger" type="Submit" value="Delete All Cart Items">
</form>
<form class="cart-footer" method="post">
    <input type="hidden" name="user-id" value="<?php se($user_id) ?>">
    <input id="cart-place-order" class="btn btn-success" type="Submit" value="Place Order">
</form>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>