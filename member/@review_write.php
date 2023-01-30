<?
	include '../header.php';
?>

<style>
.scope-box {margin:50px 0;}

#scopeForm input[type=radio]:checked ~ label{
    text-shadow: 0 0 0 #ffba30; /* 마우스 클릭 체크 */
}

#scopeForm fieldset{
    display: inline-block; /* 하위 별점 이미지들이 있는 영역만 자리를 차지함.*/
    border: 0; /* 필드셋 테두리 제거 */
	direction: rtl; /* 이모지 순서 반전 */
}
#scopeForm input[type=radio]{
    display: none; /* 라디오박스 감춤 */	
	outline:none;
}
#scopeForm label{
    font-size: 4em; /* 이모지 크기 */
    color: transparent; /* 기존 이모지 컬러 제거 */
    text-shadow: 0 0 0 #d9d9d9; /* 새 이모지 색상 부여 */
	margin:0 4px;
	cursor:pointer;
}

#scopeForm input[type=radio]:checked ~ label{
    text-shadow: 0 0 0 #ffba30; /* 마우스 클릭 체크 */
}



.inr.review {position:relative; width:80%;}

textarea.review-text {width:100%; min-height:400px; font-size:1rem; padding:20px; border-radius:4px; box-sizing:border-box; resize:none; background:#f1f5f8;}
textarea.review-text::-webkit-scrollbar {width: 10px;}

textarea.review-text::-webkit-scrollbar-thumb {background: #ccc; border-radius: 10px; background-clip: padding-box; border: 2px solid transparent;}
textarea.review-text::-webkit-scrollbar-track {background:#ddd; border-radius: 10px;}

#txt-cnt {position:absolute; right:0;}


/* 이미지 업로드*/
.file-upload {position:relative; margin-top:24px;}
.file-upload label {display: inline-block; overflow: hidden; text-align: center; width:80px; min-height:80px; border-radius:10px; border:1px dashed #ddd; box-sizing:border-box;}
.file-upload label img.photo_upload {margin:15px 0 10px 0; width:80%;}
.file-upload label p {font-weight:400; color:#bbbeca;}
.file-upload label > input {position: absolute; width: 0; height: 0; overflow: hidden; z-index: -1; border:0;}

.file-upload label:not(:last-child) {margin-right:8px;}

.inr.review .more_btn {display:block; margin:50px auto 0; border-radius:70px; width:240px; height:70px; line-height:70px; font-size:1.250rem; border:1px solid #231815; background-color:#231815; text-align:center; color:#fff;}
.inr.review .more_btn:hover {background:transparent; border:1px solid #231815; color:#231815; transition:.2s;}

@media screen and (max-width:1280px) {
	.inr.review .more_btn {width:212px; height:62px; line-height:62px;}
}

@media screen and (max-width:768px) {
	.inr.review {width:90%;}
}

@media screen and (max-width:595px) {
	.scope-box {margin:30px 0;}
	textarea.review-text {min-height:300px;}
	.file-upload label {margin:4px;}
	.inr.review .more_btn {width:185px; height:52px; line-height:52px;}
}
</style>

<div class="content_box">
	<div class="inr">
		<p class="f42 bold txt_c">상품은 만족하셨나요?</p>


		<div class="scope-box txt_c">
			<form name="scopeForm" id="scopeForm" method="post" action="">
				<fieldset>
					<input type="radio" name="rating" value="5" id="rate5"><label for="rate5">★</label>
					<input type="radio" name="rating" value="4" id="rate4"><label for="rate4">★</label>
					<input type="radio" name="rating" value="3" id="rate3"><label for="rate3">★</label>
					<input type="radio" name="rating" value="2" id="rate2"><label for="rate2">★</label>
					<input type="radio" name="rating" value="1" id="rate1"><label for="rate1">★</label>
				</fieldset>
			</form>
		</div>
		
		<div class="inr review">
			<div class="txt_c">
				<textarea class="review-text" name="" title="리뷰작성" placeholder="후기 내용을 200자 이내로 작성해주세요"></textarea>
			</div>
			<div id="txt-cnt">(0 / 200)</div>
		

			<div class="file-upload">
				<label>
					<!-- 이미지 미리보기 
					<div class="photo">
						<div id="imgViewArea" style="display:none;padding-top:10px;">
							<img id="imgArea" onerror="imgAreaError()" style="max-width:150px;max-height:196px;">
						</div>
					</div>
					<!-- /이미지 미리보기 -->
					<img src="http://covid.i-web.kr/img/photo_upload.png" style="max-width:100%;" alt="이미지 업로드" class="photo_upload">

					
					<input type="file" name="upfile01" id="upfile01" onchange="ImgFileSizeChk('frm01',10,'01');">
				</label>

				<label>
					<!-- 이미지 미리보기 
					<div class="photo">
						<div id="imgViewArea" style="display:none;padding-top:10px;">
							<img id="imgArea" onerror="imgAreaError()" style="max-width:150px;max-height:196px;">
						</div>
					</div>
					<!-- /이미지 미리보기 -->
					<img src="http://covid.i-web.kr/img/photo_upload.png" style="max-width:100%;" alt="이미지 업로드" class="photo_upload">

					
					<input type="file" name="upfile01" id="upfile01" onchange="ImgFileSizeChk('frm01',10,'01');">
				</label>

				<label>
					<!-- 이미지 미리보기 
					<div class="photo">
						<div id="imgViewArea" style="display:none;padding-top:10px;">
							<img id="imgArea" onerror="imgAreaError()" style="max-width:150px;max-height:196px;">
						</div>
					</div>
					<!-- /이미지 미리보기 -->
					<img src="http://covid.i-web.kr/img/photo_upload.png" style="max-width:100%;" alt="이미지 업로드" class="photo_upload">

					
					<input type="file" name="upfile01" id="upfile01" onchange="ImgFileSizeChk('frm01',10,'01');">
				</label>

				<label>
					<!-- 이미지 미리보기 
					<div class="photo">
						<div id="imgViewArea" style="display:none;padding-top:10px;">
							<img id="imgArea" onerror="imgAreaError()" style="max-width:150px;max-height:196px;">
						</div>
					</div>
					<!-- /이미지 미리보기 -->
					<img src="http://covid.i-web.kr/img/photo_upload.png" style="max-width:100%;" alt="이미지 업로드" class="photo_upload">

					
					<input type="file" name="upfile01" id="upfile01" onchange="ImgFileSizeChk('frm01',10,'01');">
				</label>

				<label>
					<!-- 이미지 미리보기 
					<div class="photo">
						<div id="imgViewArea" style="display:none;padding-top:10px;">
							<img id="imgArea" onerror="imgAreaError()" style="max-width:150px;max-height:196px;">
						</div>
					</div>
					<!-- /이미지 미리보기 -->
					<img src="http://covid.i-web.kr/img/photo_upload.png" style="max-width:100%;" alt="이미지 업로드" class="photo_upload">

					
					<input type="file" name="upfile01" id="upfile01" onchange="ImgFileSizeChk('frm01',10,'01');">
				</label>
			</div>

			<a href="#" class="more_btn">리뷰 등록</a>
		</div>
	</div>
</div>


<script>
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
<?
	include '../footer.php';
?>