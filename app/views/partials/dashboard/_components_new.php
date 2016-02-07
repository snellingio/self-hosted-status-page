
<h3 class="page-header">
	New Component <small> - Create an individual component to keep the status of</small><a href="/dashboard/components" class="btn btn-default pull-right">Go Back To All Components</a>
</h3>
<?php if (isset($flash)): ?>
	<?php if ($flash['form'] === 'create-component'): ?>
		<?php if ($flash['success']): ?>
			<div class="alert alert-success" role="alert">
		  		Component successfully created!  <a href="/dashboard/components">View it now</a>
			</div>
		<?php else: ?>
			<div class="alert alert-danger" role="alert">
		  		Something went wrong! The Name field is required.
			</div>
		<?php endif?>
	<?php endif?>
<?php endif?>
<form action="/dashboard/components/new" method="POST">
	<input type="hidden" name="form" value="create-component">
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control input-lg" name="component[name]" placeholder="Component Name">
	</div>
	<div class="form-group">
		<label>Description</label>
		<input type="text" class="form-control input-lg" name="component[description]" placeholder="Component Description (& Explanation)">
	</div>
	<button type="submit" class="btn btn-lg btn-primary">Create New Component</button>
</form>
