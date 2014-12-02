
<!DOCTYPE HTML>
<html>
<head>
<title>RIFT SHOP REGISTER</title>
  <?php include_once("riftindexhead.php");?>
		   <div class="clear"></div>
     	</div>
       </div>

       <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Create A Business Customer Account</h4>
    		    <form method = "post" action = "SignInfoBus.php">
    			 <div class="col_1_of_2 span_1_of_2">
		   			    <div>Name: <input type="text" name="name" ></div>
		      			<div>Email: <input type="text" name="email"></div>
		     
		    			<div>Password:(Uppercase/lowercase letters and numbers only)	 <input type="text" name="password"></div>

		    			<div>Gross income	: <input type="text" name="gross"></div> 
		    		    <div>Category:<input type="text" name="category"></div>
		          		
		    	 </div>
		    	  <div class="col_1_of_2 span_1_of_2">	
		    		<div>Street: <input type="text" name="street"></div>
		    		 <div>City: <input type="text" name="city"></div>
		    		 <div>State: <input type="text" name="state"></div>
		    		<!-- <div><select id="State" name="State" onchange="change_state(this.value)" class="frm-field required">
		            <option value="null">Select a State</option>         
		            <option value="NY">New York</option>
		            <option value="PA">Pennsylvania</option>
		            
		         </select></div>		         -->
		         <div>Zip Code: <input type="text" name="zip"></div>
		            	
		            	<br>
		          </div>

		         <button class="grey">Submit</button>
		         <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		         <div class="clear"></div>
		    </form>
    	  </div> 
        </div>

       	  <div class="footer">
	       	 <div class="footer-top">
	       	 	<div class="copy">
	       	  		 <div class="wrap">
	       	   			  <p>© All rights reserved | RIFT </p>
	     		  	 </div>
	      	 	</div>
	    	 </div>
   		</div>

      <?php include_once("riftindexfooter.php");?>
</body>
</html>