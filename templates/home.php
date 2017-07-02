<div class="wrap">
	<h2><?php echo $this->name_plugin; ?></h2>

	<form action="<?php echo admin_url(); ?>" method="POST" name="<?php echo sanitize_title($this->name_plugin); ?>">
		<table class="form-table">
			<tbody>
				
				<?php foreach ($fields as $key_field => $field) : ?>
					<tr>
						<th scope="row">
							<label for="blogname"><?php echo $field; ?></label>
						</th>
						<td>
							<input name="<?php echo $key_field; ?>" type="text" id="<?php echo $key_field; ?>" value="<?php echo get_option($key_field); ?>" class="regular-text">
						</td>
					</tr>
				<?php endforeach; ?>

				<tr>
					<td>
						<p class="submit">
							<input type="submit" name="salvar" id="salvar" class="button button-primary" value="Salvar alterações">
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	</form>

</div>