<?
	include '../header.php';
	include '../module/loading.php';

	//주문정보
	$ord = sqlRow("select * from ks_order where uid='".$uid."' and userid='".$GBL_USERID."'");

	if(!$ord){
		Msg::backMsg("접근오류");
		exit;
	}
?>

<script>
function returnChk(){
	n = $('input:checkbox[class=chkList]:checked').length;
	if(n == 0){
		GblMsgBox('선택된 상품이 없습니다.','');
		return;

	}else{
		form = document.frm01;
		form.target = '';
		form.action = 'return.php';
		form.submit();
	}
}

function orderChk(){
	n = $('input:checkbox[class=chkList]').length;
	if(n == 0){
		GblMsgBox('주문가능한 상품이 없습니다.','');
		return;

	}else{
		form = document.frm01;
		form.target = '';
		form.action = 'order.php';
		form.submit();
	}
}
</script>

<form name='frm01' method='post'>
<input type='text' style='display:none;'>
<input type='hidden' name='uid' value='<?=$uid?>'>
<input type='hidden' name='orderNum' value='<?=$ord['rTime']?>'>



<div class="content_box">
	<div class="inr">
		<div class="cart_list">
			<p class="order_nm">주문번호 <?=$ord['rTime']?></p>
			<p class="m12 m_12 red_01">※ 왼쪽 네모칸을 클릭하여 “결제하기/반품하기”를 선택해 주세요!</p>
			<div class="row_tit">
				<div class="col">-</div>
				<div class="col">상품/상세정보</div>
				<div class="col">주문금액</div>
				<div class="col">상태</div>
			</div>
		<?
			$prodCnt = 0;		//반품 또는 주문 가능한 상품수(= 결제대기 상태인 상품수)

			$row = sqlArray("select * from ks_orderList where userid='".$GBL_USERID."' and rTime='".$ord['rTime']."' order by uid");

			if($row){
				foreach($row as $k => $v){
					//상품정보
					$item = sqlRow("select * from ks_product where uid='".$v['pid']."'");

					$prodImg = $item['upfile01'];
					if(!$prodImg)	$prodImg = 'no_img.png';
		?>
			<div class="row_con" style="border-bottom:1px solid #ddd;">
				<div class="col">
				<?
					if($v['status'] == '결제대기'){
						$prodCnt++;
				?>
					<input type="checkbox" name="chk[]" class='chkList' value="<?=$v['uid']?>">
				<?
					}
				?>
				</div>
				<div class="col">
					<img src="/upfile/<?=$prodImg?>">
					<div class="text_bx">
						<p><?=$item['title']?></p>
						<p><?=$item['memo']?></p>
					</div>
				</div>
				<div class="col line100"><?=number_format($v['price'])?> 원</div>
				<div class="col line100 ">
					<?=$v['status']?>					
				</div>				
			</div>
			
		<!-- 제품별 리뷰 작성이 아닌 주문별 주문 작성으로 인해 해당 기능 사용안함
			<div class="cart-review">
				<?
					if($v['status'] == '결제완료'){
						//리뷰작성 여부
						$revieChk = sqlRowOne("select count(*) from ks_review where userid='".$GBL_USERID."' and orderNum='".$ord['rTime']."' and pid='".$v['pid']."'");
						if(!$revieChk){
				?>
				<a class="cart-review-btn" href="review.php?uid=<?=$v['uid']?>">리뷰작성</a>
				<?
						}
					}
				?>
			</div>
		-->
			
		<?
				}
			}
		?>
		</div>

	<?
		//주문서내 배송정보
		if($ord['Delivery'] && $ord['DeliveryNum']){
			$con = sqlRow("select * from ks_shopConfig");
			
			$DeliveryLink = '';	//택배사 url
			if($con['DeliveryName01'])	$DeliveryLink = $con['DeliveryUrl01'];
			if($con['DeliveryName02'])	$DeliveryLink = $con['DeliveryUrl02'];
			if($con['DeliveryName03'])	$DeliveryLink = $con['DeliveryUrl03'];

			if($DeliveryLink)	$DeliveryNum = "<a href='".$DeliveryLink."' target='_blank'>".$ord['DeliveryNum']."</a>";
			else					$DeliveryNum = $ord['DeliveryNum'];
	?>
		<div class="delivery_list">
			<p class="order_nm m50">배송정보</p>
			<div class="row_tit">
				<div class="col">택배사</div>
				<div class="col">운송장번호</div>
			</div>
			<div class="row_con">
				<div class="col"><?=$ord['Delivery']?></div>
				<div class="col"><?=$DeliveryNum?></div>
			</div>
		</div>
	<?
		}
	?>

		<div class="cart_list">
		<?
			if($prodCnt){
		?>
			<div class="button_area02 txt_c m66">
				<a href="/member/mypage.php" class="bts wht-bt">목록</a> <!--목록으로 돌아가기 버튼 추가 20220304-->

				<a href="javascript:returnChk();" class="bts">반품하기</a>
				<?if($prodCnt == count($row)){?>
				<a href="javascript:orderChk();" class="bts blu-bt">반품없음</a>
				<?}else{?>
				<a href="javascript:orderChk();" class="bts blu-bt">주문하기</a>
				<?}?>
			</div>
		<?
			}else{
		?>
			<div class="button_area02 txt_c m66">
				<a href="mypage.php" class="bts">마이페이지</a>
			</div>
		<?
			}
		?>
		</div>
	</div>
</div>

</form>

<?
	include '../footer.php';
?>