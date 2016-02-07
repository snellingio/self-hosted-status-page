
<h3 class="page-header">Import Previous Statuses</h3>
<?php if (isset($flash)): ?>
	<?php if ($flash['success']): ?>
		<div class="alert alert-success" role="alert">
	  		Feed successfully updated!
		</div>
	<?php else: ?>
		<div class="alert alert-danger" role="alert">
	  		<?=$this->e($flash['message'])?>
		</div>
	<?php endif?>
<?php endif?>
<form action="/dashboard/import" method="POST">
	<div class="form-group">
		<label>[redacted].io RSS Feed</label>
			<input type="text" class="form-control input-lg" name="import[url]" placeholder="[redacted].io RSS Feed URL">
	</div>
	<button type="submit" class="btn btn-lg btn-primary">Import from [redacted].io</button>
</form>
<br><br>
<p class="text-muted">Because of a change in the RSS Feed structure, [redacted].io only allows importing of the last month or so.</p>
<p><a href="https://statuspage.io">We cannot use [redacted].io's trademarked name as we previously recieved a cease and desist.</a></p>
