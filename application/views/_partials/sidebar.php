<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4 bg-default-gradient">
	<!-- Brand Logo -->
	<a href="<?php echo site_url('ReportDaily'); ?>" class="brand-link">
		<!-- <img src="#" alt="App Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
		<span class="brand-text font-weight-light"><strong class="text-danger">Production</strong><small class="text-success">Report</small></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
		<!-- <div class="image">
          <img src="#" class="img-circle elevation-2" alt="User Image">
        </div> -->
		<!-- <div class="info">
          <a href="#" class="d-block">Yudhi Prasetya</a>
        </div> -->
		<!-- </div> -->

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<!-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
				<!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Charts
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li> -->


				<li class="nav-item has-treeview">
					<a href="<?php echo site_url('ReportDaily'); ?>" class="nav-link">
						<i class="nav-icon fa fa-scissors text-warning"></i>
						<p>
							Cutting Report
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<!-- <li class="nav-item">
                <a href="<?php echo site_url('ReportDaily'); ?>" class="nav-link">
                  <i class="fa fa-arrow-circle-right text-warning nav-icon"></i>
                  <p>Daily</p>
                </a>
              </li> -->
						<!-- <li class="nav-item">
                <a href="<?php echo site_url('reportbarchartcutting'); ?>" class="nav-link">
                  <i class="fa fa-arrow-circle-right text-warning nav-icon"></i>
                  <p>Daily Chart</p>
                </a>
              </li> -->
						<!-- <li class="nav-item">
							<a href="<?php echo site_url('reportcutting'); ?>" class="nav-link">
								<i class="fa fa-tags text-warning nav-icon"></i>
								<p>By Style</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="<?php echo site_url('ReportCuttingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-warning nav-icon"></i>
								<p>By Orc</p>
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
					<a href="<?php echo site_url('ReportDaily'); ?>" class="nav-link">
						<i class="nav-icon fa fa-square-o text-primary"></i>
						<p>
							Molding Report
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<!-- <li class="nav-item">
               <a href="<?php echo site_url('ReportDaily'); ?>" class="nav-link">
                  <i class="fa fa-arrow-circle-right text-warning nav-icon"></i>
                  <p>Daily</p>
                </a>
              </li> -->
						<!-- <li class="nav-item">
							<a href="<?php echo site_url('reportmolding'); ?>" class="nav-link">
								<i class="fa fa-tags text-primary nav-icon"></i>
								<p>By Style</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="<?php echo site_url('ReportMoldingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-primary nav-icon"></i>
								<p>By Orc</p>
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
						<!-- <li class="nav-item">
							<a href="<?php echo site_url('reportmoldingbalancing'); ?>" class="nav-link">
								<i class="fa fa-balance-scale text-primary nav-icon"></i>
								<p>Molding Balancing</p>
							</a>
						</li> -->
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="<?php echo site_url('ReportDaily'); ?>" class="nav-link">
						<i class="nav-icon fa fa-circle-o text-danger"></i>
						<p>
							Sewing Report
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<!-- <li class="nav-item">
              <a href="<?php echo site_url('ReportDaily'); ?>" class="nav-link">
                  <i class="fa fa-arrow-circle-right text-warning nav-icon"></i>
                  <p>Daily</p>
                </a>
              </li> -->
						<!-- <li class="nav-item">
							<a href="<?php echo site_url('reportsewing'); ?>" class="nav-link">
								<i class="fa fa-tags text-danger nav-icon"></i>
								<p>By Style</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="<?php echo site_url('ReportSewingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-danger nav-icon"></i>
								<p>By Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportSewingBySingleOrc'); ?>" class="nav-link">
								<i class="fa fa-tag text-danger nav-icon"></i>
								<p>By Single Orc</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('reportsewingwip'); ?>" class="nav-link">
								<i class="fa fa-exclamation-triangle text-danger nav-icon"></i>
								<p>WIP Report</p>
							</a>
						</li>
						<!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-arrow-circle-right text-warning nav-icon"></i>
                  <p> Sewing To Packing</p>
                </a>
              </li> -->
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
					<a href="<?php echo site_url('ReportDaily'); ?>" class="nav-link">
						<i class="nav-icon fa fa-cubes text-success"></i>
						<p>
							Packing Report
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<!-- <li class="nav-item">
                <a href="<?php echo site_url('ReportDaily'); ?>" class="nav-link">
                  <i class="fa fa-arrow-circle-right text-warning nav-icon"></i>
                  <p>Daily</p>
                </a>
              </li> -->
						<li class="nav-item">
							<a href="<?php echo site_url('ReportPackingByStyle'); ?>" class="nav-link">
								<i class="fa fa-tags text-success nav-icon"></i>
								<p>By Style</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('ReportPackingByOrc'); ?>" class="nav-link">
								<i class="fa fa-suitcase text-success nav-icon"></i>
								<p>By Orc</p>
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

				<!-- <li class="nav-header">EXAMPLES</li> -->
				<!-- <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Mailbox
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Pages
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plus-square-o"></i>
              <p>
                Extras
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
