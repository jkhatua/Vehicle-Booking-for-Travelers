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
  table, td, th {
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
</style>
<?php
include 'config.php';
require_once("include/numbertowords.php");

$id = $_GET['printid'];
// function bexpenses($id){
//   global $mysqli;
//   $stmt = $mysqli->prepare("SELECT
//   name,
//   details,
//   mode,
//   amount,
//   id,
//   creationDate,
//   payType,
//   balance,
//   ename
//   FROM bexpenses
//   WHERE id = ?
//   ");
//   $stmt->bind_param("s",$id);
//   $stmt->execute();
//   $stmt->bind_result($name,$details,$mode,$amount,$id,$creationDate,$payType,$balance,$ename);
//   while ($stmt->fetch()) {
//     $row = array('name' =>$name ,'details'=>$details,'mode'=>$mode,'amount'=>$amount,'id'=>$id,'creationDate'=>$creationDate ,'payType'=>$payType,'balance'=>$balance,'ename'=>$ename);
//   }
//   $stmt->close();
//   if(!empty($row)){
//     return $row;
//   } else {
//     return "";
//   }
// }
function expenses($id){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  ename,
  details,
  mode,
  amount,
  id,
  creationDate,
  payType,
  balance
  FROM expenses
  WHERE id = ?
  ");
  $stmt->bind_param("s",$id);
  $stmt->execute();
  $stmt->bind_result($ename,$details,$mode,$amount,$id,$creationDate,$payType,$balance);
  while ($stmt->fetch()) {
    $row = array('ename' =>$ename ,'details'=>$details,'mode'=>$mode,'amount'=>$amount,'id'=>$id,'creationDate'=>$creationDate ,'payType'=>$payType,'balance'=>$balance);
  }
  $stmt->close();
  if(!empty($row)){
    return $row;
  } else {
    return "";
  }
}

if($id > 1000){
  $expenses = bexpenses($id);
} else {
  $expenses = expenses($id);
}
 ?>
<html>
<body>
  <table width="100%">
    <tr>
      <td colspan="2"><center><font size="30">BK TRAVELS</font><br>N-1/12,I.R.C Village, Nayapalli, Bhubaneswar-15<br>Mob-9583091260, 9439102954, 0674-2556970</center> </td>
    </tr>
    <tr>
      <td>Debit Voucher : DV/0<?php echo $expenses['id']; ?>/17-18</td>
      <td>Date and Time: <?php echo $expenses['creationDate']; ?> </td>
    </tr>
  </table>
<br>
  <table width="100%">
    <tr>
      
      <td>Employee Name :<b><?php echo $expenses['ename']; ?></b></td>
      <td></td>
    </tr>
    <tr>
      <td>Details : <b><?php echo $expenses['details']; ?></b></td>
      <td>Payment Mode : <b><?php  if($expenses['mode'] == 1) echo "Cash"; else if($expenses['mode'] == 2) echo "Cheque"; else if($expenses['mode'] == 3) echo "Online Transanction";?></b> </td>
    </tr>
    <tr>
      <td>Amount : <b><?php echo $expenses['amount']; ?></b></td>
      <td>Amount in Words : <b><span><?php echo convert_number_to_words($expenses['amount']);?> ONLY</span></b> </td>
    </tr>
    <tr>
      <td></td>
      <td><center>Signature</center><br><br><br><br></td>
    </tr>
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
