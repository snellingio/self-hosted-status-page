
<?php $this->layout('layouts/status', ['template' => $template, 'components' => $components, 'incidents' => $incidents])?>

<?=$this->insert('partials/_header', ['template' => $template, 'components' => $components, 'incidents' => $incidents, 'path' => $path])?>

<?=$this->insert('partials/status/_components', ['template' => $template, 'components' => $components, 'incidents' => $incidents])?>

<?php if (UPTIMEROBOT): ?>
	<?=$this->insert('partials/status/_uptimerobot', ['template' => $template, 'components' => $components, 'incidents' => $incidents])?>
<?php endif?>

<?=$this->insert('partials/status/_day', ['template' => $template, 'components' => $components, 'incidents' => $incidents])?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<hr>
			<a href="/history" class="pull-left">&#8592; Incident History</a>
			<?php if (SUPPORT_STATUS_CAT): ?>
				<a href="https://github.com/snellingio/status-cat" class="pull-right">&hearts;&nbsp;&nbsp;&#128049;</a>
			<?php endif?>
		</div>
	</div>
</div>

<?=$this->insert('partials/_footer', ['template' => $template, 'components' => $components, 'incidents' => $incidents])?>
