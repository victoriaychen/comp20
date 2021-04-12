<!DOCTYPE html>
<html>
<body>

<h2>Thank you for ordering!</h2>
<h3>Your order is as follows.</h3>
<?php
    $itemstring = $_POST["itemNames"];
    $items = explode(",",$itemstring,5);
    $timeStr = $_POST["timeStr"];
    $itemCosts = $_POST["cost"];

    for ($x = 0; $x <= 4; $x++) {
        $tempQuant = $_POST["quan". $x];
        $tempCost = $itemCosts[$x];
        if($tempQuant > 0){
            echo $items[$x];
            echo ": Quantity: ".$tempQuant;
            echo nl2br("\tCost: $".$tempCost);
            echo nl2br("\n");
        }
    }
    $st = $_POST["subtotal"];
    echo nl2br("Subtotal: $$st\n");
    $tax = $_POST["tax"];
    echo nl2br("Tax: $$tax\n");
    $tot = $_POST["total"];
    echo nl2br("Total: $$tot\n");

    echo $timeStr;
?>

<!--template taken from the web-->
<?php
$email = $_POST["email"];
// the message
$msg = "Thank you for your order.\nYour order total is ";
$msg .= $tot;
$msg .= $timeStr;
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($email,"My subject",$msg);
?>

</body>
</html>
