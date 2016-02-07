
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="day">
				<?php for ($x = 0; $x < 12; $x++): ?>
					<?php $pages = [];?>
					<?php $month = date('Y-m-d', strtotime('-' . $x . ' month', strtotime(date('Y-m-d'))))?>
					<div class="page-header">
						<h4><?=date('F Y', strtotime($month))?></h4>
					</div>
					<?php $name     = false;?>
					<?php $activity = false;?>
					<div class="incident">
						<?php foreach ($incidents as $incident): ?>
							<?php if (!in_array($incident['page'], $pages)): ?>
								<?php $pages[] = $incident['page'];?>
								<?php if (date('FY', strtotime($incident['date'])) === date('FY', strtotime($month))): ?>
									<?php if (empty($name) || $name !== $incident['name']): ?>
										<div class="row">
											<div class="col-sm-12">
												<h4 class="incident-name">
													<a href="/incidents/<?=$this->e($incident['page'])?>"><?=$this->e($incident['name'])?></a>
												</h4>
											</div>
										</div>
										<?php $name = $incident['name'];?>
									<?php endif?>
									<?php $activity = true;?>
									<?php if ((strtolower($incident['status']) === 'resolved') || (strtolower($incident['status']) === 'completed')): ?>
										<div class="row">
											<div class="col-sm-12">
												<p><?=$this->e($incident['description'])?></p>
												<p><small class="text-muted"><?=$incident['time']?></small></p>
											</div>
										</div>
									<?php endif?>
								<?php endif?>
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
