
<!DOCTYPE HTML>
<html>
<head>
<title>RIFT SHOP LOG IN</title>
<?php include_once("riftindexhead.php");?>



		   <div class="clear"></div>
     	</div>
       </div>

       <div class="login">
          <div class="wrap">
				<div class="col_1_of_login span_1_of_login">
					<div class="login-title">
	           		<h4 class="title">Salesman</h4>
					 <div class="comments-area">
						<form method="post" action="loginsales.php">
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
								<label><a href="login.html">Registered Customers? </a></label>
							 </p>
							 <p>
								<input type="submit" value="Login">
							</p>
						</form>
					</div>
			      </div>
				</div>

				<div class="col_1_of_login span_1_of_login">
				  <div class="login-title">
	           		<h4 class="title">Manager</h4>
					 <div class="comments-area">
						<form method="post" action="loginman.php">
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
</html>