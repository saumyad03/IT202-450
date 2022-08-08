<?php
require(__DIR__ . "/../../partials/nav.php");

if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}
//pagination variables
$page = 1;
$offset = 0;
$per_page = 10;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page >= 1) {
        $offset = ($page - 1) * $per_page;
    }
}
$db = getDB();
$query = "SELECT o.id, o.money_received, o.payment_method, o.total_price, o.first_name, o.last_name, u.username FROM Orders as o LEFT JOIN Users as u ON o.user_id = u.id WHERE 1=1";
$params = [];
$total_query = "SELECT COUNT(1) as total FROM Orders id WHERE 1=1";
$total_params = [];
//default variables for filters
$date_range = "all";
$category = "all";
$total_sort = "none";
$date_sort = "new-old";
if (isset($_GET["date-range"]) && isset($_GET["category"]) && isset($_GET["total-sort"]) && isset($_GET["date-sort"])) {
    $date_range  = $_GET["date-range"];
    $category = $_GET["category"];
    $total_sort = $_GET["total-sort"];
    $date_sort = $_GET["date-sort"];
}
if ($date_range != "all") {
    if($date_range == "last-day") {
        $query .= " AND o.created >= NOW() - INTERVAL 1 DAY";
        $total_query .= " AND created >= NOW() - INTERVAL 1 DAY";
    } else {
        $query .= " AND o.created >= NOW() - INTERVAL 1 WEEK";
        $total_query .= " AND created >= NOW() - INTERVAL 1 WEEK";
    }
}
if ($total_sort != "none") {
    if ($total_sort == "low-high") {
        $query .= " ORDER BY o.total_price ASC";
    } else {
        $query .= " ORDER BY o.total_price DESC";
    }
}
if ($date_sort == "old-new") {
    if(!strpos($query, "ORDER BY")) {
        $query.= " ORDER BY o.created DESC";
    } else {
        $query .= " , o.created DESC";
    }
} else {
    if(!strpos($query, "ORDER BY")) {
        $query.= " ORDER BY o.created ASC";
    } else {
        $query .= " , o.created ASC";
    }
}
$stmt = $db->prepare($total_query);
try {
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $page_count = ceil(se($result, "total", "0", false)/$per_page);
} catch (PDOException $e) {
    flash("An unknown error occurred paginating all purchase history, please try again later", "warning");
    error_log(var_export($e->errorInfo, true));
}
$results = [];
$query .= " LIMIT :offset, :per_page";
$params[":offset"] = $offset;
$params[":per_page"] = $per_page;
$stmt = $db->prepare($query);
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null;
try {
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    flash("An unknown error occurred loading all purchase history, please try again later", "warning");
    error_log(var_export($e->errorInfo, true));
}
$total = 0;
?>
<h1 class="left-padding">All Purchase History</h1>
<form class="row offset-lg-2" method="GET">
    <div class="col-auto">
        <label class="form-label" for="date-range">Date Range</label>
        <select class="form-select" aria-label="Date Range" name="date-range" id="date-range">
            <option value="all" <?php if (se($date_range, null, "", false) == "all") : ?>selected<?php endif; ?>>All</option>
            <option value="last-day" <?php if (se($date_range, null, "", false) == "last-day") : ?>selected<?php endif; ?>>Last 24 Hours</option>
            <option value="last-week" <?php if (se($date_range, null, "", false) == "last-week") : ?>selected<?php endif; ?>>Last Week</option>
        </select>
    </div>
    <div class="col-auto">
        <label class="form-label" for="category">Category</label>
        <select class="form-select" aria-label="Category" name="category" id="category">
            <option value="all" <?php if (se($category, null, "", false) == "all") : ?>selected<?php endif; ?>>All</option>
            <option value="sports" <?php if (se($category, null, "", false) == "sports") : ?>selected<?php endif; ?>>Sports</option>
            <option value="electronics" <?php if (se($category, null, "", false) == "electronics") : ?>selected<?php endif; ?>>Electronics</option>
            <option value="other" <?php if (se($category, null, "", false) == "other") : ?>selected<?php endif; ?>>Other</option>
        </select>
    </div>
    <div class="col-auto">
        <label class="form-label" for="total-sort">Total Sort</label>
        <select class="form-select" aria-label="Total Sort" name="total-sort" id="total-sort">
            <option value="none" <?php if (se($total_sort, null, "", false) == "none") : ?>selected<?php endif; ?>>None</option>
            <option value="low-high" <?php if (se($total_sort, null, "", false) == "low-high") : ?>selected<?php endif; ?>>Low-High</option>
            <option value="high-low" <?php if (se($total_sort, null, "", false) == "high-low") : ?>selected<?php endif; ?>>High-Low</option>
        </select>
    </div>
    <div class="col-auto">
        <label class="form-label" for="total-sort">Date Sort</label>
        <select class="form-select" aria-label="Date Sort" name="date-sort" id="date-sort">
            <option value="new-old" <?php if (se($date_sort, null, "", false) == "new-old") : ?>selected<?php endif; ?>>Newest to Oldest</option>
            <option value="old-new" <?php if (se($date_sort, null, "", false) == "old-new") : ?>selected<?php endif; ?>>Oldest To Newest</option>
        </select>
    </div>
    <div class="col-auto">
        <div class="form-label invisible">Blank Text</div>
        <input class="form-control btn btn-primary" type="submit" value="Search">
    </div>
</form>
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
                    <?php $total += se($result, "total_price", "", false); ?>
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
<div class="bold-text left-margin">Page Total: $<?php echo se($total, null, "", false) / 100; ?></div>
<nav aria-label="Purchase History Pages">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($page == 1): ?>disabled<?php endif; ?>">
            <a class="page-link" href="?page=<?php se($page - 1); ?>">Previous</a>
        </li>
        <?php for ($i = 0; $i < $page_count; $i++) : ?>
            <li class="page-item <?php if($i == $page - 1): ?>active<?php endif; ?>"><a class="page-link" href="?page=<?php se($i+1); ?>"><?php echo ($i + 1); ?></a></li>
        <?php endfor; ?>
        <li class="page-item <?php if($page == $page_count): ?>disabled<?php endif; ?>">
            <a class="page-link" href="?page=<?php echo (se($page, null, "", false) + 1) ?>">Next</a>
        </li>
    </ul>
</nav>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>