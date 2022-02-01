<?php
//Front-end Ahmed, back-end Albert
  if (isset($_POST['id2'])) {
    $post = explode('/',$_POST['id2']);
    $id2 = $post[0];
    $name = $post[1];

    echo "<style>
    .overlay2 {
		  visibility: visible;
		  opacity: 1;
		} </style>";
  }
    require_once 'database.php';
    if ( isset($_POST['id'])) {
        // keep track post values
        $id = $_POST['id'];

        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM table_nodemcu_rfidirc522_mysql  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: user data.php");

    }
  ?>

<style media="screen">
  .popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 30%;
    position: relative;
    transition: all 5s ease-in-out;
  }

  .popup h2 {
    margin-top: 0;
    color: #333;
    font-family: Tahoma, Arial, sans-serif;
  }
  .popup .close {
    position: absolute;
    top: 2.5%;
    right: 30px;
    transition: all 200ms;
    font-size: 35px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup .close:hover {
    color: #dc3545;
  }
  .popup .content {
    max-height: 30%;
    overflow: auto;
  }
</style>
<div id="popup1" class="overlay2">
  <div class="popup">
    <h2>Delete User</h2>
    <a class="close" href="user data.php">&times;</a>
    <div class="container">

    <div class="span10 offset1">

      <form class="form-horizontal" action="user data delete page.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id2;?>"/>
        <p class="alert alert-error">Are you sure to delete the user "<?php echo $name; ?>"?</p>
        <div class="form-actions">
          <button type="submit" class="btn btn-danger">Yes</button>
          <a class="btn" href="user data.php">No</a>
        </div>
      </form>
    </div>

    </div> <!-- /container -->
  </div>
</div>
