<?php

 $s_penelitian = strtotime('2018-01-17 00:00:00');
    $e_penelitian = strtotime('2019-01-16 00:00:00');

    $s_semester   = strtotime('2018-09-01 00:00:00');
    $e_semester   = strtotime('2019-01-31 00:00:00');

    if(($s_penelitian <= $s_semester || $s_penelitian >= $s_semester) && ($e_penelitian <= $e_semester || $e_penelitian >= $e_semester) && ($e_penelitian >= $s_semester) && ($s_penelitian <= $e_semester)){
    	$masuk = 'masuk';
    }else{
    	$masuk = 'tidak masuk';
    }

    echo $keluar;

?>

===================================================================================================================================================================================================

//CRUD AJAX

#JAVASCRIPT :

function tambah_poin(){
		var kd_jbk 	= $("#group").val();
		var kd_kat 	= $("#subgroup").val();
		var jenjang = $("#jenjang").val();
		var kelas 	= $("#kelas").val();
		var jabatan = $("#jabatan").val();
		var semester = $("#semester").val();
		var poin 	= $("#poin").val();
		var satuan 	= $("#satuan").val();

		$.ajax({
			url 	: '<?php echo base_url(); ?>/bkd/admbkd/setremun/tambah_poin_remun', //IKI ALAMAT CONTROLLER 
			type 	: 'POST',
			data 	: 'kd_jbk='+kd_jbk+'&kd_kat='+kd_kat+'&jenjang='+jenjang+'&kelas='+kelas+'&jabatan='+jabatan+'&semester='+semester+'&poin='+poin+'&satuan='+satuan,

			success : function(data){
				//console.log(JSON.parse(data));
				if(data == 1){
					$("#notice").show();
					$("#notice-field").attr('class', 'alert alert-success');
					$("#notice-txt").html('Pengaturan Poin Remunerasi Berhasil Ditambahkan');
					$("#notice").fadeOut(5000);
					get_poin_remun();
				}else if(data == 0){
					$("#notice").show();
					$("#notice-field").attr('class', 'alert alert-danger');
					$("#notice-txt").html('Pengaturan Poin Remunerasi Gagal Ditambahkan !');
					$("#notice").fadeOut(8000);
					
				}else{
					$("#notice").show();
					$("#notice-field").attr('class', 'alert alert-warning');
					$("#notice-txt").html('Terdapat Duplikasi Poin Remunerasi !');
					$("#notice").fadeOut(8000);
				}
			}
		});

	}


#CONTROLLER PHP

function tambah_poin_remun(){
		$kd_jbk = $this->input->post('kd_jbk');
		$kd_kat = $this->input->post('kd_kat');
		$jenjang = $this->input->post('jenjang');
		$kelas = $this->input->post('kelas');
		$jabatan = $this->input->post('jabatan');
		$semester = $this->input->post('semester');
		$poin = $this->input->post('poin');
		$satuan = $this->input->post('satuan');

		$simpan = $this->api->get_api_json(
			URL_API_BKD.'/bkd_remun/tambah_poin_remun',
			'POST',
			array('api_search' => array($kd_jbk, $kd_kat, $jenjang, $kelas, $jabatan, $semester, $poin, $satuan))
		);

		echo json_encode($simpan);
	}
