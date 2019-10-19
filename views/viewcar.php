<?php
   $car = $_REQUEST['CAR_PROFILE'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
        if($car!=null){ ?>
        <b>ID: </b> <?php echo $car->id; ?>
        <b>Name: </b> <?php echo $car->name; ?>
        <b>Model: </b> <?php echo $car->model; ?>
        <b>Price: </b> <?php echo $car->price; ?>
        <?php }    
    ?>
</body>
</html>