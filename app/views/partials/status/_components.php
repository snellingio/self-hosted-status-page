
<?php if (sizeof($components) > 0): ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<ul class="list-group">
					<?php foreach ($components as $component): ?>
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-7">
									<?php if (!empty($component['description'])): ?>
										<span class="name" data-toggle="tooltip" data-placement="right" title="<?=$this->e($component['description'])?>">
									<?php else: ?>
										<span class="name">
									<?php endif?>
										<?=$this->e($component['name'])?>
									</span>
								</div>
								<div class="col-xs-5">
									<?php if ($component['status'] === 'operational'): ?>
										<div class="status greens">Operational</div>
									<?php endif?>
									<?php if ($component['status'] === 'degraded'): ?>
										<div class="status oranges">Degraded Performance</div>
									<?php endif?>
									<?php if ($component['status'] === 'partial'): ?>
										<div class="status yellows">Partial Outage</div>
									<?php endif?>
									<?php if ($component['status'] === 'major'): ?>
										<div class="status reds">Major Outage</div>
									<?php endif?>
								</div>
							</div>
						</li>
					<?php endforeach?>
				</ul>
			</div>
		</div>
	</div>
<?php endif?>
