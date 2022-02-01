<?php 
   class Common{
      public $pdo;

      function __construct()
      {
         $this->pdo = new PDO(DSN, ROOT, ROOT_PASS);
      }

      function getRow($query, $params = [])
      {
         $stmt1 = $this->pdo->prepare($query);
         $stmt1->execute($params);
         $data = $stmt1->fetch(PDO::FETCH_ASSOC);
         return $data;
      }

      function getAllRow($query, $params = [])
      {
         $stmt1 = $this->pdo->prepare($query);
         $stmt1->execute($params);
         $data = $stmt1->fetchAll(PDO::FETCH_ASSOC);
         return $data;
      }

      function insertData($query, $params = [])
      {
         try{
            $stmt1 = $this->pdo->prepare($query);
            $stmt1->execute($params);
            return true; 
         }catch(PDOException $e){
            echo $e->getMessage(); 
            return false;
         }
      }

      function deleteData($query, $params = [])
      {
         try{
            $stmt1 = $this->pdo->prepare($query);
            $stmt1->execute($params);
         // $data = $stmt1->fetch(PDO::FETCH_ASSOC);
         // return $data;
            return true; 
         }catch(PDOException $e){
            echo $e->getMessage(); 
            return false;
         }
      }

      function updateData($query, $params = [])
      {
         try{
            $stmt1 = $this->pdo->prepare($query);
            $stmt1->execute($params);
            return true; 
         }catch(PDOException $e){
            echo $e->getMessage(); 
            return false;
         }
      }
}

	

 ?>