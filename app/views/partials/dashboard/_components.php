
<h3 class="page-header">
	Components <small> - Update the status, or drag and drop to reorder</small><a href="/dashboard/components/new" class="btn btn-primary pull-right">Create A New Component</a>
</h3>
<?php $displayed = []?>
<?php if (isset($flash)): ?>
	<?php if ($flash['form'] === 'update-components'): ?>
		<?php if ($flash['success']): ?>
			<div class="alert alert-success" role="alert">
		  		Components successfully updated!
			</div>
		<?php else: ?>
			<div class="alert alert-danger" role="alert">
		  		Something went wrong!
			</div>
		<?php endif?>
	<?php endif?>
<?php endif?>
<?php if (sizeof($components) > 0): ?>
	<form action="/dashboard/components" method="POST">
		<input type="hidden" name="form" value="update-components">
		<ul id="list-group" class="list-group">
			<?php foreach ($components as $component): ?>
				<li class="list-group-item">
					<div class="row">
						<fieldset id="<?=$this->e($component['key'])?>">
							<div class="col-sm-3">
								<h4 class="radio-button">
									<a onclick="component<?=$this->e($component['key'])?>();">
										<?=$this->e($component['name'])?>
									</a>
								</h4>
							</div>
							<div class="col-sm-9">
						    	<span class="radio-button">
						    		<?php if ($component['status'] === 'operational'): ?>
										<input checked="checked" name="component[<?=$this->e($component['key'])?>]" type="radio" id="operational-<?=$this->e($component['key'])?>" value="operational">
									<?php else: ?>
										<input name="component[<?=$this->e($component['key'])?>]" type="radio" id="operational-<?=$this->e($component['key'])?>" value="operational">
									<?php endif?>

						    		<label for="operational-<?=$this->e($component['key'])?>">
						    			Operational
						    		</label>
						    	</span>
						    	<span class="radio-button">
						    		<?php if ($component['status'] === 'degraded'): ?>
										<input checked="checked" name="component[<?=$this->e($component['key'])?>]" type="radio" id="degraded-<?=$this->e($component['key'])?>" value="degraded">
									<?php else: ?>
										<input name="component[<?=$this->e($component['key'])?>]" type="radio" id="degraded-<?=$this->e($component['key'])?>" value="degraded">
									<?php endif?>

						    		<label for="degraded-<?=$this->e($component['key'])?>">Degraded</label>
						    	</span>
						    	<span class="radio-button">
						    		<?php if ($component['status'] === 'partial'): ?>
										<input checked="checked" name="component[<?=$this->e($component['key'])?>]" type="radio" id="partial-<?=$this->e($component['key'])?>" value="partial">
									<?php else: ?>
										<input name="component[<?=$this->e($component['key'])?>]" type="radio" id="partial-<?=$this->e($component['key'])?>" value="partial">
									<?php endif?>
						    		<label for="partial-<?=$this->e($component['key'])?>">Partial Outage</label>
						    	</span>
								<span class="radio-button">
						    		<?php if ($component['status'] === 'major'): ?>
										<input checked="checked" name="component[<?=$this->e($component['key'])?>]" type="radio" id="major-<?=$this->e($component['key'])?>" value="major">
									<?php else: ?>
										<input name="component[<?=$this->e($component['key'])?>]" type="radio" id="major-<?=$this->e($component['key'])?>" value="major">
									<?php endif?>
									<label for="major-<?=$this->e($component['key'])?>">Major Outage</label>
								</span>
							</div>
						</fieldset>
					</div>
				</li>
			<?php endforeach?>
		</ul>
		<button type="submit" class="btn btn-lg btn-primary">Update Components</button>
	</form>

	<script type="text/javascript">
	    $(function(){
			var el = document.getElementById('list-group');
			var sortable = Sortable.create(el);
		});

		<?php foreach ($components as $component): ?>
		    var component<?=$this->e($component['key'])?> = function() {
		    	bootbox.dialog({
			        title: "Edit - <?=$this->e($component['name'])?>",
			        message: '<form id="edit<?=$this->e($component['key'])?>" action="/dashboard/components" method="POST"> \
								<input type="hidden" name="form" value="update-component"> \
								<input type="hidden" name="component[key]" value="<?=$this->e($component['key'])?>"> \
						    	<input type="hidden" name="component[sort]" value="<?=$this->e($component['sort'])?>"> \
						    	<input type="hidden" name="component[status]" value="<?=$this->e($component['status'])?>"> \
						    	<div class="form-group"> \
						    		<label>Name</label> \
						   			<input type="text" class="form-control input-lg" name="component[name]" placeholder="Component Name" value="<?=$this->e($component['name'])?>"> \
						    	</div> \
						    	<div class="form-group"> \
						    		<label>Description</label> \
						   			<input type="text" class="form-control input-lg" name="component[description]" placeholder="Component Description (& Explanation)" value="<?=$this->e($component['description'])?>"> \
						    	</div> \
							</form>',
			        buttons: {
			        	delete: {
			                label: "Delete",
			                className: "pull-left btn-danger",
			                callback: function () {
			                	$('<input type="hidden" name="action" value="delete">').appendTo("#edit<?=$this->e($component['key'])?>");
			                	$("#edit<?=$this->e($component['key'])?>").submit();
			                }
			            },
			            success: {
			                label: "Save",
			                className: "btn-primary",
			                callback: function () {
			                	$('<input type="hidden" name="action" value="save">').appendTo("#edit<?=$this->e($component['key'])?>");
			                	$("#edit<?=$this->e($component['key'])?>").submit();
			                }
			            }
			        }
		    	});
		    };
		<?php endforeach?>
	</script>
<?php else: ?>
	<br><br><br>
	<h3 class="text-center"><a href="/dashboard/components/new">Create your first Component</a></h3>
<?php endif?>
