
<h3 class="page-header">Custom Settings</h3>
<?php if (isset($flash)): ?>
	<?php if ($flash['success']): ?>
		<div class="alert alert-success" role="alert">
	  		Styles & template settings successfully updated!
		</div>
	<?php else: ?>
		<div class="alert alert-danger" role="alert">
	  		Something went wrong!
		</div>
	<?php endif?>
<?php endif?>
<form action="/dashboard/settings<?php if ($path === '/dashboard/settings/styles'): ?>/styles<?php endif?>" method="POST">
	<?php if ($path === '/dashboard/settings/styles'): ?>
		<div class="hidden-form">
	<?php endif?>
		<div class="row">
			<div class="col-sm-12">
		    	<div class="form-group">
		    		<label>Brand name (header text)</label>
		   			<input type="text" class="form-control input-lg" name="template[headline]" placeholder="Brand name. Custom header overrides this" value="<?=$this->e($template['headline'])?>">
		    	</div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-12">
		    	<div class="form-group">
		    		<label>Copyright (footer text)</label>
		   			<input type="text" class="form-control input-lg" name="template[footline]" placeholder="Footer text. Custom footer overrides this" value="<?=$this->e($template['footline'])?>">
		    	</div>
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-12">
		    	<div class="form-group">
		    		<label>About this page</label>
		   			<input type="text" class="form-control input-lg" name="template[about]" placeholder="Describe what this page is all about!" value="<?=$this->e($template['about'])?>">
		    	</div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-12">
		    	<div class="form-group">
		    		<label>Number of days to show on the homepage</label>
		   			<input type="number" class="form-control input-lg" name="template[days_to_show]" placeholder="How many days to show on the home status page. Defaults to 30" value="<?=$this->e($template['days_to_show'])?>">
		    	</div>
		    </div>
		</div>
	<?php if ($path === '/dashboard/settings/styles'): ?>
		</div>
	<?php endif?>
	<?php if ($path === '/dashboard/settings'): ?>
		<div class="hidden-form">
	<?php endif?>
		<div class="row">
			<div class="col-sm-6">
		    	<div class="form-group">
		    		<label>Text font color</label>
		    		<div class="input-group font_color">
		   				<input type="text" class="form-control input-lg" name="template[font_color]" placeholder="Color normal text. Defaults to #555555" value="<?=$this->e($template['font_color'])?>">
		    			<span class="input-group-addon"><i></i></span>
		    		</div>
		    	</div>
		    </div>
		    <div class="col-sm-6">
		    	<div class="form-group">
		    		<label>Light text font color</label>
		    		<div class="input-group text-muted">
		   				<input type="text" class="form-control input-lg" name="template[light_font_color]" placeholder="Color secondary light text. Defaults to #AAAAAA" value="<?=$this->e($template['light_font_color'])?>">
		    			<span class="input-group-addon"><i></i></span>
		    		</div>
		    	</div>
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-6">
		    	<div class="form-group">
		    		<label>Link text font color</label>
		    		<div class="input-group link_color">
		   				<input type="text" class="form-control input-lg" name="template[link_color]" placeholder="Color of links. Defaults to #3498DB" value="<?=$this->e($template['link_color'])?>" />
		    			<span class="input-group-addon"><i></i></span>
		    		</div>
		    	</div>
		    </div>
		    <div class="col-sm-6">
		    	<div class="form-group">
		    		<label>Green color</label>
		    		<div class="input-group greens">
		   				<input type="text" class="form-control input-lg" name="template[greens]" placeholder="Green text color. Default is #2FCC66" value="<?=$this->e($template['greens'])?>">
		    		    <span class="input-group-addon"><i></i></span>
		    		</div>
		    	</div>
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-6">
		    	<div class="form-group">
		    		<label>Yellow color</label>
		    		<div class="input-group yellows">
		   				<input type="text" class="form-control input-lg" name="template[yellows]" placeholder="Yellow text color. Default is #F1C40F" value="<?=$this->e($template['yellows'])?>">
				    	<span class="input-group-addon"><i></i></span>
		    		</div>
		    	</div>
		    </div>
		    <div class="col-sm-6">
		    	<div class="form-group">
		    		<label>Orange color</label>
		    		<div class="input-group oranges">
		   				<input type="text" class="form-control input-lg" name="template[oranges]" placeholder="Orange text color. Default is #E67E22" value="<?=$this->e($template['oranges'])?>">
		    			<span class="input-group-addon"><i></i></span>
		    		</div>
		    	</div>
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-6">
		    	<div class="form-group">
		    		<label>Red color</label>
		    		<div class="input-group reds">
		   				<input type="text" class="form-control input-lg" name="template[reds]" placeholder="Red text color. Default is #E74C3C" value="<?=$this->e($template['reds'])?>">
		    			<span class="input-group-addon"><i></i></span>
		    		</div>
		    	</div>
		    </div>
		    <div class="col-sm-6">
		    	<div class="form-group">
		    		<label>Body background color</label>
		    		<div class="input-group body_background_color">
		   				<input type="text" class="form-control input-lg" name="template[body_background_color]" placeholder="The color of the background. Defaults to #FFFFFF" value="<?=$this->e($template['body_background_color'])?>">
		    			<span class="input-group-addon"><i></i></span>
		    		</div>
		    	</div>
		    </div>
		</div>
		<?php if (UPTIMEROBOT): ?>
			<div class="row">
				<div class="col-sm-6">
			    	<div class="form-group">
			    		<label>Graph color</label>
			    		<div class="input-group graph_color">
			   				<input type="text" class="form-control input-lg" name="template[graph_color]" placeholder="The graph color. Defaults to #3498DB" value="<?=$this->e($template['graph_color'])?>">
			    			<span class="input-group-addon"><i></i></span>
			    		</div>
			    	</div>
			    </div>
			</div>
		<?php endif?>
	<?php if ($path === '/dashboard/settings'): ?>
		</div>
	<?php endif?>
	<?php if ($path === '/dashboard/settings/styles'): ?>
		<div class="hidden-form">
	<?php endif?>
		<div class="row">
			<div class="col-sm-12">
		    	<div class="form-group">
		    		<label>Custom header HTML</label>
		    		<div>
		    			<span class="radio-button">
	    					<?php if ($template['custom_header']): ?>
	    						<input id="custom_header_enabled" checked="checked" name="template[custom_header]" type="radio" value="true">
	    					<?php else: ?>
	    						<input id="custom_header_enabled" name="template[custom_header]" type="radio" value="true">
	    					<?php endif?>
		    				<label for="custom_header_enabled">Enabled</label>
		    			</span>
				   		<span class="radio-button">
				   			<input id="custom_header_disabled"
			   				<?php if (!$template['custom_header']): ?>
	    						<input id="custom_header_disabled" checked="checked" name="template[custom_header]" type="radio" value="false">
	    					<?php else: ?>
	    						<input id="custom_header_disabled" name="template[custom_header]" type="radio" value="false">
	    					<?php endif?>
				   			<label for="custom_header_disabled">Disabled</label>
				   		</span>
		    		</div><br>
		    		<div id="custom_header_html" class="form-control input-lg full-width"><?=$this->e($template['custom_header_html'])?></div>
		   			<textarea id="custom_header_html_value" style="display:none;" name="template[custom_header_html]" placeholder="Write your custom header html here."></textarea>
		    	</div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-12">
		    	<div class="form-group">
		    		<label>Custom footer HTML</label>
		    		<div>
		    			<span class="radio-button">
		    				<?php if ($template['custom_footer']): ?>
		    					<input id="custom_footer_enabled" checked="checked" name="template[custom_footer]" type="radio" value="true">
		    				<?php else: ?>
		    					<input id="custom_footer_enabled" name="template[custom_footer]" type="radio" value="true">
							<?php endif?>
		    				<label for="custom_footer_enabled">Enabled</label>
		    			</span>
				   		<span class="radio-button">
				   			<?php if (!$template['custom_footer']): ?>
				   				<input id="custom_footer_disabled" checked="checked" name="template[custom_footer]" type="radio" value="false">
				   			<?php else: ?>
				   				<input id="custom_footer_disabled" name="template[custom_footer]" type="radio" value="false">
				   			<?php endif?>
				   			<label for="custom_footer_disabled">Disabled</label>
				   		</span>
		    		</div><br>
		    		<div id="custom_footer_html" class="form-control input-lg full-width"><?=$this->e($template['custom_footer_html'])?></div>
		   			<textarea id="custom_footer_html_value" style="display:none;" name="template[custom_footer_html]" placeholder="Write your custom footer html here."></textarea>
		    	</div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-sm-12">
		    	<div class="form-group">
		    		<label>Custom Javascript</label>
		   			<div id="custom_js" class="form-control input-lg full-width"><?=$this->e($template['custom_js'])?></div>
		   			<textarea id="custom_js_value" style="display:none;" name="template[custom_js]" placeholder="Write your custom javascript here."></textarea>
		    	</div>
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-12">
		    	<div class="form-group">
		    		<label>Custom CSS</label>
		   			<div id="custom_css" class="form-control input-lg full-width"><?=$this->e($template['custom_css'])?></div>
		   			<textarea id="custom_css_value" style="display:none;" name="template[custom_css]" placeholder="Write your custom styles here."></textarea>
		    	</div>
		    </div>
		</div>
	<?php if ($path === '/dashboard/settings/styles'): ?>
		</div>
	<?php endif?>
	<button type="submit" class="btn btn-lg btn-primary">Save All Settings</button>
</form>

<script type='text/javascript'>
    $(function(){
    	$('.font_color').colorpicker();
        $('.text-muted').colorpicker();
        $('.link_color').colorpicker();
        $('.greens').colorpicker();
        $('.yellows').colorpicker();
        $('.oranges').colorpicker();
        $('.reds').colorpicker();
        $('.body_background_color').colorpicker();
        $('.graph_color').colorpicker();

        header_html_editor = ace.edit('custom_header_html');
	    header_html_editor.setAutoScrollEditorIntoView(true);
	    header_html_editor.getSession().setUseWorker(false);
	   	header_html_editor.setOption('minLines', 4);
	    header_html_editor.setOption('maxLines', 100);
	    header_html_editor.getSession().on('change', function(){
			$('#custom_header_html_value').val(header_html_editor.getSession().getValue());
		});
		$('#custom_header_html_value').val(header_html_editor.getSession().getValue());

		footer_html_editor = ace.edit('custom_footer_html');
	    footer_html_editor.setAutoScrollEditorIntoView(true);
	    footer_html_editor.getSession().setUseWorker(false);
	   	footer_html_editor.setOption('minLines', 4);
	    footer_html_editor.setOption('maxLines', 100);
	    footer_html_editor.getSession().on('change', function(){
			$('#custom_footer_html_value').val(footer_html_editor.getSession().getValue());
		});
	    $('#custom_footer_html_value').val(footer_html_editor.getSession().getValue());

		css_editor = ace.edit('custom_css');
	    header_html_editor.setAutoScrollEditorIntoView(true);
	    header_html_editor.getSession().setUseWorker(false);
	   	css_editor.setOption('minLines', 4);
	    css_editor.setOption('maxLines', 100);
	    css_editor.getSession().on('change', function(){
			$('#custom_css_value').val(css_editor.getSession().getValue());
		});
		$('#custom_css_value').val(css_editor.getSession().getValue());

		js_editor = ace.edit('custom_js');
	    header_html_editor.setAutoScrollEditorIntoView(true);
	    header_html_editor.getSession().setUseWorker(false);
	   	js_editor.setOption('minLines', 4);
	    js_editor.setOption('maxLines', 100);
	    js_editor.getSession().on('change', function(){
			$('#custom_js_value').val(js_editor.getSession().getValue());
		});
		$('#custom_js_value').val(js_editor.getSession().getValue());
    });
</script>
