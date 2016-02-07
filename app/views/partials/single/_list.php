
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 left">
			<br>
			<?php foreach ($incidents as $incident): ?>
				<div class="row">
					<div class="col-sm-2">
						<h5><?=ucfirst($this->e($incident['status']))?></h5>
					</div>
					<div class="col-sm-10">
						<p><?=$this->e($incident['description'])?></p>
						<p><small class="text-muted"><?=$this->e($incident['time'])?></small></p>
					</div>
				</div>
			<?php endforeach?>
		</div>
	</div>
</div>
