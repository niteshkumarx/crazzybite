    <div class="mu-counter-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mu-counter-area">
            <ul class="mu-counter-nav">
              <li class="col-md-3 col-sm-3 col-xs-12">
                <div class="mu-single-counter">
                  <span>Fresh & Delicious</span>
				  <?php
					$menu_item_counter=55;
					$gtx_query="SELECT * from product_list";
					$gtx_result=mysql_query($gtx_query,$gtx_connection); 
					 while($row=mysql_fetch_assoc($gtx_result))
					{ $menu_item_counter=$menu_item_counter+1;
					}
					?>
				  
				  
                  <h3><span class="counter"><?php echo $menu_item_counter; ?></span><sup>+</sup></h3>
                  <p>Items</p>
                </div>
              </li>
              <li class="col-md-3 col-sm-3 col-xs-12">
                <div class="mu-single-counter">
                  <span>Weekly</span>
                  <h3><span class="counter">900</span><sup>+</sup></h3>
                  <p>Orders</p>
                </div>
              </li>
               <li class="col-md-3 col-sm-3 col-xs-12">
                <div class="mu-single-counter">
                  <span>Delivery Within</span>
                   <h3><span class="counter">30</span><sup></sup></h3>
                  <p>Minutes</p>
                </div>
              </li>
               <li class="col-md-3 col-sm-3 col-xs-12">
                <div class="mu-single-counter">
                  <span>Satisfied</span>
				    <?php
					$customer_counter=3562;
					$gtx_query="SELECT * from user_database";
					$gtx_result=mysql_query($gtx_query,$gtx_connection); 
					 while($row=mysql_fetch_assoc($gtx_result))
					{ $customer_counter=$customer_counter+1;
					}
					?>
                  <h3><span class="counter"><?php echo $customer_counter; ?></span><sup>+</sup></h3>
                  <p>Customers</p>
                </div>
              </li>
            </ul>
			
<!--apna jugaad scroll rokne ke liye-->
<section id="mu-restaurant-menu2" style="    display: inline;   float: left; width: 100%; "></section>
<!--apna jugaad scroll rokne ke liye-->

            </div>
          </div>
        </div>
      </div>
    </div>