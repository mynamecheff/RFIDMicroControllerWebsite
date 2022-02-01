<?php
//Front-end Ahmed, back-end Albert
  if (isset($_POST['id3'])) {

    $id = $_POST['id3'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM table_nodemcu_rfidirc522_mysql where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();

    echo "<style>
    .overlay {
		  visibility: visible;
		  opacity: 1;
		} </style>";
}
?>
<style media="screen">
  .popup2 {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 50%;
    position: relative;
    transition: all 5s ease-in-out;
  }
  .popup2 h2 {
    margin-top: 0;
    color: #333;
    font-family: Tahoma, Arial, sans-serif;
  }
  .popup2 .close {
    position: absolute;
    top: 5px;
    right: 30px;
    transition: all 200ms;
    font-size: 40px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup2 .close:hover {
    color: #dc3545;
  }
  .popup2 .content {
    max-height: 30%;
    overflow: auto;
  }
  .edit-container {
    margin-top: 5%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  textarea {
    resize: none;
  }
  label {
    font-size: 1.2em;
    text-align: right;
  }
  form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
  form > * {
    flex: 1;
  }
  select {
    margin-right: 50%;
  }
  select,textarea,input {
    height: 2em;
    color: gray;
  }
  .gender {
    padding-right: 16%;
  }
  .control-group {
    display: flex;
    gap: 20px;
  }
  .control-group > * {
    flex: 1;
  }
</style>
<div id="popup2" class="overlay">
  <div class="popup2">
    <h2>Edit User Data</h2>
    <a class="close" href="user data.php">&times;</a>

      <div class="edit-container">

          <form class="form-horizontal" action="user data edit tb.php?id=<?php echo $id?>" method="post">
            <div class="control-group">
              <label class="control-label">ID</label>
              <div class="controls">
                <input name="id" type="text"  placeholder="" value="<?php echo $data['id'];?>" readonly>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input name="name" type="text"  placeholder="" value="<?php echo $data['name'];?>" required>
              </div>
            </div>

            <div class="control-group">
              <label class="gender">Gender</label>
              <div class="controls">
                <select name="gender" id="mySelect">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Email Address</label>
              <div class="controls">
                <input name="email" type="text" placeholder="" value="<?php echo $data['email'];?>" required>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Mobile Number</label>
              <div class="controls">
                <input name="mobile" type="text"  placeholder="" value="<?php echo $data['mobile'];?>" required>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success">Update</button>
              <a class="btn" href="user data.php">Back</a>
            </div>
          </form>
        </div>
      </div> <!-- /container -->
  </div>
</div>
