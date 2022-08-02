<?php
require(__DIR__ . "/../../partials/nav.php");

if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}
$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT o.id, o.money_received, o.payment_method, o.total_price, o.first_name, o.last_name, u.username FROM Orders as o LEFT JOIN Users as u ON o.user_id = u.id ORDER BY o.created DESC LIMIT 10");
try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    flash("An unknown error occurred loading your purchase history, please try again later", "warning");
    error_log(var_export($e->errorInfo, true));
}
?>
<h1 class="left-padding">All Purchase History</h1>
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
                    <td><?php se($result, "first_name"); ?> <?php se($result, "last_name"); ?>(<a href="profile_info.php?username=<?php se($result, "username"); ?>">@<?php se($result, "username"); ?></a>)</td>
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