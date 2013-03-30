<div class="span12 clearfix log">
	<p>Welcome, <span><?php echo $user ?></span>! <!--welcome's session user -->
	<a href="<?php echo $default ?>">logout</a></p>	
</div>
</div>
<div class="span12 clearfix" >
	<p>Change Email</p>
</div>
<div class="span12 clearfix" id="mortgageForm"> 
		<?php echo validation_errors(); ?>
		<?php echo form_open('searchInfo/getMortgageCalc'); ?>
		<div class="msearch">
		<h5>Current Email</h5>
		<input type="text" name="email" value ="<?php echo set_value('email')?>"  placeholder="change@me.com"/>
		</div>
		<div class="msearch">
		<h5>New Email</h5>
		<input type="text" name="nemail" value ="<?php echo set_value('nemail')?>"  placeholder="new@me.com"/>
		</div>
		<div class="msearch">
		<h5>Confirm Email</h5>
		<input type="text" name="cnemail" value ="<?php echo set_value('cnemail')?>"  placeholder="new@me.com"/>
		</div>
		<div class="submit"><input type="submit" value ="Change"/></div>
	</form>
</div>