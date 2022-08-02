<?php
require(__DIR__ . "/../../partials/nav.php");
//If user isn't logged in, they cannot access purchase history page
if (!is_logged_in(false)) {
    flash("Please log in to or register account to checkout cart items", "warning");
    die(header("Location: $BASE_PATH" . "/login.php"));
}
$results = [];
$user_id = get_user_id();
$db = getDB();
$stmt = $db->prepare("SELECT id, money_received, payment_method, total_price, first_name, last_name FROM Orders WHERE user_id = :user_id ORDER BY created DESC LIMIT 10");
try {
    $stmt->execute([":user_id" => $user_id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    flash("An unknown error occurred loading your purchase history, please try again later", "warning");
    error_log(var_export($e->errorInfo, true));
}
?>
<h1 class="left-padding">My Purchase History</h1>
<table class="table table-striped">
    <thead>
        <th>Order Name</th>
        <th>Payment</th>
        <th>Total Price</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">No Purchase History</td>
            </tr>
        <?php else : ?>
            <?php foreach($results as $result) : ?>
                <tr>
                    <td><?php se($result, "first_name"); ?> <?php se($result, "last_name"); ?></td>
                    <td>$<?php echo se($result, "money_received", "", false) / 100; ?> via <?php se($result, "payment_method") ?></td>
                    <td>$<?php echo se($result, "total_price", "", false) / 100; ?></td>
                    <td>
                        <form method="post" action="order_details.php">
                            <input type="hidden" name="order-id" value=<?php se($result, "id"); ?>>
                            <input class="btn btn-primary" type="submit", value="See Details">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>