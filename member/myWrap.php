<?
	//총 주문내역
	$cnt01 = sqlRowOne("select count(*) from ks_order where userid='".$GBL_USERID."'");

	//결제대기
	$cnt02 = sqlRowOne("select count(*) from ks_order where userid='".$GBL_USERID."' and status='결제대기'");

	//보유포인트
	$point = sqlRowOne("select point from ks_member where userid='".$GBL_USERID."'");

	//보유쿠폰
	$nTime = time();
	$coupon = sqlRowOne("select count(*) from ks_coupon where userid='".$GBL_USERID."' and orderNum=0 and eTime>'".$nTime."'");
?>

<style>
/*버튼 .....수정될수도...*/
.styleBtn_wrap {display:flex;}
.styleBtn2 {width:40%; display:flex; align-items:center; justify-content:center; padding:12px 10px; min-height:80px;border-radius:30px; margin:20px 4px; text-align:center;}
.styleBtn2.blk {background:#231815; border:1px solid #231815; color:#fff;  }
.styleBtn2.blk:hover {background:transparent; border:1px solid #231815; color:#231815; transition:.2s;}
.styleBtn2.blu {background:#1a3c93; border:1px solid #1a3c93; color:#fff;}
.styleBtn2.blu:hover {background:transparent; border:1px solid #1a3c93; color:#1a3c93; transition:.2s;}

@media (max-width:548px){
	.styleBtn2 {width:48%; min-height:40px;}
	#mypage_form .perinfo_wrap .perinfo_l .s_p_info img {width:40px;}
	#mypage_form .my_order_list {margin-bottom:60px;}

	#mypage_form .button_area02 a {display:inline-block; width:40%; margin:0 4px;}
}
</style>

<div class="perinfo_r">
	<div class="profile_pic">
		<img src="/images/mypage_user_icon.png" alt="회원">
	</div>
	<div class="profile_tit" style="width:100%;">
		<p><a href="mypage.php"><?=$GBL_NAME?></a> <span>님</span></p>
		<span><?=$GBL_NAME?>님 방문해주셔서 감사합니다.</span>
		<!--<a href="#" class="styleBtn open-modal">스타일링비 결제</a>-->
		<div class="styleBtn_wrap">
			<a href="javascript://" class="styleBtn2 blk open-modal"><!--스타일퀴즈 없이<br>스타일링 재신청-->스타일링비 결제</a>
			<a href="/styleQuiz.php" class="styleBtn2 blu"><!--스타일퀴즈 다시하고<br>스타일링 신청-->스타일퀴즈<br>다시 풀기</a><!--재신청링크로 가기-->
		</div>	
	</div>
	<div class="profile_btn">
		<a href="./myinfo.php">회원정보변경</a>
		<a href="/module/login/logout_proc.php">로그아웃</a>
	</div>
</div>
<div class="perinfo_l">
	<div class="s_p_info" onclick="location.href='mypage.php'" style="cursor:pointer;">
		<img src="/images/mypage_order_icon.png" alt="주문내역">
		<p class="s_p_tit">총 주문내역</p>
		<p class="s_p_num"><?=number_format($cnt01)?></p>
	</div>
	<div class="s_p_info" onclick="location.href='mypage.php'" style="cursor:pointer;">
		<img src="/images/mypage_payment_icon.png" alt="결제">
		<p class="s_p_tit">결제대기</p>
		<p class="s_p_num"><?=number_format($cnt02)?></p>
	</div>
	<div class="s_p_info" onclick="location.href='point.php'" style="cursor:pointer;">
		<img src="/images/mypage_point_icon.png" alt="포인트">
		<p class="s_p_tit">보유포인트</p>
		<p class="s_p_num"><?=number_format($point)?></p>
	</div>
	<div class="s_p_info" onclick="location.href='coupon.php'" style="cursor:pointer;">
		<img src="/images/mypage_coupon_icon.png" alt="쿠폰">
		<p class="s_p_tit">보유쿠폰</p>
		<p class="s_p_num"><?=number_format($coupon)?></p>
	</div>
<!--
	<div class="s_p_info">
		<img src="/images/mypage_delivery_icon.png" alt="배송">
		<p class="s_p_tit">배송중</p>
		<p class="s_p_num"><?=number_format($cnt02)?></p>
	</div>
-->
</div>
