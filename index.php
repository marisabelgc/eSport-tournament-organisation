<?php include('templates/header.php');?>

<div class="container  index">
    <?php require('templates/breadcrumb_first_level.php'); ?>   		
    <div class="row">
        <div class="col-xs-12  col-sm-6  col-md-4  text-center">
            <div class="well">
                <?php $num_tournaments = count_table('tournament'); ?>
                <h2><?php echo $num_tournaments;?></h2>
                <h5><?php echo $num_tournaments!=1? 'Tournaments':'Tournament';?></h5>
                <br>
                <a href="tournament_list.php" class="btn btn-block">All Tournaments</a>
                <a href="tournament_add.php" class="btn btn-primary btn-block">New Tournament</a>
            </div>
        </div>
        <div class="col-xs-12  col-sm-6  col-md-4  text-center">
            <div class="well">
                <?php $num_sponsors = count_table('sponsor'); ?>
                <h2><?php echo $num_sponsors;?></h2>
                <h5><?php echo $num_sponsors!=1? 'Sponsors':'Sponsor';?></h5>
                <br>
                <a href="sponsor_list.php" class="btn btn-block">All Sponsors</a>
                <a href="sponsor_add.php" class="btn btn-primary btn-block">New Sponsor</a>
            </div>
        </div>                              
        <div class="col-xs-12  col-sm-6  col-md-4  text-center">
            <div class="well">
                <?php $num_players = count_table('player'); ?>
                <h2><?php echo $num_players;?></h2>
                <h5><?php echo $num_players!=1? 'Players':'Player';?></h5>
                <br>
                <a href="player_list.php" class="btn btn-block">All Players</a>
                <a href="player_add.php" class="btn btn-primary btn-block">New Player</a>
            </div>
        </div> 
    </div>   
    
</div>

<?php include('templates/footer.php');?>