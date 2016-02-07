
<h3 class="page-header">
	Incidents <small> - Click to edit each incident</small><a href="/dashboard/incidents/new" class="btn btn-primary pull-right">Create A New Incident</a>
</h3>
<?php $displayed = [];?>

<?php if (sizeof($incidents) > 0): ?>
	<?php foreach ($incidents as $incident): ?>
		<?php if (!in_array($incident['page'], $displayed)): ?>
			<?php $displayed[] = $incident['page']?>
			<h4>
				<a href="/dashboard/incidents/p/<?=$this->e($incident['page'])?>">
					<?=$this->e($incident['name'])?>
				</a>
			</h4>
			<p><small class="text-muted">
				<strong><?=ucfirst($this->e($incident['status']))?> </strong> on <?=$this->e($incident['time'])?>
			</small></p>
			<?php if ($incident !== end($incidents)): ?>
				<hr>
			<?php endif?>
		<?php endif?>
	<?php endforeach?>

	<script type="text/javascript">
	$(function(){
		$('textarea').autosize();
	});
	</script>
<?php else: ?>
	<br><br><br>
	<h3 class="text-center"><a href="/dashboard/incidents/new">Create your first Incident</a></h3>
<?php endif?>