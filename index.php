<?php
if (isset($_SESSION['c_u_login']) && isset($_SESSION['c_u_id'])) {
  header('location: http://localhost/k2/home1.php');
}
?>
<html>
<head>
<title>
K2 Social Media
</title>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<link rel="stylesheet" type="text/css" href="css/index.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<div class='container-fluid'><!---main container start ---->
	<div class='row header'><!----header row start------>
			<div class='col-sm-1'>
				 
			 </div>
				<div class='col-sm-3'><!---logo column start----->
					<img src='logo/logo.jpg' class='logo'>
				</div><!------logo column end---->
	
			<div class='col-sm-3'>
			</div>
	
	<div class='col-sm-4'><!-----login column start------>
	
		 <form class='login' method='POST' action='login/login.php'>
			 <div class='form-row'>
				 <div class='col-sm'>
					 <input type='text' class='form-control form-control-sm' placeholder='Email/ Username' name='login-username'>
				 </div>
				 <div class='col'>
					 <input type='password' class='form-control form-control-sm pass' placeholder='Password' name='login-pass'>
				 </div>
			 </div>
			 <div class='submit-login row'>
			 <div class='col-sm-4'></div>
				<button type='submit' class='btn btn-info col-sm-4 btn-sm' name='submit' value='login'>Login</button>
                <?php
		            if (isset($_GET['login-error'])) {
		 		      echo "<p style='color: red; text-align:center;'>Email or password is incorrect.</p>";
		             }
				?>



			 </div>
			 </form>
</div>
	</div><!----login column end----------->
	
	</div><!--------header row end-------------->
	
	
	<div class='row main'><!------main row start----->
	
	<div class='col-sm-1'></div>
	
	<div class='col-sm-5'><!-----image column start----------->
	<img src='logo/image.jpg' width='100%' class="front-image">
	</div><!--------------imgae column end--------------->
	
	<div class='col-sm-1'></div>
	
	<div class='col-sm-4 signup-form'><!----------signup form start------------>
		
		        <?php
		         if (isset($_GET['fname-error'])) {
		 		     echo "<p style='color: red;'>First Name and Last Name must only contain letters(eg: [A-Za-z]). </p>";
		         }
		         if (isset($_GET['empty'])) {
		 		     echo "<p style='color: red;'>All fields are mandatory</p>";
		         }
		         if (isset($_GET['empty'])) {
		 		     echo "<p style='color: red;'>All fields are mandatory</p>";
		         }
		         if (isset($_GET['email-error'])) {
		 		     echo "<p style='color: red;'>Email already exists.</p>";
		         }
		         if (isset($_GET['error'])) {
		 		     echo "<p style='color: red;'>Something went wrong.</p>";
		         }
		         if (isset($_GET['signup-success'])) {
		 		     echo "<p style='color: green;'>Sign Up Successful.</p>";
		         }
		         if (isset($_GET['fake-email'])) {
		 		     echo "<p style='color: red;'>Email seems to be invalid.</p>";
		         }
		         ?>

	<form method='POST' action='signup/signup.php'>
	<div class='form-row'>
		<div class='form-group col-md-6'>
			<label for='fname'>First Name</label>
			<input type='text' class='form-control' id='fname' placeholder='First Name' name='signup-first-name'>
		</div>
		<div class='form-group col-md-6'>
			<label for='lname'>Last Name</label>
			<input type='text' class='form-control' id='lname' placeholder='Last Name' name='signup-last-name'>
		</div>
	</div>
	<div class='form-group'>
		<label for='email'>Email</label>
		<input type='email' class='form-control' id='email' placeholder='xyz@example.com' name='signup-email'>
	</div>
	<div class='form-group'>
		<label for='pass'>Password</label>
		<input type='password' class='form-control' id='pass' placeholder='Enter Password' name='signup-pass'>
	</div>
     <div class='form-row'>
	 <label for='date'>DOB</label>
     </div>
	<div class='form-row'>
		<div class='form-group col-md-4'>
			<select class='custom-select custom-select-lg mb-3' id='date' name='signup-birthday-date'>
	<option value='1'>1</option>
	<option value='2'>2</option>
	<option value='3'>3</option>
	<option value='4'>4</option>
	<option value='5'>5</option>
	<option value='6'>6</option>
	<option value='7'>7</option>
	<option value='8'>8</option>
	<option value='9'>9</option>
	<option value='10'>10</option>
	<option value='11'>11</option>
	<option value='12'>12</option>
	<option value='13'>13</option>
	<option value='14'>14</option>
	<option value='15'>15</option>
	<option value='16'>16</option>
	<option value='17'>17</option>
	<option value='18'>18</option>
	<option value='19'>19</option>
	<option value='20'>20</option>
	<option value='21'>21</option>
	<option value='22'>22</option>
	<option value='23'>23</option>
	<option value='24'>24</option>
	<option value='25'>25</option>
	<option value='26'>26</option>
	<option value='27'>27</option>
	<option value='28'>28</option>
	<option value='29'>29</option>
	<option value='30'>30</option>
	<option value='31'>31</option>
</select>
		</div>
		<div class='form-group col-md-4'>
			<select class='custom-select custom-select-lg mb-3' id='month' name='signup-birthday-month'>
	<option value='January'>Jan</option>
	<option value='February'>Feb</option>
	<option value='March'>Mar</option>
	<option value='April '>Apr</option>
	<option value='May'>May</option>
	<option value='June'>Jun</option>
	<option value='July'>Jul</option>
	<option value='August'>Aug</option>
	<option value='September'>Sep</option>
	<option value='October'>Oct</option>
	<option value='November'>Nov</option>
	<option value='December'>Dec</option>
</select>
		</div>
		<div class='form-group col-md-4'>
			<select name='signup-birthday-year' id='year' class='custom-select custom-select-lg mb-3'><option value='2018' selected='1'>2018</option><option value='2017'>2017</option><option value='2016'>2016</option><option value='2015'>2015</option><option value='2014'>2014</option><option value='2013'>2013</option><option value='2012'>2012</option><option value='2011'>2011</option><option value='2010'>2010</option><option value='2009'>2009</option><option value='2008'>2008</option><option value='2007'>2007</option><option value='2006'>2006</option><option value='2005'>2005</option><option value='2004'>2004</option><option value='2003'>2003</option><option value='2002'>2002</option><option value='2001'>2001</option><option value='2000'>2000</option><option value='1999'>1999</option><option value='1998'>1998</option><option value='1997'>1997</option><option value='1996'>1996</option><option value='1995'>1995</option><option value='1994'>1994</option><option value='1993'>1993</option><option value='1992'>1992</option><option value='1991'>1991</option><option value='1990'>1990</option><option value='1989'>1989</option><option value='1988'>1988</option><option value='1987'>1987</option><option value='1986'>1986</option><option value='1985'>1985</option><option value='1984'>1984</option><option value='1983'>1983</option><option value='1982'>1982</option><option value='1981'>1981</option><option value='1980'>1980</option><option value='1979'>1979</option><option value='1978'>1978</option><option value='1977'>1977</option><option value='1976'>1976</option><option value='1975'>1975</option><option value='1974'>1974</option><option value='1973'>1973</option><option value='1972'>1972</option><option value='1971'>1971</option><option value='1970'>1970</option><option value='1969'>1969</option><option value='1968'>1968</option><option value='1967'>1967</option><option value='1966'>1966</option><option value='1965'>1965</option><option value='1964'>1964</option><option value='1963'>1963</option><option value='1962'>1962</option><option value='1961'>1961</option><option value='1960'>1960</option><option value='1959'>1959</option><option value='1958'>1958</option><option value='1957'>1957</option><option value='1956'>1956</option><option value='1955'>1955</option><option value='1954'>1954</option><option value='1953'>1953</option><option value='1952'>1952</option><option value='1951'>1951</option><option value='1950'>1950</option><option value='1949'>1949</option><option value='1948'>1948</option><option value='1947'>1947</option><option value='1946'>1946</option><option value='1945'>1945</option><option value='1944'>1944</option><option value='1943'>1943</option><option value='1942'>1942</option><option value='1941'>1941</option><option value='1940'>1940</option><option value='1939'>1939</option><option value='1938'>1938</option><option value='1937'>1937</option><option value='1936'>1936</option><option value='1935'>1935</option><option value='1934'>1934</option><option value='1933'>1933</option><option value='1932'>1932</option><option value='1931'>1931</option><option value='1930'>1930</option><option value='1929'>1929</option><option value='1928'>1928</option><option value='1927'>1927</option><option value='1926'>1926</option><option value='1925'>1925</option><option value='1924'>1924</option><option value='1923'>1923</option><option value='1922'>1922</option><option value='1921'>1921</option><option value='1920'>1920</option><option value='1919'>1919</option><option value='1918'>1918</option><option value='1917'>1917</option><option value='1916'>1916</option><option value='1915'>1915</option><option value='1914'>1914</option><option value='1913'>1913</option><option value='1912'>1912</option><option value='1911'>1911</option><option value='1910'>1910</option><option value='1909'>1909</option><option value='1908'>1908</option><option value='1907'>1907</option><option value='1906'>1906</option><option value='1905'>1905</option></select>
</select>
		</div>
	</div>
	
 <div class='row'>
		<div class='col'>
	 <div class='form-check form-check-inline'>
	<input class='form-check-input' type='radio' name='inlineRadioOptions' id='male' value='male' checked="True">
	<label class='form-check-label' for='inlineRadio1'>Male</label>
</div>
		</div>
		<div class='col'>
	 <div class='form-check form-check-inline'>
	<input class='form-check-input' type='radio' name='inlineRadioOptions' id='female' value='female'>
	<label class='form-check-label' for='inlineRadio1'>Female</label>
</div>
		</div>
	</div>

 <div class='row' style='margin-top: 20px;'>
	<div class='col-sm-12'>
	<button type='submit' class='btn btn-info col-sm-12 btn-lg' value='signup'>Signup</button>
	</div>
	</div>
</form>
	</div>
	
	</div><!-------------signup form end----------------->
	
	</div><!------main row end------>
	
	<div class='row'><!----footer------>
		<div class='col-sm-12 footer' style='text-align: center;'>
			<h6 style='background-color: #dde6eb;'>K2 Social Media</br>All Rights Reserved.</h6>

		</div>

	</div><!-----footer end------->
	
</div><!----main container end------->


<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
</body>
</html>
