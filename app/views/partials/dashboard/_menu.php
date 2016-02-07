
<div class="list-group">
	<a href="/dashboard/components" class="list-group-item <?php if (preg_match('^/dashboard/components^', $path)): ?>active<?php endif?>">
		Components
	</a>
	<a href="/dashboard/incidents" class="list-group-item  <?php if (preg_match('^/dashboard/incidents^', $path)): ?>active<?php endif?>">
		Incidents
	</a>
	<a href="/dashboard/settings" class="list-group-item <?php if ($path === '/dashboard/settings'): ?>active <?php endif?>">
		Custom Content
	</a>
	<a href="/dashboard/settings/styles" class="list-group-item <?php if ($path === '/dashboard/settings/styles'): ?>active <?php endif?>">
		Custom Styles
	</a>
	<a href="/dashboard/settings/options" class="list-group-item <?php if ($path === '/dashboard/settings/options'): ?>active <?php endif?>">
		Options
	</a>
	<a href="/dashboard/import" class="list-group-item <?php if ($path === '/dashboard/import'): ?>active <?php endif?>">
		Import
	</a>
	<a href="/" class="list-group-item">
		Go To Status Page
	</a>
</div>
