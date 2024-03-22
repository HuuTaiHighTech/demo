<?php
    require_once("../lap4/entities/product.class.php");
    require_once('../lap4/entities/category.class.php');
    if (isset($_POST["btnsubmit"])) {
        //Get value from form
        $productName = $_POST["txtname"];
        $cateID = $_POST["txtcateid"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture = $_FILES["txtpic"];
        //Initialize the product object
        $newProduct = new Product($productName, $cateID, $price, $quantity,
        $description, $picture);
        // Save to the database
        $result = $newProduct->save();
        if (!$result) {
        //Error query
        header("Location: product-add.php?status=failure");
    } else {
        header("Location: product-add.php?status=inserted");
        }
    }   
?>

<?php require '../lap4/header.php'; ?>
<?php
    if (isset($_GET["status"])) {
        if ($_GET["status"] == 'inserted') {
        echo "<h2>Add successful product.</h2>";
        } else {
        echo "<h2>Add failed product.</h2>";
        }
        }
?>

    <form method="post">
        <div class="row">
            <label> Product's name </label>
        
        <div>
            <input type="text" name="txtname" value="<?php echo

                    isset($_POST["txtname"]) ? $_POST["txtname"] : "" ?>">
            </div>
        </div>

        <div class="row">
            <div class="lbltitle">
            <label> Product Description </label>
            </div>
            <div class="lblinput">
            <textarea type="text" name="txtdesc" cols="21" rows="10"
                value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : ""
                ?>"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="lbltitle">
            <label> Product price </label>
            </div>
            <div class="lblinput">
                <input type="number" name="txtprice" value="<?php echo

                isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ?>">

            </div>
        </div>

        <div class="row">
        <div class="lbltitle">
            <label> Product Type </label>
        </div>
        <div class="lblinput">
             <select name="txtcateid">
                <option value="" selected>-- Select type --</option>
                    <?php $cates = Category::list_category() ?>
                    <?php foreach ($cates as $item){ ?>
                        <option value="<?php echo $item['CateID'] ?>"><?php echo $item['CategoryName'] ?></option>
                        <?php } ?>
            </select>
            <!-- <input type="number" name="txtcateid" value="<?php echo isset($_POST["txtcateid"]) ? $_POST["txtcateid"] : "" ?>"> -->
        </div>
        </div>
        <div class="row">
            <div class="lbltitle">
                <label>Url Image</label>
            </div>
            <div class="lblinput">
            <input type="file" name="txtpic" accept=".PNG,.GIF,.JPG,.JPGEG">
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

    <?php require '../lap4/footer.php'; ?>