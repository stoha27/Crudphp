<?php
  include "header.php";
?>
    <div class="row">
      <div class="col-md-10">
        <h1>CRUD PHP MySQLi</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="/dashboard/crudphp/index" class="btn btn-primary">
        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</a></h1>
      </div>
    </div>

    <?php
    
    if(isset($_POST['submit'])){
      $N = $_POST['name'];
      $F = $_POST['surname'];
      $O = $_POST['fthname'];
      $birthday = $_POST['dates'];
      $name_department = $_POST['depart'];
      $id_department = $mysqli->query("SELECT id_department FROM Department WHERE name_department='$name_department'");

      $res_dep = $id_department->fetch_assoc()['id_department'];

      $query = $mysqli->query("INSERT INTO employees(N, F, O, birthday, id_department) VALUES ('$N','$F','$O','$birthday', '$res_dep')");

      if ($query) {
    ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> Everything is good.
          </div>
    <?php
      }
      else {
    ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <strong>Danger!</strong> Check yourself.
          </div>
    <?php
      }
    }
     ?>

    <br/>
  <form method="post">
      <div class="form-group col-md-6">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      
      <div class="form-group col-md-6">
        <label for="surname">Фамилия</label>
        <input type="text" class="form-control" id="surname" name="surname">
      </div>

      <div class="form-group col-md-6">
        <label for="fthname">Отчество</label>
        <input type="text" class="form-control" id="fthname" name="fthname">
      </div>

      <div class="form-group col-md-6">
        <label for="dates">День рождения</label>
        <input type="date" class="form-control" id="dates" name="dates">
      </div>
      
      <div class="form-group col-md-6">
      <label for="sel1">Select department (select one):</label>
      <select class="form-control" id="sel1" name="depart">
        <?php
        $query = $mysqli->query("SELECT * from Department");
        while($row = $query->fetch_assoc()){
        ?>
              <option><?php echo $row['name_department'] ?></option>
        <?php
        };
        ?>
      </select>

      <br>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
<?php
  include "footer.php";
?>