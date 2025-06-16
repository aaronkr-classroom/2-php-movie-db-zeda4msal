<?php // update.php 와 너무 비슷해
// movieDB 데이터베이스 접속
$db = mysqli_connect("localhost", "movie_user", "1234", "movieDB")
    or die("movieDB 데이터베이스 접속 실패!");

$title = $_POST['stitle'];

$sql = "SELECT * FROM movie WHERE title='" . $title . "';";
$result = mysqli_query($db, $sql);

if ($result) {
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>alert(해당 정보가 없습니다!);location.replace('index.php');</script>";
    }
}  else {
    $err_msg = mysqli_error($db);
    echo "<script>alert(SQL문 정보 조회 오류\\n 오류 내용: '$err_msg');</script>";
}

$row = mysqli_fetch_array($result);
$title = $row['title'];
$genre = $row['genre'];
$date = $row['date'];
$price = $row['price'];

mysqli_close($db);
?>

<!DOCTYPE html>
<html>
	<head><!-- 페이지 정보 -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- 제이쿼리 모바일 라이브러리 추가 -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.min.css" integrity="sha512-z2AFOVKBqcloFCT+Ugs0icqTfC8fBoGq2zP60MlESnL9CdusjEyVnNvHgs3RWtdMJxGkP0FDWfNp/puIP9CctA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.min.js" integrity="sha512-FbnNPigZZCDhMM22ezvan3xN2/E/oBd9GxqtpiBcK1VZuzBAt0V1EmTtteoYuYxWrqwqBA6zb1OTB887QSjAsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<title>Movie Web App | Delete</title>
	</head>
	<body><!-- 페이지 내용 -->
		<!--영화 정보 추가 화면 -->
		 <main data-role="page" id="page3">
			<header data-role="header" data-position="fixed" data-theme="b">
        	<a href="#" data-icon="back" data-rel="back">&larr; 뒤로 (Back)</a>
			<h1>영화 정보 삭제</h1>
			<a href="index.php" data-icon="home" data-iconpos="notext" class="ui-btn-right">영화 목록 (Home)</a>

            <nav data-role="navbar">
                <ul>
                    <li><a href="./insert.php">입력</a></li>
				    <li><a href="./update_select.php">수정</a></li>
				    <li><a href="./delete_select.php" class="ui-btn-active">삭제</a></li>
				    <li><a href="./select_all.php">전체 조회</a></li>
                    </ul>
                </nav>
			</header>

			<article data-role="content:>
            <h3>영화 정보 삭제</h3>
                <form name="form3-1" method="POST" action="delete_result.php" data-ajax="false">
                    <div class="ui-body ui-body-a">
                        <label>장르: </label>
                        <select name="genre" data-native-menu="false" data-mini="true" data-inline="true" id="genre">
                            <option value="<?php echo $genre; ?>"<?php echo $genre; ?></option>
                            <option value="액선">액션</option>
                            <option value="코미디">코미디</option>
                            <option value="로맨스">로맨스</option>
                            <option value="스릴러">스릴러</option>
                            <option value="SF">SF</option>
                            <option value="판타지">판타지</option>
                            <option value="공포">공포</option>
                            <option value="드라마">드라마</option>
                            <option value="다큐멘터리">다큐멘터리</option>
                            <option value="애니메이션">애니메이션</option>
                            <option value="기타">기타</option>
                        </select>
                        <label>영화명: </label>
                        <input type="text" name="title" id="title" value="<?php echo $title; ?>" data-mini="true data-inline="true">
                        <label>상영날짜 (yyyy-mm-dd): </label>
                        <input type="date" name="date" id="date" value=<? echo $date; ?> data-mini="true data-inline="true">
                        <label>관람료: </label>
                        <input type="number" name="price" id="price" value=<? echo $price; ?> data-mini="true data-inline="true">                        
                    </div>

                    <div class="ui-body">
                        <fieldset class="ui-grid-a">
                            <div class="ui-block-a">
                                <input type="submit" value="삭제" data-mini="true">
                            </div>
                            <div class="ui-block-b"  
                                <input type="reset" value="취소" data-mini="true">                              
                            </div>  
                        </fieldset>
                    </div>
                </form>
			</article>

			<footer data-role="footer" data-position="fixed" data-theme="b">
				<h4>&copy; 2025 DJU Database</h4>
			</footer>
		 </main>
	</body>
</html>