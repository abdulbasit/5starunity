<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"
  style="margin: 0pt auto; padding: 0px; background:#F4F7FA;">
    <table id="main" width="100%" height="100%" cellpadding="0" cellspacing="0" border="0"
    bgcolor="#F4F7FA">
      <tbody>
        <tr>
          <td valign="top">
            <table class="innermain" cellpadding="0" width="580" cellspacing="0" border="0"
            bgcolor="#F4F7FA" align="center" style="margin:0 auto; table-layout: fixed;">
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
                          <td valign="top" align="center">
                            <a href="5starunity.com" style="display:inline-block; cursor:pointer; text-align:center;">
                              <img src="{{ asset('images/logo-5starunity.png')}}"  height="50" width="150" border="0" alt="5Starunity">
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
                          <td class="content" colspan="2" valign="top" align="center" style="padding-left:90px; padding-right:90px;">
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
                                  <td align="center"> <span style="color:#48545d;font-size:22px;line-height: 24px;; font-weight:bold">
                                      Bestätigung zur Anmeldung
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
                                    <td height="24" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="justify"> <span style="color:#48545d;font-size:14px;line-height:24px;text-align:left">
                                    Sehr geehrter Interessent, Sie haben sich mit <b> {{$email->sender_name}}</b>,<br /></span>
                                    für unseren Newsletter angemeldet. Es freut uns sehr, dass Sie Neuigkeiten über unsere Community, Partner und Produkte erfahren wollen – Sie sind nur noch einen Schritt von der Anmeldung entfernt; bitte bestätigen Sie Ihre Mailadresse durch klick auf den Button<br />
                                    <br />
                                  </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="48%" align="center"> <span>
                                      <a href="{{URL::to('/subscribe/'.$email->verification)}}" style="display:block; padding:15px 25px; background-color:#0087D1; color:#ffffff; border-radius:3px; text-decoration:none;">Newsletter Abonnieren </a>
                                      </span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="justify">
                                      <br />
                                      <span style="color:#48545d;font-size:14px;line-height:24px;text-align:left">
                                          Durch die Angabe Ihrer E-Mail-Adresse und Anklicken des Buttons <b>„Newsletter Abonnieren“</b> erklären Sie sich damit einverstanden, dass Ihnen die Firma 5starUnity Europe OÜ regelmäßig Informationen zu folgenden Themen senden darf: Allgemeine Branchen-Informationen, Vorstellung von Produkt- / Geschäftspartnern sowie unterstützten StartUp Unternehmen und allen zur Erfüllung notwendigen Services. 
                                      </span>
                                      <br />
                                      <span style="color:#48545d;font-size:14px;line-height:24px;text-align:left">
                                          <b>Ihre Einwilligung können Sie jederzeit gegenüber unserem Unternehmen widerrufen – Hinweise zum Datenschutz erfahren Sie <a href="{{URL::to('page/data-security')}}">HIER. </b>

                                      </span>
                                    </td>
                                  </tr>
                                <tr>
                                  <td height="20" &nbsp;=""></td>
                                </tr>
                                {{-- <tr>
                                  <td valign="top" width="48%" align="center"> <span>
                                    <a href="{{URL::to('/register?invitee='.$email->verification_code)}}" style="display:block; padding:15px 25px; background-color:#0087D1; color:#ffffff; border-radius:3px; text-decoration:none;">Verify Email Address</a>
                                    </span>
                                  </td>
                                </tr> --}}
                                <tr>
                                  <td height="20" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="center">
                                    {{-- <img src="https://s3.amazonaws.com/app-public/5Starunity-notification/hr.png" width="54" --}}
                                    {{-- height="2" border="0"> --}}
                                  </td>
                                </tr>
                                <tr>
                                  <td height="20" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="center">
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
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
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
                          <td valign="top" align="center"> 
                            <span style="font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#9EB0C9; font-size:10px;">
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
