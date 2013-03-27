<body id="loginBg" class="hidden-desktop">
	<div class="container-fluid" id="main">
		<div class="row-fluid">
			<div class="span7">
				<div id="intro">
					<ul id="bullets">
						<li>Are You Moving?</li>
						<li>Transferring Jobs?</li>
						<li>Transitioning From The Military</li>
						<li>Find Out Where To Go With:</li>
					</ul>
				</div>
			</div>
			<div class="span5">
				<div id="intro" class="clearfix" id="signup">
					<p>Signup with just a username and email</p>
					<?php echo validation_errors(); ?>
					<?php echo form_open('newRoots/signupValidation'); ?>

					<h5>Username</h5>
					<input type="text" name="username" value ="<?php $this->input->post('username')?>"  placeholder="username"/>
					<h5>Email</h5>
					<input type="text" name="email" value ="<?php $this->input->post('email')?>"  placeholder="loopy@crazy.com"/>
					<h5>Confirm Email</h5>
					<input type="text" name="emailconf" value ="<?php $this->input->post('emailconf')?>"  placeholder="loopy@crazy.com"/>
					<div><input type="submit" value ="Sign Up"/></div>
				</form>
					<p>If you already have an account</p>
					<p><?php echo anchor('newRoots', 'Login')?></p>

				</div>
			</div>
		</div>	

<!-- <div class="span5">
				<div id="intro" class="clearfix">
					
					<form class="form-horizontal" action="?" method="POST">
						<div class="control-group" id="signup">
							<p>Signup with just a username and email</p>
							<label class="control-label" for="username">Username</label>
							<div class="controls">
								<input type="text" id="username" placeholder="Username">
							</div>
						</div>
						<div class="control-group" id="signup2">
							<label class="control-label" for="email">Email</label>
							<div class="controls">
								<input type="text" id="email" placeholder="Email">
							</div>
						</div> 
						<div class="control-group" id="signup3">
							<label class="control-label" for="confirmEmail">Confirm Email</label>
							<div class="controls">
								<input type="text" id="confirmEmail" placeholder="Confirm Email">
							</div>
						</div>
						<div class="control-group" id="signup4">
							<div class="controls">
								<button type="submit" class="btn" id="signup5">Sign Up</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>-->
