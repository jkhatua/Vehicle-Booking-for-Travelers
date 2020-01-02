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
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create_employee.php") echo "class='active'"; ?> href="create_employee.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Driver / Employee</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "employee_details.php") echo "class='active'"; ?> href="employee_details.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">View Driver / Employee</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "add_car_name.php") echo "class='active'"; ?> href="add_car_name.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Car name</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create-corporate.php") echo "class='active'"; ?> href="create-corporate.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Corporate</span></div><div class="clearfix"></div></a>
    </li>
	<li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "add_owner_car_charges.php") echo "class='active'"; ?> href="add_owner_car_charges.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Car charges(owner)</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "owner_car_charges.php") echo "class='active'"; ?> href="owner_car_charges.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text"> Car charges(owner)</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "add_corporeate_car_charges.php") echo "class='active'"; ?> href="add_corporeate_car_charges.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text"> Add Car charges(corporate)</span></div><div class="clearfix"></div></a>
    </li><li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "corporeate_car_charges.php") echo "class='active'"; ?> href="corporeate_car_charges.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text"> Car charges(corporate)</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "add_customer_car_charges.php") echo "class='active'"; ?> href="add_customer_car_charges.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Car charges(customer)</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "customer_car_charges.php") echo "class='active'"; ?> href="customer_car_charges.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Car charges(customer)</span></div><div class="clearfix"></div></a>
    </li>
	 <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create-car-details.php") echo "class='active'"; ?> href="create-car-details.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Car Details</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "car_details.php") echo "class='active'"; ?> href="car_details.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">View Car Details</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create_dutyslip.php") echo "class='active'"; ?> href="create_dutyslip.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Duty Slip</span></div><div class="clearfix"></div></a>
    </li>
   <!-- <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "dutyslip.php") echo "class='active'"; ?> href="dutyslip.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">View Duty Slip</span></div><div class="clearfix"></div></a>
    </li>-->


    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "create_dutyslip_corporate.php") echo "class='active'"; ?> href="create_dutyslip_corporate.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Duty Slip(corporate)</span></div><div class="clearfix"></div></a>
    </li>
    <!--<li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "dutyslip_corporate.php") echo "class='active'"; ?> href="dutyslip_corporate.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">View Duty Slip(corporate)</span></div><div class="clearfix"></div></a>
    </li>-->
   <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "all_duityslip_view.php") echo "class='active'"; ?> href="all_duityslip_view.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">View Duity Slip</span></div><div class="clearfix"></div></a>
    </li>
   
   
   
   
    <li><hr class="light-grey-hr mb-10"/></li>
    <li class="navigation-header">
      <span>component</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "owner_payment_slip.php") echo "class='active'"; ?> href="owner_payment_slip.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Owner Payment</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "view_owner_payment_slip.php") echo "class='active'"; ?> href="view_owner_payment_slip.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Show Owner Payment</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "add_customer_payment.php") echo "class='active'"; ?> href="add_customer_payment.php"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Add Customer Payment</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "view_customer_payment.php") echo "class='active'"; ?> href="view_customer_payment.php"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Show Customer Payment</span></div><div class="clearfix"></div></a>
    </li>
    
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "aad_corporate_payment.php") echo "class='active'"; ?> href="aad_corporate_payment.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Corporate Payment(Owner)</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "view_corporate_payment_slip.php") echo "class='active'"; ?> href="view_corporate_payment_slip.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Show Corporate Payment(Owner)</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "aad_corporate_payment_client.php") echo "class='active'"; ?> href="aad_corporate_payment_client.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Add Corporate Payment(Customer)</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "view_corporate_payment_slip_client.php") echo "class='active'"; ?> href="view_corporate_payment_slip_client.php"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Show Corporate Payment(Customer)</span></div><div class="clearfix"></div></a>
    </li>
     
    
    
    
    
    
    
    
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "pay-salary.php") echo "class='active'"; ?> href="pay-salary.php"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Pay Salary</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a  <?php if(basename($_SERVER['PHP_SELF']) == "salary-slip-archive.php") echo "class='active'"; ?> href="salary-slip-archive.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Salary Slip Archieve</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a  <?php if(basename($_SERVER['PHP_SELF']) == "advance.php") echo "class='active'"; ?> href="advance.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Advance</span></div><div class="clearfix"></div></a>
    </li>
       <li>
      <a  <?php if(basename($_SERVER['PHP_SELF']) == "advance-transanction.php") echo "class='active'"; ?> href="advance-transanction.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">View Advance</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a  <?php if(basename($_SERVER['PHP_SELF']) == "add-expenses.php") echo "class='active'"; ?> href="add-expenses.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Add Expenses</span></div><div class="clearfix"></div></a>
    </li>
       <li>
      <a  <?php if(basename($_SERVER['PHP_SELF']) == "expenses-report.php") echo "class='active'"; ?> href="expenses-report.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Expense Report</span></div><div class="clearfix"></div></a>
    </li>
     <li>
      <a  <?php if(basename($_SERVER['PHP_SELF']) == "balance-sheet.php") echo "class='active'"; ?> href="balance-sheet.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Balance sheet</span></div><div class="clearfix"></div></a>
    </li>

    <li><hr class="light-grey-hr mb-10"/></li>
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
				</li>
				<li>
					<a  <?php if(basename($_SERVER['PHP_SELF']) == "create_report.php") echo "class='active'"; ?> href="create_report.php"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Creditor Report</span></div><div class="clearfix"></div></a>
				</li>

    <li><hr class="light-grey-hr mb-10"/></li>
    <li class="navigation-header">
      <span>featured</span>
      <i class="zmdi zmdi-more"></i>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "gst_bill_archieve.php") echo "class='active'"; ?> href="gst_bill_archieve.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Tax Invoice with GST</span></div><div class="clearfix"></div></a>
    </li>


    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "without_gst_bill_archieve.php") echo "class='active'"; ?> href="without_gst_bill_archieve.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Tax Invoice without GST</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "dilevery-chalan.php") echo "class='active'"; ?> href="dilevery-chalan.php"><div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span class="right-nav-text">Invoice Archieve</span></div><div class="clearfix"></div></a>
    </li>
	<li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "officebill.php") echo "class='active'"; ?> href="officebill.php"><div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span class="right-nav-text">Monthly Bill</span></div><div class="clearfix"></div></a>
    </li>
	<li>
      <a <?php if(basename($_SERVER['PHP_SELF']) == "officebill_view.php") echo "class='active'"; ?> href="officebill_view.php"><div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span class="right-nav-text">Monthly Bill View</span></div><div class="clearfix"></div></a>
    </li>
    <li>
      <a href="logout.php"><div class="pull-left"><i class="fa fa-sign-out mr-20" ></i><span class="right-nav-text">Log Out</span></div><div class="clearfix"></div></a>
    </li>
  </ul>
</div>
