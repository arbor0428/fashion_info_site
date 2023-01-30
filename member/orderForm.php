<?
	//주문자 보유포인트
	$uPoint = sqlRowOne("select point from ks_member where userid='".$GBL_USERID."'");

	//보유쿠폰
	$nTime = time();
	$cArr = sqlArray("select * from ks_coupon where userid='".$GBL_USERID."' and eTime>".$nTime." and orderNum=0 order by rTime");
?>

<script>
function formChk(){
	n = $('input:checkbox[class=chkList]').length;
	if(n == 0){
		GblMsgBox('주문가능한 상품이 없습니다.','');
		return;

	}else{
		form = document.frm01;

		payAmt = $('#payAmt').val();

		//결제금액이 0원인 경우
		if(payAmt == 0){
			form.target = 'ifra_gbl';
			form.action = 'orderProc.php';
			form.submit();

		}else{
			if(!isCheckModal(form.payMode,"결제방법을 선택해 주십시오.")){
				$("#payCard").attr("tabindex", -1).focus();
				return;
			}

			UserOS = $('#UserOS').val();

			if(UserOS == 'pc'){
				$('#title_ttl').text('주문결제');
				$('#titleFrame').html("<iframe src='about:blank' name='ifra_kcp' id='ifra_kcp' width='740' height='565' frameborder='0' scrolling='no'></iframe>");
				$(".titleBox_open").click();

				form.target = 'ifra_kcp';
				form.action = '/module/kcp/pc/order.php';
				form.submit();

			}else if(UserOS == 'mobile'){
				payWin = window.open("about:blank","kcpBox");
				form.callChk.value = '1';
				form.target = 'kcpBox';
				form.action = '/module/kcp/mobile/order_mobile.php';
				form.submit();
			}

		}
	}
}
</script>

<input type='hidden' name='point' id='point' value='<?=$uPoint?>'>

<?
//5만원 이상인 경우 스타일링비 차감 할인
if($prodAmt >= 50000)	$saleAmt = 7700;
else							$saleAmt = 0;

$payAmt = $prodAmt - $saleAmt;
?>

<ul class="price_detail">
	<li>
		<div>총 상품 가격</div>
		<div><?=number_format($prodAmt)?></div>
	</li>
	<li>
		<div class="discount_detail">
			<p>즉시 할인</p>
			<p>-스타일링비 차감 할인(5만원 이상 구매)</p>
		</div>
		<div>-<?=number_format($saleAmt)?></div>
	</li>
	<li>
		<div>포인트</div>
		<div class="point_detail">
			<p class="p_d_first"><input type='text' name='usePoint' id='usePoint' value='0' class='numberOnly' style='text-align:right;border-bottom:1px solid #ddd;width:100px;padding-right:10px;'><span style="font-weight:600;">P</span></p>
			<p class="p_d_second">사용 가능한 포인트 : <?=number_format($uPoint)?> p</p>
		</div>
	</li>
	<li>
		<div>보유쿠폰</div>
		<div>
			<select name='coupon' id='coupon'>				
		<?
			if($cArr){
		?>
				<option value=''>쿠폰선택</option>
		<?
				foreach($cArr as $k => $v){
		?>
				<option value="<?=$v['uid']?>" data-p="<?=$v['price']?>"><?=$v['title']?> (-<?=number_format($v['price'])?> 원 / <?=$v['eDate']?> 만료)</option>
		<?
				}
			}else{
		?>
				<option value=''>쿠폰없음</option>
		<?
			}
		?>
			</select>
		</div>
	</li>
	<li>
		<div>총 결제 금액</div>
		<div><span id='payAmtTxt'><?=number_format($payAmt)?></span>원</div>
	</li>
</ul>
<div class="button_area txt_c m66">
	<a href="javascript:formChk();" class="bts">결제하기</a>
</div>

<input type='hidden' name='saleAmt' id='saleAmt' value='<?=$saleAmt?>'>
<input type='hidden' name='defaultAmt' id='defaultAmt' value='<?=$payAmt?>'>
<input type='hidden' name='payAmt' id='payAmt' value='<?=$payAmt?>'>
<input type='hidden' name='couponAmt' id='couponAmt' value='<?=$couponAmt?>'>

<script>
$(function(){
	//포인트사용
	$('#usePoint').on("blur",function(){
		setAmt();
	});

	//쿠폰사용
	$('#coupon').on("change",function(){
		setAmt();
	});
});

//포인트 및 쿠폰사용 계산함수
function setAmt(){
	usePoint = parseInt(uncomma($('#usePoint').val() || 0));	//사용하는 포인트

	coupon = 0;
	c = $("#coupon option:selected").val();
	if(c){
		p = $("#coupon option:selected").data('p');
		coupon = parseInt(p || 0);		//쿠폰 사용 시 할인금액
	}

	$('#couponAmt').val(coupon);

	point = parseInt($('#point').val() || 0);							//보유 포인트
	defaultAmt = parseInt($('#defaultAmt').val() || 0);			//총 결제 금액(계산용)

	newAmt = defaultAmt - coupon;

	if(usePoint > point){
		GblMsgBox('보유 포인트가 부족합니다.','');
		$('#usePoint').val(0);

	}else if(usePoint > newAmt){
		GblMsgBox('총 결제 금액을 초과 하였습니다.','');
		$('#usePoint').val(0);

	}else if(usePoint > 0){			
		newAmt -= usePoint;
	}

	$('#payAmt').val(newAmt);
	$('#payAmtTxt').text(number_format(newAmt));
}	
</script>