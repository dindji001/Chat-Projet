<?php
    session_start();
    include_once "config.php";

    include "../config_lang.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
         // vérifions si l'e-mail de l'utilisateur est valide ou non
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){//si email est valide
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            //vérifions que l'email existe déjà dans la base de données ou non
            if(mysqli_num_rows($sql) > 0){
                $emailExists = $langue['emailExists'];
                echo "$email - $emailExists";
            }else{
                //vérifions ou non le fichier de déchargement de l'utilisateur
                if(isset($_FILES['image'])){//si le fichier est téléchargé
                    $img_name = $_FILES['image']['name'];//recuperer le nom de l'images
                    $img_type = $_FILES['image']['type'];//recuperer le type de l'images
                    $tmp_name = $_FILES['image']['tmp_name'];//recuperer la destination initial de l'images
                    
                    $img_explode = explode('.',$img_name);//explode le nom du fichier
                    $img_ext = end($img_explode);//recuperer la fin qui est l'extention du fichier
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){//verifier si l'extension du fichier correspond a l'un des extension qui est dans le tableau $extension
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);//création d'un identifiant aléatoire pour l'utilisateur
                                $status = "Active";
                                $encrypt_pass = md5($password);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ('{$ran_id}', '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];//en utilisant cette session, nous allons utilisé l'utilisateur unique_id dans un autre fichier php
                                        echo "success";
                                    }else{
                                        echo $langue['emailENoExists'];
                                    }
                                }else{
                                    echo $langue['something'];
                                }
                            }
                        }else{
                            echo $langue['imageENoExists'];
                        }
                    }else{
                        echo $langue['imageENoExists'];
                    }
                }
            }
        }else{
            echo $langue['emailENoValid'];
        }
    }else{
        echo $langue['requiredField'];
    }
?>