<html>
<head>

<script language="javascript" type="text/javascript">
/*   
$(document).ready(function(){
   $("#send").click(function(){
        var message = $('#isi_sms').val();
        var idPasien;
        var session_email;
        <?php foreach ($data_pasien as $value) : ?> 
            idPasien='<?php echo $value->id_pasien; ?>';
        <?php endforeach; ?>
        //$.get('<?php echo base_url(); ?>bloodbank/rubah_status_pasien/');
       
        <?php $session_data = $this->session->userdata('logged_in'); ?>
        session_email='<?php echo url_title($session_data['email']); ?>';
        alert(idPasien+' '+session_email+' '+message);
        //$.get('<?php echo base_url(); ?>tracking/insert/'+session_email+'/'+idPasien+'/'+message);
        
        <?php foreach ($bisa_donor  as $record) : ?>  
           
            //$.get('http://127.0.0.1:8800/?PhoneNumber='+<?php echo $record -> telepon_pendonor; ?>+'&Text='+message);
            
            //$.get('<?php echo base_url();?>tracking/insert_detail/<?php echo url_title($session_data['email']).'/'.url_title($record -> email_pendonor); ?>');
            // insert into database           
            
        <?php endforeach; ?>
        //alert('Success');
        //return false; 
   });
});
*/
       function sendData(){
            var idpasien=$("#idPasien").val();
            var session_email=$("#session_email").val();
            var email_telepon_donor=$("#email_telepon_donor").val();
            var isi_sms=$("#isi_sms").val();

            $.ajax({
                type: "POST",
                dataType: "json",
                data: "idPasien="+idpasien+"&session_email="+session_email+"&isi_sms="+isi_sms+"&email_telepon_donor="+email_telepon_donor,
                url: "<?php echo base_url(); ?>tracking/setData",
                success: function(data) {
                    //$("body").html(data.message).css({'background-color' : data.bg_color}).fadeIn('slow');
                    $('html').load("<?php echo base_url(); ?>home#page=page1");
                }
            });
        return false;
       };
</script>
</head>
<body><h2>Kirim SMS</h2>

<?php foreach ($data_pasien as $row ): ?>

<table>
    <tr>
        <td>
            Nama Pasien :
        </td>
        <td>
            <?php echo $row -> nama_pasien; ?>
        </td>
    </tr>
    <tr>
        <td>
            Butuh Darah :
        </td>
        <td>
            <?php echo $row -> darah_pasien; echo $row -> rhesus_pasien; ?>
        </td>
    </tr>
</table>
<?php endforeach; ?>

&nbsp;Yang bisa donor sejumlah :
<?php 
    $counter = 0;
    if (count($bisa_donor)> $counter ){
        echo count($bisa_donor);
    }
    else {
        echo $counter;
    }
?>

        
<!--<form id="form_sms" method="post" action="<?php echo base_url().'tracking/setData'; ?>">
--><table>
            <tr>
                <td>
                    <p><b><h2>Isi Pesan untuk Member LifeSaver</h2></b></p>
                </td>
            </tr>
            <tr>
                <td>
                    <?php foreach ($data_pasien as $value) : ?> 
                    <input type="hidden" id="idPasien" name="idPasien" value="<?php echo $value->id_pasien; ?>" />
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php $session_data = $this->session->userdata('logged_in'); ?>    
                    <input type="hidden" id="session_email" name="session_email" value="<?php echo url_title($session_data['email']); ?>" />
                </td>
            </tr>
            <tr>
                <td> 
                    <textarea style="display:none;" rows="4" cols="100" name="email_telepon_donor" id ="email_telepon_donor" ><?php 
                    foreach ($bisa_donor  as $record) : 
                        echo url_title($record -> email_pendonor).';'.$record -> telepon_pendonor.';'; 
                    endforeach; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <textarea rows="4" cols="100" name="isi_sms" id ="isi_sms" >[LifeSaver]</textarea>
                </td>
            </tr>
            <tr>
                <td>

                    <input type="button" name="send" id="send" value="Kirim" onclick="javascript:sendData()" />
                </td>
            </tr>            
        </table>
<!--</form>-->
</body>
</html>