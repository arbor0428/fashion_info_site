<?
	$record_count = 10;  //한 페이지에 출력되는 레코드수

	$link_count = 10; //한 페이지에 출력되는 페이지 링크수

	if(!$record_start){
		$record_start = 0;
	}

	$current_page = ($record_start / $record_count) + 1;

	$group = floor($record_start / ($record_count * $link_count));

	//쿼리조건
	$nTime = time();
	$query_ment = "where userid='".$GBL_USERID."'";

	$sort_ment = "order by rTime desc";

	$query = "select * from ks_coupon $query_ment $sort_ment";

	$result = mysql_query($query) or die("연결실패");

	$total_record = mysql_num_rows($result);

	$total_page = (int)($total_record / $record_count);

	if($total_record % $record_count){
		$total_page++;
	}

	$query2 = $query." limit $record_start, $record_count";

	$result = mysql_query($query2);
?>

<form name='frm_couponlist' id='frm_couponlist' method='post' action="<?=$_SERVER['PHP_SELF']?>">
<input type="text" style="display: none;">  <!-- 텍스트박스 1개이상 처리.. 자동전송방지 -->
<input type='hidden' name='type' value=''>
<input type='hidden' name='uid' value=''>
<input type='hidden' name='record_start' value='<?=$record_start?>'>
<input type='hidden' name='next_url' value="<?=$_SERVER['PHP_SELF']?>">

<h3>나의 쿠폰</h3>
<div class="row_tit">
	<div class="col">번호</div>
	<div class="col">상태</div>
	<div class="col">쿠폰명</div>
	<div class="col">금액</div>
	<div class="col">사용기한</div>
</div>

<?
if($total_record){
	$i = $total_record - ($current_page - 1) * $record_count;

	while($row = mysql_fetch_array($result)){
		$orderNum = $row["orderNum"];
		$title = $row["title"];
		$price = $row["price"];
		$title = $row["title"];

		$eDate = date('Y-m-d',$row['eTime']);		

		if($orderNum)	$status = '사용';
		else				$status = '미사용';
?>
<div class="row_con">
	<div class="col"><?=$i?></div>
	<div class="col"><?=$status?></div>
	<div class="col"><?=$title?></div>
	<div class="col"><?=number_format($price)?></div>
	<div class="col"><?=$eDate?></div>
</div>
<?
		$i--;
	}

}else{
?>
<div class="row_con">
	<div style='width:100%;text-align:center;padding:50px 0;'>쿠폰 내역이 없습니다.</div>
</div>
<?
}
?>
</form>

<?
//페이지 번호
$fName = 'frm_couponlist';
include 'myListNum.php';
?>