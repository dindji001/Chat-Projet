<?php 
    session_start();
    if(isset($_SESSION['users_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['users_id'];
        $incoming_id =  "1";
        // $incoming_id = mysqli_real_escape_string($conn, $_POST['id_groupe']);
        $output = "";
        $sql = "SELECT * FROM message_groupe 
                INNER JOIN users ON message_groupe.id_outgoint_grp = users.unique_id
                WHERE  id_groupe = $incoming_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['id_outgoint_grp'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['message_groupe'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                                    <div class="chat incoming">
                                    <img src="php/images/'.$row['img'].'" alt="">
                                    <div class="details">
                                        <p>'. $row['message_groupe'] .'</p>
                                    </div>
                                    </div>
                                 </a>';
                }
            }
        }else{
            $output .= '<div class="text">Aucun message n\'est disponible. Une fois que vous envoyez un message, ils apparaîtront ici.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>