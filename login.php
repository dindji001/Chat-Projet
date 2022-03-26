<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
  include "php/config.php";
  include "config_lang.php";
  include_once "header.php"; 
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header><?php echo $langue['simplonchatapp']?></header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label><?php echo $langue['email']?></label>
          <input type="text" name="email" placeholder="<?php echo $langue['enterYouEmail']?>" required>
        </div>
        <div class="field input">
          <label><?php echo $langue['password']?></label>
          <input type="password" name="password" placeholder="<?php echo $langue['enterYouPassword']?>" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="<?php echo $langue['continue']?>">
        </div>
      </form>
      <div class="link"><?php echo $langue['noRegister']?> <a href="index.php"><?php echo $langue['register']?></a></div>
    </section>
  </div>
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
</body>
</html>
