<?php include '../config.php'; ?>

<?php

    if(isset($_POST['submit'])) {

        try {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = $conn->prepare("SELECT * FROM admin");
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            echo '<pre>';
            print_r($data);
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
       
    }

?>