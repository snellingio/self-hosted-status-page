
<?php $this->layout('layouts/status', ['template' => $template]);?>

<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<br><br><br><br><br>
			<h2 class="page-header">This Page is Private</h2>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<?php if (isset($error)): ?>
				<div class="alert alert-danger">
					<?=$error?>
				</div>
			<?php endif;?>
			<div class="well">
				<form accept-charset="UTF-8" action="/private" autocomplete="off"  method="post">
					<dl class="form">
						<dd class="text-left">
							<label>Password</label>
							<input type="password" name="password" class="form-control input-lg" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
						</dd>
					</dl>
					<button class="btn btn-success btn-lg btn-block" type="submit">Sign in</button>
				</form>
			</div>
		</div>
	</div>
</div>
