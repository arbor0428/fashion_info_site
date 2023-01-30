<script>
function formChk(){
	form = document.scopeForm;

	if(!isCheckModal(form.rating,"별점을 선택해 주십시오.")){
		$(".scope-box").attr("tabindex", -1).focus();
		return;
	}

	if(isFrmEmptyModal(form.ment,"후기 내용을 입력해 주십시오."))	return true;

	form.type.value = 'write';
	form.target = 'ifra_gbl';
	form.action = 'reviewProc.php';
	form.submit();
}

// 콘텐츠 수정 :: 사진 수정 시 이미지 미리보기
function readURL(input,n) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#imgArea'+n).attr('src', e.target.result); 
		}
		reader.readAsDataURL(input.files[0]);
	}
}

// 이미지 에러 시 미리보기영역 미노출
function imgAreaError(n){
	$('#imgViewArea'+n).hide();
	$('.pu'+n).show();
}

$(function(){
	//사진 미리보기
	$("#upfile01, #upfile02, #upfile03, #upfile04, #upfile05").change(function() {
		n = $(this).data('no');
		if( $(this).val() == '' ) {
			$('#imgArea'+n).attr('src' , '');  
		}
		$('#imgViewArea'+n).show();
		$('.pu'+n).hide();
		readURL(this,n);
	});
});

function imgDel(no){
	$('#upfile'+no).val('');
	$('#imgArea'+no).attr('src' , '');
	$('#imgViewArea'+no).show();
	$('.pu'+no).hide();
}

function ImgFileSizeChk(fname,fsize,no){
	upFile = $("#upfile"+no).val();

	if( upFile != "" ){
		var ext = $('#upfile'+no).val().split('.').pop().toLowerCase();

		if($.inArray(ext, ['jpg','jpeg','gif','png']) == -1) {
			GblMsgBox('jpg, jpeg, gif, png\n파일만 등록이 가능합니다.','');
			$("#upfile"+no).val('');
			$("#file_route"+no).val('');
			return;
		}


		var fileSize = 0;

		// 브라우저 확인
		var browser=navigator.appName;

		file = document[fname]['upfile'+no];
		
		// 익스플로러일 경우
		if(browser=="Microsoft Internet Explorer"){
			var oas = new ActiveXObject("Scripting.FileSystemObject");
			fileSize = oas.getFile(file.value).size;

		// 익스플로러가 아닐경우			
		}else{
			fileSize = file.files[0].size;
		}

		fS = Math.round(fileSize / 1024);
		fC = fsize * 1024

		if(fS > fC){
			GblMsgBox('이미지 파일은 '+fsize+'MB이상 등록할 수 없습니다.','');
			$("#upfile"+no).val('');
			$("#file_route"+no).val('');
			return;
		}
	}

	$("#file_route"+no).val(upFile);
}

$(document).ready(function() {
    $('.review-text').on('keyup', function() {
        $('#txt-cnt').html("("+$(this).val().length+" / 200)");
 
        if($(this).val().length > 200) {
            $(this).val($(this).val().substring(0, 200));
            $('#txt-cnt').html("(200 / 200)");
        }
    });
});
</script>

<form name='scopeForm' id='scopeForm' method='post' action='' ENCTYPE="multipart/form-data">
<input type='text' style='display:none;'>
<input type='hidden' name='type' value=''>
<input type='hidden' name='userid' value='<?=$GBL_USERID?>'>
<input type='hidden' name='name' value='<?=$GBL_NAME?>'>
<input type='hidden' name='pid' value='<?=$ordChk['pid']?>'>
<input type='hidden' name='orderNum' value='<?=$ordChk['rTime']?>'>

<div class="scope-box txt_c">	
	<fieldset>
		<input type="radio" name="rating" value="5" id="rate5"><label for="rate5">★</label>
		<input type="radio" name="rating" value="4" id="rate4"><label for="rate4">★</label>
		<input type="radio" name="rating" value="3" id="rate3"><label for="rate3">★</label>
		<input type="radio" name="rating" value="2" id="rate2"><label for="rate2">★</label>
		<input type="radio" name="rating" value="1" id="rate1"><label for="rate1">★</label>
	</fieldset>	
</div>

<div class="inr review">
	<div class="txt_c">
		<textarea class="review-text" name="ment" title="리뷰작성" placeholder="후기 내용을 200자 이내로 작성해주세요"></textarea>
	</div>
	<div id="txt-cnt">(0 / 200)</div>

	<div class="file-upload">
	<?
		for($i=1; $i<=6; $i++){
			$n = sprintf('%02d',$i);
	?>
		<label>
			<div class="photo">
				<div id="imgViewArea<?=$n?>" style="display:none;">

					<!-- 첨부파일 삭제 -->
					<div style='width:20px;height:20px;background:#ffffff73;position:absolute;' onclick="imgDel('<?=$n?>');return false;">
						<span class="lnr lnr-cross" style="top:0;left:2px;font-size:0.3em;position:absolute;"></span>
					</div>
					<!-- /첨부파일 삭제 -->

					<img id="imgArea<?=$n?>" onerror="imgAreaError('<?=$n?>')" style="width:80px;height:80px;">
				</div>
			</div>
			<img src="/images/photo_upload.png" style="max-width:100%;" alt="이미지 업로드" class="photo_upload pu<?=$n?>">
			<input type="file" name="upfile<?=$n?>" id="upfile<?=$n?>" data-no='<?=$n?>' onchange="ImgFileSizeChk('scopeForm',10,'<?=$n?>');">
		</label>
		
	<?
		}
	?>
	</div>

	<a href="javascript:formChk();" class="more_btn">리뷰 등록</a>
</div>

</form>