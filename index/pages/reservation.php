 <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-reservation-area">
            <div class="mu-title">
              <span class="mu-subtitle">Make A</span>
              <h2>Reservation</h2>
              <i class="fa fa-spoon"></i>              
              <span class="mu-title-bar"></span>
            </div>
            <div class="mu-reservation-content">
			
              <p ><span class="mu-subtitle">Have a birthday party, treating friends or professional society celebrations post it here and we will contact you :)</span></p>
             <form action="reservation_process.php" method="post" name="reservation_form" class="mu-reservation-form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">                       
                      <input type="text" class="form-control" required name="reservation_host_name" placeholder="Full Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">                        
                      <input type="text" class="form-control" name="reservation_venue" placeholder="Proposed Venue">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">                        
                      <input type="text" class="form-control" name="reservation_contact"  pattern="[[0-9]{10}" maxlength="10" required title="Enter a valid Phone number" placeholder="Phone Number">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" name="reservation_strength_select">
                        <option value="0">How Many?</option>
                        <option value="5">5 (Just Friends)</option>
                        <option value="10">10 (Treats)</option>
                        <option value="20+">20 (Club Party)</option> 
                        <option value="50+">50 (Freshers)</option>
                        <option value="100+">100+ (Grand Farewell)</option>
    
                      </select>                      
                    </div>
                  </div>
                  <div class="col-md-6">
		
                    <div class="form-group">
                      <input type="date" style="border-radius:0px; height:40px;" required min="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" max="<?php echo date("Y-m-d", strtotime("+2 month")); ?>" class="form-control" name="reservation_date" Value="Date" placeholder="Date">              
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="reservation_party_type" placeholder="Occasion for Reservation">                      
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" cols="30" name="reservation_message" rows="10" placeholder="Write your message..."></textarea>
                    </div>
                  </div>
                  <button type="submit" name="reservation_submit" class="mu-readmore-btn">Make Reservation</button>
                </div>
              </form>      
            </div>
          </div>
        </div>
      </div>
    </div>