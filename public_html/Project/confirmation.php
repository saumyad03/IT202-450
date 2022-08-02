<?php
require_once(__DIR__ . "/../../partials/nav.php");
//If user isn't logged in, they cannot access checkout page features
if (!is_logged_in(false)) {
    flash("Please log in to or register account to place orders", "warning");
    die(header("Location: $BASE_PATH" . "/login.php"));
}
?>
<?php
$shipping_info = [];
$results = [];
//Selects order details from Orders table and OrderItems table
if (isset($_SESSION["order-id"])) {
    $order_id = $_SESSION["order-id"];
    unset($_SESSION["order-id"]);
    $db = getDB();
    $stmt1 = $db->prepare("SELECT oi.quantity, oi.unit_price, p.name FROM OrderItems as oi LEFT JOIN Products as p ON oi.product_id = p.id WHERE oi.order_id = :order_id");
    $stmt2 = $db->prepare("SELECT payment_method, money_received, total_price, address, first_name, last_name FROM Orders WHERE id = :order_id");
    try {
        $stmt1->execute([":order_id" => $order_id]);
        $results = $stmt1->fetchALL(PDO::FETCH_ASSOC);
        $stmt2->execute([":order_id" => $order_id]);
        $shipping_info = $stmt2->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        flash("An unknown error occurred with showing your order confirmation, please try again later", "warning");
        error_log(var_export($e->errorInfo, true));
    }
}
?>
<h1 class="left-margin">Order Confirmation</h1>
<table class="table table-striped">
    <thead>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">Order is empty</td>
            </tr>
        <?php else : ?>
            <?php foreach ($results as $result) : ?>
                <tr>
                    <td><a class="text-decoration-none text-dark" href="more_details.php?name=<?php se($result, "name"); ?>"><?php se($result, "name"); ?></a></td>
                    <?php if (has_role("Admin") || has_role("Shop Owner")) : ?>
                        <td><a href="edit_product.php?name=<?php se($result, "name"); ?>">
                                <div class="btn btn-secondary">Edit</div>
                            </a></td>
                    <?php endif; ?>
                    <td>$<?php echo se($result, "unit_price", "", false) / 100; ?></td>
                    <td>Quantity: <?php se($result, "quantity"); ?></td>
                    <?php $subtotal = se($result, "unit_price", "", false) * se($result, "quantity", "", false); ?>
                    <td>Subtotal: $<?php echo (se($subtotal, null, "", false)) / 100; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php if (!empty($shipping_info)) : ?>
    <div id="total-label">Total: $<?php echo se($shipping_info, "total_price", "", false) / 100; ?></div>
    <div class="left-margin">
        <h2>Thank you for your order, <?php se($shipping_info, "first_name"); ?> <?php se($shipping_info, "last_name"); ?>. Enjoy &#128540;</h2>
        <h4>Details</h4>
        <p>Payment: $<?php echo se($shipping_info, "money_received", "", false) / 100; ?> via <?php se($shipping_info, "payment_method"); ?></p>
        <p>Location: <?php echo se($shipping_info, "address"); ?></p>
    </div>
<?php endif; ?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>