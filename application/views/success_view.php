<?php 
$this->load->view("template/header"); 
?>

<script>
$(function() {
         setInterval('test();', 6000);
});
function test() {
    window.location = "<?php echo base_url(); ?>home";
}
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
            <div style="padding: 50px;">
                <p style="font-size: 20pt;font-weight: bold;">REGISTRATION SUCCESS ....</p>
                <p style="font-size: 17pt;font-weight: bold;">NOW PLEASE WAIT FOR A FEW MINUTE</p>
            </div>
        </div>
    </div>
    
<?php $this->load->view("template/footer"); ?>