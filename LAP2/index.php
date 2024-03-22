<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>this is exercise lap 2 by Nguyen Huu Tai</title>
</head>
<body>
<div id="wrapper">
    <!-- Member information section -->
    <div class="row">
        <h2>-- Member information --</h2>
        <?php
        require_once("member.php");
        $sv = new member("Nguyen Van A", "email1@gmail.com");
        echo "Code: " . $sv->get_id() . "<br/>";
        echo "Fullname: " . $sv->get_fullname() . "<br/>";
        echo "Email: " . $sv->get_email() . "<br/>";
        ?>
    </div>
    
    <!-- More information section -->
    <div class="row">
        <h2>-- More information --</h2>
        <?php
        $sv2 = new member("Tran Van B", "email2@gmail.com");
        echo "Code: " . $sv2->get_id() . "<br/>";
        echo "Fullname: " . $sv2->get_fullname() . "<br/>";
        echo "Email: " . $sv2->get_email() . "<br/>";
        ?>
    </div>
    <div id="wrapper1">
    <!-- Additional object-oriented programming PHP section -->
    <div class="row">
        <h2>-- Add Object-oriented programming PHP --</h2>
        <?php
        include 'staff.php';
        $character = new character("Nguyen Van A", "5678");
        echo "Full name: " . $character->get_fullname() . "<br/>";
        echo "Country code: " . $character->get_countrycode() . "<br/>";
        ?>
    </div>

    <!-- Staff section -->
    <div class="row">
        <h2>-- Staff --</h2>
        <?php
        $staff = new staff("Nguyen Van B", "1234", "Guard");
        echo "Staff code: " . $staff->get_staffcode() . "<br/>";
        echo "Full name: " . $staff->get_fullname() . "<br/>";
        echo "Country code: " . $staff->get_countrycode() . "<br/>";
        echo "Part: " . $staff->get_part() . "<br/>";
        ?>
    </div>

    <!-- Footer section -->
    <footer>
        <p>Trendemy: <a href="mailto:taipro573@gmail.com">taipro573@gmail.com</a>.</p>
    </footer>
    
</div>
</div>
</body>
</html>
