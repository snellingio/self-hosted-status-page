
<h3 class="page-header">New Incident <small> - Create an open incident to keep the status of</small><a href="/dashboard/incidents" class="btn btn-default pull-right">Go Back To All Incidents</a></h3>
<?php if (isset($flash)): ?>
	<?php if ($flash['form'] === 'create-incident'): ?>
		<?php if ($flash['success']): ?>
			<div class="alert alert-success" role="alert">
		  		Incident successfully created! <a href="/dashboard/incidents">View it now</a>
			</div>
		<?php else: ?>
			<div class="alert alert-danger" role="alert">
		  		Something went wrong! All fields are required.
			</div>
		<?php endif?>
	<?php endif?>
<?php endif?>
<form action="/dashboard/incidents/new" method="POST">
	<input type="hidden" name="form" value="create-incident">
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control input-lg" name="incident[name]" placeholder="Incident Name">
	</div>
	<div class="form-group">
    	<div class="control-group">
			<label>Status</label>
			<div>
		    	<span class="radio-button">
		    		<input id="investigating" checked="checked" name="incident[status]" type="radio" value="investigating">
		    		<label for="investigating">
		    			Investigating
		    		</label>
		    	</span>
		    	<span class="radio-button">
		    		<input id="identified" name="incident[status]" type="radio" value="identified">
		    		<label for="identified">
		    			Identified
		    		</label>
		    	</span>
		    	<span class="radio-button">
		    		<input id="monitoring" name="incident[status]" type="radio" value="monitoring">
		    		<label for="monitoring">
		    			Monitoring
		    		</label>
		    	</span>
				<span class="radio-button">
					<input id="resolved" name="incident[status]" type="radio" value="resolved">
					<label for="resolved">
						Resolved
					</label>
				</span>
				<span class="radio-button">
					<input id="custom" name="incident[status]" type="radio" value="custom">
					<label for="custom">
						<input class="form-control input-lg" name="incident[custom]" type="text">
					</label>
				</span>
			</div>
		</div>
	</div>
	<div class="form-group">
    	<label>Description</label>
    	<textarea class="form-control input-lg" name="incident[description]" placeholder="Incident Description (& Message)"></textarea>
	</div>
	<button type="submit" class="btn btn-lg btn-primary">Create New Incident</button>
</form>

<script type="text/javascript">
	$(function(){
		$('textarea').autosize();
	});
</script>
