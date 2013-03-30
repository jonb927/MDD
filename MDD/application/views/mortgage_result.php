<div class="span12 mortgage clearfix">
	<p>A home valued at <?php echo money_format('%.0n', (double)$price) ?> with  a <?php echo money_format('%.0n', (double)$downpay) ?> downpayment.</p>
	<p>For a 30 yr. fixed loan</p>
	<ul>
		<li>Average Interest Rate: <?php echo $rate30 ?></li>
		<li>Monthly Payment: <?php echo money_format('%.0n', (double)$pay30) ?> </li>
		<li>Monthly Insurance Payment: <?php echo money_format('%.0n', (double)$pmi30) ?></li>
	</ul>
	<p>For a 15 yr. fixed loan</p>
	<ul>
		<li>Average Interest Rate: <?php echo $rate15 ?></li>
		<li>Monthly Payment: <?php echo money_format('%.0n', (double)$pay15) ?> </li>
		<li>Monthly Insurance Payment: <?php echo money_format('%.0n', (double)$pmi15) ?></li>
	</ul>
</div>