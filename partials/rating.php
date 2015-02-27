 <?php
              $ratings = $city->getRatings();
              $total = 0;
              foreach($ratings as $rating) {
                $total = $total + $rating;
              }
              $ratingScore =  round($total/count($ratings));
              
            ?> 