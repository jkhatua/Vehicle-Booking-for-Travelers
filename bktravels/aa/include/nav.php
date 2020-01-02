<div class="fixed-sidebar-left">
  <ul class="nav navbar-nav side-nav nicescroll-bar">
    <li class="navigation-header">
      <span>Main</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "dashboard.php") echo "class='active'"; ?> href="dashboard.php"  ><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create_employee.php") echo "class='active'"; ?> href="create_employee.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Create Employee</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "employee_details.php") echo "class='active'"; ?> href="employee_details.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Employee Details</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create_owner_details.php") echo "class='active'"; ?> href="create_owner_details.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Create Owner Details </span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "owner_details.php") echo "class='active'"; ?> href="owner_details.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text"> Owner Details </span></div><div class="clearfix"></div></a>
    </li>


    <li><hr class="light-grey-hr mb-10"/></li>
    <li class="navigation-header">
      <span>component</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create_vehicle_details.php") echo "class='active'"; ?> href="create_vehicle_details.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Create Vehicle Details</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "vehicle_details.php") echo "class='active'"; ?> href="vehicle_details.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Vehicle Details</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create_fuel_rate.php") echo "class='active'"; ?> href="create_fuel_rate.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Create Fuel Rate</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "fuel_rate.php") echo "class='active'"; ?> href="fuel_rate.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Fuel Rate</span></div><div class="clearfix"></div></a>
    </li>
   <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "employee_salary.php") echo "class='active'"; ?> href="employee_salary.php"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Employee / Driver Salary</span></div><div class="clearfix"></div></a>
    </li>
     
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "duty_slip.php") echo "class='active'"; ?> href="duty_slip.php"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text"> Duty Slip</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "gst_bill.php") echo "class='active'"; ?> href="gst_bill.php"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text"> GST Bill</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a  <?php if(basename($_SERVER['PHP_SELF']) == "normal_bill.php") echo "class='active'"; ?> href="normal_bill.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Bill (without Gst)</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "voucher.php") echo "class='active'"; ?> href="voucher.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text"> Voucher</span></div><div class="clearfix"></div></a>
    </li>
  <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "view_voucher.php") echo "class='active'"; ?> href="view_voucher.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">View Vouchers</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "account-balance.php") echo "class='active'"; ?> href="account-balance.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Income / Expenditure (Monthly)</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "vehicle_owner_reports.php") echo "class='active'"; ?> href="vehicle_owner_reports.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Vehicle Report(Owner Wise)</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "transaction_report.php") echo "class='active'"; ?> href="transaction_report.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Transaction Report</span></div><div class="clearfix"></div></a>
    </li>

    <!-- <li><hr class="light-grey-hr mb-10"/></li>
    <li class="navigation-header">
      <span>Inventory</span>
      <i class="zmdi zmdi-more"></i>
    </li>

    <li>
			<a <?php if(basename($_SERVER['PHP_SELF']) == "income-report-daily.php" || basename($_SERVER['PHP_SELF']) == "income-report-weekly.php" || basename($_SERVER['PHP_SELF']) == "income-report-monthly.php" || basename($_SERVER['PHP_SELF']) == "income-report.php") echo "class='active'"; ?>href="javascript:void(0);" data-toggle="collapse" data-target="#table_dr"><div class="pull-left"><i class="fa fa-inr mr-20"></i><span class="right-nav-text">Income(As per Invoice)</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="table_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a <?php if(basename($_SERVER['PHP_SELF']) == "income-report-daily.php") echo "class='active-page'"; ?> href="income-report-daily.php">Today's Income</a>
						</li>
						<li>
							<a <?php if(basename($_SERVER['PHP_SELF']) == "income-report-weekly.php") echo "class='active-page'"; ?> href="income-report-weekly.php">Weekly's Income</a>
						</li>
            <li>
							<a <?php if(basename($_SERVER['PHP_SELF']) == "income-report-monthly.php") echo "class='active-page'"; ?> href="income-report-monthly.php">Monthly's Income</a>
						</li>
						<li>
							<a <?php if(basename($_SERVER['PHP_SELF']) == "income-report.php") echo "class='active-page'"; ?> href="income-report.php">Total Income</a>
						</li>
					</ul>
				</li> -->
        <!-- <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
          <span>Inventory</span>
          <i class="zmdi zmdi-more"></i>
        </li> -->

    <li><hr class="light-grey-hr mb-10"/></li>
    <li class="navigation-header">
      <span>featured</span>
      <i class="zmdi zmdi-more"></i>
    </li>

    <li>
      <a href="logout.php"><div class="pull-left"><i class="fa fa-sign-out mr-20" ></i><span class="right-nav-text">Log Out</span></div><div class="clearfix"></div></a>
    </li>
  </ul>
</div>
