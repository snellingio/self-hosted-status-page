
<!-- This code is functional, but disabled. -->

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php if (isset($incidents[0])): ?>
				<?php if (strtolower($incidents[0]['status']) !== 'resolved' && strtolower($incidents[0]['status']) !== 'completed'): ?>
					<?php $key  = $incidents[0]['page'];?>
					<?php $name = $incidents[0]['name'];?>
					<div class="panel panel-default yellows_border">
						<div class="panel-heading yellows_bg">
							<a href="/incidents/<?=$this->e($incidents[0]['page'])?>">
								<strong><?=$this->e($name)?></strong>
							</a>
						</div>
						<div class="panel-body">
							<?php for ($x = 0; $x < 20; $x++): ?>
								<?php if (isset($incidents[$x])): ?>
									<?php if ($key === $incidents[$x]['page']): ?>
										<div class="row">
											<div class="col-sm-2">
												<h5><?=ucfirst($this->e($incidents[$x]['status']))?></h5>
											</div>
											<div class="col-sm-10">
												<p><?=$this->e($incidents[$x]['description'])?></p>
												<p><small class="text-muted"><?=$incidents[$x]['time']?></small></p>
											</div>
										</div>
									<?php endif?>
								<?php endif?>
							<?php endfor?>
						</div>
					</div>
				<?php else: ?>
					<?php $issues_with = '';?>
					<?php foreach ($components as $component): ?>
						<?php if ($component['status'] !== 'operational'): ?>
							<?php if (!empty($issues_with)): ?>
								<?php $issues_with .= ', ';?>
							<?php endif?>
							<?php $issues_with .= $component['name']?>
						<?php endif?>
					<?php endforeach?>
					<?php if (!empty($issues_with)): ?>
						<div class="alert yellows_bg">
							<p>Experiencing Issues with <?=$this->e($issues_with)?></p>
						</div>
					<?php else: ?>
						<div class="alert greens_bg">
							<p>All Systems Operational</p>
						</div>
					<?php endif?>
				<?php endif?>
			<?php else: ?>
				<?php $issues_with = ''?>
				<?php foreach ($components as $component): ?>
					<?php if ($component['status'] !== 'operational'): ?>
						<?php if (!empty($issues_with)): ?>
							<?php $issues_with .= ', ';?>
						<?php endif?>
						<?php $issues_with .= $component['name'];?>
					<?php endif?>
				<?php endforeach?>
				<?php if (!empty($issues_with)): ?>
					<div class="alert yellows_bg">
						<p>Experiencing Issues with <?=$this->e($issues_with)?></p>
					</div>
				<?php else: ?>
					<div class="alert greens_bg">
						<p>All Systems Operational</p>
					</div>
				<?php endif?>
			<?php endif?>
		</div>
	</div>
</div>
