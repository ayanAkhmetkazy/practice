<?php
   namespace controllers;
   use core\Controller;
   use models\CarModel;
   use models\Car;
   class MainController extends Controller{
      private $carModel;
      public function __construct(){
         $this->carModel = new CarModel();
      }
      function index(){
         $cars = $this->carModel->getAllCars();
         $_REQUEST['CAR_LIST'] = $cars;
         return "index";
      }
      function addcar(){
         $car = new Car();
         $car->name = $_POST['car_name'];
         $car->model = $_POST['car_model'];
         $car->price = $_POST['car_price'];
         $this->carModel->addCar($car);
         header("Location:index");
      }
      function getcar(){
         $car = new Car();
         $car->id = $_GET['id'];
         $car = $this->carModel->getCar($car);
         $_REQUEST['CAR_PROFILE'] = $car;
         return 'viewcar';
      }
   }
?>