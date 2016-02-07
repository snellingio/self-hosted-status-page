
<?php $this->layout('layouts/dashboard', ['template' => $template])?>

<div class="container-fluid">
	<div class="col-sm-3 container-menu">
		<?=$this->insert('partials/dashboard/_menu', ['path' => $path])?>
	</div>
	<div class="col-sm-9 container-app">
		<?php if ($path === '/dashboard/components'): ?>
			<?=$this->insert('partials/dashboard/_components', ['template' => $template, 'components' => $components, 'flash' => ($flash ?? null)])?>
		<?php endif?>

		<?php if ($path === '/dashboard/components/new'): ?>
			<?=$this->insert('partials/dashboard/_components_new', ['template' => $template, 'components' => $components, 'flash' => ($flash ?? null)])?>
		<?php endif?>

		<?php if ($path === '/dashboard/incidents'): ?>
			<?=$this->insert('partials/dashboard/_incidents', ['template' => $template, 'incidents' => $incidents, 'flash' => ($flash ?? null)])?>
		<?php endif?>

		<?php if (preg_match('^/dashboard/incidents/p/^', $path)): ?>
			<?=$this->insert('partials/dashboard/_single', ['template' => $template, 'page' => $page, 'incidents' => $incidents, 'flash' => ($flash ?? null)])?>
		<?php endif?>

		<?php if ($path === '/dashboard/incidents/new'): ?>
			<?=$this->insert('partials/dashboard/_incidents_new', ['template' => $template, 'incidents' => $incidents, 'flash' => ($flash ?? null)])?>
		<?php endif?>

		<?php if ($path === '/dashboard/settings' || $path === '/dashboard/settings/styles'): ?>
			<?=$this->insert('partials/dashboard/_settings', ['path' => $path, 'template' => $template, 'flash' => ($flash ?? null)])?>
		<?php endif?>

		<?php if ($path === '/dashboard/settings/options'): ?>
			<?=$this->insert('partials/dashboard/_settings_options', ['path' => $path, 'template' => $template, 'settings' => $settings, 'flash' => ($flash ?? null)])?>
		<?php endif?>

		<?php if ($path === '/dashboard/import'): ?>
			<?=$this->insert('partials/dashboard/_import', ['template' => $template, 'flash' => ($flash ?? null)])?>
		<?php endif?>
	</div>
</div>
