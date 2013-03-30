<div class="span12 clearfix log">
	<p>Welcome, <span><?php echo $user ?></span>! <!--welcome's session user -->
	<a href="<?php echo $default ?>">logout</a></p>	
</div>
</div>
<ul id="profile_nav">
	<li><?php echo anchor('searchInfo/changePass', 'Change Password') ?></li>
	<li><?php echo anchor('searchInfo/changeEmail', 'Change Email') ?></li>
</ul>

<ul>
	<p>Your current Profile:</p>
	<li>Username: <?php echo $user ?></li>
	<li>Email: <?php echo $email ?></li>
</ul>