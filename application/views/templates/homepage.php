<!-- bannerSection -->
<div class="bannerSection">
    <div class="slider-inner">
        <div id="da-slider" class="da-slider">
            <div class="da-slide">
                    <h2><i>NEED</i> <br> <i>FRESH</i> <br> <i>BLOOD?</i></h2>
                    <p><i>We Have</i> <br> <i>Thousands of volunteer</i> <br> <i>blood donors here!</i></p>
                    <a href="#" class="da-link">Search</a>
                    <div class="da-img">
                        <img src="<?php echo site_url('assets/businessPlate/img/slider/blood_bag.gif'); ?>" alt="BLOOD BAG" />
                    </div>
            </div>

            <div class="da-slide">
                    <h2><i>JOIN</i> <br> <i>BADHAN</i> <br> <i>TODAY</i></h2>
                    <p><i>When You Sign Up</i> <br> <i>You will be able to </i> <br> <i>search blood whole bangladesh!</i></p>
                    <a href="<?php echo site_url('member/registration');?>" class="da-link">Sign Up</a>
                    <div class="da-img">
                        <img src="<?php echo site_url('assets/businessPlate/img/slider/badhan.gif'); ?>" alt="JOIN BADHAN" />
                    </div>
            </div>

            <div class="da-slide">
                    <h2><i>Explore</i> <br> <i>Your Nearest</i> <br> <i>BADHAN Unit</i></h2>
                    <p><i>BADHAN is currently running</i> <br> <i>hundreds of units</i><br> <i>across the country</i></p>
                    <a href="#menuwrapper" class="da-link">Explore</a>
                    <div class="da-img">
                          <img src="<?php echo site_url('assets/businessPlate/img/slider/mac_map.gif'); ?>" alt="JOIN BADHAN" />          
                    </div>
            </div>
            <div class="da-slide">
                    <h2><i>GIVE BLOOD</i> <br> <i>SAVE LIFE</i></h2>
                    <p><i> Donating blood is </i><br> <i>as good for YOUR health </i><br> <i>as it is for the receiver</i></p>
                    <a href="#" class="da-link">Join</a>
                    <div class="da-img">
                          <img src="<?php echo site_url('assets/businessPlate/img/slider/bonding_heart.png'); ?>" alt="JOIN BADHAN" />          
                    </div>
            </div>
            <nav class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>		
            </nav>
       </div><!--/da-slider-->
   </div><!--/slider-->
</div>
<!-- highlightSection -->
<div class="highlightSection">
    <div class="container">
            <div class="row">
            <div class="col-md-8">
             <h2>The Beginning...</h2>
             <em>The nimbus of Badhan was started from the tiny corner of Shahidullah Hall of DU in 1997 to make voluntary fresh blood donation as a Social Movement.</em><br><br>
             <p>
                 Badhan is a voluntary blood donors' organization. 
                 It is the pioneer fresh blood provider in Bangladesh. 
                 This non-political organization is currently running at 34 educational institutions including 13 public universities and 21 other university colleges. 
                 Since its establishment in 1997, it has already supplied more than 4.5 lakh bags of blood and tested blood group of about 11 lakh people free of cost (by March 2014). 
                 Till now Badhan and its members are continuing the great service to humanity.
                 <a href="http://blog.badhan.org/about"> read more</a>
                 
             </p>
            </div>
            <div class="col-md-4 align-right"> 
                <h4><strong>FRESH BLOOD</strong> means blood collected not before than 12 hours. It's better to transfuse blood as early as possible after collection. </h4>
                <a class="btn btn btn-brand" href="http://blog.badhan.org/blood-facts"> read more</a>
                    </p>
            </div>
            </div>
    </div>
  </div>
    
<div class="container">
    <div class="col-md-9">
                <div class="row">
                        <div class="col-md-9"><?php if(isset($articles[0])) echo get_excerpt($articles[0]); ?></div>
                </div>
                <div class="row">
                        <div class="col-md-5"><?php if(isset($articles[1])) echo get_excerpt($articles[1]); ?></div>
                        <div class="col-md-4"><?php if(isset($articles[2])) echo get_excerpt($articles[2]); ?></div>
                </div>
    </div>

    
</div>