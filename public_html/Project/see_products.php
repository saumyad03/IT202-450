<?php
require(__DIR__ . "/../../partials/nav.php");
if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}
?>
<h1 class="left-margin">All Products</h1>
<?php
//pagination variables
$offset = 0;
$page = 1;
$per_page = 10;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page >= 1) {
        $offset = ($page - 1) * $per_page;
    }
}
$total_query = "SELECT COUNT(1) as total FROM Products name WHERE 1=1";
$total_params = [];
//default variables needed for conditional html below
$category = 'all';
$search = '';
$sort = 'none';
$stock = 'all';
$results = [];
$db = getDB();
$query = "SELECT name, unit_price, visibility FROM Products WHERE 1=1";
$params = [];
//sd96 - 7/17/22
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    if ($search != '') {
        $query .= " AND name LIKE :search";
        $total_query .= " AND NAME LIKE :search";
        $params[":search"] = "%$search%";
        $total_params[":search"] = "%$search%";
    }
}
if (isset($_GET["category"])) {
    $category = $_GET["category"];
    if ($category != "all") {
        $query .= " AND category=:category";
        $total_query .= " AND category=:category";
        $params[":category"] = $category;
        $total_params[":category"] = $category;
    }
}
if (isset($_GET["stock"])) {
    $stock = $_GET["stock"];
    if ($stock != "all") {
        if ($stock == "in") {
            $query .= " AND stock >= 1";
            $total_query .= " AND stock >= 1";
        } else {
            $query .= " AND stock < 1";
            $total_query .= " AND stock < 1";
        }
    }
}
if (isset($_GET["sort"])) {
    $sort = $_GET["sort"];
    if (!($sort == "none")) {
        if ($sort == "low-high") {
            $query .= " ORDER BY unit_price ASC";
        } else {
            $query .= " ORDER BY unit_price DESC";
        }
    }
}
if (!strpos($query, "ORDER BY")) {
    $query .= " ORDER BY modified DESC";
} else {
    $query .= " , modified DESC";
}
$stmt = $db->prepare($total_query);
try {
    $stmt->execute($total_params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = se($result, "total", "", false);
    $page_count = ceil($total/$per_page);
} catch (PDOException $e) {
    flash("An unknown error occurred with showing multiple pages for products", "warning");
    error_log(var_export($e->errorInfo, true));
}
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
} catch (PDOException $e) {
    flash("An unknown error occurred with loading the products", "warning");
    error_log(var_export($e->errorInfo, true));
}
?>
<form class="row offset-lg-2" method="GET" onsubmit="return validate(this)">
    <div class="col-auto">
        <label class="form-label" for="search">Search</label>
        <input class="form-control" name="search" id="search" placeholder="Search" value="<?php se($search); ?>">
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
        <label class="form-label" for="sort">Price Sort</label>
        <select class="form-select" aria-label="Sort" name="sort" id="sort">
            <option value="none" <?php if (se($sort, null, "", false) == "none") : ?>selected<?php endif; ?>>None</option>
            <option value="low-high" <?php if (se($sort, null, "", false) == "low-high") : ?>selected<?php endif; ?>>Low-High</option>
            <option value="high-low" <?php if (se($sort, null, "", false) == "high-low") : ?>selected<?php endif; ?>>High-Low</option>
        </select>
    </div>
    <div class="col-auto">
        <label class="form-label" for="stock">Stock</label>
        <select class="form-select" aria-label="Stock" name="stock" id="stock">
            <option value="all" <?php if (se($stock, null, "", false) == "all") : ?>selected<?php endif; ?>>All</option>
            <option value="out" <?php if (se($stock, null, "", false) == "out") : ?>selected<?php endif; ?>>Out of Stock</option>
            <option value="in" <?php if (se($stock, null, "", false) == "in") : ?>selected<?php endif; ?>>In Stock</option>
        </select>
    </div>
    <div class="col-auto">
        <div class="form-label invisible">Blank Text</div>
        <input class="form-control btn btn-primary" type="submit" value="Search">
    </div>
</form>
<div class="container-fluid mb-3">
    <div class="row row-cols-sm-2 row-cols-xs-1 row-cols-md-3 row-cols-lg-6 g-4">
        <?php foreach ($results as $result) : ?>
            <div class="col">
                <div class="card bg-light">
                    <div class="card-body">
                        <a class="text-dark text-decoration-none" href="more_details.php?name=<?php se($result, "name"); ?>">
                            <h5 class="card-title"><?php se($result, "name"); ?></h5>
                        </a>
                        <?php if (se($result, "visibility", "", false) == "0") : ?>
                            <p class="text-secondary">Not Visible</p>
                        <?php else : ?>
                            <p>Visible</p>
                        <?php endif; ?>
                        <p class="card-text">$<?php echo se($result, "unit_price", "", false) / 100; ?></p>
                        <a href="edit_product.php?name=<?php se($result, "name"); ?>">
                            <div class="btn btn-secondary">Edit</div>
                        </a>
                    </div>
                    <div class="card-footer">
                        <form method="post" action="cart.php">
                            <input type="hidden" name="name" value="<?php se($result, "name"); ?>" />
                            <input type="submit" class="btn btn-primary" value="Add to Cart" />
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<nav aria-label="Item Page">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($page == 1): ?>disabled<?php endif; ?>">
            <a class="page-link" href="?search=<?php se($search); ?>&category=<?php se($category); ?>&sort=<?php se($sort); ?>&stock=<?php se($stock); ?>&page=<?php se($page - 1); ?>">Previous</a>
        </li>
        <?php for ($i = 0; $i < $page_count; $i++) : ?>
            <li class="page-item <?php if($i == $page - 1): ?>active<?php endif; ?>"><a class="page-link" href="?search=<?php se($search); ?>&category=<?php se($category); ?>&sort=<?php se($sort); ?>&sort=<?php se($sort); ?>&page=<?php se($i+1); ?>"><?php echo ($i + 1); ?></a></li>
        <?php endfor; ?>
        <li class="page-item <?php if($page == $page_count): ?>disabled<?php endif; ?>">
            <a class="page-link" href="?search=<?php se($search); ?>&page=<?php echo (se($page, null, "", false) + 1) ?>">Next</a>
        </li>
    </ul>
</nav>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>