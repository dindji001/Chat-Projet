<?php 
    session_start();
    if(isset($_SESSION['users_id'] )){
        include_once "config.php";
        $id_outgoint_grp = $_SESSION['users_id'] ;
        $incoming_id = mysqli_real_escape_string($conn, $_POST['id_groupe']);
        $message = mysqli_real_escape_string($conn, $_POST['message-groupe']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO message_groupe (id_outgoint_grp, id_groupe, message_groupe)
                                        VALUES ('{$id_outgoint_grp}', '{$incoming_id}', '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }

    
    
?>