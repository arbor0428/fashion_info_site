<?
	$record_count2 = 10;  //한 페이지에 출력되는 레코드수

	$link_count2 = 10; //한 페이지에 출력되는 페이지 링크수

	if(!$record_start2){
		$record_start2 = 0;
	}

	$current_page2 = ($record_start2 / $record_count2) + 1;

	$group2 = floor($record_start2 / ($record_count2 * $link_count2));

	//쿼리조건
	$query_ment = "where userid='$GBL_USERID'";

	$sort_ment = "order by orderTime desc, rTime desc";

	$query = "select * from ks_order $query_ment $sort_ment";

	$result = mysql_query($query) or die("연결실패");

	$total_record2 = mysql_num_rows($result);

	$total_page2 = (int)($total_record2 / $record_count2);

	if($total_record2 % $record_count2){
		$total_page2++;
	}

	$query2 = $query." limit $record_start2, $record_count2";

	$result = mysql_query($query2);
?>

<form name='frm_orderlist' id='frm_orderlist' method='post' action="<?=$_SERVER['PHP_SELF']?>">
<input type="text" style="display: none;">  <!-- 텍스트박스 1개이상 처리.. 자동전송방지 -->
<input type='hidden' name='type' value=''>
<input type='hidden' name='uid' value=''>
<input type='hidden' name='record_start2' value='<?=$record_start2?>'>
<input type='hidden' name='next_url' value="<?=$_SERVER['PHP_SELF']?>">

<h3>나의 주문 내역</h3>
<div class="row_con_wrap">
<?
if($total_record2){
	$i = $total_record2 - ($current_page2 - 1) * $record_count2;

	while($row = mysql_fetch_array($result)){
?>
	<div class="row_con">
		<div class="col">
			<p class="col_tit">주문서번호</p>
			<p><a class="order_nm" href="cart.php?uid=<?=$row['uid']?>"><?=$row['rTime']?></a></p>
		</div>
		<div class="col">
			<p class="col_tit">주문일</p>
			<p><?=$row['orderDate']?></p>
		</div>
		<div class="col">
			<p class="col_tit">상품수</p>
			<p><?=$row['prodCnt']?></p>
		</div>
		<div class="col">
			<p class="col_tit">주문금액</p>
			<p><?=number_format($row['prodAmt'])?> 원</p>
		</div>
		<div class="col">
			<p class="col_tit">입금액</p>
			<p><?=number_format($row['payAmt'])?> 원</p>
		</div>
		<div class="col">
			<p class="col_tit">상태</p>
			<p><?=$row['status']?></p>
		</div>
	</div>
<?
		$i--;
	}
?>
</div>
<p class="m12 red_01">※ 위의 주문번호를 클릭하여 반품 및 결제를 진행해주세요!</p>
<?
}else{
?>
<div class="row_con">
	<div style='width:100%;text-align:center;padding:50px 0;'>주문내역이 없습니다.</div>
</div>
<?
}
?>

<?
//페이지 번호
$fName = 'frm_orderlist';
//include 'myOrderListNum.php';
?>

<div class="pageNum2">
<a href='' class='direction'><span class="lnr lnr-chevron-left pleft"></span><span class="lnr lnr-chevron-left"></span></a>
<a href="" class='direction'>Prev</a> 
<a href="#" class="frst_last this">1</a>
<a href="#" class="frst_last">2</a>
<a href="#" class="frst_last">3</a>
<a href='' class='direction'>Next</a>
<a href='' class='direction'><span class='lnr lnr-chevron-right'></span><span class='lnr lnr-chevron-right pright'></span></a>
</div>

<style type='text/css'>
.pageNum2 *{-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}
.pageNum2{padding:24px 0;text-align:center;}
.pageNum2 .this,.pageNum2 a,.pageNum2 strong{position:relative; display:inline-block;width:40px; height:40px; line-height:40px;margin:0 5px; font-family: 'ONE-Mobile-Title'; font-weight: bold; font-size:16px;}
.pageNum2 a{color:#231815; text-decoration:none!important;}
.pageNum2 .direction .lnr {font-weight: bold; font-size:16px;}
.pageNum2 .direction .lnr.pleft {position:relative; left:5px;}
.pageNum2 .direction .lnr.pright {position:relative; right:5px;}
.pageNum2 .this,.pageNum2 a:hover{border-radius:50%; text-align: center; background-color:#1a3c93; border:none; color:#fff !important;}
.pageNum2 .direction:hover {background-color:transparent; border:none; color:#231815 !important;}
.pageNum2 .frst_last{color:#231815;}
.pageNum2 .direction{margin:0 4px;color:#231815;letter-spacing:0;font-weight:400;}
.pageNum2 strong.direction{color:#231815;}
</style>