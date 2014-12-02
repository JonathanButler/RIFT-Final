
<!DOCTYPE php>
<php>
<head>
<title>RIFT SHOP LOG IN</title>
<?php include_once("riftindexhead.php");?>


		   <div class="clear"></div>
     	</div>
       </div>

       <div class="login">
          <div class="wrap">
				<div class="col_1_of_login span_1_of_login">
					<h4 class="title">New Customers</h4>
					<h5 class="sub_title">Register Account</h5>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
					<div class="button1">
					   <a href="register.php"><input type="submit" name="Submit" value="Continue"></a>
					 </div>
					 <div class="clear"></div>
				</div>
				
				<div class="col_1_of_login span_1_of_login">
				  <div class="login-title">
	           		<h4 class="title">Registered Home Customers</h4>
					 <div class="comments-area">
						<form method="post" action="loginhome.php">
							<p>
								<label>Email</label>
								<span>*</span>
								<input type="text" name="email">
							</p>
							<p>
								<label>Password</label>
								<span>*</span>
								<input type="password" name="password">
							</p>
							 <p id="login-form-remember">
								<br>
							 </p>
							 <p>
								<input type="submit" value="Login">
								<br>
							</p>
						</form>
					</div>
			      </div>
			       <div class="login-title">

	           		<h4 class="title">Registered Business Customers</h4>
					 <div class="comments-area">
						<form method="post" action="loginbus.php">
							<p>
								<label>Email</label>
								<span>*</span>
								<input type="text" name="email">
							</p>
							<p>
								<label>Password</label>
								<span>*</span>
								<input type="password" name="password">
							</p>
							 <p id="login-form-remember">
								<label><a href="login_salesman.php">Salesman or manager? </a></label>
							 </p>
							 <p>
								<input type="submit" value="Login">
							</p>
						</form>
					</div>
			      </div>
				</div>

				<div class="clear"></div>
			</div>
		</div>

    <?php include_once("riftfooter.php");?>
</body>
</php>