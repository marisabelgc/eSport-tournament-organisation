<label for="name">Tournament Name <span class="red"></span></label>
<input class="form-control" placeholder="Tournament Name" type="text" id="name" name="name" value="<?php echo isset($row['name'])? $row['name'] : ''; ?>" required>
<br> 
<div class="row">
	<div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">
		<label for="game">Game <span class="red"></span></label>
		<input class="form-control" placeholder="Game" type="text" id="game" name="game" value="<?php echo isset($row['game'])? $row['game'] : ''; ?>" required>
		<br>
	</div>

	<div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">
		<label for="name">Event Date <span class="red"></span></label>
		<input class="form-control" placeholder="Event Date" type="date" id="start_date" name="start_date" value="<?php echo isset($row['start_date'])? $row['start_date'] : ''; ?>" start_daterequired>
		
		<br>
	</div>

	<div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">
		<label for="schedule">Schedule (Ex: 14:00 - 19:00) <span class="red" id="scheduleSpan"></span></label>

		<div class="schedule">
			<input type="text" id="scheduleHour1" name="schedule_hour1"  class="form-control" value="<?php echo isset($row['schedule'])? substr($row['schedule'], 0, 2) : ''; ?>"> 
			:
			<input type="text" id="scheduleMin1" name="schedule_min1"  class="form-control" value="<?php echo isset($row['schedule'])? substr($row['schedule'], 3, 2) : ''; ?>">
			-
			<input type="text" id="scheduleHour2" name="schedule_hour2"  class="form-control" value="<?php echo isset($row['schedule'])? substr($row['schedule'], 8, 2) : ''; ?>">
			:
			<input type="text" id="scheduleMin2" name="schedule_min2"  class="form-control" value="<?php echo isset($row['schedule'])? substr($row['schedule'], 11, 2) : ''; ?>">
		</div>
		<br>
	</div>
</div>

<div class="row">
	<div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">
		<label for="prize1">First Prize <span class="red"></span></label>
		<textarea class="form-control" placeholder="First Prize" id="prize1" name="prize1" rows="3" required><?php echo isset($row['prize1'])? $row['prize1'] : ''; ?></textarea>
		<br>
	</div>

	<div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">
		<label for="prize2">Second Prize <span class="red"></span></label>
		<textarea class="form-control" placeholder="Second Prize" id="prize2" name="prize2" rows="3" required><?php echo isset($row['prize2'])? $row['prize2'] : ''; ?></textarea>
		<br>
	</div>

	<div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">
		<label for="prize3">Third Prize <span class="red"></span></label>
		<textarea class="form-control" placeholder="Third Prize" id="prize3" name="prize3" rows="3" required><?php echo isset($row['prize3'])? $row['prize3'] : ''; ?></textarea>
		<br>
	</div>
	<div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">

		<label for="address">Address <span class="red"></span></label>
		<textarea class="form-control" placeholder="Address" id="address" name="address" required><?php echo isset($row['address'])? $row['address'] : ''; ?></textarea>
		<br>
	</div>

	<div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">
		<b>Sponsors</b><br>		
		<?php 
		if(isset($row['id'])){
			rel_tables_get($row['id'], 'tournament_edit', 'sponsor');
		}else{
			rel_tables_get('', 'tournament_add', 'sponsor');
		}
		?>
	</div>
	<div class="col-lg-4  col-md-12  col-sm-12  col-xs-12">
		<b>Players</b><br>
		<?php 
		if( isset($row['id']) ){
			rel_tables_get($row['id'], 'tournament_edit', 'player');
		}else{
			rel_tables_get('', 'tournament_add', 'player');
		}
		?>
	</div>
</div>