<?php
   namespace models;
   use models\Car;
   use core\DBManager;
   use PDO;
   class CarModel{
      private $dbManager;
      public function __construct(){
         $this->dbManager = new DBManager("localhost", "bitlab", "root", "");
      }
      public function getAllCars(){
         $result = array();
         try{
            $query = $this->dbManager->getConnection()->prepare("SELECT * FROM cars");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_CLASS, "models\Car");
         }catch(Exception $e){
            echo $e->getMessage();
         }
         return $result;
      }
      public function addCar(Car $car){
         try{
            $query = $this->dbManager->getConnection()->prepare("
               INSERT INTO cars (id, name, model, price)
               VALUES (NULL, :name, :model, :price)
            ");
            $query->execute(array("name"=>$car->name, "model"=>$car->model, "price"=>$car->price));
         }catch(Exception $e){
            echo $e->getMessage();
         }
      }
      public function getCar(Car $car){
         try{
            $query = $this->dbManager->getConnection()->prepare("
               SELECT id, name, model, price FROM cars WHERE id = :car_id 
            ");
            $query->execute(array("car_id"=>$car->id));
            $result = $query->fetchAll(PDO::FETCH_CLASS, "models\Car")[0];
         }catch (Exception $e){
            echo $e->getMessage();
         }
         return $result;
      }
   }
?>