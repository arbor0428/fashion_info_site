<?
	include '../header.php';
	include '../module/loading.php';
?>

<form name='frm01' method='post'>
<input type='text' style='display:none;'>
<input type='hidden' name='uid' value='<?=$uid?>'>

<div class="content_box">
	<div class="inr">
		<h2 style="margin-bottom:50px;">Order</h2>
		<div id="cart_list">
			<p class="order_nm">주문번호 <?=$ord['rTime']?></p>
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
				<div class="col line100 ">44,000 원</div>
				<div class="col line100 ">결제대기</div>
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
<!-- 			<div class="button_area02 txt_c m66">
				<a href="return.php" class="bts">반품하기</a>
				<a href="order.php" class="bts">반품없음</a>
			</div> -->
		</div>
		<div id="order_way">
			<p class="order_way_tit">결제방식</p>
			<div class="pay_wrap">
				<div class="pay_way_list clearfix">
					<div class="pay_way">
							<input type="checkbox" class="radio" id="card" onclick="" checked>
							<label for="card">신용카드</label>
					  </div>
					<div class="pay_way">
							<input type="checkbox" class="radio" id="cash01" onclick="">
							<label for="cash01">계좌이체</label>
					  </div>
					<div class="pay_way">
							<input type="checkbox" class="radio" id="cash02" onclick="">
							<label for="cash02">가상계좌</label>
					  </div>
				</div>
				<p class="red_01">※ 반품하실 제품은 반품신청을 꼭 진행해주세요!</p>
			</div>

			<!-- 결제 방식 선택하면 나옴 // 결제방식을 클릭하면 나오는게 나을지, 구매할 주문리스트 체크체크하면 나오는게 나을지 모르겠슴다 -->
			<div class="order_result_wrap">
				<ul class="price_detail">
					<li>
						<div>최종 결제 금액</div>
						<div>141,830</div>
					</li>
					<li>
						<div>총 상품 가격</div>
						<div>0</div>
					</li>
					<li>
						<div class="discount_detail">
							<p>즉시 할인</p>
							<p>-스타일링비 차감 할인(5만원 이상 구매)</p>
						</div>
						<div>-7,700</div>
					</li>
					<li>
						<div>포인트</div>
						<div class="point_detail">
							<p class="p_d_first"><span>0</span><span style="font-weight:600;">P</span></p>
							<p class="p_d_second">사용 가능한 포인트 : 0 p</p>
						</div>
					</li>
					<li>
						<div>총 결제 금액</div>
						<div>136,930원</div>
					</li>
				</ul>
				<div class="button_area txt_c m66">
					<a href="" class="bts">결제하기</a>
				</div>
			</div>

			<script>
				    $(".pay_way").on("click",function(){

						
						$(".order_result_wrap").stop().fadeIn();

					});
			</script>
		</div>
	</div>
</div>

</form>

<?
	include '../footer.php';
?>