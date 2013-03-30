<div class="span12 clearfix log">
	<p>Welcome, <span><?php echo $user ?></span>! <!--welcome's session user -->
	<a href="<?php echo $default ?>">logout</a></p>	
</div>
</div>
<div class="span12 clearfix" >
	<p>Change Your Password</p>
</div>
<div class="span12 clearfix" id="mortgageForm"> 
		<?php echo validation_errors(); ?>
		<?php echo form_open('searchInfo/updatePass'); ?>
		<div class="msearch">
		<h5>Current Password</h5>
		<input type="password" name="password" value ="<?php echo set_value('password')?>"  placeholder="password"/>
		</div>
		<div class="msearch">
		<h5>New Password</h5>
		<input type="password" name="npassword" value ="<?php echo set_value('npassword')?>"/>
		</div>
		<div class="msearch">
		<h5>Confirm Password</h5>
		<input type="password" name="cnpassword" value ="<?php echo set_value('cpassword')?>"/>
		</div>
		<div class="submit"><input type="submit" value ="Change"/></div>
	</form>
</div>