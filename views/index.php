<?php
   $carList = $_REQUEST['CAR_LIST'];
?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
   <form action="addcar" method="post">
      NAME <input type="text" name="car_name">
      MODEL <input type="text" name="car_model">
      PRICE <input type="text" name="car_price">
      <button>ADD CAR</button>
   </form>
   <table>
      <?php
         if($carList!=null){
            foreach($carList as $car){
      ?>
         <tr>
            <td>
               <?php
                  echo $car->id;
               ?>
            </td>
            <td>
               <?php
                  echo $car->name;
               ?>
            </td>
            <td>
               <a href='car?id=<?php echo $car->id;?>'><?php
                  echo $car->model;
               ?></a>
            </td>
            <td>
               <?php
                  echo $car->price;
               ?>
            </td>
         </tr> 
      <?php
            }
         }
      ?>
   </table>
</body>
</html>