<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  include "php/config.php";
  include "config_lang.php";
  include_once "header.php"; 
  if(isset($_SESSION['lang'])){
    $lang = $_SESSION['lang'];
  }
?>

<style>
 
  .parametre{
    color: #dc2c2c;
    margin-top: 15px;
    cursor: pointer;
  }
  .containt-setting{
    display: none;
    flex-direction: column;
    justify-content: space-between;
    padding: 10px;
  }
  .containt-setting.active{
    display: flex;
  }
  .langue{
    display: flex;
    padding: 1.5rem;
    margin-bottom: 3rem;
    align-items: center;
    justify-content: space-between;
  }
  .groupes{
    display: flex;
    flex-direction: column;
  }
  .row{
    display: flex;
    width: 90%;
    height: 7rem;
    align-items: center;
    margin: auto;
    padding: 10px;
    justify-content: space-between;
  }
  .ligne2{
    margin-top: 2.5rem;
  }

  .groupe-item{
    color: #121314;
    font-size: 18px;
    font-weight: bold;
  }
  .anglais, .francais, .groupe-item{
    cursor: pointer;
  }
  .langue-image{
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  }

</style>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            
          ?>
          
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p class="parametre"><?php echo $langue['setting']?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>&amp;lang=<?php echo $lang?>" class="logout"><?php echo $langue['logout']?></a>
      </header>
      <div class="users-list">     
        <div class="containt-setting">
        <div class="langue">
            <div class="francais">
              <a href="paramettre.php?lang=fr">
                <img src="img/france.png" width="50" height="50" alt="" class="langue-image">
                <h3><?php echo $langue['french']?></h3>
              </a>
            </div>
            <div class="anglais">
               <a href="paramettre.php?lang=en">
                  <img src="img/anglais.png" width="50" height="50" alt="" class="langue-image">
                  <h3><?php echo $langue['english']?></h3>
               </a>
            </div>
          </div>
          <div class="groupes">
            <div class="row ligne1">
            <a href="chat-sortie.php?groupe_id_Sortie=<?php echo $row['unique_id']; ?>">
                <div class="groupe-item">
                  <img src="img/like.png" width="300" height="300" alt="">
                  <p><?php echo $langue['dating']?></p>
                </div>
              </a>
              <a href="chat-nouveau.php?groupe_id_nouveau=<?php echo $row['unique_id']; ?>">
                <div class="groupe-item">
                  <img src="img/youth.png" width="100" height="100" alt="">
                  <p><?php echo $langue['news']?></p>
                </div>
              </a>
            </div>
            <div class="row ligne2">
              <a href="chat-business.php?groupe_id_business=<?php echo $row['unique_id'] ?>">
                <div class="groupe-item">
                  <img src="img/business.png" width="100" height="100" alt="">
                  <p><?php echo $langue['business']?></p>
                </div>
              </a>
              <a href="chat-divertissement.php?groupe_id_divertissement=<?php echo $row['unique_id']; ?>">
                <div class="groupe-item">
                  <img src="img/dance.png" width="100" height="100" alt="">
                  <p><?php echo $langue['entertainment']?></p>
                </div>
              </a>
            </div>
          </div>
        </div>   
      </div>
    </section>
  </div>

  <script src="javascript/paramettre.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
