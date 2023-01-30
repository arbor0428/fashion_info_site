<?
	include '../header.php';
	include '../module/loading.php';
?>


<div class="content_box">
	<div class="inr">
		<h2>My Page</h2>
		<div id="mypage_form">
			<div class="perinfo_wrap">
			<?
				//회원정보
				include 'myWrap.php';
			?>
			</div>

			<div class="order_history">
			<?
				//나의 포인트 내역
				include 'myPointList.php';
			?>
			</div>
		</div>
	</div>
</div>


<?
	include '../footer.php';
?>