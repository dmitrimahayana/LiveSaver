<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Life Saver</title>
        
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/TableCSSCode.css" type="text/css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.min.css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/animated-menu.css"/>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/animated-menu.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/jquery.easing.1.3.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/blood.css" type="text/css"/>
        
        <link href="<?php echo base_url(); ?>css/tabs.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript" type="text/javascript">
//$(document).ready(function() {
    //document.getElementById("from").value = '';
    //document.getElementById("to").value = '';
function load_calendar(){
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

function showDialog(id){
    document.getElementById("id_pas").value = id;
    $("#example").css('display', 'block').dialog();
    return false;
}

function showWarning(id , email){
   
    document.getElementById("id_cari").value = id;
    document.getElementById("email_cari").value = email;
    $("#warning").css('display', 'block').dialog();
    return false;
}
    
function edit_popup( id, page ){
    load_calendar();
    $.ajax({        
        type: "POST",
        dataType: "html",
        data: "id="+id+"&page="+page,            
        url: "<?php echo base_url(); ?>popup/cari_pendonor/",
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

//})
</script>
<body onload="load_calendar()">
<div id="hairy"></div>
<div id="form_message"></div>

<div id="container">
    <div id="header-RS">
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
    <img id="title-logo" src="<?php echo base_url(); ?>images/asset/donor/bloodbank.png">
    <div id="tab">
        <ol id="toc">
            <li><a class="title-tab1" style="" href="#page1"><span>Pasien</span></a></li>
            <li><a class="title-tab2" style="margin-left:-45px;" href="#page2"><span>Pendonor</span></a></li>
            <li><a class="title-tab2" style="margin-left:-45px;" href="#page3"><span>Butuh Darah</span></a></li>
            <li><a class="title-tab2" style="margin-left:-45px;" href="#page4"><span>Profil</span></a></li>
            <li><a class="title-tab2" style="margin-left:-45px;" href="<?php echo base_url();?>home/logout"><span>Logout</span></a></li>
        </ol>
    </div>    
    <div id="midd">
        <div id="content-inside">
            <div class="content" id="page1">
                <table class="CSSTableGenerator">
                    <tr>
                        <td>
                            Id
                        </td>
                        <td>
                            Nama Pasien
                        </td>
                        <td>
                            Gol. Darah
                        </td> 
                        <td>
                            Penyakit
                        </td>
                        <td>
                            Pilihan
                        </td>
                    </tr>
                    <?php foreach ($data_pasien as $pasien): ?>
                        <tr>
                            <td>
                                <?php echo $pasien -> id_pasien; ?>
                            </td>
                            <td>
                                <?php echo $pasien -> nama_pasien; ?>
                            </td>               
                            <td>
                                <?php echo $pasien -> darah_pasien; ?>                
                            </td>
                            <td>
                                <?php echo $pasien -> penyakit_pasien; ?>
                            </td>
                            <td>
                                <button class="btn-red" onclick ="showDialog('<?php echo $pasien -> id_pasien;?>')" >Edit</button>
                                <button class="btn-blue" onclick ="edit_popup('<?php echo $pasien-> id_pasien; ?>', 'halooo')">Tracking</button>                                
                            </td>
                        </tr>
                        
                    <?php endforeach; ?>
                </table>

                
                <div id="pasien">
                <h2>Tambah Pasien</h2>
                <form method="post" action="<?php base_url();?>register_pasien">

                    <table>
                        <tr>
                            <td>
                                <b><i>Nama Lengkap</i></b><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input style="width:230px;" type="text" id ="nama_pasien" name="nama_pasien" />
                            </td>
                        </tr>                        
                        <tr>
                            <td>
                                <b><i>Golongan Darah</i></b><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="darah_pasien" id="darah_pasien">
                                    <option value="A">A</option>
                                    <option value="AB">AB</option>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b><i>RH</i></b><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="rhesus_pasien" id="rhesus_pasien">
                                    <option value="-">-</option>
                                    <option value="+">+</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <b><i>Tanggal Membutuhkan Darah</i></b><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input style="width:230px;" type="text" id="from" name="from" value="click here"/>
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <b><i>Penyakit</i></b><br/>
                            </td>        
                        </tr>
                        <tr>
                            <td>
                                <textarea style="width:230px" type="text" id="penyakit_pasien" name="penyakit_pasien"></textarea>

                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <input class="btn-red" type="submit" name="submit" value="Simpan"/>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
            </div>
            <div class="content" id="page2">
                <table class="CSSTableGenerator"> 
                    <tr>
                        <td>ID</td>
                        <td>Nama Pendonor</td>
                        <td>Pasien</td>
                        <td >Status</td>
                    </tr>
                <?php foreach ($data_pendonor_approve as $baris) :?>                    
                    <tr>
                        <td>
                            <?php echo $baris -> id_caridonor; ?>
                        </td>
                        <td>
                            <?php echo $baris -> nama_pendonor; ?>
                        </td>
                        <td>
                            <?php echo $baris -> nama_pasien; ?>
                        </td>
                        <td>
                             <?php 
                             
                             if ( $baris-> setuju_donor == 1 ){
                                 echo "<a href=\"#\" onclick=\"showWarning('".$baris->id_caridonor."', '".$baris->email_pendonor."');\">
                                     <img src=\"".base_url()."images/approved.png\" width=\"100\" height=\"50\"></a>";
                             }
                             else {
                                 echo "<img src =\"".base_url()."images/pending.png\" width=\"100\" height=\"50\" />";
                             }
                             
                             ?>
                        </td>
                    </tr>                   
                <?php endforeach; ?>
                </table>
            </div>
            
            <div class="content" id="page3">
                <table class="CSSTableGenerator">
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            Nama
                        </td>
                        <td>
                            Golongan Darah
                        </td>
                        <td>
                            Penyakit
                        </td>
                    </tr>
                    <?php foreach ($data_pasien_butuh_darah as $butuh):?>
                        
                    <tr>
                        <td>
                             <img src="<?php echo base_url().'images/blood.png'?>"width="50" height="50"/>
                        </td>
                        <td>
                            <?php echo $butuh -> nama_pasien; ?>
                        </td>
                        <td>
                            <?php echo $butuh -> darah_pasien; ?>
                        </td>
                        <td>
                            <?php echo $butuh -> penyakit_pasien; ?>
                        </td>
                    </tr>
                    
                    <?php endforeach; ?>
                </table>
            </div>
            
            <div class="content" id="page4">
                <h2>Data Rumah Sakit</h2>
                <table>
                    <tr>
                        <td style="width: 300px;">
                            <b>Nama Rumah Sakit</b>
                        </td>
                        <td>
                            <?php echo $nama; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Alamat</b>
                        </td>
                        <td>
                            <?php echo $alamat; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Telepon<b>
                        </td>
                        <td>
                            <?php echo $telepon; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="content" id="page5">
                <h2>Logout</h2>
            </div>
            
            
            
            <script src="<?php echo base_url(); ?>js/activatables.js" type="text/javascript"></script>
            <script type="text/javascript">
            activatables('page', ['page1', 'page2', 'page3', 'page4', 'page5']);
            </script>
        </div>
        
    </div>        
</div>

<div id="example" class="flora" title="Edit Tanggal" style="display:none;">
    <form id="form_edit_pasien" method="post" action="<?php echo base_url();?>popup/ubah_tanggal_pasien">
        <input style="width:230px;" type="text" id="to" name="to"/>          
        <input type="hidden" id="id_pas" name="id_pas"/> 
        <input type="submit" name="submit_ubah" id="submit_butuh_darah" value="Ubah"/>
    </form>
</div>


<div id="warning" class="flora" title="Tandai sudah donor?" style="display:none;">
    <form id="form_tandai" method="post" action="<?php echo base_url();?>popup/tandai_sudah_donor">        
        <input type="hidden" id="id_cari" name="id_cari"/> 
        <input type="hidden" id="email_cari" name="email_cari"/>
        <input type="submit" name="submit_tanda" id="submit_tanda" value="Ya"/>
    </form>
</div>

</body>
</html>