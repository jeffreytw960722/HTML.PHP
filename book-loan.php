<!DOCTYPE HTML>
<html>
	<head>
		<title>書籍新增</title>
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
					<section id="banner">
							<header class="major ">
					  <form action="book-loan.php" method="GET">
                            <div class="inner">
									<h2>借閱狀況</h2>
								</div>
						<div class="row">
              <div class="2u">
								<br>
              </div>
              <div class="7u">
                <select id="BranchId" name="BranchId">
                　<option value="TPEL01">台北巿立圖書館總館</option>
                　<option value="TPEL02">台北巿立圖書館中正分館</option>
                　<option value="TPEL03">台北巿立圖書館中山分館</option>
                　<option value="TPEL04">台北巿立圖書館松山分館</option>
                  <option value="TPEL05">台北巿立圖書館文山分館</option>
                  <option value="TPEL06">台北巿立圖書館內湖分館</option>
                </select>
              </div>
			  <div class="2u$">
 						<input value="確認" type="submit" >
                                          </div>
						  </div>
					  </form>
						</section>


		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container box big">		<!--做出一個大箱子裝資料-->
				<?php
  require_once("dbtools.php");
  
  function select_example($lib)
  {
    $link = create_connection("127.0.0.1","ntust_librarysystem","M10702153","666");
    $sql = "SELECT a.*, b.* FROM `book_loans` as a LEFT JOIN `book` as b on a.BookId = b.BookId where `BranchId` = '$lib'";
	
	
    $result = $link->query($sql);


    if ($result->num_rows > 0)
    {
      echo "<table><tr><th>ISBN</th><th>書名</th><th>CardNo</th><th>租借日期</th><th>還書期限</th></tr>";
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td>".$row["BookId"]."</td><td>".$row["Title"]."</td><td>".$row["CardNo"]."</td> <td>".$row["DateOut"]."</td><td>".$row["DueDate"]."</td></tr>";
      }
      echo "</table>";
    }
    else
    {
    echo "0 results";
    }
    $link->close();
  }

?>
				</div>
			</section>

			<?php
	  if(empty($_GET["BranchId"]) == 0  ){
	  $b = $_GET["BranchId"];
      select_example($b);
	  
	  }
    ?>
			
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