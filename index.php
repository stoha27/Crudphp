<?php
  include "header.php";
?>
    <div class="row">
      <div class="col-md-10">
        <h1>Employees (CRUD PHP MySQLi)</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="index/add" class="btn btn-primary">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>Add new</a></h1>
      </div>
    </div>
    <br/>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="20">id</th>
          <th>Имя</th>
          <th>Фамилия</th>
          <th>Отчество</th>
          <th>День рождения</th>
          <th>id_department</th>
          <th width="90">Action</th>
        </tr>
      </thead>
      <tbody>

      <?php
        $query = $mysqli->query("SELECT * from employees");
        $no = 1;
        while($row = $query->fetch_assoc()){
          $id_department = $row['id_department'];
          $ipa = $mysqli->query("SELECT name_department FROM Department WHERE id_department='$id_department'");
          $res_dep = $ipa->fetch_assoc();
      ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['N'] ?></td>
          <td><?php echo $row['F'] ?></td>
          <td><?php echo $row['O'] ?></td>
          <td><?php echo $row['birthday'] ?></td>
          <td><?php echo $res_dep['name_department'] ?></td>
          <td>
            <a href="index/update/<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a onclick=href="index/delete/<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>
        </tr>

      <?php
        };
      ?>

      </tbody>
    </table>
<?php
  include "footer.php";
?>