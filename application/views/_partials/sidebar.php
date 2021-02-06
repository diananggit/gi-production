<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4 bg-default-gradient">
	<!-- Brand Logo -->
	<a href="<?php echo site_url('report_cutting/ReportDaily'); ?>" class="brand-link">
		<span class="brand-text font-weight-light"><strong class="text-danger"><b>Production</b></strong><small class="text-success"><b>Report</b></small></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
	
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-scissors text-warning"></i>
						<p>
							<b>Cutting Report</b>
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('report_cutting/ReportCuttingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-warning nav-icon"></i>
								<p>By Date Range</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_cutting/ReportCuttingSingleOrc'); ?>" class="nav-link">
								<i class="fa fa-tag text-warning nav-icon"></i>
								<p>By Single Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_cutting/ReportWipCutting'); ?>" class="nav-link">
								<i class="fa fa-exclamation-triangle text-warning nav-icon"></i>
								<p>WIP Report</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_cutting/ReportCuttingToSewing'); ?>" class="nav-link">
								<i class="fa fa-arrow-circle-right text-warning nav-icon"></i>
								<p>Cutting To Sewing</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-square-o text-primary"></i>
						<p>
							<b>Molding Report</b>
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('report_molding/ReportMoldingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-primary nav-icon"></i>
								<p>By Date Range</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_molding/ReportMoldingSingleOrc'); ?>" class="nav-link">
								<i class="fa fa-tag text-primary nav-icon"></i>
								<p>By Single Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_molding/ReportWipMolding'); ?>" class="nav-link">
								<i class="fa fa-exclamation-triangle text-primary nav-icon"></i>
								<p>WIP Report</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_molding/ReportOutputMolding'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-primary nav-icon"></i>
								<p>By Machine</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_molding/SummaryMolding'); ?>" class="nav-link" >
								<i class="fa fa-list-alt text-primary nav-icon"></i>
								<p>Summary Molding</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_molding/ReportMoldingPerShift'); ?>" class="nav-link">
								<i class="fa fa-list-alt text-primary nav-icon"></i>
								<p>Molding By Machine Shift</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-circle-o text-danger"></i>
						<p>
							<b>Sewing Report</b>
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('report_sewing/ReportSewingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-danger nav-icon"></i>
								<p>By Date Range</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_sewing/ReportSewingBySingleOrc'); ?>" class="nav-link">
								<i class="fa fa-tag text-danger nav-icon"></i>
								<p>By Single Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_sewing/ReportSewingWip'); ?>" class="nav-link">
								<i class="fa fa-exclamation-triangle text-danger nav-icon"></i>
								<p>WIP Report</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('report_sewing/ReportBarSewingLine'); ?>" class="nav-link">
								<i class="fa fa-bar-chart text-danger nav-icon"></i>
								<p> Daily Sewing Output</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('production_planning/ProductionPlanning'); ?>" class="nav-link">
								<i class="fa fa-calendar-o text-danger nav-icon"></i>
								<p> Production Planning</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-youtube-play text-danger"></i>
						<p>
							<b>Sewing Live Report</b>
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('sewing_live_report_controller/SewingLiveReportFloorFirstA'); ?>" class="nav-link">
								<i class="fa fa-line-chart text-danger nav-icon"></i>
								<p>First Floor A</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('sewing_live_report_controller/SewingLiveReportFloorFirstB'); ?>" class="nav-link">
								<i class="fa fa-line-chart text-danger nav-icon"></i>
								<p>First Floor B</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('sewing_live_report_controller/SewingLiveReportFloorSecondA'); ?>" class="nav-link">
								<i class="fa fa-line-chart text-danger nav-icon"></i>
								<p>Second Floor A</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('sewing_live_report_controller/SewingLiveReportFloorSecondB'); ?>" class="nav-link">
								<i class="fa fa-line-chart text-danger nav-icon"></i>
								<p>Second Floor B</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('sewing_live_report_controller/SewingLiveReportFloorThirdA'); ?>" class="nav-link">
								<i class="fa fa-line-chart text-danger nav-icon"></i>
								<p> Third Floor A</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('sewing_live_report_controller/SewingLiveReportFloorThirdB'); ?>" class="nav-link">
								<i class="fa fa-line-chart text-danger nav-icon"></i>
								<p> Third Floor B</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-cubes text-success"></i>
						<p>
							<b>Packing Report</b>
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fa fa-tags text-success nav-icon"></i>
								<p>By Style</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fa fa-suitcase text-success nav-icon"></i>
								<p>By Date Range</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fa fa-tag text-success nav-icon"></i>
								<p>By Single Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fa fa-exclamation-triangle text-success nav-icon"></i>
								<p>By WIP</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-cogs text-secondary"></i>
						<p>
							<b>Mechanic Report</b>
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('downtime_mechanic/Downtime'); ?>" class="nav-link">
								<i class="fa fa-line-chart text-secondary nav-icon"></i>
								<p>DownTime</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('downtime_mechanic/ReportSummaryDowntime'); ?>" class="nav-link">
								<i class="fa fa-calendar text-secondary nav-icon"></i>
								<p>Daily DownTime</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('downtime_mechanic/ReportDowntimeMachinetype'); ?>" class="nav-link">
								<i class=" fa fa-th-large text-secondary nav-icon"></i>
								<p> DownTime Machine Type</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('downtime_mechanic/ReportDowntimeLine'); ?>" class="nav-link">
								<i class="fa fa-pie-chart text-secondary nav-icon"></i>
								<p> DownTime Machine By Line</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('downtime_mechanic/ReportDowntimeSymton'); ?>" class="nav-link">
								<i class="fa fa-bars text-secondary nav-icon"></i>
								<p> DownTime By Sympton</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('downtime_mechanic/ReportDowntimeAnalize'); ?>" class="nav-link">
								<i class="fa fa-plus-square-o text-secondary nav-icon"></i>
								<p> DownTime Analise Machine</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('downtime_mechanic/DowntimeShimptonDaily'); ?>" class="nav-link">
								<i class="fa fa-plus-square-o text-secondary nav-icon"></i>
								<p> DownTime Daily Sympton</p>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="<?php echo site_url('Machineanalisys'); ?>" class="nav-link">
								<i class="fa fa-tachometer text-danger nav-icon"></i>
								<p>Downtime by Machine</p>
							</a>
						</li> -->
						<!-- <li class="nav-item">
							<a href="<?php echo site_url('ReportPackingSingleOrc'); ?>" class="nav-link">
								<i class="fa fa-users text-danger nav-icon"></i>
								<p>Downtime by Mechanic</p>
							</a>
						</li> -->
						</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
