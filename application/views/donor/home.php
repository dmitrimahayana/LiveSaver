<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Life Saver</title>
        
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/validationEngine.jquery.css" type="text/css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.min.css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/animated-menu.css"/>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/animated-menu.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/jquery.easing.1.3.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/donor.css" type="text/css"/>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/trackRSDonor.js"></script>
</head>
<script language="javascript" type="text/javascript">
function edit_popup( id, page ){ 
    $.ajax({
        type: "POST",
        dataType: "html",
        data: "id="+id+"&page="+page,            
        url: "<?php echo base_url(); ?>popup/load/",
        success: function(data) {          
         $('<div>').html(data).dialog({
            modal: true,
            width: 'auto',
            height: 'auto',
            show: {
            effect: "slide",
            duration: 500
            },
            hide: {
            effect: "slide",
            duration: 500
            },
            close: function(event, ui) {$(this).remove();}
            }).dialog('open');
            }
            
    });
};

function load_calendar(){
    var now;
    var future;
    <?php foreach ($data_donor as $dats): ?>
       <?php  if($dats -> terakhir_donor) :?>
            now = <?php echo strtotime(mdate("%m/%d/%Y", time())); ?>  ;   
            future= <?php echo strtotime('+3 month', $dats -> terakhir_donor); ?>;
            if(future>=now){
                //alert('belum saatnya donor lagi');
                $("button.btn-red").css("display", "none");
                $("input.btn-red").css("display", "none");
                $("#from").css("display", "none");
                $("#to").css("display", "none");
            }
            else{
                $("button.btn-red").css("display", "block");
                $("input.btn-red").css("display", "block");
                $("#from").css("display", "block");
                $("#to").css("display", "block");
            }
    <?php endif; endforeach;?>
    
    
    //document.getElementById("from").value = '';
    //document.getElementById("to").value = '';
    $( "#from" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        //minDate: -1,
        onClose: function( selectedDate ) {
            $( "#to" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
            $( "#from" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
};
</script>
<body onload="load_calendar();">
    <div id="hairy"></div>
<input id="start" name="" type="hidden" value="">
<input id="end" name="" type="hidden" value="">

<div id="container">
    <div id="header">
        <img style="padding-bottom: 50px;" src="<?php echo base_url(); ?>images/asset/logo.png">
        <div class="menu">
            <ul class="uull">
		<li class="llii home-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url();?>home">Home</a></p>
		</li>
		<li class="llii partnership-menu">
                    <p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/partnership">Partnership</a></p>
		</li>
		<li class="llii galleri-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/gallery">Gallery</a></p>
		</li>
		<li class="llii contact-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/contact">Contact</a></p>
		</li>
		<li class="llii about-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/about">About Us</a></p>
		</li>
            </ul>
        </div>
    </div>
    <img id="title-logo" src="<?php echo base_url(); ?>images/asset/donor/pendonor.png">
    <div id="content">
        <div id="red-line">Rumah Sakit yang Membutuhkan Darah</div>
        <div id="content-inside">
            
            <?php foreach ($data_bloodbank as $bloodbank): ?>
                <div class="info" style="padding-top: 30px;">
                    <div class="box-small">
                        <div class="foto">
                            <img src="<?php echo base_url(); ?>images/asset/wall.jpg" alt="RS" width="200" height="200">
                        </div>
                        <div class="rs-info">
                            <table border="0">
                                <tr>
                                    <td><b>Rumah Sakit</b></td>
                                    <td colspan="3"><?php echo $bloodbank -> nama_rs; ?></td>                                    
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td colspan="3"><?php echo $bloodbank -> alamat_rs; ?></td>                                    
                                </tr>                                
                                <tr>
                                    <td colspan="4">Pasien bernama : <b><?php echo $bloodbank -> nama_pasien; ?></b>
                                        menderita <b><?php echo $bloodbank -> penyakit_pasien; ?></b>
                                        membutuhkan darah pada tanggal <b><?php echo date("d-m-Y", $bloodbank -> tgl_butuhdarah);?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php 
                                     
                                            foreach ($data_donor as $donor ) 
                                            {
                                                $alamat = $donor -> alamat_pendonor;                                                
                                            }
                                            
                                        ?>
                                    </td>
                                    <td colspan="2">
                                           
                                        <button class="btn-blue" onclick="goToPage('<?php echo $alamat; ?>','<?php echo $bloodbank -> alamat_rs; ?>')">Lihat Lokasi</button>
                                    </td>
                                    <td colspan="2">
                                        <form id="forem" method="post" action ="<?php echo base_url(); ?>donor/bersedia_donor">
                                            <input type="hidden" value="<?php echo $bloodbank-> id_detail_caridonor; ?>" name="hidden_id_detail_caridonor" id="hidden_id_detail_caridonor" />                                            
                                            
                                            
                                            <button class="btn-red" onclick="<?php echo base_url(); ?>donor/bersedia_donor">Bersedia Donor</button>                                            
                                        </form>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>  
        </div>
        
        <div id="ava">
            <?php foreach ($data_donor as $donor ): ?>
            <table>
                <tr>
                    <td colspan="2">
                        
                        <img src="<?php echo $donor -> gambar_pendonor; ?>" width="200" height="200"/>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <b><?php echo $donor -> nama_pendonor; ?></b>
                    </td>
                </tr>                
                <tr>
                    <td colspan="2">
                        <b>Golongan Darah : <?php echo $donor -> darah_pendonor; echo $donor-> rhesus_pendonor;?></b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="javascript:edit_popup('<?php echo $donor->email_pendonor; ?>', 'donor')">Edit Profil</a>
                    </td>
                    <td>
                        <a href ="<?php echo base_url(); ?>home/logout"> Logout </a>
                    </td>
                </tr>
                
            </table>          
            <?php endforeach; ?> 
            
            <p><b>Kapan bersedia donor darah?</b></p>
            <form action="<?php echo base_url(); ?>donor/insert_available_days" method="POST">
                <table>
                    <?php if ($donor -> availdays_start && $donor -> availdays_end): ?>
                    <tr>
                        <td colspan="2" style="color:red; font-weight: bold;">
                            <?php echo 'Available day from: '.date("d-m-Y", $donor -> availdays_start).' to '.date("d-m-Y", $donor -> availdays_end); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td>From</td>
                        <td><input type="text" name="from" id="from" value="<?php echo date("d-m-Y", $donor -> availdays_start); ?>" /></td>
                    </tr>
                    <tr>
                        <td>To</td>
                        <td><input type="text" name="to" id="to" value="<?php echo date("d-m-Y", $donor -> availdays_end); ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="btn-red" type="submit" name="submit" value="Submit" /></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="pagination-donor"><?php echo $links; ?></div>
    </div>
        
</div>
</body>
</html>