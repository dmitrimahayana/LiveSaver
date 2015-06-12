<!DOCTYPE html>
<html>
<head>
	<title>Life Saver</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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

	<!-- Add fancyBox main JS and CSS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.fancybox.css?v=2.1.4" media="screen" />
        
        
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
</head>
<body onload="loadScript()">
    
<div id="hairy"></div>
<div id="container">
    <div id="header">
        <img style="padding-bottom: 50px;" src="<?php echo base_url(); ?>images/asset/logo.png">
        <div class="menu">
            <ul class="uull">
		<li class="llii home-menu">
                    <p class="pp"><a class="aa" href="<?php echo base_url(); ?>home">Home</a></p>
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
    <img style="position: absolute;margin-left: 50px;margin-top: 50px;" src="<?php echo base_url(); ?>images/asset/tittle-contact.png">
    <div id="content" >
        <div style="padding: 50px;">
            <h2>Contact Us </h2>
            <table>
                <tr>
                    <td>
                        LifeSaver juga menerima masukan-masukan dari Anda tentang
            <br/>segala bentuk konfirmasi yang berhubungan dengan konten <br/>
            (teks dan/atau gambar) dan pemasangan iklan serta semua hal <br/>
            demi pengembangan situs ini kedepannya.
            <br/>Silahkan kontak lewat form di bawah.<br/>
            LifeSaver akan membalas semua pesan yang masuk secepatnya. <br/>
            Kami berharap dukungan dan partisipasi dari pengunjung sekalian.
<br/>
<br/>
<b>Terima Kasih,<b/><br/>
Admin
                    </td>
                </tr>                
            </table>
            <br/>
                    <table>
                            <tr>
                                <td>
                                    Nama:
                                </td>
                                <td>
                                    <input style="width:250px;" type="text" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:
                                </td>
                                <td>
                                    <input style="width:250px;"  type="text" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Subyek:
                                </td>
                                <td>
                                    <input style="width:250px;"  type="text" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Komentar:
                                </td>
                                <td>
                                    <textarea rows="5" style="width:250px;"  type="text" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    
                                </td>
                                <td>
                                    <button class="btn-blue" type="submit" >Kirim</button>
                                </td>
                            </tr>
                        </table>
            
        </div>
    </div>
</div>
</body>
</html>