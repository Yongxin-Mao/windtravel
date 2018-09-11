      
      <nav>
        <div id="utility" style="background: #666; color:#fff;">
          <?php if(empty($_SESSION['logged_in'])):?>
            <a href="login.php" style="color: #fff; text-decoration: none;">Login</a> | <a href="service.php" style="color: #fff; text-decoration: none;">Register</a>
          <?php else:?>
            <a href="logout.php" style="color: #fff; text-decoration: none;">Logout</a> | <a href="profile.php" style="color: #fff; text-decoration: none;">Profile</a>
          <?php endif;?>&nbsp;
            <a href="cart.php"><img src="images/cart.png" height="28" width="35" alt="cart"/></a>
        </div>
        <!--Logo is here-->
        <div id="logo">
          <img id="wind" src="images/logo.png" alt="logo"/><img src="images/logo2.png" alt="logo"/>
        </div>
          
        <div id="menu">
        
        <!-- hamburger menu-->
        <a href="#" id="menulink" title="menu">
          <span id="hamburger_top"></span>
          <span id="hamburger_middle"></span>
          <span id="hamburger_bottom"></span>
        </a>
        
         <!-- Main menu is here--> 
        <ul id="navlist">
          <li><a <?php if($slug=='home'){echo ' class="current" ';} ?> href="index.php">Home</a></li>
          <li class="flight2submenu"><a <?php if($slug=='flight'){echo 'class="current"';} ?>href="flight.php">Flights</a>
            <ul id="flight_submenu">
              <li><a href="#" title="canada air">Canada Air</a></li>
              <li><a href="#" title="west jet">West Jet</a></li>
              <li><a href="#" title="delta">Delta</a></li>
              <li><a href="#" title="south west">South West</a></li>
            </ul>
          </li>
          <li class="hotel2submenu"><a <?php if($slug=='hotel'){echo ' class="current" ';} ?>href="hotel.php">Hotels</a>
            <ul id="hotel_submenu">
              <li><a href="#" title="hilton">Hilton</a></li>
              <li><a href="#" title="crown">Crown</a></li>
              <li><a href="#" title="hyatt">Hyatt</a></li>
              <li><a href="#" title="howard">Howard</a></li>
            </ul>
          </li>
          <li><a <?php if($slug=='rest'){echo ' class="current" ';} ?>href="restaurant.php" title="restanrant">Restaurant</a></li>
          <li><a <?php if($slug=='service'){echo ' class="current" ';} ?>href="service.php" title="service">Service</a></li>
          <li><a <?php if($slug=='about'){echo ' class="current" ';} ?>href="about.php" title="about">About</a></li>
        </ul>
        </div>
      </nav>