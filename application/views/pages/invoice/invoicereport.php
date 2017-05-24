<?php date_default_timezone_set('Asia/Jakarta'); ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
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
			<h1>All Report <?= $this->input->get('periode') ?></h1>
			<address>
				<p>All Report <?= $this->input->get('periode') ?></p>
			</address>
			<table class="meta">
				<tr>
					<th><span>Tanggal</span></th>
					<td><span><?= date("Y/m/d H:i:s"); ?></span></td>
				</tr>
				<tr>
					<th><span>Outlet</span></th>
					<td><span>All</span></td>
				</tr>
				<!--tr>
					<th><span>Amount Due</span></th>
					<td><span id="prefix">$</span><span>600.00</span></td>
				</tr-->
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th colspan="2">Income</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span>Pembayaran Kursus</span></td>
						<td><span data-prefix>Rp.</span><span><?= number_format($pembayaran_kursus->jumlah); ?></span></td>
					</tr>
					<tr>
						<td><span>Pembayaran Buku</span></td>
						<td><span data-prefix>Rp.</span><span><?= number_format($pembayaran_buku->jumlah); ?></span></td>
					</tr>
				</tbody>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th colspan="2">Cost</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span>Operational Cost</span></td>
						<td><span data-prefix>Rp.</span><span><?= number_format($operational_cost->jumlah); ?></span></td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span>Total Income</span></th>
					<td><span data-prefix>Rp.</span><span><?= number_format($total_income) ?></span></td>
				</tr>
				<tr>
					<th><span>Amount Get</span></th>
					<td><span data-prefix>Rp.</span><span><?= $amount_get ?></span></td>
				</tr>
				<!--tr>
					<th><span>Balance Due</span></th>
					<td><span data-prefix>Rp.</span><span>600.00</span></td>
				</tr-->
			</table>
		</article>
		<aside>
			<h1><span>Additional Notes</span></h1>
			<div>
				<p>Murid Belum Bayar Kursus : <?= $murid_belumbayar ?> orang</p>
				<p>Total : <span data-prefix>Rp.</span><?= number_format($murid_belumbayar_total->price) ?></p>
			</div>
		</aside>
	</body>
</html>