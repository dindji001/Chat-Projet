<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<style>
  .chat-box::-webkit-scrollbar{
    width: 0px;
  }
  .chat-business{
  position: relative;
  min-height: 500px;
  max-height: 500px;
  overflow-y: auto;
  padding: 10px 30px 20px 30px;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-business .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100% - 50px);
  text-align: center;
  transform: translate(-50%, -50%);
}
.chat-business .chat{
  margin: 15px 0;
}
.chat-business .chat p{
  word-wrap: break-word;
  padding: 8px 16px;
  box-shadow: 0 0 32px rgb(0 0 0 / 8%),
              0rem 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-business .outgoing{
  display: flex;
}
.chat-business .outgoing .details{
  margin-left: auto;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: #333;
  color: #fff;
  border-radius: 18px 18px 0 18px;
}
.chat-business .incoming{
  display: flex;
  align-items: flex-end;
}
.chat-business .incoming img{
  height: 35px;
  width: 35px;
}
.chat-business .incoming .details{
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
@media screen and (max-width: 450px){
  .chat-box{
    min-height: 400px;
    padding: 10px 15px 15px 20px;
  }
  .chat-box .chat p{
    font-size: 15px;
  }
  .chat-box .outogoing .details{
    max-width: 230px;
  }
  .chat-box .incoming .details{
    max-width: 265px;
  }
}
</style>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
      <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['groupe_id_business']);
          if ($user_id) {
            $sql = mysqli_query($conn, "SELECT * FROM appartenir WHERE id_groupe = '1' AND users_id = '$user_id'");
            if (mysqli_num_rows($sql) == 0) {
               $sql2 = mysqli_query($conn, "INSERT INTO appartenir (id_groupe, users_id) VALUE ('1', '$user_id')");
               if ($row2 = mysqli_fetch_assoc($sql2)) {
                 $_SESSION['users_id'] = $row2['users_id'];
                 $value = $row2['id_groupe'];
               }
            }elseif (mysqli_num_rows($sql) > 0) {
              if ($row = mysqli_fetch_assoc($sql)) {
                  $_SESSION['users_id'] = $row['users_id'];
                  $value = $row['id_groupe'];
              }
            }
          }
        ?>
        <a href="paramettre.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="img/business.png" width="100" height="100" alt="">
        <div class="details">
        <span>Business Groupe</span>
        </div>
      </header>
      <div class="chat-business">
          
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="id_groupe" value="<?php echo $value; ?>" hidden>
        <input type="text" name="message-groupe" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat-business.js"></script>

</body>
</html>
