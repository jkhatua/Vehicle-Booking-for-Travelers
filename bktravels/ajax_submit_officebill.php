<?php
include('config.php');

function addBuyer($client_name,$invoice_no,$start_date,$gst_no,$sac_code,$bill_no,$month,$total_km_cover,$km_cover_liter,$fuel_consume,$fuel_rate,$sub_total,$km_covers_engine_oil,$engine_oil_consumed,$engine_oil_rate,$engine_oil_charge,$sub_total1,$no_of_working_days,$per_day_charge,$sub_total2,$sgst,$cgst,$grand_total){
  GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO officebill(
    client_name,
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
  )
  VALUES(
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?,
  ?
)");
$stmt->bind_param("sssssssssssssssssssssss",$client_name,$invoice_no,$start_date,$gst_no,$sac_code,$bill_no,$month,$total_km_cover,$km_cover_liter,$fuel_consume,$fuel_rate,$sub_total,$km_covers_engine_oil,$engine_oil_consumed,$engine_oil_rate,$engine_oil_charge,$sub_total1,$no_of_working_days,$per_day_charge,$sub_total2,$sgst,$cgst,$grand_total);
$stmt->execute();
$inserted_id = $mysqli->insert_id;
$stmt->close();

if($inserted_id>0)
{
  return $inserted_id;
}
else
{
  return false;
}
}
print_r($_POST);

$client_name = $_POST['client_name'];
$invoice_no = $_POST['invoice_no'];
$start_date = $_POST['start_date'];
$gst_no = $_POST['gst_no'];
$sac_code = $_POST['sac_code'];
$bill_no = $_POST['bill_no'];
$month = $_POST['month'];
$total_km_cover = $_POST['total_km_cover'];
$km_cover_liter = $_POST['km_cover_liter'];
$fuel_consume = $_POST['fuel_consume'];
$fuel_rate = $_POST['fuel_rate'];
$sub_total = $_POST['sub_total'];
$km_covers_engine_oil = $_POST['km_covers_engine_oil'];
$engine_oil_consumed = $_POST['engine_oil_consumed'];
$engine_oil_rate = $_POST['engine_oil_rate'];
$engine_oil_charge = $_POST['engine_oil_charge'];
$sub_total1 = $_POST['sub_total1'];

$no_of_working_days = $_POST['no_of_working_days'];
$per_day_charge = $_POST['per_day_charge'];
$sub_total2 = $_POST['sub_total2'];

$sgst = $_POST['sgst'];
$cgst = $_POST['cgst'];
$grand_total = $_POST['grand_total'];

$sql = addBuyer($client_name,$invoice_no,$start_date,$gst_no,$sac_code,$bill_no,$month,$total_km_cover,$km_cover_liter,$fuel_consume,$fuel_rate,$sub_total,$km_covers_engine_oil,$engine_oil_consumed,$engine_oil_rate,$engine_oil_charge,$sub_total1,$no_of_working_days,$per_day_charge,$sub_total2,$sgst,$cgst,$grand_total);
?>