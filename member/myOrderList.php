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


<style>
.od_txt {font-size:1rem; margin-left:2%;}

@media screen and (max-width:480px) {
	.od_txt {display:block; margin-left:0;}
}
</style>

<h3>나의 상품주문 내역 <span class="m12 red_01 od_txt">※ 주문번호를 클릭하여 반품 및 결제를 진행해 주세요! </span></h3>
<div class="row_con_wrap">
<?
if($total_record2){
	$i = $total_record2 - ($current_page2 - 1) * $record_count2;

	while($row = mysql_fetch_array($result)){
		if($row['status'] == '환불')		$cTxt = "<span style='color:#ff0000;'>환불</span>";
		else									$cTxt = '';
?>
	<div class="row_con">
		<div class="col">
			<p class="col_tit">주문번호</p>
			<p><a class="order_nm" href="cart.php?uid=<?=$row['uid']?>"><?=$row['rTime']?></a> <?=$cTxt?></p>
		</div>
		<div class="col">
			<p class="col_tit">주문일</p>
			<p><?=$row['orderDate']?></p>
		</div>
		<div class="col">
			<p class="col_tit">상품수</p>
			<p><?=$row['prodCnt']?></p>
		</div>
		<div class="col price">
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
		<div class="col">
			<p class="col_tit">리뷰작성</p>
			<?
				if($row['status'] == '결제완료'){
					//리뷰작성 여부
					$reviewChk = sqlRowOne("select count(*) from ks_review where userid='".$GBL_USERID."' and orderNum='".$row['rTime']."'");

					if($reviewChk){
			?>
				<p>완료</p>
			<?
					}else{
			?>
				<p><a class="cart-review-btn" href="review.php?uid=<?=$row['uid']?>"><span class="lnr lnr-pencil"></span></a></p>
			<?
					}
				}
			?>
		</div>
	</div>
<?
		$i--;
	}
?>
</div>

<?
}else{
?>
<div class="row_con">
	<div style='width:100%;text-align:center;padding:50px 0;'>주문내역이 없습니다.</div>
</div>
<?
}
?>
</form>
<?
//페이지 번호
$fName = 'frm_orderlist';
include 'myOrderListNum.php';
?>