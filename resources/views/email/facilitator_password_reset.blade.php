<!DOCTYPE html>
<html>
<head>
	<title>ExcelProsLMS Platform</title>
</head>
<body>

	<table width="100%" border="0">
		<tr>
			<td>
				<div style="height:auto; width:720px; margin: 0 auto; font-family: sans-serif;">
	            	<table width="100%" border="0">
	                	
	                    <tr>
	                    	<td>

	                    		<div style="width:100%;margin: 10px 0 40px; padding: 0 15px">
	                    			
                                    <p style="line-height:1.5; font-size: 14px">Hello {{ $recipient_name }},
                                    </p>
									<p style="line-height:1.5; font-size: 14px">
                                        Your password was reset by the admin. Please login with this new password:<br>
                                        <strong>Password: {{ $recipient_password }}</strong>
                                    </p>
                                    <p style="line-height:1.5; font-size: 14px">
                                        You can change the password after you login. Please click on the link below to proceed.
                                    </p>
                                    <p><a href="{{ $site_link }}">Proceed to ExcelProsLMS</a></p>
                                    
									
									<p style="line-height:1.5; font-size: 14px">
										See you on the other side<br><br>
										Kind regards,<br>
										ExcelProsLMS Team<br>
										
									</p>
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