<?php
    include 'config.php';

    class Common {
        public $con;

        function __construct()
        {
            $this->con = new PDO(DSN, ROOT, ROOT_PASS);
        }

        // select all data 
        function getAllData($query, $param = []) {
            $data = $this->con->prepare($query);
            $data->execute($param);
            $data = $data->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        //select data where condition
        function getOneRowData($query, $param = []) {
            $data = $this->con->prepare($query);
            $data->execute($param);
            $datas = $data->fetch(PDO::FETCH_ASSOC);
            return $datas;
        }

         //insert, update, add and delete data to db
         function getReturnData($query, $param = []) {
            $sql = $this->con->prepare($query);
            if($sql->execute($param)) {
                return true;
            }
            else {
                return false;
            }
         }

         function isLoginSessionExpired() {
            $login_session_duration = 10; 
            $current_time = time(); 
            if(isset($_SESSION['loggedin_time']) and isset($_SESSION['id'])){  
                if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
                    return true; 
                } 
            }
            return false;
        }

    }

?>