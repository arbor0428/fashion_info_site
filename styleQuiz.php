<?
	include 'header.php';
?>

<style>
.inr .typing-txt {display: none;}
.inr .typing {display: inline-block; animation-name: cursor; animation-duration: 0.3s; animation-iteration-count: infinite; font-size:2.625rem; color:#231815 !important;} 

.quiz_bnr_container {display:flex; margin-top:80px;}
.quiz_bnr_container .quiz_bnr {position:relative; flex-grow: 0; flex-shrink: 0; flex-basis: 50%; text-align:center;cursor:pointer;}
.quiz_bnr_container .quiz_bnr:hover {margin-top:-20px;  transition:all .2s ease;}
.quiz_bnr_container .quiz_bnr:hover a.bt, .quiz_bnr_container .quiz_bnr .btns > a.bt:hover {background:#152f79 !important; transition:.2s;}
.quiz_bnr_container .quiz_bnr .btns > a.bt {display:inline-block; min-width:220px; padding:12px 0; margin-top:40px; border-radius:50px; background:#1a3c93; color:#fff; font-size:1.125rem;}


@media screen and (max-width:590px){
.quiz_bnr_container {flex-direction:column; margin-top:40px;}
.quiz_bnr_container .quiz_bnr {padding:4%; box-sizing:border-box;}
.quiz_bnr_container .quiz_bnr:hover {margin-top:0 !important;}
}
</style>

<div class="content_box">
	<div class="inr">
		<div class="txt_c">
			<p class="typing-txt">여러분의 스타일을 분석해 드립니다.</p>
			<p class="typing"></p> 

			<p class="f32 bolder blu_01 m20">LET’S GET STARTED!</p>
		</div>

		<div class="quiz_bnr_container">
			<div class="quiz_bnr">
				<a onclick="$('#QuizWoman').click();">
					<div class="imgs"><img src="/images/woman_bnr.png" alt="스타일퀴즈 for Woman"></div>
					<div class="btns">
						<a onclick="$('#QuizWoman').click();" class="bt">스타일퀴즈<br>for WOMAN</a>
					</div>
				</a>
			</div>
			<div class="quiz_bnr">
				<a onclick="$('#QuizMan').click();">
					<div class="imgs"><img src="/images/man_bnr.png" alt="스타일퀴즈 for man"></div>
					<div class="btns">
						<a onclick="$('#QuizMan').click();" class="bt">스타일퀴즈<br>for MAN</a>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- typeform button -->
<?if($GBL_USERID){?>
<button id="QuizMan" data-tf-popup="xdzP1HI4" data-tf-iframe-props="title=for MAN 재신청" data-tf-medium="snippet" style="display:none;"></button>
<button id="QuizWoman" data-tf-popup="hDUsneW5" data-tf-iframe-props="title=for WOMAN 재신청" data-tf-medium="snippet" style="display:none;"></button>
<?}else{?>
<button id="QuizMan" data-tf-popup="z3G29UQt" data-tf-iframe-props="title=for MAN 회원가입" data-tf-medium="snippet" style="display:none;"></button>
<button id="QuizWoman" data-tf-popup="SUHNpBLw" data-tf-iframe-props="title=for WOMAN 회원가입" data-tf-medium="snippet" style="display:none;"></button>
<?}?>
<script src="//embed.typeform.com/next/embed.js"></script>
<!-- //typeform button -->



<script>
var typingBool = false; 
    var typingIdx=0; 
    var typingTxt = $(".typing-txt").text(); // 타이핑될 텍스트를 가져온다 
    typingTxt=typingTxt.split(""); // 한글자씩 자른다. 
    if(typingBool==false){ // 타이핑이 진행되지 않았다면 
       typingBool=true; 
       
       var tyInt = setInterval(typing,100); // 반복동작 
     } 
     
     function typing(){ 
       if(typingIdx<typingTxt.length){ // 타이핑될 텍스트 길이만큼 반복 
         $(".typing").append(typingTxt[typingIdx]); // 한글자씩 이어준다. 
         typingIdx++; 
       } else{ 
         clearInterval(tyInt); //끝나면 반복종료 
       } 
     }  
/*
	$(function(){
		$(".btns .bt").click(function(){
			alert('서비스 준비중 입니다 :)');
		});
	});
*/
</script>


<?
	include 'footer.php';
?>