
<?php if ($template['custom_header'] === true): ?>
	<?=$template['custom_header_html']?>
<?php else: ?>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">
					    <?=$this->e($template['headline'])?>
					</a>
				</div>
				<ul class="nav navbar-nav navbar-right hidden-xs">
					<?php if ($path === '/history'): ?>
						<li><a href="/">Current Status</a></li>
					<?php else: ?>
						<li><a href="/history">Incident History</a></li>
					<?php endif?>
	        		<li><a href="/rss">RSS</a></li>
	        		<?php if (DEMO): ?>
						<li><a href="/dashboard">DEMO Dashboard</a></li>
					<?php endif?>
					<li>
	        	</ul>
			</div>
		</div>
	</nav>
<?php endif?>
