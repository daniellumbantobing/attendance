<?php
$title = "Edit";
require_once 'includes/header.php';
require_once 'db/conn.php';

$result = $crud->getspc();

if(!isset($_GET['id'])){
    include 'includes/error.php';
    header("Location: view.php");
}else{
    $id = $_GET['id'];
    $attendee = $crud->getdet($id);

?>
<div class="container-fluid konfirm">
    <div class="col-12 col-md-6" style="margin: 0 auto;">
        <div class="card shadow mt-4">
            <div class="card-body">
                <div class="text-center">
                <h4 class="text-center">Edit Record</h4>

                </div>
                <form method="post" action="editpost.php" enctype="multipart/form-data" class="mt-3">
                    <input type="hidden" value="<?php echo $attendee['attende_id'];?>" name="id">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input required type="text" class="form-control" value="<?php echo $attendee['firstname'];?>" id="firstname" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input required type="text" class="form-control"  value="<?php echo $attendee['lastname'];?>" id="lastname" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'];?>"id="dob" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="specialty">Area of Expertise</label>
                        <select class="form-control" id="specialty" name="specialty">
                            <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
                                    <option value="<?php echo $r['specialty_id'];?>" <?php if($r['specialty_id'] == $attendee['specialty_id'])
                                    echo 'selected'?>>
                                        <?php echo $r['name'];?>
                                    </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input required type="email" class="form-control"   value="<?php echo $attendee['email'];?>" id="email"  name="email"
                            aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-groupform-group">
                        <label for="phone">Contact Number</label>
                        <input type="text" class="form-control" id="phone"  value="<?php echo $attendee['contactnumber'];?>" name="phone" aria-describedby="phoneHelp">
                        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone
                            else.</small>
                    </div>
                    <br />
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="avatar" name="avatar">
                        <label class="custom-file-label" for="avatar">Choose File</label>
                        <small id="avatar" class="form-text text-danger">File Upload is Optional</small>

                    </div>


                    <button type="submit" name="submit" class="btn btn-success btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }?>

<br>
<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php';
?>