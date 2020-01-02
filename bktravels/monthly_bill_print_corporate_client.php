<?php  if(!empty($_GET['printid'])) {
include("config.php");
require_once("include/numbertowords.php");
$printid=$_GET['printid'];
function fetchSellItems($printid){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
      id,
      invoice_no,
      start_date,
      gst_no,
      sac_code,
      bill_no,
      month,
      total_km_cover,
	  km_cover_liter,
	  fuel_consume,
	  fuel_rate,
	  sub_total,
	  km_covers_engine_oil,
	  engine_oil_consumed,
	  engine_oil_rate,
	  engine_oil_charge,
	  sub_total1,
	  no_of_working_days,
	  per_day_charge,
	  sub_total2,
	  sgst,
	  cgst,
	  grand_total
	  FROM  corporate_bill_client
      WHERE id = ?
    ");
	$stmt->bind_param('s',$printid);
    $stmt->execute();
    $stmt->bind_result($id,$invoice_no,$start_date,$gst_no,$sac_code,$bill_no,$month,$total_km_cover,$km_cover_liter,$fuel_consume,$fuel_rate,$sub_total,$km_covers_engine_oil,$engine_oil_consumed,$engine_oil_rate,$engine_oil_charge,$sub_total1,$no_of_working_days,$per_day_charge,$sub_total2,$sgst,$cgst,$grand_total);
    while($stmt->fetch()){
      $row = array('id'=>$id,'invoice_no'=>$invoice_no,'start_date'=>$start_date,'gst_no'=>$gst_no,'sac_code'=>$sac_code,'bill_no'=>$bill_no,'month'=>$month,'total_km_cover'=>$total_km_cover,'km_cover_liter'=>$km_cover_liter,'fuel_consume'=>$fuel_consume,'fuel_rate'=>$fuel_rate,'sub_total'=>$sub_total,'km_covers_engine_oil'=>$km_covers_engine_oil,'engine_oil_consumed'=>$engine_oil_consumed,'engine_oil_rate'=>$engine_oil_rate,'engine_oil_charge'=>$engine_oil_charge,'sub_total1'=>$sub_total1,'no_of_working_days'=>$no_of_working_days,'per_day_charge'=>$per_day_charge,'sub_total2'=>$sub_total2,'sgst'=>$sgst,'cgst'=>$cgst,'grand_total'=>$grand_total);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
}
$duty_date=fetchSellItems($printid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GST Bill</title>

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
 p.address{
 	text-align:center;
 	font-size:13px;
 }
 .invoice-top
 {
 	    font-size: 36px;
    padding-top: 20px;
    width: 600px;
    margin: 0 auto;
 }
 .invoice-top img{
     border-radius: 50%;
 }
</style>
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td colspan="5"><div class="invoice-top" align="center" style="font-size:36px; padding-top:20px;">
	  		<!--<img src="Saibaba.jpg" height="50px" width="50px" align="left">-->
			BK TRAVELS <br />  
		  
		 
  		</div></td>
  </tr>
  <tr>
    <td colspan="5" align="center" style="font-size:20px;"><span class="text">(A Complete Travel Unit Ready to Help Round the Clock)<br />N-5/534, IRC Village, Nayapalli, Bhubaneswar<br />Ph No.:94372-04671, 2553671, 6570205(O)</span> </td>
  </tr>
  <!--<tr>
    <td colspan="5" align="center" style="font-size:20px;">MOB NO - 9583091260, 9439102954, 0674 - 2556970 </td>
  </tr>-->
  <tr>
    <td colspan="2" rowspan="3">Ref No. <?php echo $duty_date['invoice_no']; ?> </td>
    <td colspan="2">MECON LTD., Bhubaneswar </td>
    <td width="15%">Bill No. <?php echo $duty_date['bill_no']; ?></td>
  </tr>
  <tr>
    <td colspan="2">GSTIN - <?php echo $duty_date['gst_no']; ?> </td>
    <td rowspan="2">Date : <?php echo $duty_date['start_date']; ?></td>
  </tr>
  <tr>
    <td colspan="2">SAC CODE - <?php echo $duty_date['sac_code']; ?></td>
  </tr>
  <tr>
    <td width="23%">Sl. No. </td>
    <td colspan="2">Particulars</td>
    <td width="28%">&nbsp;</td>
    <td align="right">Amount</td>
  </tr>
  <tr>
    <td>Month</td>
    <td colspan="2"><?php echo $duty_date['month']; ?></td>
    <td>&nbsp;</td>
    <td align="right">Rs.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Total K.M. covered </td>
    <td><?php echo $duty_date['total_km_cover']; ?> / <?php echo $duty_date['km_cover_liter']; ?> = <?php echo $duty_date['fuel_consume']; ?> * <?php echo $duty_date['fuel_rate']; ?></td>
    <td align="right"><?php echo $duty_date['sub_total']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Engine oil Charge</td>
    <td><?php echo $duty_date['total_km_cover']; ?> / <?php echo $duty_date['km_covers_engine_oil']; ?> = <?php echo $duty_date['engine_oil_consumed']; ?> * <?php echo $duty_date['engine_oil_rate']; ?></td>
    <td align="right"><?php echo $duty_date['engine_oil_charge']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td align="right">Sub Total </td>
    <td align="right"><?php echo $duty_date['sub_total2']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td align="right">CGST (2.5%)</td>
	
	<?php
    $cgst2 = (($duty_date['sub_total2']*2.5)/100);
    ?>
    <td align="right"><?php echo $cgst2; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td align="right">SGST (2.5%) </td>
	<?php
    $sgst2 = (($duty_date['sub_total2']*2.5)/100);
    ?>
    <td align="right"><?php echo $sgst2; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td align="right">Total</td>
    <td align="right"><?php echo $duty_date['grand_total']; ?></td>
  </tr>
  
  <tr>
    <td colspan="5">PAN No - AKGPM2672JSD003 </td>
  </tr>
  <tr>
    <td colspan="5">GSTIN No - 21AKGPM2672J127 </td>
  </tr>
</table>

</body>
</html>
<?php } else {header('Location : dashboard.php');}  ?>