<div class="row">
    <div class="col-lg-6  col-md-6  col-sm-6  col-xs-12">
        <label for="name">Name <span class="red" id="name_span"></span></label>
        <input class="form-control" placeholder="Nombre" type="text" id="name" name="name" value="<?php echo isset($row['name'])? $row['name'] : ''; ?>" >
    </div>

    <div class="col-lg-6  col-md-6  col-sm-6  col-xs-12">
        <label for="url">URL <span class="red"></span></label>
        <input class="form-control" placeholder="URL" type="text" id="url" name="url" value="<?php echo isset($row['url'])? $row['url'] : ''; ?>" >
        <br>
    </div>    

    <div class="col-lg-6  col-md-12  col-sm-12  col-xs-12">
        <label for="description">Description <span class="red"></span></label>
        <textarea class="form-control" placeholder="Description" id="description" name="description"><?php echo isset($row['description'])? $row['description'] : ''; ?></textarea>
        <br>
    </div>

    <div class="col-lg-6  col-md-12  col-sm-12  col-xs-12">
        <b>Tournaments</b><br>
        <?php 
        if( isset($row['id']) ){
            rel_tables_get($row['id'], 'sponsor_edit', 'tournament');
        }else{
            rel_tables_get('', 'sponsor_add', 'tournament');
        }
        ?>
    </div>
</div>

