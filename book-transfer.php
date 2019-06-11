<!DOCTYPE HTML>
<!--
	Cogent by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license		書籍管理
-->
<?php
  require_once("dbtools.php");
  function update_example($b, $start, $to)
  {
    $link = create_connection("127.0.0.1","ntust_librarysystem","M10702153","666");
    $sql = "UPDATE `book_copies` SET `BranchId`='$to' WHERE `BookId`='$b' AND `BranchId` = '$start' ";
    $result = $link->query($sql);
    $link->close();
  }
?>


<html>
	<head>
		<title>書籍轉移</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<!-- Header -->
		<header id="header">
				<h1><a id="logo" href="index2.php">Database<span> by M10702139 M10702153</span></a></h1>		
					<!--a href="#menu">Menu</a							標題一個可在同一個網頁--> 
				<nav id="nav">
					<ul>
						<!--li><a href="index.html">Home</a></li-->
						<li>
							<a href="#">功能</a>
							<ul>
								<li><a href="book-search.php">書籍管理</a>
								<ul>
										<li><a href="book-search.php">書籍查詢</a></li>
										<li><a href="book-new.php">書籍新增</a></li>
                                        <li><a href="book-return.php">書籍借閱與歸還</a></li>
								</ul>
							</li>
                            <li><a href="#">館藏管理</a>
                                <ul>
								    <li><a href="bookstate.php">館藏查詢</a></li>
                                    <li><a href="book-transfer">書籍轉館</a></li>
									</ul>
								</li>
								<li><a href="book-loan.php">借閱狀況</a></li>
							</ul>
						</li>
					</ul>			  
				</nav>				  
			</header>
                    <!-- Banner -->
                    <script>
                            function myFunction()
                            {
                                alert("轉書成功！");
                            }
                            </script>
					<section id="main" class="wrapper">
                                <div class="container box big">
	                            <form action="book-transfer.php" method="GET">
                                                <h2>書籍轉館</h2>
								<div class="3u">bookId</div>
								<div class="6u"><input type="text" name="BookId"></div>		
								<br>
								<div class="3u">原館位址</div>
								<div class="6u">
                                        <select id="BranchIdStart" name="BranchIdStart">
                                        　<option value="TPEL01">台北巿立圖書館總館</option>
                                        　<option value="TPEL02">台北巿立圖書館中正分館</option>
                                        　<option value="TPEL03">台北巿立圖書館中山分館</option>
                                        　<option value="TPEL04">台北巿立圖書館松山分館</option>
                                          <option value="TPEL05">台北巿立圖書館文山分館</option>
                                          <option value="TPEL06">台北巿立圖書館內湖分館</option>
                                        </select>
                                      </div>
								<br>
                                <div class="3u">轉館位址</div>
								<div class="6u">
                                        <select id="BranchId" name="BranchId">
                                        　<option value="TPEL01">台北巿立圖書館總館</option>
                                        　<option value="TPEL02">台北巿立圖書館中正分館</option>
                                        　<option value="TPEL03">台北巿立圖書館中山分館</option>
                                        　<option value="TPEL04">台北巿立圖書館松山分館</option>
                                          <option value="TPEL05">台北巿立圖書館文山分館</option>
                                          <option value="TPEL06">台北巿立圖書館內湖分館</option>
                                        </select>
                                      </div><br><div div class="2u$">
                                            <input value="確認" type="submit"  onclick="myFunction()">
                                          </div>
						  </div>
					  </form>
						</section>
			
			
								      <?php
     if(empty($_GET["BookId"]) == 0 || empty($_GET["BranchId"]) == 0 || empty($_GET["BranchIdStart"]) == 0){
      $b = $_GET["BookId"];
	  $s = $_GET["BranchIdStart"];
	  $t = $_GET["BranchId"]; 
      update_example($b,$s, $t); 
	  
	 }

       ?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container box big">		<!--做出一個大箱子裝資料-->

				</div>
			</section>

			
					<!-- Scripts -->
					<script src="assets/js/jquery.min.js"></script>
					<script src="assets/js/jquery.dropotron.min.js"></script>
					<script src="assets/js/jquery.scrollgress.min.js"></script>
					<script src="assets/js/skel.min.js"></script>
					<script src="assets/js/util.js"></script>
					<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
					<script src="assets/js/main.js"></script>
					

		
	</body>
</html>