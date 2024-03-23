<?php
require_once("/LAP4/Entities/product.class.php");// Include the Product class from the Entities folder.
require_once("/xampp/htdocs/demo/LAP4/Entities/Category.class.php");// Include class Category.
if (isset($_POST["btnsubmit"])) {// Get value from form and initialize new product object.
    //Get value from form
    $productName = $_POST["txtname"];
    $cateID = $_POST["txtcateid"];
    $price = $_POST["txtprice"];
    $quantity = $_POST["txtquantity"];
    $description = $_POST["txtdesc"];
    $picture = $_FILES["txtpic"];
    //Initialize the product object
    $newProduct = new Product(
        $productName,
        $cateID,
        $price,
        $quantity,
        $description,
        $picture
    );
    $loi = array();
    $loi_str = "";

    // Save to the database
    $result = $newProduct->save($loi);// Save new product, pass the $loi parameter to receive error messages.
    if (!$result) {
        //Error query
        header("Location: product-add.php?status=failure");
    } else {
        header("Location: product-add.php?status=inserted");
    }
}
?>
<?php if ($loi_str != "") {
?>
    <div class="alert alert-danger"><?php echo $loi_str ?></div>
<?php } ?>
<?php require '/xampp/htdocs/demo/LAP4/header.php'; ?>
<?php
if (isset($_GET["status"])) { // Show notification that product added was successful or failed.
    if ($_GET["status"] == 'inserted') {
        echo "<h2>Add successful product.</h2>";
    } else {
        echo "<h2>Add failed product.</h2>";
    }
}
?>
<!-- Form Add products -->
<form method="post" enctype="multipart/form-data">
    <!-- Product's name -->
    <div class="row">
        <div class="lbltitle">
            <label> Product's name </label>// Mục nhập cho tên sản phẩm.
        </div>
        <div class="lblinput">
            <input type="text" name="txtname" value="<?php echo

                                                        isset($_POST["txtname"]) ? $_POST["txtname"] : "" ?>">

        </div>
    </div>
    <!-- Product Description -->
    <div class="row">
        <div class="lbltitle">
            <label> Product Description </label>
        </div>
        <div class="lblinput">
            <textarea type="text" name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : ""
                                                                            ?>"></textarea>
        </div>
    </div>
    <!-- The number of products -->
    <div class="row">
        <div class="lbltitle">
            <label> The number of products </label>
        </div>
        <div class="lblinput">
            <input type="number" name="txtquantity" value="<?php echo

                                                            isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ?>">

        </div>
    </div>
    <!-- Product price -->
    <div class="row">
        <div class="lbltitle">
            <label> Product price </label>
        </div>
        <div class="lblinput">
            <input type="number" name="txtprice" value="<?php echo

                                                        isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ?>">

        </div>
    </div>
    <!-- Product Type -->
    <div class="row">
        <div class="lbltitle">
            <label> Product Type </label>
        </div>
        <div class="lblinput">
            <select name="txtcateid">
                <option value="" selected>-- Select type --</option>
                <?php $cates = Category::list_category() ?>
                <?php foreach ($cates as $item) { ?>
                    <option value="<?php echo $item['CateID'] ?>"><?php echo

                                                                    $item['CategoryName'] ?></option>

                <?php } ?>
            </select>

            <?php echo

            isset($_POST["txtcateid"]) ? $_POST["txtcateid"] : "" ?>

        </div>
    </div>
    <!-- Product Type -->
    <div class="row">
        <div class="lbltitle">
            <label>Url Image</label>
        </div>
        <div class="lblinput">
            <input type="file" name="txtpic" accept=".png,.gif,.jpg,.jpeg">
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            Click more
        </div>
        <div class="submit">
            <button type="submit" name="btnsubmit"> More products </button>
        </div>
    </div>
</form>

<!-- Footer -->
<?php require '/xampp/htdocs/demo/LAP4/footer.php'; ?>