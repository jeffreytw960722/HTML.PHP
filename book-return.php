<!DOCTYPE HTML>
<!--
	Cogent by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license		書籍管理
-->

<?php
  require_once("dbtools.php");
 
  function update_example($bi, $card, $book)
  {
    $link = create_connection("127.0.0.1","ntust_librarysystem","M10702153","666");
    $sql = "UPDATE `book_loans` SET `BookId`='$book',`BranchId`='$bi',`CardNo`='$card', `DateOut`= '2019/06/04', `DueDate`= '2019/07/02'  WHERE `BookId`='$book'";
   $result = $link->query($sql);

    if ($result === TRUE) {
      echo "insert successful";
    }
    else {
      echo "Error: " . $sql . "<br>" . $result->error;
    }
    $link->close();
  }
  
  function insert_example($bi, $card, $book)
  {
    $link = create_connection("127.0.0.1","ntust_librarysystem","M10702153","666");
     $sql = "INSERT INTO `book_loans` (`BookId`, `BranchId`, `CardNo`, `DateOut`, `DueDate`) VALUES ('$book', '$bi', '$card', '2019/06/11', '2019/07/02')";
    $result = $link->query($sql);


    $link->close();
  }
  
  function delete_example($card)
  {
    $link = create_connection("127.0.0.1","ntust_librarysystem","M10702153","666");
    $sql = "DELETE FROM `book_loans` WHERE `CardNo`='$card'";
    $result = $link->query($sql);

    if ($result === TRUE) {
      echo "成功歸還";
    }
    else {
      echo "Error: " . $sql . "<br>" . $result->error;
    }
    $link->close();
  }
  
  function select_example($bi, $card)
  {
    $link = create_connection("127.0.0.1","ntust_librarysystem","M10702153","666");
    $sql = "SELECT * FROM `book_loans` where `CardNo` = '$card' and `BranchId` = '$bi'";

    $result = $link->query($sql);
	
    if ($result->num_rows > 0)
    {
      echo "<table><tr><th>ISBN</th><th>所在分館</th><th>使用者</th><th>租借日期</th><th>歸還日期</th></tr>";
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td>".$row["BookId"]."</td> <td>".$row["BranchId"]."</td><td>".$row["CardNo"]."</td><td>".$row["DateOut"]."</td><td>".$row["DueDate"]."</td></tr>";
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
<html>

	<head>
		<title>書籍歸還</title>
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
                                alert("還書成功！");
                            }
                            </script>
					<section id="banner">
							<header class="major ">
					  <form action="book-return.php" method="GET">
                            <div class="inner">
									<h2>書籍借閱與歸還</h2>
								</div>
						<div class="row">
            <div class="1u">
              <br/>
                          </div>
            <div class="2u">
                <select id="choose_func" name="choose_func">
                  <option value="borrow">借書</option>
                　<option value="return" >還書</option>
                </select>
              </div>
              <div class="6u">
                <select id="BranchId" name="BranchId">
                　<option value="TPEL01">台北巿立圖書館總館</option>
                　<option value="TPEL02">台北巿立圖書館中正分館</option>
                　<option value="TPEL03">台北巿立圖書館中山分館</option>
                　<option value="TPEL04">台北巿立圖書館松山分館</option>
                  <option value="TPEL05">台北巿立圖書館文山分館</option>
                  <option value="TPEL06">台北巿立圖書館內湖分館</option>
                </select>
              </div>
              <br/><br/>
								<div class="3u">BookId</div>
								<div class="6u"><input type="text" name="BookId"></div>		
								<br>
								<br>
								<div class="3u">Card ID</div>
                                <div class="6u"><input type="text" name="CardNo"></div>		
                                <div div class="2u$">
                                            <input value="確認" type="submit" onclick="myFunction()">
                                          </div>
						  </div>
					  </form>
						</section>
			<section id="main" class="wrapper">
				<div class="container box big">		<!--做出一個大箱子裝資料-->
						    <?php
	if(empty($_GET["choose_func"]) == 0){
	  if($_GET["choose_func"]=="borrow"){
	  if(empty($_GET["CardNo"]) == 0 || empty($_GET["BookId"]) == 0 ){
      $bi = $_GET["BranchId"];
	  $c = $_GET["CardNo"];
	  $b = $_GET["BookId"]; 
      insert_example($bi, $c, $b);
      select_example($bi, $c);  
	  }
	  }
	  
	  if($_GET["choose_func"]=="return"){
		  	  if(empty($_GET["CardNo"]) == 0 ){
				  	  $c = $_GET["CardNo"];
					  delete_example($c);
			  }
	  }
	}
	  
    ?>
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