
<?php 
include "conect_database.php";
function delet_massege($conn){
        if (isset($_GET["id"])) {
            
            $delete=$conn->prepare("DELETE FROM descussion WHERE ID=$_GET[id]");
            $delete->execute();
        }
        header('location:/E-learningSystem/backend/Techer/dscu2.php');
        exit();
        }
        delet_massege($conn);
        ?>