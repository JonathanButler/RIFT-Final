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
    	      <h4 class="title">Create A Home Customer Account --- <a href ="registerBC.php">(Business Customers Click Here)</a></h4>
    		   <form method = "post" action = "SignInfoHom.php">
    			 <div class="col_1_of_2 span_1_of_2">
		   			    <div>Name: <input type="text"  name="name" ></div>
		      			<div>Email: <input type="text"  name="email"></div>
		      			<div>Birthday: (yyyy/mm/dd) <input type="text"  name="bday"></div><!-- - <input type="text" value="Day" class="day"> - <input type="text" value="Year" class="year"> -->
		          		<div>Gender: <input type="text" name="gender"> </div>
		    		    <div>Marital Status: <input type="text"  name="marital"> </div>
		    			<div>Password: (Uppercase/lowercase letters and numbers only)	 <input type="text"  name="password"> </div>
		    	 
		    	  <!-- <div class="col_1_of_2 span_1_of_2">	 -->
		    		    <div>Street: <input type="text"  name="street"></div>
		    		    <div>City: <input type="text" name="city"></div>
		    		    <div>State: <input type="text"  name="state"></div>
		    		<!-- <div><select id="State" name="State" onchange="change_state(this.value)" class="frm-field required">
		            <option value="null">Select a State</option>         
		            <option value="NY">New York</option>
		            <option value="PA">Pennsylvania</option>
		             -->
		         <!-- </select></div> -->		        
		               <div>Zip Code: <input type="text"  name="zip"></div>
		            	
		            	<br>
		            <!-- </div> -->
		          </div>

		         <button class="grey">Submit</button>
		         <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		         <div class="clear"></div>
		    </form>
    	  </div> 
        </div>

	<?php include_once("riftfooter.php");?>
</body>
</html>