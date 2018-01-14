<div class="row">
    <div class="col-lg-6  col-md-6  col-sm-6  col-xs-12">
        <label for="name">Name <span class="red"></span></label>
        <input class="form-control" placeholder="Name" type="text" id="name" name="name" value="<?php echo isset($row['name'])? $row['name'] : ''; ?>" >
        <br>
    </div>

    <div class="col-lg-6  col-md-6  col-sm-6  col-xs-12">
        <label for="lastName">Last Name <span class="red"></span></label>
        <input class="form-control" placeholder="Last Name" type="text" id="lastName" name="last_name" value="<?php echo isset($row['last_name'])? $row['last_name'] : ''; ?>" >
        <br>
    </div>

    <div class="col-lg-6  col-md-6  col-sm-6  col-xs-12">
        <label for="username">Username <span class="red"></span></label>
        <input class="form-control" placeholder="Username" type="text" id="username" name="username" value="<?php echo isset($row['username'])? $row['username'] : ''; ?>" >
        <br>
    </div>

    <div class="col-lg-6  col-md-6  col-sm-6  col-xs-12">
        <label for="email">Email <span class="red" id="email_span"></span></label>
        <input class="form-control" placeholder="Email" type="email" id="email" name="email" value="<?php echo isset($row['email'])? $row['email'] : ''; ?>" >
        <br>
    </div>
    <div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">
        <b>Tournaments</b><br>
        <?php 
        if( isset($row['id']) ){
            rel_tables_get($row['id'], 'player_edit', 'tournament');
        }else{
            rel_tables_get('', 'player_add', 'tournament');
        }
        ?>
    </div>
</div> 