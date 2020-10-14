<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4 bg-default-gradient">
	<!-- Brand Logo -->
	<a href="<?php echo site_url('ReportDaily'); ?>" class="brand-link">
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
							<a href="<?php echo site_url('ReportCuttingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-warning nav-icon"></i>
								<p>By Date Range</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportCuttingSingleOrc'); ?>" class="nav-link">
								<i class="fa fa-tag text-warning nav-icon"></i>
								<p>By Single Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportWipCutting'); ?>" class="nav-link">
								<i class="fa fa-exclamation-triangle text-warning nav-icon"></i>
								<p>WIP Report</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportCuttingToSewing'); ?>" class="nav-link">
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
							<a href="<?php echo site_url('ReportMoldingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-primary nav-icon"></i>
								<p>By Date Range</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportMoldingSingleOrc'); ?>" class="nav-link">
								<i class="fa fa-tag text-primary nav-icon"></i>
								<p>By Single Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportWipMolding'); ?>" class="nav-link">
								<i class="fa fa-exclamation-triangle text-primary nav-icon"></i>
								<p>WIP Report</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportOutputMolding'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-primary nav-icon"></i>
								<p>By Machine</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('SummaryMolding'); ?>" class="nav-link">
								<i class="fa fa-list-alt text-primary nav-icon"></i>
								<p>Summary Molding</p>
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
							<a href="<?php echo site_url('ReportSewingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-danger nav-icon"></i>
								<p>By Date Range</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportSewingBySingleOrc'); ?>" class="nav-link">
								<i class="fa fa-tag text-danger nav-icon"></i>
								<p>By Single Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportSewingWip'); ?>" class="nav-link">
								<i class="fa fa-exclamation-triangle text-danger nav-icon"></i>
								<p>WIP Report</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('reportBarSewingLine'); ?>" class="nav-link">
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
						<i class="nav-icon fa fa-cubes text-success"></i>
						<p>
							<b>Packing Report</b>
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('ReportPackingByStyle'); ?>" class="nav-link">
								<i class="fa fa-tags text-success nav-icon"></i>
								<p>By Style</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportPackingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-success nav-icon"></i>
								<p>By Date Range</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportPackingSingleOrc'); ?>" class="nav-link">
								<i class="fa fa-tag text-success nav-icon"></i>
								<p>By Single Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportWipPacking'); ?>" class="nav-link">
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
							<a href="<?php echo site_url('Downtime'); ?>" class="nav-link">
								<i class="fa fa-line-chart text-secondary nav-icon"></i>
								<p>DownTime</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportSummaryDowntime'); ?>" class="nav-link">
								<i class="fa fa-calendar text-secondary nav-icon"></i>
								<p>Daily DownTime</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportDowntimeMachinetype'); ?>" class="nav-link">
								<i class=" fa fa-th-large text-secondary nav-icon"></i>
								<p> DownTime Machine Type</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportDowntimeLine'); ?>" class="nav-link">
								<i class="fa fa-pie-chart text-secondary nav-icon"></i>
								<p> DownTime Machine By Line</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportDowntimeSymton'); ?>" class="nav-link">
								<i class="fa fa-bars text-secondary nav-icon"></i>
								<p> DownTime By Sympton</p>
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
