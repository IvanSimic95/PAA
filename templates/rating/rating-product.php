<div class="row clearfix g-3">
    <!-- New ROw Start -->

    <div class="col-lg-4 col-md-12 position-relative">



        <div class="feedback-info sticky-top">
            <div class="card shadow-none m3" style="border: 1px solid #dee2e6 !important;">
                <div class="card-body">
           <p class="h2 display-6 fw-bold mb-0 text-center" ><i style="font-size:36px;" class="fa fa-star"></i><i style="font-size:36px;" class="fa fa-star"></i><i style="font-size:36px;" class="fa fa-star"></i><i style="font-size:36px;" class="fa fa-star"></i><i style="font-size:36px;" class="fa fa-star"></i></p>
                    <p class="text-mute text-center h5 mt-3 mb-4">Average rating: <b><?php echo $avg; ?></b> of <b><?php echo $count; ?></b> Reviews</p>
                    

                    <div class="progress-count mt-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="h6 mb-0 fw-bold d-flex align-items-center">5<i class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i></p>
                            <span class="small text-muted"><?php echo $countfive; ?></span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar light-success-bg" role="progressbar" style="width: <?php echo $bar5; ?>%" aria-valuenow="<?php echo $bar5; ?>" aria-valuemin="0" aria-valuemax="100" title="5 star reviews"></div>
                        </div>
                    </div>
                    <div class="progress-count mt-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="h6 mb-0 fw-bold d-flex align-items-center">4<i class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i></p>
                            <span class="small text-muted"><?php echo $countfour; ?></span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-info-light" role="progressbar" style="width: <?php echo $bar4; ?>%"
                                aria-valuenow="<?php echo $bar4; ?>" aria-valuemin="0" aria-valuemax="100" title="4 star reviews"></div>
                        </div>
                    </div>
                    <div class="progress-count mt-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="h6 mb-0 fw-bold d-flex align-items-center">3<i
                                    class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i></p>
                            <span class="small text-muted"><?php echo $countthree; ?></span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-lightyellow" role="progressbar" style="width: <?php echo $bar3; ?>%"
                                aria-valuenow="<?php echo $bar3; ?>" aria-valuemin="0" aria-valuemax="100" title="3 star reviews"></div>
                        </div>
                    </div>
                    <div class="progress-count mt-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="h6 mb-0 fw-bold d-flex align-items-center">2<i class="fa fa-star ms-1 small-11 pb-1"></i><i class="fa fa-star ms-1 small-11 pb-1"></i></p>
                            <span class="small text-muted"><?php echo $counttwo; ?></span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar light-danger-bg " role="progressbar" style="width: <?php echo $bar2; ?>%"
                                aria-valuenow="<?php echo $bar2; ?>" aria-valuemin="0" aria-valuemax="100" title="2 star reviews"></div>
                        </div>
                    </div>
                    <div class="progress-count mt-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="h6 mb-0 fw-bold d-flex align-items-center">1<i
                                    class="fa fa-star ms-1 small-11 pb-1"></i></p>
                            <span class="small text-muted"><?php echo $countone; ?></span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-careys-pink" role="progressbar" style="width: <?php echo $bar1; ?>%"
                                aria-valuenow="<?php echo $bar1; ?>" aria-valuemin="0" aria-valuemax="100" title="1 star reviews"></div>
                        </div>
                    </div>
<!--
                    <div class="customer-like mt-5">
                        <p class="h6 mb-0 fw-bold ">What Customers Like</p>
                        <ul class="list-group mt-3">
                            <li class="list-group-item d-flex">
                                <div class="number border-end pe-2 fw-bold">
                                    <strong class="color-light-success">1</strong>
                                </div>
                                <div class="cs-text flex-fill ps-2">
                                    <span>Fun Factor</span>
                                </div>
                                <div class="vote-text">
                                    <span class="text-muted">72 votes</span>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <div class="number border-end pe-2 fw-bold">
                                    <strong class="color-light-success">2</strong>
                                </div>
                                <div class="cs-text flex-fill ps-2">
                                    <span>Great Value</span>
                                </div>
                                <div class="vote-text">
                                    <span class="text-muted">52 votes</span>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <div class="number border-end pe-2 fw-bold">
                                    <strong class="color-light-success">3</strong>
                                </div>
                                <div class="cs-text flex-fill ps-2">
                                    <span>eBazar</span>
                                </div>
                                <div class="vote-text">
                                    <span class="text-muted">35 votes</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="customer-like mt-5">
                        <p class="h6 mb-0 fw-bold ">What Need Improvement</p>
                        <ul class="list-group mt-3">
                            <li class="list-group-item d-flex">
                                <div class="number border-end pe-2 fw-bold">
                                    <strong class="color-careys-pink">1</strong>
                                </div>
                                <div class="cs-text flex-fill ps-2">
                                    <span>Value for Money</span>
                                </div>
                                <div class="vote-text">
                                    <span class="text-muted">12 votes</span>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <div class="number border-end pe-2 fw-bold">
                                    <strong class="color-careys-pink">2</strong>
                                </div>
                                <div class="cs-text flex-fill ps-2">
                                    <span>Customer service</span>
                                </div>
                                <div class="vote-text">
                                    <span class="text-muted">8 votes</span>
                                </div>
                            </li>
                            <li class="list-group-item d-flex">
                                <div class="number border-end pe-2 fw-bold">
                                    <strong class="color-careys-pink">3</strong>
                                </div>
                                <div class="cs-text flex-fill ps-2">
                                    <span>Product Item</span>
                                </div>
                                <div class="vote-text">
                                    <span class="text-muted">2 votes</span>
                                </div>
                            </li>
                        </ul>
                    </div>
-->
                </div>
            </div>
        </div>

    </div>


    <div class="col-lg-8 col-md-12">
        <!-- New Column Start -->
        <div class="contents">

        
<?php
    $sql = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product_id = '".$productID."' ORDER BY review_date DESC LIMIT 10";
	$sql2 = "SELECT * FROM reviews WHERE review_moderated = 'approved' AND product_id = '".$productID."' ORDER BY review_date DESC";
	
    $result = $conn->query($sql);
	$result2 = $conn->query($sql2);
	
	$count = $result2->num_rows;
	$totalpages = ($count - 10) / 5;
	
    if($result->num_rows != 0) {

      while($row = $result->fetch_assoc()) {
         // echo '<div class="single_review sides"><div class="review_content"><h3><span class="review-name">' . $row["review_name"]. '</span> <span class="verified-badge"><i class="fas fa-user-check"></i> Verfied Purchase</span><time>' . $row["review_date"]. '</time> ago</h3><div class="rating">' . $row["review_rating"]. '</div><div class="testimonial">' . $row["review_text"]. '</div></div></div>';
        $newdate = date('F jS, Y, H:i:s', strtotime($row["review_date"]));
        $time = time_ago($row["review_date"]);
        $roundRating = round($row["review_rating"]);
        $ratingStars = "";

        foreach(range(1,$roundRating) as $index) {
        $ratingStars .= '<i class="fa fa-star"></i>';
         }
echo '
<div class="card mb-3 shadow-none item" style="border: 1px solid #dee2e6 !important;">
                <div class="card-body p-3">
                    <div class="d-flex mb-3 pb-1 border-bottom flex-wrap">
                        <img src="/assets/img/placeholder.png" data-src="https://api.dicebear.com/7.x/adventurer/svg?seed=' . $row["review_name"]. '" class="lazyload review-avatar avatar rounded" alt="' . $row["review_name"]. 'Avatar">
                        <div class="flex-fill ms-1 text-truncate">
                            <p class="h6 mb-0 fs-1 fw-semibold"><span>' . $row["review_name"]. '</span></p>
                            ' .$ratingStars. '
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="mb-1 me-1 ">
                            <span class="text-muted" style="text-transform:capitalize;"><i class="fa fa-clock-rotate-left"></i> ' .$time. '</span>
                            </span>
                        </div>
                    </div>
                    <div class="timeline-item-post">
                        <p>' . $row["review_text"]. '</p>
                    </div>
                </div>
            </div>
';
		
		}

        echo '
</div>
<div class="pagination"><a href="https://'.$domain.'/templates/rating/load-review.php?product='.$productID.'&page=1" class="next">Next</a></div>
<button class="load-more btn btn-primary btn-shadow w-100 mb-2 mt-2 fw-bold fs-1">Load More</button>
        ';


    } else {
        echo '<div class="alert alert-danger" role="alert">No Reviews found for '.$title.'!</div>';
        
        echo '
</div>
<div class="pagination"><a href="https://'.$domain.'/templates/rating/load-review.php?product='.$productID.'&page=1" class="next" style="display:none!important;">Next</a></div>
<button class="load-more btn btn-primary btn-shadow w-100 mb-2 mt-2 fw-bold fs-1" style="display:none!important;">Load More</button>
        ';
    }
      $conn->close();
     ?>


<!--
<div class="card mb-3 shadow-none" style="border: 1px solid #dee2e6 !important;">
                <div class="card-body p-4">
                    <div class="d-flex mb-3 pb-1 border-bottom flex-wrap">
                        <img src="/assets/img/placeholder.png" data-src="/assets/img/users/1.svg"
                            class="lazyload review-avatar avatar rounded" alt="Ivan Test Avatar">
                        <div class="flex-fill ms-1 text-truncate">
                            <p class="h6 mb-0 fs-1 fw-semibold"><span>Joan Dyer</span></p>
                            <span class="text-muted">3 hours ago</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="mb-1 me-1 ">
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                            </span>
                        </div>
                    </div>
                    <div class="timeline-item-post">
                        <p> You shouldn't need to read a review to see how nice and polished this theme is. So I'll tell you something you won't find in the demo.</p>
                    </div>
                </div>
            </div>

            <div class="card mb-3 shadow-none" style="border: 1px solid #dee2e6 !important;">
                <div class="card-body p-4">
                    <div class="d-flex mb-3 pb-1 border-bottom flex-wrap">
                        <img src="/assets/img/placeholder.png" data-src="/assets/img/users/1.svg"
                            class="lazyload review-avatar avatar rounded" alt="Ivan Test Avatar">
                        <div class="flex-fill ms-1 text-truncate">
                            <p class="h6 mb-0 fs-1 fw-semibold"><span>Joan Dyer</span></p>
                            <span class="text-muted">3 hours ago</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="mb-1 me-1 ">
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                            </span>
                        </div>
                    </div>
                    <div class="timeline-item-post">
                        <p> You shouldn't need to read a review to see how nice and polished this theme is. So I'll tell you something you won't find in the demo.</p>
                    </div>
                </div>
            </div>

            <div class="card mb-3 shadow-none" style="border: 1px solid #dee2e6 !important;">
                <div class="card-body p-4">
                    <div class="d-flex mb-3 pb-1 border-bottom flex-wrap">
                        <img src="/assets/img/placeholder.png" data-src="/assets/img/users/1.svg"
                            class="lazyload review-avatar avatar rounded" alt="Ivan Test Avatar">
                        <div class="flex-fill ms-1 text-truncate">
                            <p class="h6 mb-0 fs-1 fw-semibold"><span>Joan Dyer</span></p>
                            <span class="text-muted">3 hours ago</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="mb-1 me-1 ">
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                                <i class="fa fa-star fs--1"></i>
                            </span>
                        </div>
                    </div>
                    <div class="timeline-item-post">
                        <p> You shouldn't need to read a review to see how nice and polished this theme is. So I'll tell you something you won't find in the demo.</p>
                    </div>
                </div>
            </div>
-->


    </div><!-- D FLEX END -->
</div><!-- New ROw END -->