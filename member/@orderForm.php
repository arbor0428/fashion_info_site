<script src="https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js"></script>
<script>
function openDaumPostcode() {
	new daum.Postcode({
		oncomplete: function(data) {
			// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

			// 각 주소의 노출 규칙에 따라 주소를 조합한다.
			// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
			var fullAddr = ''; // 최종 주소 변수
			var extraAddr = ''; // 조합형 주소 변수

			// 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
			if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
				fullAddr = data.roadAddress;

			} else { // 사용자가 지번 주소를 선택했을 경우(J)
				fullAddr = data.jibunAddress;
			}

			// 사용자가 선택한 주소가 도로명 타입일때 조합한다.
			if(data.userSelectedType === 'R'){
				//법정동명이 있을 경우 추가한다.
				if(data.bname !== ''){
					extraAddr += data.bname;
				}
				// 건물명이 있을 경우 추가한다.
				if(data.buildingName !== ''){
					extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
				}
				// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
				fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
			}

			// 우편번호와 주소 정보를 해당 필드에 넣는다.			
/*
			document.getElementById('zip01').value = data.postcode1;
			document.getElementById('zip02').value = data.postcode2;
*/
			document.getElementById('zipcode').value = data.zonecode;
			document.getElementById('addr01').value = fullAddr;
			document.getElementById('addr02').focus();
		}
	}).open();
}

function formChk(){
	n = $('input:checkbox[class=chkList]').length;
	if(n == 0){
		GblMsgBox('주문가능한 상품이 없습니다.','');
		return;

	}else{
		form = document.frm01;

		if(isFrmEmptyModal(form.name,"이름을 입력해 주십시오."))	return;
		if(isFrmEmptyModal(form.phone,"연락처를 입력해 주십시오."))	return;

		if(!isCheckModal(form.payMode,"결제방법을 선택해 주십시오.")){
			$("#payCard").attr("tabindex", -1).focus();
			return;
		}

		if(isFrmEmptyModal(form.zipcode,"우편번호를 입력해 주십시오."))	return;
		if(isFrmEmptyModal(form.addr01,"기본주소를 입력해 주십시오."))	return;
		if(isFrmEmptyModal(form.addr02,"상세주소를 입력해 주십시오."))	return;

		if(isFrmEmptyModal(form.email01,"이메일을 입력해 주십시오."))	return;
		if(isFrmEmptyModal(form.email02,"이메일을 입력해 주십시오."))	return;

		if($('#email01').val() && $('#email02').val()){
			email = $('#email01').val()+'@'+$('#email02').val();
			okEmail = isEmailChk(email);
			if(!okEmail){
				GblMsgBox('이메일을 정확히 기재해 주시기 바랍니다.');
				$('#email01').focus();
				return;
			}
		}

		$('#title_ttl').text('주문결제');
		$('#titleFrame').html("<iframe src='about:blank' name='ifra_kcp' id='ifra_kcp' width='740' height='565' frameborder='0' scrolling='no'></iframe>");
		$(".titleBox_open").click();

		form.target = 'ifra_kcp';
		form.action = '/module/kcp/pc/order.php';
		form.submit();
	}
}
</script>


<?
	//주문자정보
	$user = sqlRow("select * from ks_member where userid='".$GBL_USERID."'");
	$eArr = explode('@',$user['email']);
	$email01 = $eArr[0];
	$email02 = $eArr[1];
?>

<input type='hidden' name='point' id='point' value='<?=$user['point']?>'>

<div class="flex_both_top">
	 <label class="field">
		<span class="label"><span style="color:red">*</span> 이름</span>
		<span class="insert">
			<input type="text" name="name" id="name" value="<?=$user['name']?>" class="input_text medium" placeholder="이름을 입력해 주세요.">
		</span>
	</label>
	
	<label class="field">
		<span class="label"><span style="color:red">*</span> 연락처</span>
		<span class="insert">
			<input type="text" name="phone" id="phone" value="<?=$user['phone']?>" class="input_text medium" style="width:100%;float:left;" placeholder="연락처">
		</span>
	</label>
</div>

<div class="flex_both_top">
	<label class="field" style="flex-basis: 100%;">
		<span class="label"><span style="color:red">*</span> 배송 받으실 주소</span>
		<span class="insert">
			<div class="clearfix">
				<input type="text" name="zipcode" id="zipcode" value="<?=$user['zipcode']?>" class="add001 input_text medium" style="width:31%;" maxlength='5' placeholder="우편번호" onclick="openDaumPostcode();" readonly><a href="javascript:openDaumPostcode();" class='bntstyle1 bntstyle3' style="width:17%;">주소찾기</a>
			</div>
			<div>
				<input type="text" name="addr01" id="addr01" value="<?=$user['addr01']?>" class="add001 add002 input_text medium" placeholder="기본주소" style='width:49%;' readonly onclick="openDaumPostcode();">
				<input type="text" name="addr02" id="addr02" value="<?=$user['addr02']?>" class="add001 add002 input_text medium" placeholder="상세주소" style='width:49%;margin-left:2%;'>
			</div>
		</span>
	</label>
</div>

<div class="flex_both_top">
	<label class="field">
		<span class="label"><span style="color:red">*</span> 이메일</span>
		<span class="insert">
			<input type="text" name="email01" id="email01" value="<?=$email01?>" class="input_text medium w50" style="width:35%;ime-mode:disabled"> @
			<input type="text" name="email02" id="email02" value="<?=$email02?>" class="ipmt10 input_text medium w50" style="width:30%;ime-mode:disabled" placeholder="직접입력">
			<select class="ipmt10" onchange="document.frm01.email02.value=this.options[this.selectedIndex].value;" style="position:relative; top:-2.5px; padding:20px 0; width:30%; height:60px; border-bottom:1px solid #ddd;">
				<option value="">:: 직접입력 ::</option>
				<?
					foreach($gblEmailArr as $k => $v){
						echo "<option value='".$v."'>".$v."</option>";
					}
				?>
			</select>
		</span>
	</label>
</div>

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
			<p class="p_d_second">사용 가능한 포인트 : <?=number_format($user['point'])?> p</p>
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

<input type='hidden' name='defaultAmt' id='defaultAmt' value='<?=$payAmt?>'>
<input type='hidden' name='payAmt' id='payAmt' value='<?=$payAmt?>'>

<script>
$(function(){
	$('#usePoint').on("blur",function(){
		usePoint = parseInt(uncomma($(this).val() || 0));	//사용하는 포인트
		point = parseInt($('#point').val() || 0);					//보유 포인트
		payAmt = parseInt($('#payAmt').val() || 0);			//총 결제 금액
		defaultAmt = parseInt($('#defaultAmt').val() || 0);	//총 결제 금액(계산용)

		if(usePoint > point){
			GblMsgBox('보유 포인트가 부족합니다.','');
			$('#usePoint').val(0);
			newAmt = defaultAmt;

		}else if(usePoint > payAmt){
			GblMsgBox('총 결제 금액을 초과 하였습니다.','');
			$('#usePoint').val(0);
			newAmt = defaultAmt;

		}else if(usePoint > 0){			
			newAmt = defaultAmt - usePoint;
		}

		$('#payAmt').val(newAmt);
		$('#payAmtTxt').text(number_format(newAmt));
	});
});
</script>