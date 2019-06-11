<!DOCTYPE HTML>
<!--
	Cogent by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license		書籍管理
-->
<?php
		require_once("dbtools.php");
	$K;
		if(!empty($_GET["key"])){
			$K=$_GET["key"];
		}
		else{
			echo "have some error";
		}
?>
<html>
	<head>
		<title>館藏查詢-台北市立圖書館<?php
			switch($K)
			{
				case "TPE01":
					echo "總館";
					break;
				case "TPE02":
					echo "中正分館";
					break;
				case "TPE03":
					echo "中山分館";
					break;
				case "TPE04":
					echo "松山分館";
					break;
				case "TPE05":
					echo "文山分館";
					break;
				case "TPE06":
					echo "內湖分館";
					break;
			}
		?>
		</title>

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
				<h1><a id="logo" href="index.php">Database<span> by M10702139</span></a></h1>		
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
                                        <li><a href="book-return.php">書籍歸還</a></li>
								</ul>
							</li>
                            <li><a href="#">館藏管理</a>
                                <ul>
                                    <li><a href="library-search.php?key=TPE01">台北市立圖書館-總館</a></li>
                                    <li><a href="library-search.php?key=TPE02">台北巿立圖書館中山分館</a></li>
                                    <li><a href="library-search.php?key=TPE03">台北巿立圖書館中正分館</a></li>
                                    <li><a href="library-search.php?key=TPE04">台北巿立圖書館松山分館</a></li>
                                    <li><a href="library-search.php?key=TPE05">台北巿立圖書館文山分館</a></li>
                                    <li><a href="library-search.php?key=TPE06">台北巿立圖書館內湖分館</a></li>
									</ul>
								</li>
								<li><a href="book-loan.php">借閱狀況</a></li>
							</ul>
						</li>
					</ul>			  
				</nav>				  
			</header>
					<!-- Banner -->
                    <section id="main" class="wrapper">
                            <div class="container box big">
            
                                <header class="major special">
                                    <h2>館藏資訊</h2>
                                </header>
                                <a href="#" class="image fit"><img src="總館.jpg" alt="" /></a>
                                <div class="6u">
                                <div class = "3u$">
                                    <ul class="action vertical small">
                                        <li>
                                            <a href = "book-transfer.php" class="button special fit" >書籍轉館</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
							<?php

							function select_store()
							{
								$link = create_connection("127.0.0.1","ntust_librarysystem","M10702153","666");
								$sql = "SELECT * FROM `library_branch` ORDER BY `Address` ASC";
								$result = $link->query($sql); 	//進SQL拿資料 
									switch($K)
									{
										case  "TPE01":
											if ($result->num_rows > 0)
											{
											echo "<table><tr><th>書籍編號</th><th>書名</th></tr>";	//tr means 1 slot of table  th is title and td is elements
											while($row = $result->fetch_assoc())
											{
												echo "<tr><td>".$row["BookId"]."</td><td>".$row["Title"]."</td></tr>";
											}
											echo "</table>";
											}
											else
											{
											echo "0 results";
											}
											$link->close();
											break;	
										case  "TPE02":
											if ($result->num_rows > 0)
											{
												echo "<table><tr><th>書籍編號</th><th>書名</th></tr>";	//tr means 1 slot of table  th is title and td is elements
											while($row = $result->fetch_assoc())
											{
												echo "<tr><td>".$row["BookId"]."</td><td>".$row["Title"]."</td></tr>";
											}
											echo "</table>";
											}
											else
											{
											echo "0 results";
											}
											$link->close();
											break;
										case "TPE03":
											if ($result->num_rows > 0)
											{
											echo "<table><tr><th>書籍編號</th><th>書名</th></tr>";	//tr means 1 slot of table  th is title and td is elements
											while($row = $result->fetch_assoc())
											{
												echo "<tr><td>".$row["BookId"]."</td><td>".$row["Title"]."</td></tr>";
											}
											echo "</table>";
											}
											else
											{
											echo "0 results";
											}
											$link->close();
											break;
										case  "TPE04":
											if ($result->num_rows > 0)
											{
											echo "<table><tr><th>書籍編號</th><th>書名</th></tr>";	//tr means 1 slot of table  th is title and td is elements
											while($row = $result->fetch_assoc())
											{
												echo "<tr><td>".$row["BookId"]."</td><td>".$row["Title"]."</td></tr>";
											}
											echo "</table>";
											}
											else
											{
											echo "0 results";
											}
											$link->close();
											break;
										case  "TPE05":
											if ($result->num_rows > 0)
											{
											echo "<table><tr><th>書籍編號</th><th>書名</th></tr>";	//tr means 1 slot of table  th is title and td is elements
											while($row = $result->fetch_assoc())
											{
												echo "<tr><td>".$row["BookId"]."</td><td>".$row["Title"]."</td></tr>";
											}
											echo "</table>";
											}
											else
											{
											echo "0 results";
											}
											$link->close();
											break;
										case  "TPE06":
											if ($result->num_rows > 0)
											{
											echo "<table><tr><th>書籍編號</th><th>書名</th></tr>";	//tr means 1 slot of table  th is title and td is elements
											while($row = $result->fetch_assoc())
											{
												echo "<tr><td>".$row["BookId"]."</td><td>".$row["Title"]."</td></tr>";
											}
											echo "</table>";
											}
											else
											{
											echo "0 results";
											}
											$link->close();
											break;
									}
							}
							?>
                            </div>
                        </section>
		<!-- Footer -->
        <div id="footer">
                <div class="container">
				<?php

  function select_address()
  {
    $link = create_connection("127.0.0.1","ntust_librarysystem","M10702153","666");
    $sql = "SELECT * FROM `library_branch` ORDER BY `Address` ASC";
    $result = $link->query($sql); 	//進SQL拿資料 

    if ($result->num_rows > 0)
    {
      echo "<table><tr><th>分館</th><th>地址</th></tr>";	//tr means 1 slot of table  th is title and td is elements
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td>".$row["BranchName"]."</td><td>".$row["Address"]."</td></tr>";
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
			</div>
			
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