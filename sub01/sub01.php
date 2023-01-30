<?
	include '../header.php';
?>

<div class="content_box">
	<div class="inr">
		<h2>
			ABOUT US
<!-- 			<p>서비스 소개</p> -->
		</h2>

		<div class="codi_slick_box" data-aos="fade-up" data-aos-duration="1000">
			<div class="thumbnail"><img src="/images/codi_thumbnail01.jpg"></div>
			<div class="thumbnail"><img src="/images/codi_thumbnail02.jpg"></div>
			<div class="thumbnail"><img src="/images/codi_thumbnail03.jpg"></div>
			<div class="thumbnail"><img src="/images/codi_thumbnail04.jpg"></div>
			<div class="thumbnail"><img src="/images/codi_thumbnail05.jpg"></div>
			<div class="thumbnail"><img src="/images/codi_thumbnail06.jpg"></div>
			<div class="thumbnail"><img src="/images/codi_thumbnail07.jpg"></div>
			<div class="thumbnail"><img src="/images/codi_thumbnail08.jpg"></div>
			<div class="thumbnail"><img src="/images/codi_thumbnail09.jpg"></div>
			<div class="thumbnail"><img src="/images/codi_thumbnail10.jpg"></div>
		</div>
	</div>
</div>

	<div class="work_area">
		<div id="workInr" class="inr">
			<h3 class="f48 txt_c p80 p_48 bolder fam_one_tit">STYLE 7 서비스는...</h3>
			<h4 class="f24 txt_c light" style="line-height:1.8;">
			√ 바쁜 여러분을 위해 옷을 고를 시간을 <br class="mo">단축시켜주는 서비스입니다.<br>
			√ 전문 스타일리스트가 여러분을 위해 <br class="mo">스타일링을 해 주는 서비스입니다 .</h4>

			<div class="ac_txt f42 fam_one_tit">
				<div class="ac_txt_line"></div>
				스타일링비 <span class="f52 bolder">7,700</span>원
			</div>

			<div class="spc_box" data-aos="fade-up" data-aos-duration="1000">
				<div class="inr-cont">
					<span class="icons"><img src="/images/spc_icon01.png" alt="스타일링"></span>
					<p class="f20">취향, 체형 등에 맞는<br>1:1 스타일링</p>
				</div>
				<div class="inr-cont">
					<span class="icons"><img src="/images/spc_icon02.png" alt="결제"></span>
					<p class="f20">집에서 입어보고<br>마음에 드는 옷만 결제</p>
				</div>
				<div class="inr-cont">
					<span class="icons"><img src="/images/spc_icon03.png" alt="수거"></span>
					<p class="f20">지정된 날짜/시간에<br>방문 수거</p>
				</div>
				<div class="inr-cont">
					<span class="icons"><img src="/images/spc_icon04.png" alt="스타일링비차감"></span>
					<p class="f20">5만원 이상 구매시<br>스타일링비 차감</p>
				</div>
			</div>
		</div>
	</div>

<div class="content_box">
	<div class="vs_area">
		<div class="inr">
			<div class="vs_model">

				<div class="imgs_box" data-aos="fade-right" data-aos-duration="1000">
					<div class="imgs">
						<div class="s_box"><img src="/images/vs_model01.jpg"></div>
						<div class="s_box"><img src="/images/vs_model02.jpg"></div>
						<div class="s_box"><img src="/images/vs_model03.jpg"></div>
						<div class="s_box"><img src="/images/vs_model04.jpg"></div>
						<div class="s_box"><img src="/images/vs_model05.jpg"></div>
						<div class="s_box"><img src="/images/vs_model06.jpg"></div>
					</div>
					<div class="imgs_blank"></div>
				</div>

				<div class="desc_box" data-aos="fade-left" data-aos-duration="1000">
					
					<img src="/images/logo_blk_big.png" alt="스타일세븐" id="logoBig">
					
					<div class="txt_box">
						<div class="desc_tit_box">
							<h5 class="fam_one_tit f36 normal">고민은 이제 그만,</h5>
							<div class="desc_tit fam_one_tit f42 m12">
								<div class="desc_tit_line"></div>
								내게 딱 맞는 스타일링 서비스
							</div>
						</div>
						<p class="f20 lh15 m28">
							간단한 스타일퀴즈 진행 후 전문 스타일리스트가<br>
							당신의 스타일을 분석하여 스타일링을 제안해드립니다.
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="fixed_bg_area">
	<p class="txt_c wt f42 bolder">
		옷, 더는 고민하지 마세요!
		<br>
		<span class="f20 wt m20 normal">여러분의 스타일을 분석해드립니다! Click!</span>
	</p>
	<a href="/styleQuiz.php" class="m36">스타일퀴즈 시작</a>
</div>

<script>
$(function(){
	$('.codi_slick_box').slick({
	  dots: false,
	  arrows:false,
	  infinite: true,
	  speed: 1500,
	  autoplay: true,
	  autoplaySpeed : 1000,
	  slidesToShow: 3,
	  adaptiveHeight : !0,

	  responsive: [ 
		{ breakpoint: 1280, // 화면의 넓이가 1280px 이상일 때 
			settings: { 
			slidesToShow: 3, 
			slidesToScroll: 1,
			adaptiveHeight: false,
		}}, 
		{ breakpoint: 800, // 화면의 넓이가 768px 이상일 때 
			settings: { 
			slidesToShow: 2, 
			slidesToScroll: 1,
			adaptiveHeight: false,
		}}, 
		{ breakpoint: 600, // 화면의 넓이가 380px 이상일 때 
			settings: { 
			slidesToShow: 1, 
			slidesToScroll: 1,
			adaptiveHeight: false,
		} 
		} 
	 ] 
	});

	 //스크롤 시 글자 형광펜 효과
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop(); 

		if( scrollTop >= $("#workInr").offset().top - $(window).height()/2){
			$("#workInr .ac_txt_line").addClass("show");
		}; 

		if( scrollTop >= $(".vs_area").offset().top - $(window).height()/2){
			$(".vs_area .desc_tit_line").addClass("show");
		}; 

	});

	//BG animation
       $(window).scroll(function(){

		var top = $(window).scrollTop();
		var wid = $(window).width();

		var con1=$('.vs_area').offset();
		  if (top>con1.top-400) {
			  $('.vs_area').addClass('on');
		  };
    });

	$('.imgs_box > .imgs').slick({
		slide: 'div.s_box',
		//infinite : true,
		slidesToShow : 1,		
		slidesToScroll : 1,	
		speed : 1000,	 
		arrows : false, 		
		dots : false, 		
		autoplay : true,	
		autoplaySpeed : 1000, 	
		pauseOnHover : true,		
		//fade:true,
	});

});
</script>

<?
	include '../footer.php';
?>