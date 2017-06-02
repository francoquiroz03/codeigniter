<!-- page content -->
        <div class="right_col" role="main" style="min-height: 743px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Agregar Usuarios</h3>
              </div>
              
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_content">
                      <div class="row">
                 <?php echo validation_errors(); ?>
				<?php echo form_open('controller_user/add',array("class"=>"form-horizontal")); ?>

				<div class="form-group">
					<label for="user_level" class="col-md-1 control-label">User Level</label>
					<div class="col-md-8">
						<select name="user_level" class="form-control" required>
							<option value="">Seleccione</option>
							<option value="10">Admin</option>
							<option value="0">Normal</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="id_empresa" class="col-md-1 control-label">Empresa</label>
					<div class="col-md-8">
						<select name="id_empresa" class="form-control" required>
							<option value="0">Seleccione</option>
							<option value="1">Empresa</option>
							<option value="0">Sin Empresa</option>
						</select>
					</div>
				</div>
		
				<div class="form-group">
					<label for="user_pass" class="col-md-1 control-label">Contraseña</label>
					<div class="col-md-8">
						<input type="password" name="user_pass" value="<?php echo $this->input->post('user_pass'); ?>" class="form-control" id="user_pass" required/>
					</div>
				</div>

				<div class="form-group">
					<label for="user_fullname" class="col-md-1 control-label">Nombre Completo</label>
					<div class="col-md-8">
						<input type="text" name="user_fullname" value="<?php echo $this->input->post('user_fullname'); ?>" class="form-control" id="user_fullname" required/>
					</div>
				</div>

				<div class="form-group">
					<label for="user_name" class="col-md-1 control-label">Username</label>
					<div class="col-md-8">
						<input type="text" name="user_name" value="<?php echo $this->input->post('user_name'); ?>" class="form-control" id="user_name" required/>
					</div>
				</div>

				<div class="form-group">
					<label for="user_email" class="col-md-1 control-label">Usuario Email</label>
					<div class="col-md-8">
						<input type="text" name="user_email" value="<?php echo $this->input->post('user_email'); ?>" class="form-control" id="user_email" required/>
					</div>
				</div>
	
				<div class="form-group">
					<div class="col-sm-offset-1 col-sm-8">
						<button type="submit" class="btn btn-success">Guardar</button>
			        </div>

				</div>

				<?php echo form_close(); ?>

                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->