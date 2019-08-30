<?php 
	session_start();
	include "MySQLDB.php";
	include "db.php";
	if($_SESSION["username"] == ''){
		header("Location: login.php");
	}
	$id = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "socialapp"); 
	if ($link == false) { 
		die("ERROR: Could not connect. ".mysqli_connect_error()); 
	}
	function postIdNotExits() { 
		$id = $_SESSION['username'];
		$link = mysqli_connect("localhost", "root", "", "socialapp"); 
		if ($link == false) { 
			die("ERROR: Could not connect. ".mysqli_connect_error()); 
		}
		$sql = "SELECT ID FROM socialfeatures ORDER BY ID DESC LIMIT 1";
		if ($getId = mysqli_query($link, $sql)) { 
			if ( mysqli_num_rows($getId) > 0) { 
					$row = $getId->fetch_assoc();
					$lastid = $row['ID'] + 1;
					$unique_query = "SELECT * FROM socialfeatures where User_ID = $id";
					if ($getrecord = mysqli_query($link, $unique_query)) { 
						if ( mysqli_num_rows($getrecord) > 0) { 
						} else {
							$insertnewUserrecord = "insert into socialfeatures values ($lastid,'0','0', '0', '0','0', '$id','1')";
							mysqli_query($link,$insertnewUserrecord);
						}
					}	
			} else { 
				$sql = "insert into socialfeatures values ('1','0','0', '0', '0','0', '$id','1')";
				mysqli_query($link,$sql);
			}
		}
	}
	if($_SERVER['REQUEST_METHOD'] == "POST") { 
		if(isset($_POST['postlike'])) { 
			postIdNotExits();
			$id = $_SESSION['username'];
			$sql = "UPDATE socialfeatures SET postlike = '1', postdislike = '0' WHERE User_ID = $id;";
			mysqli_query($link,$sql);
			$getrecord = "SELECT * FROM createpost";
			if ($getrecord_row = mysqli_query($link, $getrecord)) { 
				if ( mysqli_num_rows($getrecord_row) > 0) { 
						$row = $getrecord_row->fetch_assoc();
						$totallike = $row['postlike'] + 1;
						if($row['postdislike'] == 0 ){ 
							$totadilike = 0;
						} else { 
							$totadilike = $row['postdislike'] - 1;
						}
						$unique_query = "UPDATE createpost SET postlike = $totallike ,postdislike = $totadilike";
						mysqli_query($link,$unique_query);
				} 
			}		
		}
		if(isset($_POST['postDislike'])) { 
			postIdNotExits();
			$id = $_SESSION['username'];
			$sql = "UPDATE socialfeatures SET postdislike = '1', postlike = '0' WHERE User_ID = $id;";
			mysqli_query($link,$sql);
			$getrecord = "SELECT * FROM createpost";
			if ($getrecord_row = mysqli_query($link, $getrecord)) { 
				if ( mysqli_num_rows($getrecord_row) > 0) { 
						$row = $getrecord_row->fetch_assoc();
						$totadilike = $row['postdislike'] + 1;
						if($row['postlike'] == 0 ) { 
							$totallike = 0;
						} else { 
							$totallike = $row['postlike']  - 1;
						}
						$unique_query = "UPDATE createpost SET postlike = $totallike, postdislike = $totadilike";
						mysqli_query($link,$unique_query);
				} 
			}
		}
		if(isset($_POST['postlove'])) {
			postIdNotExits();
			$id = $_SESSION['username'];
			$sql = "UPDATE socialfeatures SET postlove = '1'  WHERE User_ID = $id;";
			mysqli_query($link,$sql);
			$getrecord = "SELECT * FROM createpost";
			if ($getrecord_row = mysqli_query($link, $getrecord)) { 
				if ( mysqli_num_rows($getrecord_row) > 0) { 
						$row = $getrecord_row->fetch_assoc();
						$totallovethispost = $row['postlove'] + 1;
						$unique_query = "UPDATE createpost SET postlove = $totallovethispost";
						mysqli_query($link,$unique_query);
				} 
			}
		}
		if(isset($_POST['postangry'])) {
			postIdNotExits();
			$id = $_SESSION['username'];
			$sql = "UPDATE socialfeatures SET postangry = '1' WHERE User_ID = $id;";
			mysqli_query($link,$sql);
			$getrecord = "SELECT * FROM createpost";
			if ($getrecord_row = mysqli_query($link, $getrecord)) { 
				if ( mysqli_num_rows($getrecord_row) > 0) { 
						$row = $getrecord_row->fetch_assoc();
						$totalpostangrythispost = $row['postangry'] + 1;
						$unique_query = "UPDATE createpost SET postangry = $totalpostangrythispost";
						mysqli_query($link,$unique_query);
				} 
			}
		}
		if(isset($_POST['postkidding'])) {
			postIdNotExits();
			$id = $_SESSION['username'];
			$sql = "UPDATE socialfeatures SET postkidding = '1' WHERE User_ID = $id;";
			mysqli_query($link,$sql);
			$getrecord = "SELECT * FROM createpost";
			if ($getrecord_row = mysqli_query($link, $getrecord)) { 
				if ( mysqli_num_rows($getrecord_row) > 0) { 
						$row = $getrecord_row->fetch_assoc();
						$totalpostkiddingthispost = $row['postkidding'] + 1;
						$unique_query = "UPDATE createpost SET postkidding = $totalpostkiddingthispost";
						mysqli_query($link,$unique_query);
				} 
			}
		}
	} 

	

		$post_message = array( 'Post' => "Blog" , 
							'likeuserlist' => 'list people who liked the post',
							'dislikeuserlist' => 'list people who disliked the post ',
							'Logout' => 'Logout'
							);
		if( $_SERVER['REQUEST_METHOD'] == "GET" ) { 
			if(isset( $_GET['submit'] ) && $_GET['submit'] == 'Hindi' ) { 
				$post_message = array( 'Post' => "ब्लॉग", 
									'likeuserlist' => 'उन लोगों को सूचीबद्ध करें जिन्हें पोस्ट पसंद आया', 
									'dislikeuserlist' => 'उन लोगों को सूचीबद्ध करें जिन्होंने पद को नापसंद किया था',
									'Logout' => 'लोग आउट'
									 );
			} 
			if( isset( $_GET['submit'] ) && $_GET['submit'] == 'English') {
				$post_message = array( 'Post' => "Blog" , 
							'likeuserlist' => 'list people who liked the post',
							'dislikeuserlist' => 'list people who disliked the post ',
							'Logout' => 'Logout'
							);
			}
		}
	
?>
<html>
<head>
<title>Post</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
<link href="style.css" rel="stylesheet">
<style type='text/css'>
	.main-agileinfo {
		width: 75% !important;
	}
</style>
</head>
	<body>
		<nav class="mb-1 navbar navbar-expand-lg navbar-dark orange lighten-1">
		  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="#"><?php  echo $post_message['Post']; ?>
				  <span class="sr-only">(current)</span>
				</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="logout.php"><?php echo $post_message['Logout']; ?></a>
			  </li>
			</ul>
			<ul class="navbar-nav ml-auto nav-flex-icons">
			  <li class="nav-item avatar">
				<a class="nav-link p-0" href="#">
				  <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
					alt="avatar image" height="35">
				</a>
			  </li>
			</ul>
		  </div>		
		</nav>
<!--/.Navbar -->
		<!-- main !-->
		<div class="main-w3layouts wrapper">
			<h1><?php  echo $post_message['Post']; ?></h1>
			<div class="main-agileinfo">
				<div class="agileits-top">
					<div class="container">
						<?PHP 
						$sql = "SELECT * FROM createpost";
						if ($res = mysqli_query($link, $sql)) { 
							if (mysqli_num_rows($res) > 0) { 
								while($row = $res->fetch_assoc()){ ?>
									<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12 post">
												<div class="row post-content">
													<div class="col-md-3">
														<a href="#">
															<img src="<?php  echo $row['postimage']?>" alt="" style="width:100%;height:400px"class="img-responsive">
														</a>
													</div>
													<div class="col-md-9">
														<h4>
															<strong><?php  echo $row['posttittle']?></strong>
														</h4>
														<div class="postescription" style="padding:10px">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
															when an unknown printer took a galley oftype and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into 
															electronic typesetting, remaining essentially unchanged.  x of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
															software like Aldus PageMaker including versions of Lorem Ipsum.
															
														</div>
														<div style="padding:10px">
															
															Contrary to popular belief, Lorem Ipsum is not simply random text. 
															It has roots in a piece of classical Latin literature from 45 BC, 
															making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College 
															in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage,
															 and going through the cites of the word in classical literature, discovered the undoubtable source.
															 Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" 
															 (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
															This book is a treatise on the theory of ethics, very popular 
															during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", 
															comes from a line in section 1.10.32.
														</div>
														<form action="post.php" method="post">
															<?php  
																$id = $_SESSION['username'];
																$activeclass = "";
																$Inactiveclass = "";
																$liketext = "";
																$dislikeText = "";
																$loveaciveclass = "";
																$postangryaciveclass = "";
																$postkiddingaciveclass = "";
																$dloveText = "";
																$postangryText = "";
																$postkiddingText = "";
																$getlikeposthiddenshowquery = "SELECT * FROM socialfeatures where User_ID = $id ";
																if ($getlikeposthiddenshowquery_record = mysqli_query($link, $getlikeposthiddenshowquery)) { 
																	if (mysqli_num_rows($getlikeposthiddenshowquery_record) > 0) {
																		$social_record = $getlikeposthiddenshowquery_record->fetch_assoc();
																		if( $social_record['postlike'] == 1 && $social_record['postlike'] != 0 ) {
																			$activeclass = "active";
																			$Inactiveclass = "Inactive";
																			$liketext = " You Liked this Post";																			
																		}  if ($social_record['postdislike'] == 1 && $social_record['postdislike'] != 0) { 
																			$Inactiveclass = "active";
																			$activeclass = "Inactive";
																			$dislikeText = " You DisLiked this Post";
																		}
																		if ($social_record['postlove'] == 1 && $social_record['postlove'] != 0) { 
																			$loveaciveclass = "active";
																			$dloveText = "You Love this Post";
																		}	
																		if ($social_record['postangry'] == 1 && $social_record['postangry'] != 0) { 
																			$postangryaciveclass = "active";
																			$postangryText = "You Angry on this Post";
																		}
																		if ($social_record['postkidding'] == 1 && $social_record['postkidding'] != 0) { 
																			$postkiddingaciveclass = "active";
																			$postkiddingText = "You Kidding this Post";
																		}
																		
																	} 
																}
															?>
															<button type="submit" name="postlike" <?php echo "class=$activeclass"; ?> ><i class="fa fa-thumbs-up" aria-hidden="true"><?php  echo $row['postlike']?></i></button>
															<button type="submit" name="postDislike" <?php echo "class=$Inactiveclass"; ?> ><i class="fa fa-thumbs-down" aria-hidden="true"><?php  echo $row['postdislike']?></i></button>
															<button type="submit" name="postlove" <?php echo "class=$loveaciveclass"; ?>><i class="fa fa-heart" aria-hidden="true"><?php  echo $row['postlove']?></i></span></button>
															<button type="submit" name="postangry" <?php echo "class=$postangryaciveclass"; ?>><span style="font-size:18px">&#128540; <?php  echo $row['postangry']?></span></button>
															<button type="submit" name="postkidding" <?php echo "class=$postkiddingaciveclass"; ?>><span style='font-size:18px;'>&#128525; <?php  echo $row['postkidding']?></span></button>
														</form>	
														<div>
															<div><?php echo  "<strong style='color:Green'>" . $liketext . "</strong>"; ?></div>
															<div><?php echo  "<strong style='color:Blue'>" . $dislikeText . "</strong>"; ?></div>
															<div><?php echo  "<strong style='color:#9c18b3'>" . $dloveText . "</strong>"; ?></div>
															<div><?php echo  "<strong style='color:#9c1a0c'>" . $postangryText . "</strong>"; ?></div>
															<div><?php echo  "<strong style='color:#e0b122'>" . $postkiddingText . "</strong>"; ?></div>
														</div>
														
															
															<form method="get" action="Post.php">
																<input type="submit" name="submit" value="Hindi">
																<input type="submit" name="submit" value="English">
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php }
							} 
						} ?>
						<!--- !--->
						<!--- End Here !-->
							<div class="container">
								  <div class="row">
									<div class="col-xs-12 ">
									  <nav>
										<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
										  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php  echo $post_message['likeuserlist']; ?></a>
										  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php  echo $post_message['dislikeuserlist']; ?></a>
										</div>
									  </nav>
									  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
										<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
											<?php
												$getlikepostquery = "SELECT * FROM socialfeatures where postlike=1";
												if ($getrecordfromquery = mysqli_query($link, $getlikepostquery)) { 
													if (mysqli_num_rows($getrecordfromquery) > 0) { 
														$likecount = 0;
														while($row = $getrecordfromquery->fetch_assoc()){ ?>
															
																<?php 
																$userid = $row['User_ID'];	
																$getuser_record = "SELECT * FROM users where User_ID=$userid";
																if ($getuser_record_query = mysqli_query($link, $getuser_record)) { 
																	if (mysqli_num_rows($getuser_record_query) > 0) { 
																		while($result_user = $getuser_record_query->fetch_assoc()){  ?>
																			
																			<div class="row">
																				<div class="col-md-12 post">
																					<div class="row post-content">
																						<div class="col-md-3">
																							<a href="#">
																								<img src="img/download.png" alt="" class="img-responsive">
																							</a>
																						</div>
																						<div class="col-md-9">
																							<h4>
																								<strong><?php  echo $result_user['username']. '  Like This Post';?></strong>
																								
																							</h4>
																							<div>
																							</div>
																						</div>
																						</div>
																					</div>
																				</div>
																						
																		<?php } 
																	}
																}
														  }	
													}
												} 
											?>	
										</div>
										<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
										<?php
												$getlikepostquery = "SELECT * FROM socialfeatures where postdislike=1";
												if ($getrecordfromquery = mysqli_query($link, $getlikepostquery)) { 
													if (mysqli_num_rows($getrecordfromquery) > 0) { 
														$likecount = 0;
														while($row = $getrecordfromquery->fetch_assoc()){ ?>
															
																<?php 
																$userid = $row['User_ID'];	
																$getuser_record = "SELECT * FROM users where User_ID=$userid";
																if ($getuser_record_query = mysqli_query($link, $getuser_record)) { 
																	if (mysqli_num_rows($getuser_record_query) > 0) { 
																		while($result_user = $getuser_record_query->fetch_assoc()){  ?>
																			<div class="row">
																				<div class="col-md-12 post">
																					<div class="row post-content">
																						<div class="col-md-3">
																							<a href="#">
																								<img src="img/download.png" alt="" class="img-responsive">
																							</a>
																						</div>
																						<div class="col-md-9">
																							<h4>
																								<strong><?php  echo $result_user['username']. '  DisLike This Post';?></strong>
																								
																							</h4>
																							
																							<div>
																							</div>
																						</div>
																						</div>
																					</div>
																				</div>
																						
																		<?php } 
																	}
																}
														  }	
													}
												} 
											?>
									   </div>
										<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
										</div>
										<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
										</div>
									  </div>
									
									</div>
								  </div>
							</div>
						  </div>
					</div>
						
					</div>
				</div>
			</div>
			<ul class="colorlib-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		
		</div> 
		<!-- //main -->
		
	</body>
</html>