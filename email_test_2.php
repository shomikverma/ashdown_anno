<?php
$spreadsheet_url="https://docs.google.com/spreadsheets/d/1R_WNVevQZzvVgRqxII7uUh9IOprxOg9TiQg-9F3YkTI/export?format=csv&id=1R_WNVevQZzvVgRqxII7uUh9IOprxOg9TiQg-9F3YkTI";

if(!ini_set('default_socket_timeout', 15)) echo "<!-- unable to change socket timeout -->";

# content string, to be appended to
$content_string = <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width"/>
        <title>Modular Template Patterns</title>

        <!--
        	This email is an experimental proof-of-concept based on the
            idea that the most common design patterns seen in email can
            be placed in modular blocks and moved around to create
            different designs.

			The same principle is used to build the email templates in
            MailChimp's Drag-and-Drop email editor.

			This email is optimized for mobile email clients, and even
            works relatively well in the Android Gmail App, which does
            not support Media Queries, but does have limited mobile-
            friendly functionality.

			While this coding method is very flexible, it can be more
            brittle than traditionally-coded emails, particularly in
            Microsoft Outlook 2007-2010. Outlook-specific conditional
            CSS is included to counteract the inconsistencies that
            crop up.
            
            For more information on HTML email design and development,
            visit http://templates.mailchimp.com
        -->

        <style type="text/css">
			/*////// RESET STYLES //////*/
			body, #bodyTable, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;}
			table{border-collapse:collapse;}
			img, a img{border:0; outline:none; text-decoration:none;}
			h1, h2, h3, h4, h5, h6{margin:0; padding:0;}
			p{margin: 1em 0;}

			/*////// CLIENT-SPECIFIC STYLES //////*/
			.ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail/Outlook.com to display emails at full width. */
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;} /* Force Hotmail/Outlook.com to display line heights normally. */
			table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up. */
			#outlook a{padding:0;} /* Force Outlook 2007 and up to provide a "view in browser" message. */
			img{-ms-interpolation-mode: bicubic;} /* Force IE to smoothly render resized images. */
			body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;} /* Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. */

			/*////// FRAMEWORK STYLES //////*/
			.flexibleContainerCell{padding-top:20px; padding-Right:20px; padding-Left:20px;}
			.flexibleImage{height:auto;}
			.bottomShim{padding-bottom:20px;}
			.imageContent, .imageContentLast{padding-bottom:20px;}
			.nestedContainerCell{padding-top:20px; padding-Right:20px; padding-Left:20px;}

			/*////// GENERAL STYLES //////*/
			body, #bodyTable{background-color:#F5F5F5;}
			#bodyCell{padding-top:40px; padding-bottom:40px;}
			#emailBody{background-color:#FFFFFF; border:1px solid #DDDDDD; border-collapse:separate; border-radius:4px;}
			h1, h2, h3, h4, h5, h6{color:#202020; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left;}
			.textContent, .textContentLast{color:#404040; font-family:Helvetica; font-size:16px; line-height:125%; text-align:Left; padding-bottom:20px;}
			.textContent a, .textContentLast a{color:#2C9AB7; text-decoration:underline;}
			.nestedContainer{background-color:#E5E5E5; border:1px solid #CCCCCC;}
			.emailButton{background-color:#2C9AB7; border-collapse:separate; border-radius:4px;}
			.buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
			.buttonContent a{color:#FFFFFF; display:block; text-decoration:none;}
			.emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
			.emailCalendarMonth{background-color:#9E1E32; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:20px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
			.emailCalendarDay{color:#9E1E32; font-family:Helvetica, Arial, sans-serif; font-size:40px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
.emailCalendarTime{background-color:#9E1E32; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:21px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
            h1, .h1{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:34px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 2
			* @tip Set the styling for all second-level headings in your emails.
			* @style heading 2
			*/
			h2, .h2{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:30px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 3
			* @tip Set the styling for all third-level headings in your emails.
			* @style heading 3
			*/
			h3, .h3{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:26px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 4
			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
			* @style heading 4
			*/
			h4, .h4{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:22px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/*////// MOBILE STYLES //////*/
			@media only screen and (max-width: 480px){			
				/*////// CLIENT-SPECIFIC STYLES //////*/
				body{width:100% !important; min-width:100% !important;} /* Force iOS Mail to render the email at full width. */

				/*////// FRAMEWORK STYLES //////*/
				/*
					CSS selectors are written in attribute
					selector format to prevent Yahoo Mail
					from rendering media query styles on
					desktop.
				*/
				table[id="emailBody"], table[class="flexibleContainer"]{width:100% !important;}

				/*
					The following style rule makes any
					image classed with 'flexibleImage'
					fluid when the query activates.
					Make sure you add an inline max-width
					to those images to prevent them
					from blowing out. 
				*/
				img[class="flexibleImage"]{height:auto !important; width:100% !important;}

				/*
					Make buttons in the email span the
					full width of their container, allowing
					for left- or right-handed ease of use.
				*/
				table[class="emailButton"]{width:100% !important;}
				td[class="buttonContent"]{padding:0 !important;}
				td[class="buttonContent"] a{padding:15px !important;}

				td[class="textContentLast"], td[class="imageContentLast"]{padding-top:20px !important;}

				/*////// GENERAL STYLES //////*/
				td[id="bodyCell"]{padding-top:10px !important; padding-Right:10px !important; padding-Left:10px !important;}
			}
		</style>
        <!--
        	Outlook Conditional CSS

            These two style blocks target Outlook 2007 & 2010 specifically, forcing
            columns into a single vertical stack as on mobile clients. This is
            primarily done to avoid the 'page break bug' and is optional.

            More information here:
			http://templates.mailchimp.com/development/css/outlook-conditional-css
        -->
        <!--[if mso 12]>
            <style type="text/css">
            	.flexibleContainer{display:block !important; width:100% !important;}
            </style>
        <![endif]-->
        <!--[if mso 14]>
            <style type="text/css">
            	.flexibleContainer{display:block !important; width:100% !important;}
            </style>
        <![endif]-->
    </head>
    <body>
    	<center>
        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            	<tr>
                	<td align="center" valign="top" id="bodyCell">
                    	<!-- EMAIL CONTAINER // -->
                        <!--
                        	The table "emailBody" is the email's container.
                            Its width can be set to 100% for a color band
                            that spans the width of the page.
                        -->
                    	<table border="0" cellpadding="0" cellspacing="0" width="600" id="emailBody">


							<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" class="flexibleContainerCell">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td valign="top" class="textContent">
                                                                        <h1>Ashdown 3AM ANNO</h1>
                                                                        <br />
                                                                        A weekly compilation of events happening at and around Ashdown, sent weekly on Friday mornings at 3AM.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
EOD;

$ashdown_events_header = <<<EOD
<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" class="flexibleContainerCell">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td valign="top" class="textContent">
                                                                        <h2>Ashdown Events</h2>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
EOD;

$non_ashdown_events_header = <<<EOD
<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" class="flexibleContainerCell">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td valign="top" class="textContent">
                                                                        <h2>Non-Ashdown Events</h2>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
EOD;

$no_ashdown_events_header = <<<EOD
<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" class="flexibleContainerCell">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td valign="top" class="textContent">
                                                                        <h2>Ashdown Events</h2>
                                                                        <br />
                                                                        <p>None this week!</p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
EOD;

$no_non_ashdown_events_header = <<<EOD
<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" class="flexibleContainerCell">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td valign="top" class="textContent">
                                                                        <br />
                                                                        <h2>Non-Ashdown Events</h2> 
                                                                        <br />                                                                       
                                                                        <p>None this week!</p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
EOD;

$event_template = <<<EOD
<!-- MODULE ROW // -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%%">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" class="flexibleContainerCell bottomShim">
                                                        	<table border="0" cellpadding="0" cellspacing="0" width="100%%" class="nestedContainer">
                                                            	<tr>
                                                                	<td valign="top" class="nestedContainerCell">


                                                                        <!-- CONTENT TABLE // -->
                                                                        <table align="Left" border="0" cellpadding="0" cellspacing="0" width="160" class="flexibleContainer">
                                                                            <tr>
                                                                                <td align="center" valign="top" class="bottomShim">
                                                                                    <table border="0" cellpadding="0" cellspacing="0" width="160" class="emailCalendar">
                                                                                        <tr>
                                                                                            <td align="center" valign="top" style="padding:5px;">
                                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%%">
                                                                                                    <tr>
                                                                                                        <td align="center" valign="top" class="emailCalendarMonth">
                                                                                                            %s
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td align="center" valign="top" class="emailCalendarDay">
                                                                                                            %s
                                                                                                        </td>
                                                                                                    </tr>

                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
<td align="center" valign="top" class="emailCalendarTime" >
                                                                                                            %s
                                                                                                        </td>
                                                                                    </table>

                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <!-- // CONTENT TABLE -->
            
            
                                                                        <!-- CONTENT TABLE // -->
                                                                        <table align="Right" border="0" cellpadding="0" cellspacing="0" width="320" class="flexibleContainer">
                                                                            <tr>
                                                                                <td valign="top" class="textContent">
                                                                                    <h3>%s</h3>
                                                                                    <h4>%s</h4>
                                                                                    <p> %s </p>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <!-- // CONTENT TABLE -->


                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
EOD;

$end_string = <<<EOD
<!-- MODULE ROW // -->
                            <!--
                            	To move or duplicate any of the design patterns
                                in this email, simply move or copy the entire
                                MODULE ROW section for each content block.
                            -->
							<tr>
                            	<td align="center" valign="top">
                                	<!-- CENTERING TABLE // -->
                                    <!--
                                    	The centering table keeps the content
                                        tables centered in the emailBody table,
                                        in case its width is set to 100%.
                                    -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    	<tr>
                                        	<td align="center" valign="top">
                                            	<!-- FLEXIBLE CONTAINER // -->
                                                <!--
                                                	The flexible container has a set width
                                                    that gets overridden by the media query.
                                                    Most content tables within can then be
                                                    given 100% widths.
                                                -->
                                            	<table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer">
                                                	<tr>
                                                    	<td align="center" valign="top" width="600" class="flexibleContainerCell">


                                                            <!-- CONTENT TABLE // -->
                                                            <!--
                                                            	The content table is the first element
                                                                that's entirely separate from the structural
                                                                framework of the email.
                                                            -->
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td valign="top" class="textContent">
                                                                        <hr>
                                                                        <br />
                                                                        <h4>That's all for this week - have a great weekend!</h4>
                                                                        <p> Remember to follow us on <a href="https://www.instagram.com/mit.ashdown/" target="_blank">Instagram</a> and keep an eye on our <a href=https://ashdownhouse.mit.edu/" target="_blank">website</a> for more updates</p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <!-- // CONTENT TABLE -->


                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // FLEXIBLE CONTAINER -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // CENTERING TABLE -->
                                </td>
                            </tr>
                            <!-- // MODULE ROW -->
                            </table>
                    	<!-- // EMAIL CONTAINER -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>
EOD;

$mail_content = "Hi, this is a reminder that you have a meeting on %s at %s in %s.\n";

if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $spreadsheet_data[] = $data;
    }
    fclose($handle);
    
    # sort spreadsheet data by row 4
    usort($spreadsheet_data, function($a, $b) {
        return strtotime($a[3]) - strtotime($b[3]);
    });
    // print_r($spreadsheet_data);
    
    # loop over spreadsheet data and check if there are any Ashdown events in the next 7 days
    $events = false;
    foreach ($spreadsheet_data as $row) {
        $date = $row[3];
        $date = strtotime($date);
        $today = strtotime("today");
        $next_week = strtotime("+7 days");
        if ($date >= $today && $date <= $next_week && $row[8] == "Yes") {
            $events = true;
        }
    }
    if ($events == false) {
        $content_string .= $no_ashdown_events_header;
    } else {
        $content_string .= $ashdown_events_header;
        # loop over spreadsheet data and print row 3 (date) if it's within the next 7 days and row 8 is Yes
        foreach ($spreadsheet_data as $row) {
            $date = $row[3];
            $date = strtotime($date);
            $today = strtotime("today");
            $next_week = strtotime("+7 days");
            if ($date >= $today && $date <= $next_week && $row[8] == "Yes") {
                # get calendar month
                $month = date("M", $date);
                # get calendar day
                $day = date("d", $date);
                $day = $day . " " . $month;
                # get day of week
                $day_of_week = date("l", $date);
                # get calendar time (start time - end time)
                $time = date("g A", strtotime($row[4])) . " - " . date("g A", strtotime($row[5]));
                # get event name (row 3)
                $event_name = $row[2];
                # get location (row 6)
                $location = $row[6];
                # get event description (row 8)
                $event_description = $row[7];
                $mail_content_event = sprintf($event_template, $day_of_week, $day, $time, $event_name, $location, $event_description);
                $content_string .= $mail_content_event;
            }
        }
    }

    # loop over spreadsheet data and check if there are any non-Ashdown events in the next 7 days
    $events = false;
    foreach ($spreadsheet_data as $row) {
        $date = $row[3];
        $date = strtotime($date);
        $today = strtotime("today");
        $next_week = strtotime("+7 days");
        if ($date >= $today && $date <= $next_week && $row[8] == "No") {
            $events = true;
        }
    }
    if ($events == false) {
        $content_string .= $no_non_ashdown_events_header;
    } else {
        $content_string .= $non_ashdown_events_header;
        # loop over spreadsheet data and print row 3 (date) if it's within the next 7 days and row 8 is Yes
        foreach ($spreadsheet_data as $row) {
            $date = $row[3];
            $date = strtotime($date);
            $today = strtotime("today");
            $next_week = strtotime("+7 days");
            if ($date >= $today && $date <= $next_week && $row[8] == "No") {
                # get calendar month
                $month = date("M", $date);
                # get calendar day
                $day = date("d", $date);
                $day = $day . " " . $month;
                # get day of week
                $day_of_week = date("l", $date);
                # get calendar time (start time - end time)
                $time = date("g A", strtotime($row[4])) . " - " . date("g A", strtotime($row[5]));
                # get event name (row 3)
                $event_name = $row[2];
                # get location (row 6)
                $location = $row[6];
                # get event description (row 8)
                $event_description = $row[7];
                $mail_content_event = sprintf($event_template, $day_of_week, $day, $time, $event_name, $location, $event_description);
                $content_string .= $mail_content_event;
            }
        }
    }
    
    $content_string .= $end_string;
}
else
    die("Problem reading csv");

// Set the name of the file to write to
$file_name = 'example.html';
// Write the text to the file
file_put_contents($file_name, $content_string);

$to = "skverma@mit.edu, mingrany@mit.edu, zhengqi@mit.edu"; // Replace with recipient email address
$subject = "Ashdown 3AM ANNO"; // Replace with email subject
$message = $content_string; // Replace with HTML email message
$headers = "From: ashdown.3am.anno@gmail.com\r\n"; // Replace with sender email address
$headers .= "Content-Type: text/html; charset=UTF-8\r\n"; // Add HTML content type header

// Send email using WordPress wp_mail function
if (wp_mail($to, $subject, $message, $headers)) {
  echo "Email sent successfully!";
} else {
  echo "Email could not be sent.";
}
?>