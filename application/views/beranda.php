<?php 
$this->load->view("template/header"); 
?>

    <script>
        $(document).ready(function(){
            $("#form_login").validationEngine();
            $("#form_donor").validationEngine();
            $("#form_bloodbank").validationEngine();
        });
    </script>

    <img style="padding-bottom: 50px;" src="<?php echo base_url(); ?>images/asset/logo.png">
    <div class="slog" style="text-shadow: -2px 2px 3px grey;color: #3D3D3D;">
        Bergabunglah, Donorkan darah anda<br/>dan selamatkan mereka...
    </div>
    
    <div class="box-large">
        <div class="menu">
            <ul class="uull">
		<li class="llii home-menu">
                    <p class="pp"><a class="aa" href="<?php echo base_url();?>home"><b>Home</b></a></p>
		</li>
		<li class="llii partnership-menu">
                    <p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/partnership"><b>Partnership</b></a></p>
		</li>
		<li class="llii galleri-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/gallery"><b>Gallery</b></a></p>
		</li>
		<li class="llii contact-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/contact"><b>Contact</b></a></p>
		</li>
		<li class="llii about-menu">
			<p class="pp"><a class="aa" href="<?php echo base_url(); ?>beranda/show/about"><b>About Us</b></a></p>
		</li>
            </ul>
        </div>
        <div class="box-small" id="box-small">
            <h style="font-size: 28pt;float: right;position: relative;margin-right: 80px;margin-top: 50px;">
                    <a style="color: #5E5C5C;">LOGIN</a>
            </h>
            <div style="position:relative;float: right;width: 500px;margin-top: 30px;">
                
                <form id="form_login" method="post" action="<?php echo base_url();?>login">
                    <table>
                        <tr>
                            <td style="padding-right: 50px;color: grey;font-size: 15pt;">Username
                            </td>
                            <td>
                                <input style="width: 230px;" type="text" name="username" id="username" class="validate[required]">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 50px;color: grey;font-size: 15pt;">Password
                            </td>
                            <td>
                                <input style="width: 230px;" class="validate[required]" id="password" name="password" type="password" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 50px">
                            </td>
                            <td>
                                <input class="btn-blue" type="submit" name="submit" value="Login"/>                                    
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            
            <div style="float: right;margin-top:55px;margin-right: 30px;">
                <div style="margin-left: 0px;">
                    <a style="font-size: 18pt;color: #3D3D3D;">Daftar sekarang</a>
                    <a style="font-size: 18pt;color: red;"> GRATIS</a>
                </div>
                <div style="margin-top: 10px;">
                    <button id="donor-btn" style="float:right;margin-right: 80px;width: 130px;" class="btn-red">Donor</button>
                    <button id="bank-btn" style="float:right;margin-right: 110px;" class="btn-red">Bloodbank</button>
                    
                </div>
                <div style="width: 100%;margin-top: 60px;margin-left: 0px;">
                    <div style="color: #3D3D3D;width: 200px;font-size: 10pt;float: left;margin-right: 50px;">Daftar sebagai bloodbank jika anda adalah sebuah institusi rumah sakit
                    </div>
                    <div style="color: #3D3D3D;width: 200px;font-size: 10pt;float: left;">Daftar sebagai donor untuk anda yang bersedia donor darah
                    </div>
                </div>
            </div>
        </div>
        <div id="form-bank">
        <h style="font-size: 28pt;float: right;margin-top: 50px;margin-right: 80px;">
                <a style="color: #5E5C5C;">REGISTER</a>
        </h>
        <div style="float: right;width: 500px;margin-top: 20px; margin-right: 30px;">
            <form id="form_bloodbank" method="post" action="<?php echo base_url();?>register_bloodbank" enctype="multipart/form-data">                    
            <table>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Email
                    </td>
                    <td>
                        <input style="width: 230px;" class="validate[required, custom[email]]" id="email_rs" name="email_rs" type="text" />
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Nama Instansi
                    </td>
                    <td>
                        <input style="width: 230px;" class="validate[required, custom[onlyLetterSp]]" id="nama_rs" name="nama_rs" type="text" />
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Password
                    </td>
                    <td>
                        <input style="width: 230px;" class="validate[required]" id="password_rs" name="password_rs" type="password" />
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Confirm password
                    </td>
                    <td><input style="width: 230px;" class="validate[required, equals[password_rs]]" id="confirm_password_rs" name="confirm_password_rs" type="password" />
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Alamat Lengkap
                    </td>
                    <td>
                        <input style="width: 230px;" class="validate[required]" id="alamat_rs" name="alamat_rs" type="text" />
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">No. Telepon
                    </td>
                    <td><input style="width: 230px;" class="validate[required, custom[onlyNumberSp]]" id="telepon_rs" name="telepon_rs" type="text" /></td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Dokumen Kelengkapan
                    </td>
                    <td><input style="width: 230px;" class="validate[required]" id="dokumen_rs" name="dokumen_rs" type="file" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="bank-cancel" class="btn-blue" style="margin-right: 150px; margin-top: 15px;float:right;" type="button" name="button" value="Cancel">
                    </td>
                    <td>
                        <input class="btn-red" style="margin-top: 15px;float:right;" type="submit" name="submit_rs" type="text" value="Register"/>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    <div id="form-donor">
        <h style="font-size: 28pt;float: right;margin-top: 50px;margin-right: 80px;">
                <a style="color: #5E5C5C;">REGISTER</a>
        </h>
        <div style="float: right;width: 500px;margin-top: 20px;">

            <form id="form_donor" method="post" action="<?php echo base_url();?>register_donor">         
            <table>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Email
                    </td>
                    <td>
                        <input style="width: 230px;" class="validate[required, custom[email]]" id="email_donor" name="email_donor" type="text" />
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Nama Lengkap
                    </td>
                    <td><input style="width: 230px;" class="validate[required, custom[onlyLetterSp]]" id="nama_donor" name="nama_donor" type="text" />
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Password
                    </td>
                    <td><input style="width: 230px;" class="validate[required]" id="password_donor" name="password_donor" type="password" /></td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Confirm Password
                    </td>
                    <td><input style="width: 230px;" class="validate[required, equals[password_donor]]" id="confirm_password_donor" name="confirm_password_donor" type="password" /></td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Alamat
                    </td>
                    <td><input style="width: 230px;" class="validate[required]" id="alamat_donor" name="alamat_donor" type="text" /></td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">No. Telepon
                    </td>
                    <td><input style="width: 230px;" class="validate[required, custom[onlyNumberSp]]" id="telepon_donor" name="telepon_donor" type="text" /></td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">Golongan Darah
                    </td>
                    <td>
                        <select name="gol_darah_donor" id="gol_darah_donor">
                            <option value="A">A</option>
                            <option value="AB">AB</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">
                        Rhesus
                    </td>
                    <td>                        
                        <select name="rhesus_pendonor" id="rhesus_pendonor" class="validate[required]">
                            <option value="-">-</option>
                            <option value="+">+</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 50px;color: grey;font-size: 15pt;">
                        Berat Badan
                    </td>
                    <td>
                        <input type="text" name="berat_pendonor" id="berat_pendonor" class="validate[required]"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="donor-cancel" class="btn-blue" style="margin-right: 90px; float: left; margin-top: 15px;" type="button" name="button" value="Cancel">
                    </td>
                    <td>
                        <input class="btn-red" style="margin-top: 15px;float:right;" type="submit" name="submit_donor" type="text" value="Register"/>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    </div>
    
<?php $this->load->view("template/footer"); ?>