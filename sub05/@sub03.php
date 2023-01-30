<?
	include '/home/cbnu01/www/header.php';
	$side_menu=3;
?>
<script>
	function file_down(m){

		//AI
		if(m == 1){
			file_name = 'cbnu.pdf';
			file_rename = '충북대 2020정시대학원입학전형_기본계획(공지).pdf';
		}else if(m == 2){
			file_name = 'ut.pdf';
			file_rename = '2020학년도 대학입학전형 기본계획.pdf';
		}


		form02 = document.frm_down;
		form02.file_rename.value = file_rename;
		form02.file_name.value = file_name;
		form02.target = '';
		form02.submit();
	}
</script>

<form name='frm_down' method='post' action='/module/download.php'><!-- 다운로드 폼 -->
<input type='hidden' name='file_name' value="">
<input type='hidden' name='file_rename' value="">
</form>

<div style='width:100%;height:50px;border-bottom:1px solid #d1d1d1;'>
		<div style='width:1100px;height:50px;margin:0 auto;'>
			<a href="/"><div style='width:38px;height:50px;line-height:50px;padding-left:20px;color:#666666;float:left;border-left:1px solid #d1d1d1;'><i class="fas fa-home" style="line-height:50px;"></i></div></a>
			<div style='width:140px;height:50px;line-height:50px;padding-left:20px;color:#666666;float:left;border-left:1px solid #d1d1d1;'>학사안내</div>
			<div style='width:130px;height:50px;line-height:50px;padding-left:20px;color:#666666;float:left;border-left:1px solid #d1d1d1;border-right:1px solid #d1d1d1;'>입학안내</div>
			<div style='width:130px;height:50px;line-height:50px;padding-left:20px;color:#666666;float:right;border-right:1px solid #d1d1d1;'></div>
		</div>
</div>

<div style='width:100%;padding:30px 0;background:#fafafa;border-bottom:1px solid #dddddd;'>
	<div style='width:1100px;margin:0 auto' class='clearfix'>
		
		<?
			include 'sidemenu.php';
		?>
		<div class='content_box'>
			<div class='content_title'>입학안내</div>
			<ul class="sub-tab">
				<li class="tab1 on"><span>충북대학교</span></li>
				<li class="tab2"><span>한국교통대학교</span></li>
			</ul>
			<!--충북대모집요강-->
			<div class="info tab1 on">
				<div class="recruit_file">
					<div>충북대 일반대학원 모집요강 다운로드</div>
					<div class="up01 upload"><a href="javascript:file_down(1)" title="PDF다운로드"><i class="fas fa-download" style="margin-right:10px;"></i>PDF 다운로드</a></div>
				</div>
				<div class="subtit" style="margin-top:50px;">
					<div class="list_ico" style="width:25px;height:25px;background:url(/images/title_ico.png);"></div>
					<div class="names">2020년 후기 정시 대학원(일반대학원)전형일정</div>
				</div>
				<table width="95%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border:none;" class="recruit_tbl">
					<tr>
						<th>구 분</th>
						<th>전형유형 및 일정</th>
						<th>비 고</th>
					</tr>

					<tr>
						<td>
							 모집과정
						</td>
						<td>
							 <p>가. <strong>석사과정</strong><br><font style="font-size:15px; color:#666;">(일반전형/ 학과간협동과정/ 학연산협동과정/ 정부위탁생특별전형)</font></p>
							 <p style="margin-top:5px;">나. <strong>박사과정</strong><br><font style="font-size:15px; color:#666;">(일반전형/ 학과간협동과정/ 학연산협동과정)</font></p>
							 <p style="margin-top:5px;">다. <strong>석.박사통합과정</strong><br><font style="font-size:15px; color:#666;">(일반전형/ 학과간협동과정)</font></p>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							원서접수
						</td>
						<td>
							2019. 11. 6.(수) ~ 11. 15.(금) (10일간) (인터넷접수)
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							입학고사
						</td>
						<td>
							<p>- 면접.전공구술고사: 전(全) 학과(부)</p>
							<p style="margin-top:5px;">- 전공필기고사: 심리학과
							<br><font style="font-size:14px; color:#666; color:#de2500;">* 전공필기고사 시험과목 안내자료는 2019. 7. 15.(월) 경 별도 공지(예정)</font></p>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							합격자 발표
						</td>
						<td>2019. 12. 20.(금) 이전</td>
						<td></td>
					</tr>
					<tr>
						<td>
							등록금납부
						</td>
						<td>2020. 1. 20.(월) ~ 1. 23.(목) (은행영업시간 내)</td>
						<td></td>
					</tr>
				</table>
				<p style="margin-top:20px; margin-left:20px; font-size:14px; font-weight:600; color:#de2500;">
					※유의사항: 모집요강은 우리대학의 사정에 따라 변경(조정)될 수 있으며, </p>
				<p style="text-indent:95px; font-size:14px; font-weight:600; color:#de2500;">최종 확정된 사항은 2019년 10월초 공지예정인 모집요강에서 확인요망</p>
				<p style="margin-top:20px;margin-left:20px; color:#666; font-size:14px; font-weight:600;">
					문 의 처: 충북대학교 입학본부 입학과(043-261-3828) 
					<a href="https://ipsi.chungbuk.ac.kr/gra.do" target="blank"><span style="background:#aaa;color:#fff; padding:5px; border-radius:5px;" title="충북대입학안내페이지">홈페이지 바로가기</span></a>
				</p>
			</div>
			<!--교통대모집요강-->
			<div class="info tab2">
				<div class="recruit_file">
					<div>한국교통대 모집요강 다운로드</div>
					<div class="up02 upload"><a href="javascript:file_down(2)"  title="PDF다운로드"><i class="fas fa-download" style="margin-right:10px;"></i>PDF 다운로드</a></div>
				</div>
				<div class="subtit" style="margin-top:50px;">
					<div class="list_ico" style="width:25px;height:25px;background:url(/images/title_ico.png);"></div>
					<div class="names">2020년 후기 정시 대학원(일반대학원)전형일정</div>
				</div>
				<table width="95%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border:none;" class="recruit_tbl_02">
					<tr>
						<th>구분</th>
						<th>전형일정</th>
						<th width='190'>비고</th>
					</tr>
					<tr>
						<td colspan='3' style="background:#f8f8f8; text-align:center; font-weight:600;">수 시 모 집</td>
					</tr>
					<tr>
						<td>원서접수</td>
						<td >2019. 09. 06.(금) ~ 09. 10.(화) (5일간) </td>
						<td></td>
					</tr>
					<tr>
						<td>전형기간</td>
						<td >2019. 09. 11.(수) ~ 12. 09.(월) (90일간) </td>
						<td></td>
					</tr>
					<tr>
						<td>합격자발표</td>
						<td >2019. 12. 10.(화)까지</td>
						<td></td>
					</tr>
					<tr>
						<td>합격자등록</td>
						<td >2019. 12. 11.(수) ~ 12. 13.(금) (3일간) </td>
						<td></td>
					</tr>
					<tr>
						<td>수시미등록충원<br>합격통보마감</td>
						<td >2019. 12. 19.(목) (합격자발표 21시 까지)</td>
						<td></td>
					</tr>
					<tr>
						<td>수시미등록충원<br>등록마감</td>
						<td >2019. 12. 20.(금)</td>
						<td></td>
					</tr>
					<tr>
						<td colspan='3' style="background:#f8f8f8; text-align:center; font-weight:600;">정 시 모 집</td>
					</tr>
					<tr>
						<td width="150">원서접수</td>
						<td>2019. 12. 26.(목) ~ 2019. 12. 31.(화) (6일간) </td>
						<td></td>
					</tr>
					<tr>
						<td >전형기간</td>
						<td>
							가군 2020. 01. 02.(목) ~ 01. 10.(금) (9일간)<br>
							나군 2020. 01. 11.(토) ~ 01. 19.(일) (9일간)
						</td>
						<td style="letter-spacing:-0.8px;">실기고사 일정은<br>전형기간 내 추후공지</td>
					</tr>
					
					<tr>
						<td >합격자발표</td>
						<td>2020. 02. 04.(화)까지</td>
						<td></td>
					</tr>
					<tr>
						<td >합격자등록</td>
						<td>2020. 02. 05.(수) ~ 02. 07.(금) (3일간) </td>
						<td></td>
					</tr>
					<tr>
						<td >정시미등록충원<br>합격자통보마감</td>
						<td>2020. 02. 17.(월) (합격자 발표 21시 까지)</td>
						<td></td>
					</tr>
					<tr>
						<td >정시미등록충원<br>등록마감</td>
						<td>2020. 02.18.(화)</td>
						<td></td>
					</tr>
					<tr>
						<td colspan=4 style="background:#f8f8f8; text-align:center; font-weight:600;">추 가  모 집</td>
					</tr>
					<tr>
						<td >원서접수&전형일&<br>합격자발표</td>
						<td>2020. 02. 20.(목) ~ 27.(목) 21시까지</td>
						<td></td>
					</tr>
					<tr>
						<td >등록기간</td>
						<td>2020. 02. 28.(금)</td>
						<td></td>
					</tr>
				</table>
				<p style="margin-top:20px; margin-left:20px; font-size:14px; font-weight:600; color:#de2500;">
					※ 재외국민과 외국인전형은 수시 및 정시모집 기간과 동일하게 전형 운영</p>
				<p style="margin-left:20px; font-size:14px; font-weight:600; color:#de2500;">
					※ 상기일정 외 전형기간 세부일정은 향후 공지되는 모집요강을 참고하시기 바랍니다.
					<a href="http://www.ut.ac.kr/ipsi.do" target="blank"><span style="background:#aaa;color:#fff; padding:5px; border-radius:5px;" title="한국교통대입학안내페이지">홈페이지 바로가기</span></a>
				</p>
			</div>
		</div>
	</div>
</div>
<?
	include '/home/cbnu01/www/footer.php';
?>