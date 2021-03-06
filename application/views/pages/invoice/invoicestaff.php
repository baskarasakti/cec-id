<?php date_default_timezone_set('Asia/Jakarta'); ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Salary</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/invoiceCss.css">
		<link rel="license" href="http://www.opensource.org/licenses/mit-license/">
	</head>
	<body onload="window.print()">
		<header>
			<address>
				<p>Canadian English Course Indonesia</p>
				<p>Perum Citra Permai Blok C / 1-2, Surabaya</p>
				<p>(031) 7320973 / (031) 7314798</p>
			</address>
			<div class="desc"><h2>CEC Indonesia</h2><p>Quality and Success are Our Goals</p></div>
			<span><img alt="" src="http://cec-id.com/wp-content/uploads/2017/03/logo-e1490797213958.png"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address>
				<p><?= $staff->nama_depan_staff.' '.$staff->nama_belakang_staff; ?></p>
			</address>
			<table class="meta">
				<tr>
					<th><span>NIK</span></th>
					<td><span><?= $staff->nik_staff; ?></span></td>
				</tr>
				<tr>
					<th><span>Date</span></th>
					<td><span><?= date("Y/m/d H:i:s"); ?></span></td>
				</tr>
				<!--tr>
					<th><span>Amount Due</span></th>
					<td><span id="prefix">$</span><span>600.00</span></td>
				</tr-->
			</table>
			<table class="inventory">
				<tbody>
					<tr>
						<td><span>Gaji Pokok</span></td>
						<td><span data-prefix>Rp.</span><span><?= $staff->gaji_pokok_salary; ?></span></td>
					</tr>
					<tr>
						<td><span>Bonus Salary</span></td>
						<td><span data-prefix>Rp.</span><span><?= $staff->bonus_salary; ?></span></td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span>Total</span></th>
					<td><span data-prefix>Rp.</span><span><?= $staff->gaji_pokok_salary+$staff->bonus_salary; ?></span></td>
				</tr>
				<tr>
					<th><span>Amount Get</span></th>
					<td><span data-prefix>Rp.</span><span><?= $staff->gaji_pokok_salary+$staff->bonus_salary; ?></span></td>
				</tr>
				<!--tr>
					<th><span>Balance Due</span></th>
					<td><span data-prefix>Rp.</span><span>600.00</span></td>
				</tr-->
			</table>
		</article>
		<!--aside>
			<h1><span>Additional Notes</span></h1>
			<div>
				<p></p>
			</div>
		</aside-->
	</body>
</html>