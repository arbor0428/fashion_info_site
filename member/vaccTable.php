<?
include '../module/login/head.php';
include '../module/class/class.DbCon.php';

$row = sqlRow("select * from ks_payment where userid='".$GBL_USERID."' and uid='".$uid."'");
if($row){
	$va_date = $row['va_date'];

	$yy = substr($va_date,0,4);
	$mm = substr($va_date,4,2);
	$dd = substr($va_date,6,2);
	$hh = substr($va_date,8,2);
	$i = substr($va_date,10,2);
	$s = substr($va_date,12,2);
?>
<table cellpadding='0' cellspacing='0' border='0' width='100%' class='zTable'>
	<tr>
		<th width='30%'>은행명</th>
		<td width='70%'><?=$row['bankname']?></td>
	</tr>
	<tr>
		<th>계좌번호</th>
		<td><?=$row['account']?></td>
	</tr>
	<tr>
		<th>예금주</th>
		<td><?=$row['depositor']?></td>
	</tr>
	<tr>
		<th>입금액</th>
		<td><?=number_format($row['payAmt'])?> 원</td>
	</tr>
	<tr>
		<th>입금기한</th>
		<td><?=$yy?>-<?=$mm?>-<?=$dd?> <?=$h?>:<?=$i?>:<?=$s?> 까지</td>
	</tr>
</table>
<?
}
?>