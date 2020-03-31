<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
 @media only screen and (max-width:500px){.button{width:100% !important;}}.body{margin:0;padding:0;width:100%;background-color:#F2F4F6;}.email-wrapper{width:100%;margin:0;padding:0;background-color:#F2F4F6;}.email-masthead{padding:25px 0;text-align:center;}.email-body{width:100%;margin:0;padding:0;border-top:1px solid #EDEFF2;border-bottom:1px solid #EDEFF2;background-color:#FFF;}.email-footer{width:auto;max-width:570px;margin:0 auto;padding:0;text-align:center;}.email-footer_cell{color:#AEAEAE;padding:35px;text-align:center;}.body_action{width:100%;margin:30px auto;padding:0;text-align:center;}.body_sub{margin-top:25px;padding-top:25px;border-top:1px solid #EDEFF2;}.paragraph{margin-top:0;color:#74787E;font-size:16px;line-height:1.5em;}.paragraph-sub{margin-top:0;color:#74787E;font-size:12px;line-height:1.5em;}.mail-font{font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;}
</style>
</head>
    <body class="body">
    	<table width="100%" cellpadding="0" cellspacing="0">
    		<tr>
    			<td class="email-wrapper" align="center">
    				<table width="100%" cellpadding="0" cellspacing="0">
    				<!-- Logo -->
    					<tr>
    						<td class="email-masthead">
                                <div align="center">
                                    <h4>Ati fost contactat de:</h4>
                                    <h5>{!! $firstname !!} {!! $lastname !!}</h5>
                                </div>
    						</td>
    					</tr>
    				<!-- Email Body -->
    					<tr>
    						<td class="email-body" width="100%">
    							<table class="body_action" align="center" width="100%" cellpadding="0" cellspacing="0">
    								<tr>
                                        <td align="center">
                                            <h4>Date formular contact</h4>
                                            <p><b>Nume:</b> {!! $firstname !!}</p>
                                            <p><b>Prenume:</b> {!! $lastname !!}</p>
                                            <p><b>Email:</b> {!! $email !!}</p>
                                            <p><b>Mesaj:</b> {!! $user_message !!}</p>
                                        </td>
    								</tr>
    							</table>
    						</td>
    					</tr>
    				<!-- Footer -->
    					<tr>
    						<td>
    							<table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
    								<tr>
                                        <td class="mail-font email-footer_cell">
                                            <p style="color:red;">Acest este un mesaj trimis automat de Yes Contact System. Va rog sa nu raspundeti acestui mesaj.</p>
    										<p class="paragraph-sub"> &copy; 2020 Contact-System YesAgency. All rights reserved. </p></td>
    								</tr>
    							</table>
    						</td>
    					</tr>
    				</table>
    			</td>
    		</tr>
    	</table>
    </body>
</html>


