<?
	$record_count = 10;  //한 페이지에 출력되는 레코드수

	$link_count = 10; //한 페이지에 출력되는 페이지 링크수

	if(!$record_start){
		$record_start = 0;
	}

	$current_page = ($record_start / $record_count) + 1;

	$group = floor($record_start / ($record_count * $link_count));

	//쿼리조건
	$query_ment = "where p.userid='$GBL_USERID'";

	$sort_ment = "order by p.rTime desc";

	$query = "select p.*, o.status from ks_payment as p left join ks_order as o on p.orderNum=o.rTime $query_ment $sort_ment";

	$result = mysql_query($query) or die("연결실패");

	$total_record = mysql_num_rows($result);

	$total_page = (int)($total_record / $record_count);

	if($total_record % $record_count){
		$total_page++;
	}

	$query2 = $query." limit $record_start, $record_count";

	$result = mysql_query($query2);
?>

<script>
function billModal(url){
	$("#multiBox").css({"width":"90%","max-width":"500px"});
	$('#multi_ttl').text('영수증');
	$('#multiFrame').html("<iframe src='"+url+"' name='billFrame' style='width:100%;height:680px;' frameborder='0' scrolling='auto'></iframe>");
	$('.multiBox_open').click();
}

function vaccModal(uid){
	$("#multiBox").css({"width":"90%","max-width":"500px"});
	$('#multi_ttl').text('입금계좌정보');
	$('#multiFrame').html("<iframe src='./vaccTable.php?uid="+uid+"' name='vaccFrame' style='width:100%;height:380px;' frameborder='0' scrolling='auto'></iframe>");
	$('.multiBox_open').click();
}
</script>


<form name='frm_paylist' id='frm_paylist' method='post' action="<?=$_SERVER['PHP_SELF']?>">
<input type="text" style="display: none;">  <!-- 텍스트박스 1개이상 처리.. 자동전송방지 -->
<input type='hidden' name='type' value=''>
<input type='hidden' name='uid' value=''>
<input type='hidden' name='record_start' value='<?=$record_start?>'>
<input type='hidden' name='next_url' value="<?=$_SERVER['PHP_SELF']?>">

<h3>나의 결제 내역</h3>
<div class="row_tit">
	<div class="col">번호</div>
	<div class="col">결제일</div>
	<div class="col">결제방식</div>
	<div class="col">결제금액</div>
	<div class="col">영수증</div>
	<div class="col">내용</div>
</div>

<?
if($total_record){
	$i = $total_record - ($current_page - 1) * $record_count;

	while($row = mysql_fetch_array($result)){
		$payMode = '';
		$billUrl = '';
		
		if($row['payMode'] == 'card'){
			$payMode = '신용카드';
			$billUrl = "<a href=\"javascript:billModal('https://admin8.kcp.co.kr/assist/bill.BillActionNew.do?cmd=card_bill&tno=".$row['paynum']."&order_no=".$row['rTime']."&trade_mony=".$row['payAmt']."');\" class='small cbtn black'>보기</a>";

		}elseif($row['payMode'] == 'acc'){
			$payMode = '계좌이체';
			$billUrl = "<a href=\"javascript:billModal('https://admin8.kcp.co.kr/assist/bill.BillActionNew.do?cmd=vcnt_bill&tno=".$row['paynum']."&order_no=".$row['rTime']."&trade_mony=".$row['payAmt']."');\" class='small cbtn black'>보기</a>";

		}elseif($row['payMode'] == 'vacc'){
			$payMode = '가상계좌';
			if($row['payOk'] == '결제완료'){
				$billUrl = "<a href=\"javascript:billModal('https://admin8.kcp.co.kr/assist/bill.BillActionNew.do?cmd=vcnt_bill&tno=".$row['paynum']."&order_no=".$row['rTime']."&trade_mony=".$row['payAmt']."');\" class='small cbtn black'>보기</a>";
			}else{
				$billUrl = "<a href=\"javascript:vaccModal('".$row['uid']."');\" class='small cbtn black'>입금계좌</a>";
			}
		}

		$payTitle = '';

		if($row['payTitle'] == 'join')			$payTitle = '스타일링';
		elseif($row['payTitle'] == 'order')	$payTitle = '상품주문';
		elseif($row['payTitle'] == 'style')		$payTitle = '스타일링';

		if($row['payOk'] == '환불')		$no = "<span style='color:#ff0000;'>환불</span>";
		else									$no = $i;
?>
<div class="row_con">
	<div class="col"><?=$no?></div>
	<div class="col"><?=date('Y-m-d',$row['rTime'])?></div>
	<div class="col"><?=$payMode?></div>
	<div class="col"><?=number_format($row['payAmt'])?> 원</div>
	<div class="col"><?=$billUrl?></div>
	<div class="col"><?=$payTitle?></div>
</div>
<?
		$i--;
	}

}else{
?>
<div class="row_con">
	<div style='width:100%;text-align:center;padding:50px 0;'>결제내역이 없습니다.</div>
</div>
<?
}
?>
</form>

<?
//페이지 번호
$fName = 'frm_paylist';
include 'myListNum.php';
?>