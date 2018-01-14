<div class="row">
    <?php
    $edit = false;
    if (isset($_GET['id'])){
        $edit = true;
    }
    ?>
    <div class="<?php echo $edit? "col-lg-6": "col-lg-4"; ?> col-xs-12">
        <label for="name">Email</label>
        <input class="form-control" placeholder="Email" type="email" id="email" name="email">
        <br>
    </div>

    <?php
    if($edit){?>
    <div class="col-lg-6 col-xs-12">
        <label for="old_password">Old Password</label>
        <input class="form-control" placeholder="Old Password" type="password" id="old_password" name="old_password">
        <br>
    </div>
    <?php } ?>

    <div class="<?php echo $edit? "col-lg-6": "col-lg-4"; ?>  col-xs-12">
        <label for="new_password1">
            <?php echo $edit? "New Password": "Password"; ?>
        </label>
        <input class="form-control" placeholder="<?php echo $edit? "New Password": "Password"; ?>" type="password" id="new_password1" name="new_password1">
        <br>
    </div>

    <div class="<?php echo $edit? "col-lg-6": "col-lg-4"; ?>  col-xs-12">
        <label for="password1">
            <?php echo $edit? "Repeat your new password": "Repeat your password"; ?>            
        </label>
        <input class="form-control" placeholder="<?php echo $edit? "Repeat your new password": "Repeat your password"; ?>" type="password" id="new_password2" name="new_password2">
    </div>
</div> 