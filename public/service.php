<?php 
/**
 * PHP Capstone
 * @service page
 * @Assignment 1, WDD 2018
 * @Yongxin Mao <maoyongxin115@outlook.com>
 * @created_at 2018-08-02
 */

 
include ('../config.php');
$title = 'service';
$slug = 'service';

include '../includes/header.inc.php'; 

?>
 
  <body>
    <!-- Start "wrapper" div. This will contain the entire web page.-->
    <div id="wrapper">
    
      <!-- header begins-->
      <header>
        <img src="images/guidance.jpg" alt="Servicess" />
        <div id="searchbar"></div>
      </header>
      
<?php include '../includes/nav.inc.php'; ?>
      
      <!-- content begins-->
      <div id="contentservice">
      <div class="titleservice">Customize Your Trip</div>
        <form method="post"
              action="http://www.scott-media.com/test/form_display.php"
              id="flight_info"
              name="flight_info"
              autocomplete="on">
          <fieldset>
            <legend>Personal Information</legend>
            <p>
              <label for="first_name">First Name</label>
              <input type="text"
                     id="first_name" 
                     name="first_name" 
                     maxlength="25"
                     size="20" 
                     placeholder="Type your first name"
                     required />
            </p>
            <p>
              <label for="last_name">Last Name</label>
              <input type="text"
                     id="last_name"
                     name="last_name"
                     maxlength="25" 
                     size="20" 
                     placeholder="Type your last name"/>
            </p>
            
            <p>
		      <label for="email_address">Email Address</label>
		      <input type="email"
					 name="email_address"
				     id="email_address" />
		    </p>
            <p>
              <label for="phone">Telephone</label>
              <input type="tel"
                     id="phone"
                     name="phone"
                     maxlength="18" />
            </p>
            <p>
            <select name="live_place" id="live_place">
              <option value="not_choose">where do you live...</option>
              <option value="AB">Alberta</option>
              <option value="BC">British Columbia</option>
              <option value="MB">Manitoba</option>
              <option value="NL">Newfoundland and Labrador</option>
              <option value="NB">New Brunswick</option>
              <option value="NS">Nova Scotia</option>
              <option value="ON">Ontario</option>
              <option value="PE">Prince Edward Island</option>
              <option value="QB">Québec</option>
              <option value="SK">Saskatchewan</option>
              <option value="NU">Nunavut</option>
              <option value="NT">Northwest Territories</option>
              <option value="YK">Yukon</option>
            </select>
            </p>
          </fieldset>
          
          <fieldset>
            <legend>Flight Information</legend>
            <p>
              <input type="radio"
                     name="trip"
                     id="round_way"
                     value="round_way" />
              <label for="round_way">Round-trip</label><br />

              <input type="radio"
                     name="trip"
                     id="one_way"
                     value="one_way" />
              <label for="one_way">One-way</label><br />

              <input type="radio"
                     name="trip"
                     id="multi_city"
                     value="multi_city" />
              <label for="multi_city">Multi-city</label><br />
            </p>
            <p>
              <label for="from">From</label>
              <input type="text"
                     id="from" 
                     name="from" 
                     maxlength="25"
                     size="20" />
              <label for="to">To</label>
              <input type="text"
                     id="to" 
                     name="to" 
                     maxlength="25"
                     size="20" />
            </p>
            <p>
              <label for="depart">Depart</label>
		      <input type="date"
				     id="depart"
				     name="depart" />
              <label for="return">Return</label>
		      <input type="date"
				     id="return"
				     name="return" />	
            </p>
          </fieldset>
          <p>
            <input type="submit" 
                   value="Send Form"
                   id="send_button"
                   />&nbsp;&nbsp;

            <input type="reset" 
                   value="Clear Form" /> &nbsp; 
          </p>
        </form>
      </div>
      
<?php include '../includes/footer.inc.php'; ?>