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
                                  <td align="center"> <span style="color:#48545d;font-size:22px;line-height: 24px;">
                                    Newsletter-Verifizierung
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
                                    <p>Bestätigung zur Anmeldung,</p>
                                    <p>
                                      Sehr geehrter Interessent, Sie haben sich mit {{$email->sender_name}}
                                    </p>
                                    <p>
                                      für unseren Newsletter angemeldet. Es freut uns sehr, dass Sie Neuigkeiten über unsere Community, Partner und Produkte erfahren wollen – Sie sind nur noch einen Schritt von der Anmeldung entfernt; bitte bestätigen Sie Ihre Mailadresse durch klick auf den Button
                                    </p>
                                    </span>

                                  </td>
                                </tr>
                                <tr>
                                  <td height="20" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td valign="top" width="48%" align="center"> <span>
                                        {{-- <a href="#" style="display:block; padding:15px 25px; background-color:#0087D1; color:#ffffff; border-radius:3px; text-decoration:none;">JETZT BESTÄTIGEN</a> --}}
                                    <a href="{{URL::to('/subscribe/'.$email->verification)}}" style="display:block; padding:15px 25px; background-color:#0087D1; color:#ffffff; border-radius:3px; text-decoration:none;">JETZT BESTÄTIGEN</a>
                                    </span>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="20" &nbsp;=""></td>
                                </tr>
                                <tr>
                                  <td align="justify">
                                      <p>
                                        Durch die Angabe Ihrer E-Mail-Adresse und Anklicken des Buttons „Newsletter Abonnieren“ erklären Sie sich damit einverstanden, dass Ihnen die Firma 5starUnity Europe OÜ regelmäßig Informationen zu folgenden Themen senden darf: Allgemeine Branchen-Informationen, Vorstellung von Produkt- / Geschäftspartnern sowie unterstützten StartUp Unternehmen und allen zur Erfüllung notwendigen Services.
                                      </p>
                                      <p>
                                        Ihre Einwilligung können Sie jederzeit gegenüber unserem Unternehmen widerrufen – Hinweise zum Datenschutz erfahren Sie HIER.                                       </p>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="20" &nbsp;=""></td>
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
                          <td valign="top" align="center"> <span style="font-family: -apple-system,BlinkMacSystemFont,&#39;Segoe UI&#39;,&#39;Roboto&#39;,&#39;Oxygen&#39;,&#39;Ubuntu&#39;,&#39;Cantarell&#39;,&#39;Fira Sans&#39;,&#39;Droid Sans&#39;,&#39;Helvetica Neue&#39;,sans-serif; color:#9EB0C9; font-size:10px;">&copy;
                            <a href="https://www.5Starunity.com/" target="_blank" style="color:#9EB0C9 !important; text-decoration:none;">5Starunity</a> <?php echo date("Y") ?>
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
