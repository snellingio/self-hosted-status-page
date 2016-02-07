
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="day">
				<?php for ($x = 0; $x < $template['days_to_show']; $x++): ?>
					<?php $day = date('Y-m-d', strtotime('-' . $x . ' day', strtotime(date('Y-m-d'))))?>
					<div class="page-header">
						<h4><?=date('F j, Y', strtotime($day))?></h4>
					</div>
					<?php $page     = false;?>
					<?php $activity = false;?>
					<div class="incident">
						<?php foreach ($incidents as $incident): ?>
							<?php if ($incident['date'] === $day): ?>
								<?php if (empty($page) || $page !== $incident['page']): ?>
									<div class="row">
										<div class="col-md-10 col-md-offset-2">
											<h4 class="incident-name">
												<a href="/incidents/<?=$this->e($incident['page'])?>">
													<?=$this->e($incident['name'])?>
												</a>
											</h4>
										</div>
									</div>
									<?php $page = $incident['page']?>
								<?php endif?>
								<?php $activity = true;?>
								<div class="row">
									<div class="col-md-2">
										<h5><?=ucfirst($this->e($incident['status']))?></h5>
									</div>
									<div class="col-md-10">
										<p><?=$this->e($incident['description'])?></p>
										<p><small class="text-muted"><?=$incident['time']?></small></p>
									</div>
								</div>
							<?php endif?>
						<?php endforeach?>
						<?php if (!$activity): ?>
							<h5 class="text-muted">No incidents reported.</h5>
						<?php endif?>
					</div>
				<?php endfor?>
			</div>
		</div>
	</div>
</div>
