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
					<div class="m-content">
						<!--begin::Portlet-->
						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon m--hide">
											<i class="la la-gear"></i>
										</span>
										<h3 class="m-portlet__head-text">
											New Staff Member
										</h3>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="m-form m-form--fit" id="staff-form">
								<div class="m-portlet__body">
									<div class="m-form__section m-form__section--first">
										<div class="m-form__heading">
											<h3 class="m-form__heading-title">
												Staff Information
											</h3>
										</div>
										<div class="form-group m-form__group">
											<label for="example_input_first_name">
											 Full Name
											</label>
											<div class="m-input-icon m-input-icon--left">
												<input id="staff-name" type="text" class="form-control m-input" placeholder="Enter full name">
												<span class="m-input-icon__icon m-input-icon__icon--left">
													<span>
														<i class="la la-user"></i>
													</span>
												</span>
											</div>
											<span class="m-form__help">
												Please enter the staff member's full name
											</span>
										</div>
										<div class="form-group m-form__group">
											<label for="example_input_first_name">
											 Location
											</label>
											<div class="col-lg-4 col-md-9 col-sm-12">
												<select id="staff-location" class="form-control m-input" name="option">
													<option value="" disabled>
														Select
													</option>
														<?php
															$sql = "SELECT * FROM locations";
															if ($result = mysqli_query($connec, $sql)) {
																while($row = mysqli_fetch_array($result)){
																	echo '
																	<option value="'.$row['id'].'">
																		'.$row['name'].'
																	</option>
																	';
																}
															} else {
																echo "Nope";
															}
														?>

												</select>
												<span class="m-form__help">
													Please select your Location.
												</span>
											</div>
										</div>
									</div>
								</div>

								<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
									<div class="m-form__actions m-form__actions--solid">
										<div class="m-alert m-alert--outline alert alert-success alert-dismissible hidden" id="success-user-message" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
											<span>Congratulations! New staff member was successfully created. This page will refresh automatically now.</span>
										</div>
										<button id="staff_submit" class="btn btn-success">
											Submit
										</button>
										<button type="reset" class="btn btn-secondary">
											Cancel
										</button>
									</div>
								</div>
							</form>
							<!--end::Form-->
						</div>
						<!--end::Portlet-->

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
