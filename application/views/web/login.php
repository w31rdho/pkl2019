
					<!-- Simple login form -->
					<form action="" method="post">
						<div class="panel panel-body login-form" style="margin-top:-10px;">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><img src="img/logo.png" alt="Logo" width="50"></div>
								<h5 class="content-group">
									<?php echo $this->M_Web->judul_web(1); ?><br>
									<?php echo $this->M_Web->judul_web(2); ?>
									<small class="display-block"><?php echo $this->M_Web->judul_web(3); ?></small>
								</h5>
								<?php
	              echo $this->session->flashdata('msg');
	              ?>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
										<button type="submit" name="btnlogin" class="btn btn-primary btn-block">Login Sekarang<i class="icon-circle-right2 position-right"></i></button>

							</div>

							<div class="text-center">
								<!-- <a href="web/lupa_password">Lupa Password??</a> -->
							</div>
						</div>
					</form>
					<!-- /simple login form -->
