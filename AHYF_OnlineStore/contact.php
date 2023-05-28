<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Contact</title>
</head>
<body>
    <header>
        
        <?php require 'navigation.php' ?>
    </header>
        <h1 id = "contactHeader">Contact Form</h1>      
<form class="cf">
  <!-- <div class="half left cf"> -->
    <input type="text" id="input-name" placeholder="Name">
    <input type="email" id="input-email" placeholder="Email address">
    <input type="text" id="input-subject" placeholder="Subject">
  <!-- </div> -->
  <!-- <div class="half right cf"> -->
    <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
  <!-- </div>   -->
  <input type="submit" value="Submit" id="input-submit">
</form>
    </body>
    <footer>
    <?php require 'footer.php' ?>
    </footer>
</html>
