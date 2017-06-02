<?php echo validation_errors(); ?>
<?php echo form_open('controller_user/edit/'.$user['user_id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="user_level" class="col-md-4 control-label">User Level</label>
		<div class="col-md-8">
			<select name="user_level" class="form-control">
				<option value="">select</option>
				<?php 
				$user_level_values = array(
						'10'=>'Admin',
					);

				foreach($user_level_values as $value => $display_text)
				{
					$selected = ($value == $user['user_level']) ? ' selected="selected"' : "";

					echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="id_empresa" class="col-md-4 control-label">Id Empresa</label>
		<div class="col-md-8">
			<select name="id_empresa" class="form-control">
				<option value="">select ci_empresa</option>
				<?php 
				foreach($all_ci_empresa as $ci_empresa)
				{
					$selected = ($ci_empresa['id_empresa'] == $user['id_empresa']) ? ' selected="selected"' : "";

					echo '<option value="'.$ci_empresa['id_empresa'].'" '.$selected.'>'.$ci_empresa['id_empresa'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="user_pass" class="col-md-4 control-label">User Pass</label>
		<div class="col-md-8">
			<input type="text" name="user_pass" value="<?php echo ($this->input->post('user_pass') ? $this->input->post('user_pass') : $user['user_pass']); ?>" class="form-control" id="user_pass" />
		</div>
	</div>
	<div class="form-group">
		<label for="user_fullname" class="col-md-4 control-label">User Fullname</label>
		<div class="col-md-8">
			<input type="text" name="user_fullname" value="<?php echo ($this->input->post('user_fullname') ? $this->input->post('user_fullname') : $user['user_fullname']); ?>" class="form-control" id="user_fullname" />
		</div>
	</div>
	<div class="form-group">
		<label for="user_name" class="col-md-4 control-label">User Name</label>
		<div class="col-md-8">
			<input type="text" name="user_name" value="<?php echo ($this->input->post('user_name') ? $this->input->post('user_name') : $user['user_name']); ?>" class="form-control" id="user_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="user_email" class="col-md-4 control-label">User Email</label>
		<div class="col-md-8">
			<input type="text" name="user_email" value="<?php echo ($this->input->post('user_email') ? $this->input->post('user_email') : $user['user_email']); ?>" class="form-control" id="user_email" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>