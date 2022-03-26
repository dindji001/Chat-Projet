<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: paramettre.php");
  }
  include "php/config.php";
  include "config_lang.php"; 
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header><?php echo $langue['simplonchatapp']?></header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label><?php echo $langue['name']?></label>
            <input type="text" name="fname" placeholder="<?php echo $langue['name']?>" required>
          </div>
          <div class="field input">
            <label><?php echo $langue['firstName']?></label>
            <input type="text" name="lname" placeholder="<?php echo $langue['firstName']?>" required>
          </div>
        </div>
        <div class="field input">
          <label><?php echo $langue['email']?></label>
          <input type="text" name="email" placeholder="<?php echo $langue['enterYouEmail']?>" required>
        </div>
        <div class="field input">
          <label><?php echo $langue['password']?></label>
          <input type="password" name="password" placeholder="<?php echo $langue['enterYouPassword']?>" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label><?php echo $langue['selectionImage']?></label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="<?php echo $langue['continue']?>">
        </div>
      </form>
      <div class="link"><?php echo $langue['alreadyregistered']?><a href="login.php"><?php echo $langue['loginnow']?></a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
