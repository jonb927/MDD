<div class="span12 clearfix log">
	<p>Welcome, <span><?php echo $user ?></span>! <!--welcome's session user -->
	<a href="<?php echo $default ?>">logout</a></p>	
</div>
</div>
<div class="span12 clearfix" >
	<p class="open">New Roots Mortgage Evaluation tool is simple. Just put in the sale value, down payment,  and zipcode of the property.  New Roots will calculate  your estimated monthly payment for you!</p>
</div>
<div class="span12 clearfix" id="mortgageForm"> 
		<?php echo validation_errors(); ?>
		<?php echo form_open('searchInfo/getMortgageCalc'); ?>
		<div class="msearch">
		<h5>Sale Price</h5>
		<input type="text" name="price" value ="<?php echo set_value('price')?>"  placeholder="150000"/>
		</div>
		<div class="msearch">
		<h5>Down Pay</h5>
		<input type="text" name="downpay" value ="<?php echo set_value('downpay')?>"  placeholder="30000"/>
		</div>
		<div class="msearch">
		<h5>Zip</h5>
		<input type="text" name="zip" value ="<?php echo set_value('zip')?>"  placeholder="12345"/>
		</div>
		<div class="submit"><input type="submit" value ="Submit"/></div>
	</form>
</div>