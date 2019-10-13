<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"
  style="margin: 0pt auto; padding: 0px; background:#F4F7FA;">
    <table id="main" width="100%" height="100%" cellpadding="0" cellspacing="0" border="0"
    bgcolor="#F4F7FA">
      <tbody>
        <tr>
          <td valign="top">
            <table class="innermain" cellpadding="0" width="580" cellspacing="0" border="0"
            bgcolor="#F4F7FA" align="justify" style="margin:0 auto; table-layout: fixed;">
              <tbody>
                <!-- START of MAIL Content -->
                <tr>
                  <td colspan="4">
                    <!-- Logo start here -->
                    <table class="logo" width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tbody>
                        <tr>
                          <td colspan="2" height="30"></td>
                        </tr>
                        <tr>
                          <td valign="top" align="justify">
                            <a href="5starunity.com" style="display:inline-block; cursor:pointer; text-align:justify;">
                              <img src="{{ asset('images/logo-5starunity.png')}}"  height="50" width="200" border="0" alt="5Starunity">
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" height="30"></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- Logo end here -->
                    <!-- Main CONTENT -->
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff"
                    style="border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                      <tbody>
                        <tr>
                          <td height="40"></td>
                        </tr>
                        <tr style="font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#4E5C6E; font-size:14px; line-height:20px; margin-top:20px;">
                          <td class="content" colspan="2" valign="top" align="justify" style="padding-left:90px; padding-right:90px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
                              <tbody>
                                <tr>
                                  <td align="center" valign="bottom" colspan="2" cellpadding="3">
                                    <img alt="5Starunity" width="80" src="{{ asset('frontend/graphics/icons/icon_email.png')}}"/>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="30" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="justify"> <span style="color:#48545d;font-size:22px;line-height: 24px; font-weight:bold">
                                      Einladung zur Community 
                                    </span>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="24" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#DAE1E9"></td>
                                </tr>
                                <tr>
                                  <td height="24" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="justify"> <span style="color:#48545d;font-size:14px;line-height:24px;">
                                    {{-- <span style="text-align:left">Hi <b></b>,<br /></span> --}}
                                    {{$email->sender_name}} lädt dich ein der 5starUnity-Community in seinem Team beizutreten. <br />
                                    <br /> 
                                    Es wäre uns eine Ehre deine Stärken bei uns zu wissen und mit Euch gemeinsam vielen Erfindern, Gründern und Entwicklern helfen zu können.
                                  <br />
                                  <br />
                                  Zur Erstellung eines <strong>kostenfreien Accounts</strong> klicke bitte auf folgenden Link:   
                                  </span>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="20" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td valign="top" width="48%" align="justify"> <span>
                                    <a href="{{URL::to('/register?invitee='.$email->verification_code)}}" style="display:block; padding:15px 25px; background-color:#0087D1; color:#ffffff; border-radius:3px; text-decoration:none;">KOSTENFREIEN ACCOUNT ANLEGEN </a>
                                    </span>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="20" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="justify">
                                    {{-- <img src="https://s3.amazonaws.com/app-public/5Starunity-notification/hr.png" width="54" --}}
                                    {{-- height="2" border="0"> --}}
                                  </td>
                                </tr>
                                <tr>
                                  <td height="20" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="justify">
                                    <p style="color:#a2a2a2; font-size:12px; line-height:17px; font-style:italic;">
                                        Diese Einladung wurde auf Wunsch des oben genanntem Community-Mitglied an Sie versendet, welches Sie auf unsere Gemeinschaft hinweisen möchte. 
                                        <br />
                                        <br />
                                        Sollten Sie kein Interesse an einer Teilnahme haben oder der falsche Adressat sein, können Sie diese Mail einfach ignorieren; es finden keine automatisierten Folgemails, eine Aufnahme in irgendeine Datenbank oder sonstiges statt. 
                                        <br />
                                        <br />
                                        Für weitere Anliegen steht Ihnen unser Service-Team gerne jederzeit zur Verfügung.   
                                    </p>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr align="center">
                            <h1>Folgen Sie uns auf</h1>
                            <table border="0">
                              <tr>
                                <td><a href="https://www.linkedin.com/company/47984332/"><img src="{{ asset('frontend/img/linkedin.png')}}"  height="35" width="35" border="0" alt="5Starunity"></a></td>
                                <td><a href="https://www.facebook.com/pg/5starunity-Europe-O%C3%9C-103240304411163"><img src="{{ asset('frontend/img/facebook.png')}}"  height="35" width="35" border="0" alt="5Starunity"></a></td>
                                <td><a href="https://twitter.com/5starUnity"><img src="{{ asset('frontend/img/twitter.png')}}"  height="35" width="35" border="0" alt="5Starunity"></a></td>
                                <td><a href="https://www.instagram.com/5starunity/"><img src="{{ asset('frontend/img/instagram.png')}}"  height="35" width="35" border="0" alt="5Starunity"></a></td>
                                <td><a href="https://www.pinterest.at/5starUnity/"><img src="{{ asset('frontend/img/pinterest.png')}}"  height="35" width="35" border="0" alt="5Starunity"></a></td>
                              </tr>
                            </table>
                          <td height="60"></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- Main CONTENT end here -->
                    <!-- PROMO column start here -->
                    <!-- Show mobile promo 75% of the time -->
                    <table id="promo" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:20px;">
                      <tbody>
                        <tr>
                          <td colspan="2" height="20"></td>
                        </tr>
                        <tr>
                          <td colspan="2" height="20"></td>
                        </tr>
                        <tr>
                          <td colspan="2" height="20"></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- PROMO column end here -->
                    <!-- FOOTER start here -->
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tbody>
                        <tr>
                          <td height="10">&nbsp;</td>
                        </tr>
                        <tr>
                          <td valign="top" align="center"> <span style="font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#9EB0C9; font-size:10px;">
                              <a href="https://www.5Starunity.com/" target="_blank" style="color:#9EB0C9 !important; text-decoration:none;">
                                © 5starUnity Europe OÜ <?php echo date("Y") ?><br />
                                </a> 
                                Athri tn. 8 | EST-10151 Tallinn | www.5starunity.com
                          </span>

                          </td>
                        </tr>
                        <tr>
                          <td height="50">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- FOOTER end here -->
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
