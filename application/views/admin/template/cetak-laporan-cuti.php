<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laporan Cuti</title>
</head>
<body>
	<p style="margin-top:0pt; margin-bottom:0pt; font-size:18pt;">
		<img src="<?= base_url(); ?>assets/icon-kab-situbondo.jpg" width="89" height="106" alt="" style="float: left; ">
		<strong>
			<span style="font-size:16pt;">&nbsp;&nbsp;&nbsp;</span>
		</strong>
		<strong>
			PEMERINTAH KABUPATEN SITUBONDO
		</strong>
	</p>
	<p style="margin-top:0pt; margin-left:108pt; margin-bottom:0pt; text-indent:20pt; font-size:18pt;">
		<strong>
			KECAMATAN JATIBANTENG
		</strong>
	</p>
	<p style="margin-top:0pt; margin-left:108pt; margin-bottom:0pt; text-indent:50pt; font-size:18pt;">
		<strong>
			DESA JATIBANTENG
		</strong>
	</p>

	<p style="margin-top:0pt; margin-bottom:0pt; text-indent:70pt; line-height:normal; font-size:12pt;">
		<strong>
			<em>
				Jl.Raya Jatibanteng No.24 Jatibanteng 68357
			</em>
		</strong>
	</p>


	<p style="margin-top:0pt; margin-bottom:10pt;">
		<span style="height:0pt; display:block; position:absolute; z-index:1;">
			<hr>
			<hr>
		</span>
		&nbsp;
	</p>

	<p style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:12pt;">
		<strong>
			<u>
				<span style="font-family:'Times New Roman';">
					SURAT KETERANGAN
				</span>
			</u>
		</strong>
	</p>
	<p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:12pt;">
		<span style="font-family:'Times New Roman';">
			
		</span>
	</p>
	<p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:12pt;">
		<span style="font-family:'Times New Roman';">Data Laporan Cuti</span>
	</p>
	<table cellspacing="0" cellpadding="0" border="1" width="100%">
		<thead>
			<tr>
				<th width="5%">No</th>
				<th width="15%">Nama Lengkap</th>
				<th width="20%">Tanggal Diajukan</th>
				<th width="20%">Mulai</th>
				<th width="20%">Berakhir</th>
				<th width="10%">Perihal Cuti</th>
				<th width="10%">Status Cuti</th>
			</tr>
		</thead>
		<tbody style="text-align:center;">
			<?php
			$no = 1;
			foreach($cuti as $ct) :
				?>
				<tr>

					<td><?= $no++ ?></td>
					<td><?= $ct['nama_lengkap'] ?></td>
					<td><?= $ct['tgl_diajukan'] ?></td>
					<td><?= $ct['mulai'] ?></td>
					<td><?= $ct['berakhir'] ?></td>
					<td><?= $ct['perihal_cuti'] ?></td>
					<td>
						<?php if($ct['id_status_cuti'] == 1) { 
							echo "Menunggu Konfirmasi";
						} else if($ct['id_status_cuti'] == 2) {
							echo "Izin Cuti Diterima";
						} else if($ct['id_status_cuti'] == 3) {
							echo "Izin Cuti Ditolak";
						}
						?>
					</td>
				</tr>

			<?php endforeach;?>
		</tbody>
	</table>


</body>
</html>