
<h3 class="page-header">Options</h3>
<?php if (isset($flash)): ?>
	<?php if ($flash['success']): ?>
		<div class="alert alert-success" role="alert">
	  		Options successfully updated!
		</div>
	<?php else: ?>
		<div class="alert alert-danger" role="alert">
	  		Something went wrong!
		</div>
	<?php endif?>
<?php endif?>

<form action="/dashboard/settings/options" method="POST">
	<br>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Api Key</label>
	    		<div>
	    			<input type="text" class="form-control input-lg" disabled="disabled" value="<?=API_KEY?>">
	   			</div>
	   			<br>
	   			<p class="text-muted"><strong>IF THIS IS BLANK, YOU CANNOT MAKE <code>POST</code> REQUESTS.</strong> This can be edited within the Heroku ENV dashboard, or in your <code>CONFIGURATION.php</code> if you are not using Heroku.</p>
	    	</div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Require Api Key for GET requests</label>
	    		<div>
					<span class="radio-button">
						<?php if ($settings['require_api_key']): ?>
							<input id="require_api_key_enabled" checked="checked" name="settings[require_api_key]" type="radio" value="true">
						<?php else: ?>
							<input id="require_api_key_enabled" name="settings[require_api_key]" type="radio" value="true">
						<?php endif?>
						<label for="require_api_key_enabled">Require</label>
					</span>
			   		<span class="radio-button">
			   			<?php if (!$settings['require_api_key']): ?>
			   				<input id="require_api_key_disabled" checked="checked" name="settings[require_api_key]" type="radio" value="false">
			   			<?php else: ?>
			   				<input id="require_api_key_disabled" name="settings[require_api_key]" type="radio" value="false">
			   			<?php endif?>
			   			<label for="require_api_key_disabled">Do not require</label>
			   		</span>
			   	</div>
			   	<br>
			   	<p class="text-muted">This will not apply to the <code>/api/v1/uptimerobot</code> or <code>/api/v1/graph</code> endpoints. Authentication is always required for POST requests.</p>
			</div>
	    </div>
	</div>
	<hr>
	<br>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Public Page or Private Page</label>
	    		<div>
					<span class="radio-button">
						<?php if ($settings['public_page']): ?>
							<input id="public_page_enabled" checked="checked" name="settings[public_page]" type="radio" value="true">
						<?php else: ?>
							<input id="public_page_enabled" name="settings[public_page]" type="radio" value="true">
						<?php endif?>
						<label for="public_page_enabled">Public Page</label>
					</span>
			   		<span class="radio-button">
			   			<?php if (!$settings['public_page']): ?>
			   				<input id="public_page_disabled" checked="checked" name="settings[public_page]" type="radio" value="false">
			   			<?php else: ?>
			   				<input id="public_page_disabled" name="settings[public_page]" type="radio" value="false">
			   			<?php endif?>
			   			<label for="public_page_disabled">Private Page</label>
			   		</span>
			   	</div>
	   			<div class="row" <?php if ($settings['public_page']): ?>style="display:none"<?php endif?>>
	   				<br>
				    <div class="col-sm-12">
						<input type="text" class="form-control input-lg" name="settings[private_page_password]" placeholder="Password protect the private page" value="<?=$this->e($settings['private_page_password'])?>">
				    </div>
				</div>
				<br>
				<p class="text-muted">This will require a password to view the public status and history page. If private, the <strong>Require Api Key for GET requests</strong> will automatically be required.</p>
			</div>
	    </div>
	</div>
	<hr>
	<br>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Timezone</label>
	    		<div>
					<select class="form-control input-lg" name="settings[timezone]">
	   					<?=$this->insert('partials/dashboard/__timezones', ['current_timezone' => $settings['timezone']])?>
	   				</select>
	   			</div>
	   			<br>
	   			<p class="text-muted">Most common timezones for US: <code>America/New_York</code>, <code>America/Chicago</code>, <code>America/Denver</code>, <code>America/Phoenix</code>, <code>America/Los_Angeles</code>, <code>Pacific/Honolulu</code></p>
	    	</div>
	    </div>
	</div>
	<hr>
	<br>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Uptime Robot Monitor Key</label>
	   			<input type="text" class="form-control input-lg" name="settings[uptimerobot_monitor_key]" placeholder="Uptime Robot Monitor Key" value="<?=$this->e($settings['uptimerobot_monitor_key'])?>">
	    	</div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Uptime Robot Monitor ID</label>
	   			<input type="text" class="form-control input-lg" name="settings[uptimerobot_monitor_id]" placeholder="Uptime Robot Monitor ID" value="<?=$this->e($settings['uptimerobot_monitor_id'])?>">
	    	</div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Uptime Robot Response Time Graph</label>
	    		<div>
					<span class="radio-button">
						<?php if ($settings['uptimerobot_response_time']): ?>
							<input id="uptimerobot_response_time_enabled" checked="checked" name="settings[uptimerobot_response_time]" type="radio" value="true">
						<?php else: ?>
							<input id="uptimerobot_response_time_enabled" name="settings[uptimerobot_response_time]" type="radio" value="true">
						<?php endif?>
						<label for="uptimerobot_response_time_enabled">Enabled</label>
					</span>
			   		<span class="radio-button">
			   			<?php if (!$settings['uptimerobot_response_time']): ?>
			   				<input id="uptimerobot_response_time_disabled" checked="checked" name="settings[uptimerobot_response_time]" type="radio" value="false">
			   			<?php else: ?>
			   				<input id="uptimerobot_response_time_disabled" name="settings[uptimerobot_response_time]" type="radio" value="false">
			   			<?php endif?>
			   			<label for="uptimerobot_response_time_disabled">Disabled</label>
			   		</span>
			   	</div>
			</div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Uptime Robot Uptime Graph</label>
	    		<div>
					<span class="radio-button">
						<?php if ($settings['uptimerobot_up_time']): ?>
							<input id="uptimerobot_up_time_enabled" checked="checked" name="settings[uptimerobot_up_time]" type="radio" value="true">
						<?php else: ?>
							<input id="uptimerobot_up_time_enabled" name="settings[uptimerobot_up_time]" type="radio" value="true">
						<?php endif?>
						<label for="uptimerobot_up_time_enabled">Enabled</label>
					</span>
			   		<span class="radio-button">
			   			<?php if (!$settings['uptimerobot_up_time']): ?>
			   				<input id="uptimerobot_up_time_disabled" checked="checked" name="settings[uptimerobot_up_time]" type="radio" value="false">
			   			<?php else: ?>
			   				<input id="uptimerobot_up_time_disabled" name="settings[uptimerobot_up_time]" type="radio" value="false">
			   			<?php endif?>
			   			<label for="uptimerobot_up_time_disabled">Disabled</label>
			   		</span>
			   	</div>
			</div>
	    </div>
	</div>
	<hr>
	<br>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Webooks</label>
	    		<div>
					<span class="radio-button">
						<?php if ($settings['webhook']): ?>
							<input id="webhook_enabled" checked="checked" name="settings[webhook]" type="radio" value="true">
						<?php else: ?>
							<input id="webhook_enabled" name="settings[webhook]" type="radio" value="true">
						<?php endif?>
						<label for="webhook_enabled">Enabled</label>
					</span>
			   		<span class="radio-button">
			   			<?php if (!$settings['webhook']): ?>
			   				<input id="webhook_disabled" checked="checked" name="settings[webhook]" type="radio" value="false">
			   			<?php else: ?>
			   				<input id="webhook_disabled" name="settings[webhook]" type="radio" value="false">
			   			<?php endif?>
			   			<label for="webhook_disabled">Disabled</label>
			   		</span>
			   	</div><br>
	    		<div id="webhook_urls" class="form-control input-lg full-width"><?=implode("\n", $settings['webhook_urls'])?></div>
	   			<textarea id="webhook_urls_value" style="display:none;" name="settings[webhook_urls]" placeholder="Place each webhook url on new line."></textarea>
				<br>
				<p class="text-muted">Place each url on a new line</p>
			</div>
	    </div>
	</div>
	<hr>
	<br>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Slack Webook</label>
	    		<div>
					<span class="radio-button">
						<?php if ($settings['slack_webhook']): ?>
							<input id="slack_webhook_enabled" checked="checked" name="settings[slack_webhook]" type="radio" value="true">
						<?php else: ?>
							<input id="slack_webhook_enabled" name="settings[slack_webhook]" type="radio" value="true">
						<?php endif?>
						<label for="slack_webhook_enabled">Enabled</label>
					</span>
			   		<span class="radio-button">
			   			<?php if (!$settings['slack_webhook']): ?>
			   				<input id="slack_webhook_disabled" checked="checked" name="settings[slack_webhook]" type="radio" value="false">
			   			<?php else: ?>
			   				<input id="slack_webhook_disabled" name="settings[slack_webhook]" type="radio" value="false">
			   			<?php endif?>
			   			<label for="slack_webhook_disabled">Disabled</label>
			   		</span>
			   	</div>
			   	<br>
			   	<p class="text-muted">Set up a new incoming webhook integration here: <a href="https://my.slack.com/services/new/incoming-webhook/">https://my.slack.com/services/new/incoming-webhook/</a></p>
			</div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Slack Webook URL</label>
	   			<input type="text" class="form-control input-lg" name="settings[slack_webhook_url]" placeholder="Slack Webook URL" value="<?=$this->e($settings['slack_webhook_url'])?>">
	    	</div>
	    </div>
	</div>
	<hr>
	<br>
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group">
	    		<label>Support Status Cat</label>
	    		<div>
					<span class="radio-button">
						<?php if ($settings['support_status_cat']): ?>
							<input id="support_status_cat_enabled" checked="checked" name="settings[support_status_cat]" type="radio" value="true">
						<?php else: ?>
							<input id="support_status_cat_enabled" name="settings[support_status_cat]" type="radio" value="true">
						<?php endif?>
						<label for="support_status_cat_enabled">Enabled</label>
					</span>
			   		<span class="radio-button">
			   			<?php if (!$settings['support_status_cat']): ?>
			   				<input id="support_status_cat_disabled" checked="checked" name="settings[support_status_cat]" type="radio" value="false">
			   			<?php else: ?>
			   				<input id="support_status_cat_disabled" name="settings[support_status_cat]" type="radio" value="false">
			   			<?php endif?>
			   			<label for="support_status_cat_disabled">Disabled</label>
			   		</span>
			   	</div>
			   	<br>
			   	<p class="text-muted">This will include a link to Status Cat on bottom of home and history pages</p>
			</div>
	    </div>
	</div>
	<hr>
	<br>
	<button type="submit" class="btn btn-lg btn-primary">Save All Options</button>
</form>

<script type='text/javascript'>
    $(function(){

    	header_html_editor = ace.edit('webhook_urls');
	    header_html_editor.setAutoScrollEditorIntoView(true);
	    header_html_editor.getSession().setUseWorker(false);
	   	header_html_editor.setOption('minLines', 4);
	    header_html_editor.setOption('maxLines', 100);
	    header_html_editor.getSession().on('change', function(){
			$('#webhook_urls_value').val(header_html_editor.getSession().getValue());
		});
		$('#webhook_urls_value').val(header_html_editor.getSession().getValue());

    });
</script>
