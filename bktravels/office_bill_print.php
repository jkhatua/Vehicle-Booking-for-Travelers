<?php  if(!empty($_GET['printid'])) {
include("config.php");
require_once("include/numbertowords.php");
function fetchSellItems(){
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
	  sgst,
	  cgst,
	  grand_total
	  FROM  officebill
      WHERE status = ?
    ");
    $stmt->execute();
    $stmt->bind_result($id,$invoice_no,$start_date,$gst_no,$sac_code,$bill_no,$month,$total_km_cover,$km_cover_liter,$fuel_consume,$fuel_rate,$sub_total,$km_covers_engine_oil,$engine_oil_consumed,$engine_oil_rate,$engine_oil_charge,$sub_total1,$sgst,$cgst,$grand_total);
    while($stmt->fetch()){
      $row[] = array('id'=>$id,'invoice_no'=>$invoice_no,'start_date'=>$start_date,'gst_no'=>$gst_no,'sac_code'=>$sac_code,'bill_no'=>$bill_no,'month'=>$month,'total_km_cover'=>$total_km_cover,'km_cover_liter'=>$km_cover_liter,'fuel_consume'=>$fuel_consume,'fuel_rate'=>$fuel_rate,'sub_total'=>$sub_total,'km_covers_engine_oil'=>$km_covers_engine_oil,'engine_oil_consumed'=>$engine_oil_consumed,'engine_oil_rate'=>$engine_oil_rate,'engine_oil_charge'=>$engine_oil_charge,'sub_total1'=>$sub_total1,'sgst'=>$sgst,'cgst'=>$cgst,'grand_total'=>$grand_total);
    }
    $stmt->close();
    if(!empty($row)){
    return ($row); }
    else
    { return ""; }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="1220" border="1">
  <tr>
    <td colspan="6" align="center"><h2>OWNER'S PAYMENT SLIP</h2> </td>
  </tr>
  <tr>
    <td colspan="6" align="center"><b>BK TRAVELS<br />
    N-1/12,IRC VILLAGE,NAYAPALLI,BHUBANESWAR-15<br />
	MOB: 9853091260, 9439102954, PH: 0674-2556970</b></td>
  </tr>
  <tr>
    <td>Duty Slip No </td>
    <td>&nbsp;</td>
    <td>Duty Date </td>
    <td colspan="3">10/01018</td>
  </tr>
  <tr>
    <td>Journey To </td>
    <td colspan="5">Puri-Konark</td>
  </tr>
  <tr>
    <td>Vehicle No </td>
    <td colspan="5">Bolero:OD-33-K-0433</td>
  </tr>
  <tr>
    <td>Starting K.M </td>
    <td>38681</td>
    <td>Closing K.M </td>
    <td>38876</td>
    <td>Total K.M </td>
    <td>195</td>
  </tr>
  <tr>
    <td>Starting Time </td>
    <td>8.00 AM</td>
    <td>Closing Time </td>
    <td>8.45 PM </td>
    <td>Total Time </td>
    <td>12.45 Hours </td>
  </tr>
  <tr>
    <td>Extra Hour </td>
    <td>&nbsp;</td>
    <td>Night Halt </td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Toll Gate </td>
    <td>&nbsp;</td>
    <td>Parking</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Day Basic </td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>Day Charges </td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>Adv. From Office </td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>Adv. From Guest </td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>Total Amount </td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>Total Advance </td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6"><p>&nbsp;</p>
    <p>&nbsp; </p>
    <p align="right">For BK TRAVELS. </p></td>
  </tr>
</table>
</body>
</html>
<?php } else {header('Location : dashboard.php');}  ?>