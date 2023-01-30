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

<script>
function stylePayment(p){

	UserOS = $('#UserOS').val();

	if(UserOS == 'pc'){
		$('#title_ttl').text('스타일링 결제');
		$('#titleFrame').html("<iframe src='about:blank' name='ifra_kcp' id='ifra_kcp' width='740' height='565' frameborder='0' scrolling='no'></iframe>");
		$(".titleBox_open").click();

		form = document.frm_style;
		form.payMode.value = p;
		form.target = 'ifra_kcp';
		form.action = '/module/kcp/pc/order.php';
		form.submit();

	}else if(UserOS == 'mobile'){
		payWin = window.open("about:blank","kcpBox");

		form = document.frm_style;
		form.payMode.value = p;
		form.callChk.value = '1';
		form.target = 'kcpBox';
		form.action = '/module/kcp/mobile/order_mobile.php';
		form.submit();
	}
}
</script>

<?
	//회원정보
	$user = sqlRow("select * from ks_member where userid='".$GBL_USERID."'");
?>

<form name='frm_style' method='post' action=''>
<input type='text' style='display:none;'>
<input type='hidden' name='userid' value='<?=$GBL_USERID?>'>
<input type='hidden' name='name' value='<?=$GBL_NAME?>'>
<input type='hidden' name='email' value='<?=$user['email']?>'>
<input type='hidden' name='phone' value='<?=$user['phone']?>'>
<input type='hidden' name='payTitle' value='style'>
<input type='hidden' name='payMode' value=''>
<input type='hidden' name='styleQuiz' id='styleQuiz' value="<?=$_GET['styleQuiz']?>">
<input type='hidden' name='UserOS' id='UserOS' value='<?=$UserOS?>'>
<input type='hidden' name='callChk' id='callChk' value=''><!-- 모바일 결제창 호출용 -->
</form>


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
//로그인 후 퀴즈풀고 타입폼에서 넘어오는 경우 결제창 띄우기
if($GBL_USERID && $_GET['styleQuiz']){
?>
<script>
$(document).ready(function(){
	$(".open-modal").click();
});
</script>
<?
}
?>