<?php include 'controllers/main.php' ?>
<!DOCTYPE html>
<html lang="en" >
	<?php include 'components/head.php' ?>
    <!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'components/header.php'; ?>
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<?php include 'components/menu.php' ?>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									Hello, <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?>
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
 					<!--Begin::Section-->
						<div class="row">
							<div class="col-xl-12">
								<div class="m-portlet m-portlet--mobile ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Today's Clients <span class="m-badge m-badge--success m-badge--wide"><?php include 'controllers/clients-count-handler.php'; echo $today_clients_count ?></span>
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<!--begin: Search Form -->
										<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
											<div class="row align-items-center">
												<div class="col-xl-8 order-2 order-xl-1">
													<div class="form-group m-form__group row align-items-center">
														<div class="col-md-8">
															<div class="m-input-icon m-input-icon--left">
																<input type="text" class="form-control m-input" onkeyup="search()" placeholder="Search..." id="generalSearch">
																<span class="m-input-icon__icon m-input-icon__icon--left">
																	<span>
																		<i class="la la-search"></i>
																	</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end: Search Form -->
				<!--begin: Datatable -->
										<div class="m_datatable" id="ajax_data"></div>
										<!--end: Datatable -->
									</div>
								</div>
							</div>
						</div>
						<!--End::Section-->
					</div>
				</div>
			</div>
			<!-- end:: Body -->
			<?php include 'components/footer.php' ?>
		</div>
		<!-- end:: Page -->
	    <!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
    	<?php include 'components/foot-scripts.php' ?>
	</body>
	<!-- end::Body -->
</html>
