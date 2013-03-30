<div class="span12 clearfix log">
	<p>Welcome, <span><?php echo $user ?></span>! <!--welcome's session user -->
	<a href="<?php echo $default ?>">logout</a></p>	
</div>
</div>
<div class="span12 clearfix" >
	<p class="open">New Roots School tool is simple. Just put in an address followed by a city, state or zipcode to get school information!</p>
</div>
	<div class="span12 clearfix" id="schoolForm"> 
		<?php echo validation_errors(); ?>
		<?php echo form_open('searchInfo/getSchoolSearch'); ?>
		<div class="ssearch">
		<h5>Address</h5>
		<input type="text" name="address" value ="<?php echo set_value('address')?>"  placeholder="123 Orange Dr."/>
		</div>
		<div class="ssearch">
		<h5>City</h5>
		<input type="text" name="city" value ="<?php echo set_value('city')?>"  placeholder="Orlando"/>
		</div>
		<div class="ssearch" id="sstate">
		<h5>State</h5>
		<input type="text" name="state" value ="<?php echo set_value('state')?>"  placeholder="FL"/>
		</div>
		<div class="submit"><input type="submit" value ="Submit"/></div>
	</form>
</div>
