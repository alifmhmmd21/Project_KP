<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="css/tampilan.css">
        <title>Form Kunjungan</title>
    </head>

    <body>
	<section class="ftco-section" >
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">

									<img src="asset/X2.png" style="display: block; margin-left: auto; margin-right:auto; width:70px; height:50px;">
									<br>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm" action="tambah_user.php">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" autocomplete="off" class="form-control" name="nama" id="nama" placeholder="Nama">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<input type="text" autocomplete="off" class="form-control" name="noktp" id="noktp" placeholder="Nomor KTP" maxlength="16" required>
												</div>
											</div>
                                            <div class="col-md-6">
												<div class="form-group">
													<input type="text" autocomplete="off" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<input type="text" autocomplete="off" class="form-control" name="nohp" id="nohp" placeholder="Nomor HP">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="pesan" autocomplete="off" class="form-control" id="pesan" cols="30" rows="4" placeholder="Tujuan Kunjungan"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" autocomplete="off" value="Send Message" class="btn btn-primary" name="submit">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<h3>Contact Us</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Alamat: Kantor 1</span> Minggiran MJ2, RT 58/16, Suryodiningratan, Mantrijeron, Yogyakarta.
								<span>Kantor 2</span> Jl. Kebun Raya Gg. Terate No. 29, Yogyakarta. Lt. 2 </p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Phone:</span> <a href="tel://1234567920">+62 882 3352 9592</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Email:</span> <a style="text-overflow: ellipsis" href="#">admin@xcodetraining.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Website</span> <a href="https://xcode.co.id/office/">xcode.or.id</a></p>
					          </div>
				          </div>

			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	</body>
</html>