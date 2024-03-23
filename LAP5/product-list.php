<?php
require_once('../lap4/entities/product.class.php');//Include the Product class from the Entities folder.
?>
<?php
include_once('../lap4/header.php');
$prods = Product::list_product();// Get a list of all products from the database.
?>
<div class="container">
    <div class="row">
        <div class="col-md-12"><!-- Show product list in a HTML table. -->
            <table border="1" class="table">
                <tr>
                    <td>Picture</td>
                    <td>Product Name</td>
                    <td>CateID</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Description</td>
                </tr>
                <?php
                foreach ($prods as $item) {
                ?>
                    <tr>
                        <td><?php echo $item['Picture'] ?></td>
                        <td><?php echo $item['ProductName'] ?></td>
                        <td><?php echo $item['CateID'] ?></td>
                        <td><?php echo $item['Price'] ?></td>
                        <td><?php echo $item['Quantity'] ?></td>
                        <td><?php echo $item['Description'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php
include_once('../lap4/footer.php');