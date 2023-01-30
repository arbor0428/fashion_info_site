<?
	$record_count = 10;  //한 페이지에 출력되는 레코드수

	$link_count = 10; //한 페이지에 출력되는 페이지 링크수

	if(!$record_start){
		$record_start = 0;
	}

	$current_page = ($record_start / $record_count) + 1;

	$group = floor($record_start / ($record_count * $link_count));

	//쿼리조건
	$query_ment = "where uid>0";

	$sort_ment = "order by rTime desc";

	$query = "select * from ks_review $query_ment $sort_ment";

	$result = mysql_query($query) or die("연결실패");

	$total_record = mysql_num_rows($result);

	$total_page = (int)($total_record / $record_count);

	if($total_record % $record_count){
		$total_page++;
	}

	$query2 = $query." limit $record_start, $record_count";

	$result = mysql_query($query2);
?>

<form name='frm01' id='frm01' method='post' action="<?=$_SERVER['PHP_SELF']?>">
<input type="text" style="display: none;">  <!-- 텍스트박스 1개이상 처리.. 자동전송방지 -->
<input type='hidden' name='type' value=''>
<input type='hidden' name='record_start' value='<?=$record_start?>'>
<input type='hidden' name='next_url' value="<?=$_SERVER['PHP_SELF']?>">

<?
if($total_record){
	$i = $total_record - ($current_page - 1) * $record_count;

	$line = 0;

	while($row = mysql_fetch_array($result)){
		if($line == 0)	$duration = 800;
		else				$duration = 1000;
?>

<div class="review-list-container" data-aos="fade-up" data-aos-duration="<?=$duration?>">
	<div class="review_container">
		<!--작성자 및 별점 -->
		<div class="score_container">
			<div class="review_user_name"><?=Util::NameCutStr($row['name'],1,'O')?></div>
			<div class="score_05">
			<?
				for($i=0; $i<$row['score']; $i++){
			?>
				<div><img src="/images/star.png" alt="star"></div>
			<?
				}
			?>
			</div>
		</div>
		<!--//작성자 및 별점 -->

		<div class="ment-container">
			<?=$row['ment']?>
		</div>

		<!-- 포토 -->
		<div class="photo_container">
			<div class="photo_box">
			<?
				for($i=1; $i<=6; $i++){
					$n = sprintf('%02d',$i);
					$upfile = $row['upfile'.$n];
					if($upfile){
			?>
				<a href="/upfile/review/<?=$upfile?>" data-lightbox="img-<?=$row['uid']?>" class="photo_img"><img src="/upfile/review/<?=$upfile?>" class="photo_img"></a> 
			<?
					}
				}
			?>
			</div>
		</div>
		<!--//포토 -->
		<div class="review_date_text"><?=date('Y-m-d',$row['rTime'])?></div>
	</div>
</div>
<?
		$i--;
		$line++;
	}

}else{
?>
<div class="row_con">
	<div style='width:100%;text-align:center;padding:50px 0;'>작성된 리뷰가 없습니다.</div>
</div>
<?
}
?>

</form>

<?
//페이지 번호
$fName = 'frm01';
include '../module/pageNum2.php';
?>