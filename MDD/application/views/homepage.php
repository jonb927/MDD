<body id="homepage">
<div class="container-fluid" >
	<div class="row-fluid">
		<nav>
		<div class="span12 clearfix">
			<p>Welcome back, <span><?php echo $user ?></span>! <!--welcome's session user -->
				<a href="<?php echo $default ?>">logout</a></p>	
		</div>
	</nav>
	</div>
	<div class="span12 clearfix" id="welcome">
			<p>Whether your just moving, relocating for a new job, 
				or transitioning from the military.  New Roots can help you find a great place to reestablish yourself.</p><br />

			<p>To get started Just answer one simple question...</p>
			<h1>Where are you moving to?<h1>	
	</div>
	<div class="span 12 clearfix">
		<div id="searchbg">
		<?php echo validation_errors(); ?>
		<?php echo form_open('newRoots/search'); ?>
			<ul>
				<li id="city">	
					<div >
					<h5>City</h5>
					<input type="text" name="city" value ="<?php $this->input->post('city')?>"  size="50" placeholder="Raleigh"/>
					</div>
				</li>
				<li id="state">
					<div>
					<h5>State</h5>
					<input type="text" name="state" value ="<?php $this->input->post('state')?>"  size="5" placeholder="NC"/>
					</div>
				</li>
				<li id="zip">	
					<div>
					<h5>Zip</h5>
					<input type="text" name="zip" value ="<?php $this->input->post('zip')?>"  size="10" placeholder="12345"/>
					</div>
				</li>
			</ul>	
					<div id="Searchsubmit"><button type="submit" value ="Submit"/></button></div>
				</form>
		</div>
	</div>

