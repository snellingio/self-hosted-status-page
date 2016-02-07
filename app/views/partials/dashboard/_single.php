
<h3 class="page-header"><a onclick="page<?=$this->e($page['key'])?>();"><?=$this->e($page['name'])?></a></h3>
<?php if (isset($flash)): ?>
	<?php if ($flash['success']): ?>
		<div class="alert alert-success" role="alert">
	  		Incident successfully updated!
		</div>
	<?php else: ?>
		<div class="alert alert-danger" role="alert">
	  		Something went wrong!
		</div>
	<?php endif?>
<?php endif?>
<div class="row">
	<div class="col-sm-12">
		<form action="/dashboard/incidents/p/<?=$this->e($page['key'])?>" method="POST">
			<input type="hidden" name="form" value="update-create-incident">
			<input type="hidden" name="page[key]" value="<?=$this->e($page['key'])?>">
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
			<button type="submit" class="btn btn-lg btn-primary">Update Incident</button>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<hr>
	</div>
</div>
<?php foreach ($incidents as $incident): ?>
	<div class="row">
		<div class="col-sm-2">
			<h5>
				<a onclick="incident<?=$this->e($incident['key'])?>();">
					<?=ucfirst($this->e($incident['status']))?>
				</a>
			</h5>
		</div>
		<div class="col-sm-10">
			<p><?=$this->e($incident['description'])?></p>
			<p><small class="text-muted"><?=$this->e($incident['time'])?></small></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<br>
		</div>
	</div>
<?php endforeach?>


<script type="text/javascript">
	var page<?=$this->e($page['key'])?> = function() {
    	bootbox.dialog({
	        title: "Edit - <?=$this->e($page['name'])?>",
	        message: '<form id="edit<?=$this->e($page['key'])?>" \
	        			action="/dashboard/incidents/p/<?=$this->e($page['key'])?>" method="POST"> \
						<input type="hidden" name="form" value="update-page"> \
						<input type="hidden" name="page[key]" value="<?=$this->e($page['key'])?>"> \
				    	<div class="form-group"> \
				    		<label>Name</label> \
				   			<input type="text" class="form-control input-lg" name="page[name]" placeholder="Page Name" value="<?=$this->e($page['name'])?>"> \
				    	</div> \
					</form>',
	        buttons: {
	        	delete: {
	                label: "Delete",
	                className: "pull-left btn-danger",
	                callback: function () {
	                	$('<input type="hidden" name="action" value="delete">').appendTo("#edit<?=$this->e($page['key'])?>");
	                	$("#edit<?=$this->e($page['key'])?>").submit();
	                }
	            },
	            success: {
	                label: "Save",
	                className: "btn-primary",
	                callback: function () {
	                	$('<input type="hidden" name="action" value="save">').appendTo("#edit<?=$this->e($page['key'])?>");
	                	$("#edit<?=$this->e($page['key'])?>").submit();
	                }
	            }
	        }
    	});
    };

    <?php foreach ($incidents as $incident): ?>
		var incident<?=$this->e($incident['key'])?> = function() {
	    	bootbox.dialog({
		        backdrop: true,
		        title: "Edit - <?=$this->e($page['name'])?>",
		        message: '<form id="edit<?=$this->e($incident['key'])?>" \
		         			action="/dashboard/incidents/p/<?=$this->e($page['key'])?>" method="POST"> \
							<input type="hidden" name="form" value="update-incident"> \
							<input type="hidden" name="page[key]" value="<?=$this->e($page['key'])?>"> \
							<input type="hidden" name="incident[key]" value="<?=$this->e($incident['key'])?>"> \
							<div class="form-group"> \
								<div class="control-group"> \
									<label>Status</label> \
									<div> \
								    	<span class="radio-button" style="margin-bottom: 10px;"> \
								    		<input id="investigating" <?php if (strtolower($this->e($incident['status'])) === 'investigating'): ?>checked="checked"<?php endif?> name="incident[status]" type="radio" value="investigating"> \
								    		<label for="investigating"> \
								    			Investigating \
								    		</label> \
								    	</span> \
								    	<span class="radio-button" style="margin-bottom: 10px;"> \
								    		<input id="identified" <?php if (strtolower($this->e($incident['status'])) === 'identified'): ?>checked="checked"<?php endif?> name="incident[status]" type="radio" value="identified"> \
								    		<label for="identified"> \
								    			Identified \
								    		</label> \
								    	</span> \
								    	<span class="radio-button" style="margin-bottom: 10px;"> \
								    		<input id="monitoring" <?php if (strtolower($this->e($incident['status'])) === 'monitoring'): ?>checked="checked"<?php endif?> name="incident[status]" type="radio" value="monitoring"> \
								    		<label for="monitoring"> \
								    			Monitoring \
								    		</label> \
								    	</span> \
										<span class="radio-button" style="margin-bottom: 10px;"> \
											<input id="resolved" <?php if (strtolower($this->e($incident['status'])) === 'resolved'): ?>checked="checked"<?php endif?> name="incident[status]" type="radio" value="resolved"> \
											<label for="resolved"> \
												Resolved \
											</label> \
										</span> \
										<span class="radio-button" style="margin-bottom: 10px;"> \
											<input id="custom" \
											<?php if (strtolower($this->e($incident['status']) !== 'investigating') && strtolower($this->e($incident['status']) !== 'identified') && strtolower($this->e($incident['status']) !== 'monitoring') && strtolower($this->e($incident['status']) !== 'resolved')): ?>checked="checked"<?php endif?> name="incident[status]" type="radio" value="custom"> \
											<label for="custom"> \
												<input class="form-control input-lg" name="incident[custom]" type="text" <?php if (strtolower($this->e($incident['status']) !== 'investigating') && strtolower($this->e($incident['status']) !== 'identified') && strtolower($this->e($incident['status']) !== 'monitoring') && strtolower($this->e($incident['status']) !== 'resolved')): ?> value="<?=ucfirst($this->e($incident['status']))?> <?php endif?>"> \
											</label> \
										</span> \
									</div> \
								</div> \
							</div> \
							<div class="form-group"> \
					    		<label>Description</label> \
					   			<textarea class="form-control input-lg <?=$this->e($incident['key'])?>" name="incident[description]" placeholder="Incident Description" style="max-width:100%;max-height:200px;"><?=$this->e(preg_replace('/\r|\n/', ' ', $incident['description']))?></textarea> \
					    	</div> \
						</form>',
		        buttons: {
		        	delete: {
		                label: "Delete",
		                className: "pull-left btn-danger",
		                callback: function () {
		                	$('<input type="hidden" name="action" value="delete">').appendTo("#edit<?=$this->e($incident['key'])?>");
		                	$("#edit<?=$this->e($incident['key'])?>").submit();
		                }
		            },
		            success: {
		                label: "Save",
		                className: "btn-primary",
		                callback: function () {
		                	$('<input type="hidden" name="action" value="save">').appendTo("#edit<?=$this->e($incident['key'])?>");
		                	$("#edit<?=$this->e($incident['key'])?>").submit();
		                }
		            }
		        }
	    	});
			$('textarea.<?=$this->e($incident['key'])?>').autosize();
	    };
	<?php endforeach?>

	$(function(){
		$('textarea').autosize();
	});
</script>