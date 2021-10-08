<?php
$title = "View Records";
require_once 'includes/header.php';
require_once 'db/conn.php';

$result = $crud->get();

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Specialty</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php $no = 0; while($r = $result->fetch(PDO::FETCH_ASSOC)) { $no++;?>
      <th scope="row"><?php echo "$no"; ?></th>
      <td><?php echo $r['firstname'] ?></td>
      <td><?php echo $r['lastname'] ?></td>
      <td><?php echo $r['name'] ?></td>
      <td>
        <a href="view1.php?id=<?php echo $r['attende_id'];?>" class="btn btn-primary">View</a>
        <a href="edit.php?id=<?php echo $r['attende_id'];?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure to delete this record?');" href="delete.php?id=<?php echo $r['attende_id'];?>" class="btn btn-danger">Delete</a>
      </td>
      
    </tr>
  <?php }?>
  </tbody>
</table>


<br>
<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php';
?>