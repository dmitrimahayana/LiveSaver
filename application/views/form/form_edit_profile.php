<form id="form_ubah_donor" method="post" action="<?php echo base_url();?>donor/update_profil_donor">
        <table>
            <tr>
                <td>
                    <b><i>Alamat</i></b>
                </td>
            </tr>
            <tr>
                <td>
                    <textarea style="width:300px;" rows="5" class="validate[required]" id="alamat" name="alamat" type="text" ><?php foreach ($data_donor as $row) { echo $row->alamat_pendonor; break;}?>
                    </textarea> 
                </td>
            </tr>
            <tr>
                <td>
                    <b><i>Berat Badan</i></b>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="berat" id="berat" value="<?php foreach ($data_donor as $row) { echo $row->berat_pendonor; break;}?>"/>
                 
                </td>
            </tr>
            <tr>
                <td>
                    <b><i>Telepon</i></b>
                </td>
            </tr>
            <tr>
                <td>
                    <input style="width:300px;" class="validate[required]" id="telepon" name="telepon" type="text" value="<?php foreach ($data_donor as $row) { echo $row->telepon_pendonor; break;}?>" />
                </td>
            </tr>
            <tr>
                <td>
                  
                </td>
            </tr>
                <tr>
                <td>
                    <input class="btn-blue" type="submit" name="submit" value="Update"/>                                    
                </td>
            </tr>                           
        </table>
</form>