<?php  if(!empty($_GET['printid'])) {
?>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;

}
span{
  text-transform: uppercase;
}
p{
    margin-top: 2px;
    margin-bottom: 2px;
}
body{
  margin-left: 40px;
  margin-right: 40px;
  width: 210mm;
  height : 297mm;
}
hr{
  margin-top: 2px;
  margin-bottom: 2px;
}
@media print {
html,body{height:100%;width:100%;margin:0;padding:0;}
 @page {
  size: 21cm 29.7cm;
	max-height:100%;
	max-width:100%
  font-size: 8pt;
  overflow: hidden;
	}
}
  #printbtn{
    visibility: : none !important;
  }
  /* table, td, th {
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
} */
</style>
<?php
include 'config.php';
require_once("include/numbertowords.php");

$id = $_GET['printid'];

function fetchSalarySlip($id){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  employee_details.emp_name,
  salary.designation,
  eid,
  months.month,
  leaves,
  salary,
  salary.creationDate,
  salary.id,
  months.days,
  employee_details.basic,
  employee_details.epf,
  employee_details.esic,
  employee_details.hra,
  employee_details.da,
  employee_details.other,
  employee_details.gross,
  amount,
  advance
  FROM salary
  INNER JOIN employee_details ON salary.employee = employee_details.id
  INNER JOIN months ON salary.month = months.id
  WHERE salary.id = ?
  ");
  $stmt->bind_param("s",$id);
  $stmt->execute();
  $stmt->bind_result($name,$designation,$eid,$month,$leaves,$salary,$creationDate,$id,$days,$basic,$epf,$esic,$hra,$da,$other,$gross,$amount,$advance);
  while ($stmt->fetch()) {
    $row = array('name' =>$name ,'designation'=>$designation,'eid'=>$eid,'month'=>$month,'leaves'=>$leaves,'salary'=>$salary,'creationDate'=>$creationDate,'id'=>$id ,'days'=>$days,'basic'=>$basic,'epf'=>$epf,'esic'=>$esic,'hra'=>$hra,'da'=>$da,'other'=>$other,'gross'=>$gross,'amount'=>$amount,'advance'=>$advance);
  }
  $stmt->close();
  if(!empty($row)){
    return $row;
  } else {
    return "";
  }
}

$salary = fetchSalarySlip($id);
 ?>
<html>
<body>
  <table width="100%">
    <tr>
      <td colspan="2"><center><font size="30">BK TRAVELS</font><br>N-1/12,I.R.C Village, Nayapalli, Bhubaneswar-15 <br>Mob-9583091260, 9439102954, 0674-2556970</center> </td>
    </tr>
    <tr>
      <td>Salary slip No : SAL/0<?php echo $salary['id'];?>/18-19</td>
      <td>Date and Time: <?php echo $salary['creationDate'];?></td>
    </tr>
  </table>
<br>
  <table width="100%">
    <tr>
      <td colspan="7"><center>Pay Slip for <?php echo $salary['month'];?> , 2018</center></td>
    </tr>
    <tr>
      <td>Employee Name</td>
      <td><?php echo $salary['name'];?></td>
      <td>Designation</td>
      <td colspan="4"><?php echo $salary['designation'];?></td>
    </tr>
    <tr>
      <td>Employee Code</td>
      <td><?php echo $salary['eid'];?></td>
      <td colspan="5"></td>
    </tr>
    
    <tr>
      <td colspan="2"><b><span><center>Salary Head</center><span></b></td>
      <td><b><span><center>Monthly Salary</center><span></b></td>
      <td colspan="2"><b><span><center>Deduction</center><span></b></td>
      <td colspan="2"><b><span><center>Attendance/Leave</center><span></b></td>
    </tr>
    <?php $days = $salary['days']; $lop = $salary['leaves'];?>
    <tr>
      <td colspan="2">Basic</td>
      <td>Rs <?php echo $salary['basic'];?></td>
      <td>EPF</td>
      <td>Rs <?php echo $salary['epf'];?></td>
      <td>Days in Month</td>
      <td><?php echo $days;?></td>
    </tr>
    <tr>
      <td colspan="2">HRA</td>
      <td>Rs <?php echo $salary['hra'];?></td>
      <td>Medical Allowance</td>
      <td>Rs <?php echo $salary['esic'];?></td>
      <td>Days Payable</td>
      <td><?php echo $days;?></td>
    </tr>
    <tr>
      <td colspan="2">DA</td>
      <td>Rs <?php echo $salary['da'];?></td>
      <?php if($salary['advance'] > 1) {?>
      <td>Advance taken</td>
      <td>Rs <?= $salary['advance'];?></td>
    <?php } else { ?>
      <td colspan="2"></td>
    <?php } ?>
      <td colspan="2"></td>
    </tr>
    <!-- <tr>
      <td colspan="2">Others</td>
      <td>0</td>
      <td colspan="2"></td>
      <td colspan="2"></td>
    </tr> -->
    <tr>
      <td colspan="2">Special Allowances</td>
      <td>Rs <?php echo $salary['other'];?></td>
      <td colspan="2"></td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td colspan="2">Gross Amount</td>
      <td>Rs <?php echo $salary['gross'];?></td>
      <td>Total</td>
      <td>Rs <?php $pksss = $salary['advance'] + $salary['epf'] + $salary['esic']; echo $pksss;?></td>
      <td>LOP</td>
      <td><?php echo $lop;?></td>
    </tr>
    <?php $pay_salary = ($salary['amount'] - (($salary['amount']/$days) * $lop)) - $salary['advance']; ?>
    <tr>
      <td colspan="2">Net Payable Amount(In INR)</td>
      <td>Rs <?= (int)$pay_salary; ?></td>
      <td colspan="4"><center><span><?php echo convert_number_to_words((int)$pay_salary);?></span> ONLY</center></td>
    </tr>
  </table>
  <center><b><i>Note: This is System generated pay slip and does nit require authentication</t></b></center>


  </table>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
 window.print();
 window.close();
});
</script>
</html>

<?php } else {header('Location : dashboard.php');}  ?>
