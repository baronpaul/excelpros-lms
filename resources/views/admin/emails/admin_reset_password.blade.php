<!DOCTYPE html>
<html>
<head>
	<title>ExcelPros Test Platform</title>
</head>
<body>

	<table width="100%" border="0">
		<tr>
	    	<td>
	        	<div style="height:auto; width:720px; margin: 0 auto; font-family: sans-serif;">
	            	<table width="100%" border="0">
	                	
	                    <tr>
	                    	<td>
	                    		
	                    		<div style="width:100%;margin: 60px 0 100px; padding: 0 15px">
	                    			<h2 style="font-weight: normal">{{ $subject }}</h2><br>
	                    			<p>Hello {{ $name }},</p>
									<p>Your Password has been reset by the admin.</p>
									<p>The new password is: {{$password}}</p>
									<p>Please visit <a href="https://excelpros-test.i.ng">excelpros-test.i.ng</a>, 
										and login with your email and new password</p>
	                    		</div>

	                    	</td>
	                    </tr>

	                    <tr>
	                    	<td>
	                        	<div style="background-color: #ddd; padding: 10px 15px">
	                        		<p style="text-align: center">ExcelPros Testing Platform </p>
	                        	</div>
	                        </td>
	                    </tr>

	                </table>
	            </div>
	        </td>
	    </tr>
	</table>

</body>
</html>