
<?php $this->layout('layouts/status', ['template' => $template, 'incidents' => $incidents])?>

<?=$this->insert('partials/_header', ['template' => $template, 'path' => $path])?>

<?=$this->insert('partials/single/_title', ['template' => $template, 'path' => $path, 'page' => $page, 'incidents' => $incidents])?>

<?=$this->insert('partials/single/_list', ['template' => $template, 'path' => $path, 'page' => $page, 'incidents' => $incidents])?>

<?=$this->insert('partials/_footer', ['template' => $template])?>
