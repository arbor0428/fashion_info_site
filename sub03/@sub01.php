<?
	include '../header.php';
?>


<script>
	function imgPop(obj){
		img = obj.src;
		document.getElementById("multiFrame").innerHTML = "<img style='width:700px; height: auto;' src='"+img+"'>";
		$("#multi_ttl").text("포토 리뷰");
		$(".multiBox_open").click();
	}
</script>



<div class='content_box'>
	<div class="inr">
		<h2 class="m_50">
			REVIEW
<!-- 			<p>고객 리뷰</p> -->
		</h2>

		<div class="review-list-container" data-aos="fade-up" data-aos-duration="800">
			<div class="review_container">
				<!--작성자 및 별점 -->
				<div class="score_container">
					<div class="review_user_name">이**</div>
					<div class="score_05">
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
					</div>
				</div>
				<!--//작성자 및 별점 -->

				<div class="ment-container">
					요즘 같은 비대면 시대에 정말 유용한 서비스 인 것 같아요^^ 매우 만족입니다!
				</div>

				<!-- 포토 -->
				<div class="photo_container">
					<div class="photo_box">
						<img class="photo_img" src="/images/photo_sample.jpg" onclick="imgPop(this);">
						<img class="photo_img" src="/images/photo_sample2.jpg" onclick="imgPop(this);">
					</div>
				</div>
				<!--//포토 -->
				<div class="review_date_text">2022-01-01</div>
			</div>
		</div>

		<div class="review-list-container" data-aos="fade-up" data-aos-duration="1000">
			<div class="review_container">
				<!--작성자 및 별점 -->
				<div class="score_container">
					<div class="review_user_name">이**</div>
					<div class="score_05">
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
					</div>
				</div>
				<!--//작성자 및 별점 -->

				<div class="ment-container">
					제가 결정장애가 있어서... 옷을 사러 가게 되면 고르지 못해 난감한데,
					스타일 7에서 코디제안을 해주시니까 집에서 편하게 입어보고 고를 수 있어서 정말 편리합니다.
				</div>

				<!-- 포토 -->
				<div class="photo_container scroll">
					<div class="photo_box">
						<img class="photo_img" src="/images/photo_sample3.jpg" onclick="imgPop(this);">
						<img class="photo_img" src="/images/photo_sample4.jpg" onclick="imgPop(this);">
						<img class="photo_img" src="/images/photo_sample5.jpg" onclick="imgPop(this);">
						<img class="photo_img" src="/images/photo_sample6.jpg" onclick="imgPop(this);">
						<img class="photo_img" src="/images/photo_sample7.jpg" onclick="imgPop(this);">
					</div>
				</div>
				<!--//포토 -->
				<div class="review_date_text">2022-01-01</div>
			</div>
		</div>

		<div class="review-list-container" data-aos="fade-up" data-aos-duration="1000"> 
			<div class="review_container">
				<!--작성자 및 별점 -->
				<div class="score_container">
					<div class="review_user_name">이**</div>
					<div class="score_05">
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
						<div><img src="/images/star.png" alt="star"></div>
					</div>
				</div>
				<!--//작성자 및 별점 -->

				<div class="ment-container">
					데이트할 때 스타일7에서 코디제안 받은 옷으로 입고 나갔더니 여자친구가 스타일이 좋아졌다며 칭찬해주네요 ㅎㅎㅎ
					덕분에 30년만에 제 스타일을 찾았고 자신감도 올라간듯 합니다. 종종 이용할게요!!
				</div>

				<!-- 포토 -->
				<div class="photo_container">
					<div class="photo_box">
						<img class="photo_img" src="/images/photo_sample8.jpg" onclick="imgPop(this);">
						<img class="photo_img" src="/images/photo_sample9.jpg" onclick="imgPop(this);">
					</div>
				</div>
				<!--//포토 -->
				<div class="review_date_text">2022-01-01</div>
			</div>
		</div>


	</div>
</div>


<?
	include '../footer.php';
?>