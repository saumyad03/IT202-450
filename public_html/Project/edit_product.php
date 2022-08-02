<?php
require(__DIR__ . "/../../partials/nav.php");
//If user doesn't have permission to view the page, redirect them
if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}
//if there is not product to edit, redirect user away
if (!isset($_GET["name"])) {
    flash("You must have a product to edit to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}
//update database if post request has set keys
if (isset($_GET["name"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["category"]) && isset($_POST["stock"]) && isset($_POST["price"])) {
    $oldName = se($_GET, "name", "", false);
    $newName = se($_POST, "name", "", false);
    $description = (se($_POST, "description", "", false));
    $category = (se($_POST, "category", "", false));
    $stock = se($_POST, "stock", "", false);
    $price = se($_POST, "price", "", false);
    $visibility = se($_POST, "visibility", "0", false);
    $isValid = true;
    //Server Side Data Validation
    $isValid = true;
    if (strlen($newName) == 0) {
        flash("Product must have a name", "warning");
        $isValid = false;
    }
    if (strlen($stock) == 0) {
        flash("Stock must not be empty", "warning");
        $isValid = false;
    }
    if (strlen($price) == 0) {
        flash("Price must not be empty", "warning");
        $isValid = false;
    }
    if ($stock < 0 || $stock > 1000) {
        flash("Stock must between 0 and 1000 inclusive", "warning");
        $isValid = false;
    }
    if ($price < 0.01 || $price > 5000.00) {
        flash("Price must be between 0.01 and 5000.00 inclusive", "warning");
        $isValid = false;
    }
    if ($isValid) {
        $db = getDB();
        $price *= 100; //converts from decimal to int before updating price
        $stmt = $db->prepare("UPDATE Products SET name=:newName, description=:description, category=:category, stock=:stock, unit_price=:unit_price, visibility=:visibility WHERE name=:oldName");
        $params = [":newName" => $newName, ":description" => $description, ":category" => $category, ":stock" => $stock, ":unit_price" => $price, ":visibility" => $visibility, ":oldName" => $oldName];
        try {
            $stmt->execute($params);
            flash("Product information successful updated", "success");
            die(header("Location: $BASE_PATH" . "/edit_product.php?name=" . $_POST["name"]));
        } catch (PDOException $e) {
            flash("An unknown error occurred when trying to update the product data, please try again later", "warning");
            error_log(var_export($e->errorInfo, true));
        }
    }
}
//get the data for the item
$name = $_GET["name"];
$db = getDB();
$stmt = $db->prepare("SELECT description, category, stock, unit_price, visibility FROM Products WHERE name=:name");
try {
    $stmt->execute([":name" => $name]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    flash("An unknown error occurred with loading up the data for this product", "warning");
    error_log(var_export($e->errorInfo, true));
}
?>
<script>
    //Client-Side Validation Function Via JavaScript
    function validate(form) {
        let isValid = true;
        let name = form.name.value;
        if (name.length == 0) {
            flash("Product must have a name", "warning");
            isValid = false;
        }
        let stock = form.stock.value;
        if (stock.length == 0) {
            flash("Stock must not be empty", "warning");
            isValid = false;
        }
        if (stock < 0 || stock > 1000) {
            flash("Stock must between 0 and 1000 inclusive", "warning");
            isValid = false;
        }
        let price = form.price.value;
        if (price.length == 0) {
            flash("Price must not be empty", "warning");
            isValid = false;
        } else {
            if (price < 0.01 || price > 5000.00) {
                flash("Price must be between 0.01 and 5000.00 inclusive", "warning");
                isValid = false;
            }
        }
        return isValid;
    }
</script>
<div class="container-fluid">
    <h1>Edit Product</h1>
    <form method="POST" onsubmit="return validate(this)">
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" id="name" name="name" value="<?php se($name); ?>" required/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="d">Description</label>
            <textarea class="form-control" name="description" id="d"><?php se($result, "description"); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="c">Category</label>
            <input class="form-control" name="category" value="<?php se($result, "category"); ?>" id="c" required></input>
        </div>
        <div class="mb-3">
            <label class="form-label" for="s">Stock</label>
            <input class="form-control" name="stock" value="<?php se($result, "stock"); ?>" id="s" type="number" required min="0" max="1000"></input>
        </div>
        <div class="mb-3">
            <label class="form-label" for="p">Unit Price (in dollars)</label>
            <input class="form-control" name="price" value="<?php echo se($result, "unit_price", "", false) / 100; ?>" id="p" type="number" step="0.01" min="0.01" max="5000.00" required></input>
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="v">Visibible</label>
            <input class="form-check-input" name="visibility" type="checkbox" value="1" id="v" <?php if (se($result, "visibility", "", false) == 1) : ?>checked<?php endif; ?>>
        </div>
        <input type="submit" class="btn btn-primary" value="Update Product" />
    </form>
</div>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>