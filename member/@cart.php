<?
	include '../header.php';
?>

<div class="content_box">
	<div class="inr">
		<div id="cart_list">
			<p class="order_nm">주문번호 12345678910</p>
			<div class="row_tit">
				<div class="col">-</div>
				<div class="col">상품/상세정보</div>
				<div class="col">주문금액</div>
				<div class="col">상태</div>
			</div>
			<div class="row_con">
				<div class="col"><input type="checkbox"></div>
				<div class="col">
					<img src="/images/test.png"> <!--제품 썸네일 -->
					<div class="text_bx">
						<a href="">
							<p>제목입니다.</p>
							<p>제품 설명입니다. 블라블라블라블라블라</p>
						</a>
					</div>
				</div>
				<div class="col line100">44,000 원</div>
				<div class="col line100">결제대기</div>
			</div>
			<div class="row_con">
				<div class="col"><input type="checkbox"></div>
				<div class="col">
					<img src="/images/test.png"> <!--제품 썸네일 -->
					<div class="text_bx">
						<a href="">
							<p>제목입니다.</p>
							<p>제품 설명입니다. 블라블라블라블라블라</p>
						</a>
					</div>
				</div>
				<div class="col line100">44,000 원</div>
				<div class="col line100">결제대기</div>
			</div>
			<div class="row_con">
				<div class="col"><input type="checkbox"></div>
				<div class="col">
					<img src="/images/test.png"> <!--제품 썸네일 -->
					<div class="text_bx">
						<a href="">
							<p>제목입니다.</p>
							<p>제품 설명입니다. 블라블라블라블라블라</p>
						</a>
					</div>
				</div>
				<div class="col line100">44,000 원</div>
				<div class="col line100">결제대기</div>
			</div>
			<div class="button_area02 txt_c m66">
				<a href="return.php" class="bts">반품하기</a>
				<a href="order.php" class="bts blu-bt">반품없음</a>
			</div>
		</div>
	</div>
</div>

<?
	include '../footer.php';
?>