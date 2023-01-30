<?
	include '../header.php';
	include '../module/loading.php';

	//총 주문내역
	$cnt01 = sqlRowOne("select count(*) from ks_order where userid='".$GBL_USERID."'");

	//배송중
	$cnt02 = sqlRowOne("select count(*) from ks_order where userid='".$GBL_USERID."' and status='배송중'");

	//결제대기
	$cnt03 = sqlRowOne("select count(*) from ks_order where userid='".$GBL_USERID."' and status='결제대기'");
?>





<div class="content_box">
	<div class="inr">
		<h2>My Page</h2>
		<div id="mypage_form">
			<div class="perinfo_wrap">
				<div class="perinfo_r">
					<div class="profile_pic">
						<img src="/images/mypage_user_icon.png" alt="회원">
					</div>
					<div class="profile_tit">
						<p><?=$GBL_NAME?> <span>님</span></p>
						<span><?=$GBL_NAME?>님 방문해주셔서 감사합니다.</span>
						<a href="#" class="styleBtn open-modal">스타일링비 결제</a>
					</div>
					<div class="profile_btn">
						<a href="./myinfo.php">회원정보변경</a>
						<a href="/module/login/logout_proc.php">로그아웃</a>
					</div>
				</div>
				<div class="perinfo_l">
					<div class="s_p_info">
						<img src="/images/mypage_order_icon.png" alt="주문내역">
						<p class="s_p_tit">총 주문내역</p>
						<p class="s_p_num"><?=number_format($cnt01)?></p>
					</div>
					<div class="s_p_info">
						<img src="/images/mypage_delivery_icon.png" alt="배송">
						<p class="s_p_tit">배송중</p>
						<p class="s_p_num"><?=number_format($cnt02)?></p>
					</div>
					<div class="s_p_info">
						<img src="/images/mypage_payment_icon.png" alt="결제">
						<p class="s_p_tit">결제대기</p>
						<p class="s_p_num"><?=number_format($cnt03)?></p>
					</div>
				</div>
			</div>

			<div class="order_history">
			<?
				//스타일링 결제 내역
				include 'myPayList.php';
			?>
			</div>

			<div class="my_order_list">
			<?
				//주문내역
				include 'myOrderList_tmp.php';
			?>
			</div>			

			<?
				//스타일링 재신청 버튼
				include 'myBtn.php';
			?>
		</div>
	</div>
</div>



<style>
/*스타일링비결제 모달창*/
.open-modal, .close-modal {cursor:pointer;}
.modal {position:fixed; width:500px; background:#fff; top: 50%;  left: 50%; transform: translate(-50%, -50%); z-index:99991; display:none;}
.modal .top {background:#2c3137; color:#fff; padding:10px 20px 10px 30px; box-sizing:border-box; font-size:1.125rem; line-height:32px;}

.modal .close-modal {float:right; width:32px; height:32px; line-height:32px; box-sizing:border-box; font-size:1.875rem; color:#fff;}

.modal-filter{position:fixed; top:0; right:-100%; width: 100%; height: 100%; background: rgba(0,0,0,.6); opacity: 0; transition: opacity .4s; z-index: 9999;}
.modal-filter.open{opacity: 1; right:0;}

.modal .select-payment {padding:60px 20px; background:#fff;}
.modal .select-payment a.pay-method {position:relative; display:block; width:100%; padding:40px 0; background:#f1f2f3; margin:20px 0; border-radius:10px; font-size:1.5rem;}
.modal .select-payment a.pay-method:hover {box-shadow:0 0 4px 4px rgba(26,60,147,.1);}
.modal .select-payment a.pay-method span.lnr-arrow-right {position:absolute; top:50%; transform:translateY(-50%); right:6%;}
.modal .select-payment a.pay-method span.imgs-icon {display:inline-block; width:50px; height:50px; vertical-align:middle; margin:0 24px 0 40px;}
.modal .select-payment a.pay-method span.imgs-icon.card {background:url("/images/icon_card.png")no-repeat center center; background-size:cover;}
.modal .select-payment a.pay-method span.imgs-icon.account {background:url("/images/icon_account.png")no-repeat center center; background-size:cover;}
.modal .select-payment a.pay-method span.imgs-icon.v-account {background:url("/images/icon_v-account.png")no-repeat center center; background-size:cover;}

@media screen and (max-width:768px){
	.modal {width:90%;}
	.modal .select-payment a.pay-method {padding:20px 0;}
}

@media screen and (max-width:595px){
	.modal .select-payment {padding:20px;}
}
</style>


<div class="modal">
	<div class="top clearfix">
		결제수단 선택
		<span class="lnr lnr-cross close-modal"></span>
	</div>
	
	<div class="select-payment">
		<a href="javascript:stylePayment('card');$('.close-modal').click();" class="pay-method">
			<span class="imgs-icon card"></span>신용카드<span class="lnr lnr-arrow-right"></span>
		</a>
		<a href="javascript:stylePayment('acc');$('.close-modal').click();" class="pay-method">
			<span class="imgs-icon account"></span>계좌이체<span class="lnr lnr-arrow-right"></span>
		</a>
		<a href="javascript:stylePayment('vacc');$('.close-modal').click();" class="pay-method">
			<span class="imgs-icon v-account"></span>가상계좌<span class="lnr lnr-arrow-right"></span>
		</a>
	</div>
</div>
<div class="modal-filter"></div>

<script>
$(function(){
	$(".open-modal").click(function(){
		$(".modal").show();
		$(".modal-filter").addClass("open");
		$("html").css("overflow","hidden");
	});

	$(".close-modal").click(function(){
		$(".modal").hide();
		$(".modal-filter").removeClass("open");
		$("html").css("overflow","auto");
	});
	
});
</script>



<?
	include '../footer.php';
?>