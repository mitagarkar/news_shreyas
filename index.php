
<?php include 'Includes/header.php';?>

	<!-- .............Top Image Slider Start............ -->

	<div class="slider" id="slider3" style="margin-top: -20px;">
        <div style="background-image:url(assets/images/slide1.jpg)">
        </div>
        <div style="background-image:url(assets/images/slide2.png)">
        </div>
        <div style="background-image:url(assets/images/slide3.jpg)">
        </div>
        <!-- The Arrows -->
        <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path></svg></i>
        <i class="right" class="arrows" style="z-index:2; position:absolute;">
      	<svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i>
        <!-- Title Bar -->
    </div>

    <!-- .............Top Image Slider End............ -->

<?php
include 'Application/DB_Functions.php'; // Include Db_function file for asseccing the function
$obj = new Connections(); // Create object of class connection for calling the Personal_Details function

$getData = $obj->TopHeadlines();

$getNews = $obj->LatestNews();

// echo "<pre>";
// print_r($getData['articles']);
// exit;
// echo "</pre>";

?>

    <!-- ............. Top Headline News Thumbnail Box Start............. -->

	<div class="container thumbBox" id="tourpackages-carousel TopHeadlines">
		<div style="text-align: center;"><span class="Thumbnail_title">Top Headlines News</span></div>
        <div class="thumbail_dis"><p>Here is our Daily Top Headlines News</p></div>
      <div class="row">
<?php
$i = 0;
foreach ($getData['articles'] as $topheadlines) {
// echo "<pre>";
	// print_r($topheadlines);
	// echo "</pre>";
	$newsTitle = substr($topheadlines['title'], 0, 25) . "...";
	$date_api = date('d-m-Y', strtotime(str_replace('/', '-', $topheadlines['publishedAt'])));

	$auth_api = substr($topheadlines['author'], 0, 10) . "...";
	?>
        <div class="col-xs-18 col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="<?php if ($topheadlines['urlToImage'] != '') {echo $topheadlines['urlToImage'];} else {echo 'assets/images/imgNews.jpg';}?>" alt="Top Headlines">
              <div class="caption">
                <div class="Thumbnail_label_div"><span class="Thumbnail_label"><?php echo $newsTitle; ?></span></div>
                <p class="Thumbnail_p">
<?php
if ($topheadlines['description'] != '') {
		$newsDesc = substr($topheadlines['description'], 0, 50) . "....";
		echo $newsDesc;
	} else {
		echo 'Jurors resumed deliberations Friday in the murder trial of Chicago....';
	}
	?>
                </p>
                <p><span class="Thumbnail_date">Date: <?php echo $date_api; ?></span><span class="Thumbnail_aut"><?php if ($topheadlines['author'] != '') {echo $auth_api;} else {echo 'Diane Pathieu';}?></span></p>
                <p><a href="#" class="btn btn-info btn-xs Thumbnail_btn" data-toggle="modal" data-target="#exampleModal-<?php echo $i; ?>" role="button">View More</a>
                </p>
            </div>
          </div>
        </div>

		<!-- ........Top Headline Modal.......... -->

		<div class="modal fade" id="exampleModal-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content topheadlinesModel">
		      <div class="modal-header">
		        <h5 class="modal-title topheadlinesTitle" id="exampleModalLabel"><?php echo $topheadlines['title']; ?></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       	<?php
if ($topheadlines['content'] != '') {
		echo $topheadlines['content'];
	} else {
		echo 'Jurors resumed deliberations Friday in the murder trial of Chicago Police Officer Jason Van Dyke. Friday morning, Judge Vincent Gaughan interrogated Officer Van Dyke and his attorney Dan Herbert in a very testy exchange in court. The issue stems from Thursday Judge Vincent Gaughan interrogated Officer Van Dyke and his attorney Dan Herbert in a very testy exchange in court…';
	}
	?>
		      </div>
		      <div class="modal-footer">
		      	<span style="margin-right: 507px;">Date: <?php echo $date_api; ?></span>
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
		      </div>
		    </div>
		  </div>
		</div>

		<!-- ........Top Headline Modal End.......... -->

		<?php $i++;}?>

      </div><!-- End row -->

    </div><!-- End container -->


    <!-- .............Top Headline News Thumbnail Box End............. -->





<!-- ............. Latest News Thumbnail Box Start............. -->

	<div class="container thumbBox" id="tourpackages-carousel TopHeadlines">
		<div style="text-align: center;"><span class="Thumbnail_title">Latest News</span></div>
        <div class="thumbail_dis"><p>Here is our Daily Latest News</p></div>
      <div class="row">
<?php
$j = 0;
foreach ($getNews['articles'] as $newsData) {
// echo "<pre>";
	// print_r($newsData);
	// echo "</pre>";
	$newsTitle = substr($newsData['title'], 0, 25) . "...";
	$date_api = date('d-m-Y', strtotime(str_replace('/', '-', $newsData['publishedAt'])));

	$auth_api = substr($newsData['author'], 0, 10) . "...";
	?>
        <div class="col-xs-18 col-sm-6 col-md-3">
          <div class="thumbnail">
            <img src="<?php if ($newsData['urlToImage'] != '') {echo $newsData['urlToImage'];} else {echo 'assets/images/imgNews.jpg';}?>" alt="Top Headlines">
              <div class="caption">
                <div class="Thumbnail_label_div"><span class="Thumbnail_label"><?php echo $newsTitle; ?></span></div>
                <p class="Thumbnail_p">
<?php
if ($newsData['description'] != '') {
		$newsDesc = substr($newsData['description'], 0, 50) . "....";
		echo $newsDesc;
	} else {
		echo 'The first lady drew criticism after she appeared on a safari grassland....';
	}
	?>
                </p>
                <p><span class="Thumbnail_date">Date: <?php echo $date_api; ?></span><span class="Thumbnail_aut"><?php if ($newsData['author'] != '') {echo $auth_api;} else {echo 'Diane Pathieu';}?></span></p>
                <p><a href="#" class="btn btn-info btn-xs Thumbnail_btn" data-toggle="modal" data-target="#exampleModalNews-<?php echo $j; ?>" role="button">View More</a>
                </p>
            </div>
          </div>
        </div>

		<!-- ........Top Headline Modal.......... -->

		<div class="modal fade" id="exampleModalNews-<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content topheadlinesModel">
		      <div class="modal-header">
		        <h5 class="modal-title topheadlinesTitle" id="exampleModalLabel"><?php echo $newsData['title']; ?></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       	<?php
if ($newsData['content'] != '') {
		echo $newsData['content'];
	} else {
		echo 'Jurors resumed deliberations Friday in the murder trial of Chicago Police Officer Jason Van Dyke. Friday morning, Judge Vincent Gaughan interrogated Officer Van Dyke and his attorney Dan Herbert in a very testy exchange in court. The issue stems from Thursday Judge Vincent Gaughan interrogated Officer Van Dyke and his attorney Dan Herbert in a very testy exchange in court…';
	}
	?>
		      </div>
		      <div class="modal-footer">
		      	<span style="margin-right: 507px;">Date: <?php echo $date_api; ?></span>
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
		      </div>
		    </div>
		  </div>
		</div>

		<!-- ........Top Headline Modal End.......... -->

		<?php $j++;}?>

      </div><!-- End row -->

    </div><!-- End container -->


	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<nav aria-label="Page navigation example">
			  <ul class="pagination">
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			        <span class="sr-only">Previous</span>
			      </a>
			    </li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			        <span class="sr-only">Next</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div>
	</div>




    <!-- .............Latest News Thumbnail Box End............. -->



    <!-- ........Latest Modal.......... -->

<div class="modal fade" id="exampleModalLatest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- ........Latest Modal End.......... -->


<?php include 'Includes/footer.php';?>