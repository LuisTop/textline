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

						<!--begin:: Widgets/Audit Log-->
						<div class="m-portlet m-portlet--full-height ">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Audit Log
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="tab-content">
									<div class="tab-pane active" id="m_widget4_tab1_content">
										<div class="m-scrollable" data-scrollable="true" data-max-height="400" style="height: 400px; overflow: hidden;">
											<div class="m-list-timeline m-list-timeline--skin-light">
												<div class="m-list-timeline__items">
													<?php
														$sql = "SELECT * FROM locations";
														if ($result = mysqli_query($connec, $sql)) {
															while($row = mysqli_fetch_array($result)){
																echo '
																	<p>'.$row['name'].'</p>
																';
															}
														} else {
															echo "Nope";
														}
													?>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="m_widget4_tab2_content"></div>
									<div class="tab-pane" id="m_widget4_tab3_content"></div>
								</div>
							</div>
						</div>
						<!--end:: Widgets/Audit Log-->
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
