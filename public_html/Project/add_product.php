<?php
require(__DIR__ . "/../../partials/nav.php");

if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

if (isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["category"]) && isset($_POST["stock"]) && isset($_POST["price"])) {
    //Sets all $_POST values to variables
    $name = se($_POST, "name", "", false);
    $description = (se($_POST, "description", "", false) == "" ? "No description" : se($_POST, "description", "", false));
    $category = (se($_POST, "category", "", false) == "" ? "Other" : se($_POST, "category", "", false));
    $stock = se($_POST, "stock", "", false);
    $price = se($_POST, "price", "", false);
    $visibility = se($_POST, "visibility", "0", false);
    //Server side validation
    $isValid = true;
    if (strlen($name) == 0) {
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
    //Database insertion
    if ($isValid) {
        $db = getDB();
        $price *= 100; //converts price to integer before inserting
        $stmt = $db->prepare("INSERT INTO Products (name, description, category, stock, unit_price, visibility) VALUES(:name, :description, :category, :stock, :price, :visibility)");
        try {
            $stmt->execute([":name" => $name, ":description" => $description, ":category" => $category, ":stock" => $stock, ":price" => $price, ":visibility" => $visibility]);
            flash("Successfully added $name!", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("A product with this name already exists, please try another", "warning");
            } else {
                flash("Unknown error occurred, please try again", "danger");
                error_log(var_export($e->errorInfo, true));
            }
        }
    }
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
    <h1>Add Product</h1>
    <form method="POST" onsubmit="return validate(this)">
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" id="name" name="name" required/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="d">Description</label>
            <textarea class="form-control" name="description" id="d"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="c">Category</label>
            <input class="form-control" name="category" id="c"></input>
        </div>
        <div class="mb-3">
            <label class="form-label" for="s">Stock</label>
            <input class="form-control" name="stock" id="s" type="number" required min="0" max="1000"></input>
        </div>
        <div class="mb-3">
            <label class="form-label" for="p">Unit Price (in dollars)</label>
            <input class="form-control" name="price" id="p" type="number" step="0.01" min="0.01" max="5000.00" required></input>
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="v">Visibible</label>
            <input class="form-check-input" name="visibility" type="checkbox" value="1" id="v">
        </div>
        <input type="submit" class="btn btn-primary" value="Create Product" />
    </form>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>