@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('frontend/wizard-form/css/style.css')}}">
<style>
.bar-strength
{
    width: 100% !important;
    height: 7px !important;
    position: unset  !important;
}
.fieldset-content
{
    height: auto !important;
}
help{
    float: left;
    width: 100%;
    font-size: 12px;
    text-align: center;
    color: #888;
}
.label {
    font-size: 13px;
    font-weight: normal;
    width:230px !important
}
.actions ul li a
{
    border: 1px solid rgb(225, 225, 225);
    color: black;
    border-radius: 100px;
    background: none
}
.actions ul li a:hover
{
    border: 1px solid green;
    color: white;
    border-radius: 100px;
    background-color:green
}
label.error
{
    right:10px;
    border:none
}
#val
{
    height: 35px;
    width: 100%
}
.title
{
    margin-bottom: 0px
}

#val1
{
    height: 35px;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    font-size: 14px;
    font-weight: bold;
    pointer-events: none;
    border: 1px solid #ebebeb;
    font-family: 'Roboto Slab';
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
}
#val2
{
    height: 35px;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    font-size: 14px;
    font-weight: bold;
    pointer-events: none;
    border: 1px solid #ebebeb;
    font-family: 'Roboto Slab';
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
}
#val3
{
    height: 35px;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    font-size: 14px;
    font-weight: bold;
    pointer-events: none;
    border: 1px solid #ebebeb;
    font-family: 'Roboto Slab';
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
}
#val4
{
    height: 35px;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    font-size: 14px;
    font-weight: bold;
    pointer-events: none;
    border: 1px solid #ebebeb;
    font-family: 'Roboto Slab';
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;

}
input[type='file']
{
    height: 35px;
    width: 100% !important
}
#button
{
    height: 35px;
    z-index: -1000;
}
#button1
{
    height: 35px;
    cursor: pointer;
    background: #f8f8f8;
    color: #999;
    position: absolute;
    right: 0;
    top: 0;
    font-size: 14px;
    text-align: center;
    -webkit-transition: 500ms all;
    -moz-transition: 500ms all;
    transition: 500ms all;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
    z-index: -1000;
    width: 125px;
    padding-top: 4px;
}
#button2
{
    height: 35px;
    width: 125px;
    padding-top: 4px;
    cursor: pointer;
    background: #f8f8f8;
    color: #999;
    position: absolute;
    right: 0;
    top: 0;
    font-size: 14px;
    text-align: center;
    -webkit-transition: 500ms all;
    -moz-transition: 500ms all;
    transition: 500ms all;
    align-items: center;
    -moz-align-items: center;
    -webkit-align-items: center;
    -o-align-items: center;
    -ms-align-items: center;
    justify-content: center;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -o-justify-content: center;
    -ms-justify-content: center;
    z-index: -1000;
}

.form-group rp
{
    border: 0px white !important;
    display: none !important

}
.form-group input.error{
    border:solid 1px red !important
}
.form_error
{
    border: solid 1px red !important
}
.error_msg
{
    color: red;
    font-size: 12px
}
.actions ul li a
{
    height: 40px;
}
label.error {
    right: 10px;
    width: 100%;
    text-align: right;
}
.terms_cond
{
    height: 400px;
    overflow: auto;
}
.actions
{
    position: relative !important;
    bottom: -10px !important
}
.fieldset-content
{
    padding-right: 15px !important
}

</style>
@endsection
@section('content')
<div class="main">
        <div class="container">
            <h2 class="text-center registerHeading">{{ __('content.register_heading')}}  </h2>
            <br />
            <form method="POST" id="signup-form" class="" enctype="multipart/form-data" action="{{ route('register.save') }}">
                @csrf
                <h3>
                    <span class="title_text">{{ __('content.accunt_information')}} </span>
                </h3>
                <fieldset>
                    <div class="col-lg-7 fieldset-content">
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="fname" class="form-label">{{ __('lables.first_name')}} <font color="red"> *</font></label>
                                <input required="required" type="text" value="{{ old('fname') }}" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="lname"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="mname" class="form-label">{{ __('lables.middle_name')}} </label>
                                <input type="text" value="{{ old('mname') }}" class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" id="mname"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="lname" class="form-label">{{ __('lables.last_name')}} <font color="red"> *</font></label>
                                <input required="required" type="text" value="{{ old('lname') }}" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" id="lname"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="email" class="form-label">{{ __('lables.email')}} <font color="red"> *</font></label>
                                <label id="email-error" class="error" for="email" style="display: none;"></label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  id="email" onchange="check_email()"/>
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group form-password" style="margin:0px">
                                <label for="password" class="form-label" style="margin-left:20px">{{ __('lables.password')}} <font color="red"> *</font></label>
                                <input required="required" type="password"  id="password" data-indicator="pwindicator" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" />
                                <div id="pwindicator" style="width: 100px; height: 50px; top: 23px; position: relative;">
                                    <div class="label1"></div>
                                    <div class="bar-strength">
                                        <div class="bar-process">
                                            <div class="bar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group" style="margin:0px">
                                <label for="email" class="form-label"></label>
                                <p style="font-size:11px; width:100%; line-height:20px">
                                    Wir empfehlen mind. acht Charakter und dabei einen Groß- / Kleinbuchstaben, <br />Ziffern und zwei Sonderzeichen.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="email" class="form-label"></label>
                                <p  style="font-size:11px; width:100%"><font color='red'>*</font> Angaben / Eingaben sind erforderlich </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-lg-offset-1 hidden-xs hidden-md">
                        <br />
                        <img class="img-responsive" src="{{ URL::to('/') }}/frontend/graphics/4_tabs/1regsiter.png">
                    </div>
                    {{-- <div class="fieldset-footer">
                        &nbsp; <span>Step 1 of 2</span>
                    </div> --}}
                </fieldset>
                <h3>
                    <span class="title_text">{{ __('content.personal_information')}}</span>
                </h3>
                <fieldset>
                    <div class="col-lg-7">
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="dob" class="form-label">{{ __('lables.dob')}} <font color="red"> *</font></label>
                                <label id="dob-error" class="error" for="dob" style="display: none;"></label>
                                <input onchange="calcAge()" required="required" type="text" class="form-control" name="dob" id="dob" placeholder="(TT.MM.JJJJ)" />
                            </div>
                            <div class="error_msg" id="dobMsg"></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="dob" class="form-label">{{ __('lables.country')}} <font color="red"> *</font></label>
                                <select name="country" id="country" onchange="getCountrySates()" class="form-control" required="required" style="margin-bottom:15px">
                                    <option >----{{ __('lables.selct_country')}}----</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->country->id}}">{{$country->country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-select">
                                <label for="country" class="form-label marginLabel">{{ __('lables.city')}} / {{ __('lables.postal_code')}} <font color="red"> *</font></label>
                                <div class="row" style="width:100%; margin:0px">
                                    <div class="col-lg-7 col-xs-12 paddingZero postaFields">
                                        <input required="required" type="text" class="form-control" name="city" id="city"/>
                                    </div>
                                    <div class="col-lg-3 col-xs-12 paddingZero stateMargin ">
                                        <input required="required" type="text" class="form-control" name="postal_code" id="postal_code"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="address" class="form-label">{{ __('lables.address')}} <font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="address" id="address"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="country" class="form-label">{{ __('lables.house_number')}}<font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="hnumber" id="hnumber" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="address" class="form-label">{{ __('lables.address2')}} </label>
                                <input  type="text" class="form-control" name="address2" id="address2"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-select">
                                <label for="country" class="form-label">{{ __('lables.phone_number')}} <font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="phone" id="phone"/>
                            </div>
                        </div>
                        <div class="row files">
                            <div class="col-xs-12 form-group">
                                <label for="profile_pic" class="form-label addressProof">{{ __('lables.avatar')}} &nbsp; &nbsp;</label>
                                <div class="form-file" id="id_card">
                                    <input type="file" name="profile_pic" id="profile_pic" class="custom-file-input form-control" />
                                    <span id='val'></span>
                                    <span id='button1'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row files">
                            <div class="col-xs-12 form-group">
                                <label for="profile_pic" class="form-label addressProof" >{{ __('lables.identity_proof')}} <font color="red"> *</font></label>
                                <div class="form-file text-center" id="id_prrof">
                                    <input required="required" type="file" multiple="multiple" name="identity_card[]"  id="identity_card" class="custom-file-input form-control" />
                                    <span id='val2' class="idImg"></span>
                                    <span id='button2'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row files">
                            <div class="col-xs-12 form-group">
                                <label for="profile_pic" class="form-label addressProof">{{ __('lables.id_front')}} <font color="red"> *</font></label>
                                <div class="form-file text-center" id="id_prrof_front">
                                    <input required="required" type="file" name="identity_card_front"  id="identity_card_front" class="custom-file-input form-control" />
                                    <span id='val3' class="idImg1"></span>
                                    <span id='button2'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row files">
                            <div class="col-xs-12 form-group" style="margin:0px">
                                <label for="profile_pic" class="form-label addressProof" >{{ __('lables.id_back')}}<font color="red"> *</font></label>
                                <div class="form-file text-center" id="id_prrof_bck">
                                    <input required="required" type="file" name="identity_card_back"  id="identity_card_back" class="custom-file-input form-control" />
                                    <span id='val4' class="idImg2"></span>
                                    <span id='button2'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label for="email" class="form-label"></label>
                                <p  style="font-size:11px; width:100%"><font color='red'>*</font> Angaben / Eingaben sind erforderlich </p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="fieldset-footer">
                        &nbsp;
                        <span>Step 2 of 2</span>
                    </div> --}}

                    </div>
                    <div class="col-lg-3 col-lg-offset-1 hidden-xs hidden-md">
                        <br />
                        <img class="img-responsive" src="{{ URL::to('/') }}/frontend/graphics/4_tabs/1regsiter.png">
                    </div>

                </fieldset>
                <h3 style="display:none">
                    <span id="title_id_3" class="title_text">{{ __('content.terms_cond')}}</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-xs-12 terms_cond" id="terms">
                                    <strong>1 Allgemeines </strong><br />
                                    <p>
                                    (1)	Dies sind unsere Allgemeinen Geschäfts- und Nutzungsbedingungen (nachfolgend kurz: AGB) für alle auf der Plattform „5starUnity.com“ angebotenen Dienstleistungen, Services und sonstigen Eventualitäten, wie bspw. eine Spende zugunsten des Vereins, und alle zu dieser Domain gehörenden Subdomains (nachfolgend: 5starUnity-Webseiten). Ferner gelten diese AGB für alle Geschäftsbeziehungen zwischen dem 5starUnity e.V., Karl-Schurz-Strasse 16, 70190 Stuttgart, Deutschland (kurz: 5starUnity) und den Unterstützern / Spendern / Produktgebern sowie Partnern (nachfolgend: Partner).</p>
                                        <p>
                                    (2)	Die Nutzung unserer 5starUnity-Webseiten bestimmt sich ausschließlich nach den vorliegenden AGB; abweichenden Allgemeinen Geschäftsbedingungen der Partner oder von Interessenten, welche ggf. ersuchen, Partner zu werden, wird ausdrücklich widersprochen. Die AGB werden angenommen, indem die entsprechende Schaltfläche bei der Anmeldung als Partner bestätigt wird. Eine aktuell gültige Fassung kann jederzeit unter www.5starUnity.com/Nutzungsbedingungen abgerufen, ausgedruckt oder lokal abgespeichert werden.
                                        </p>
                                        <p>
                                    (3)	Betreiber der 5starUnity-Webseiten sowie Vertragspartei aller Partner, inkl. jener nach §2 der Vereinssatzung zu unterstützenden natürlichen und jusristischen Personen, ist 5starUnity. Abweichende Rechtsverhältnisse richten sich nach den zu schließenden separaten Verträgen und werden involvierten Partnern kund getan.
                                        </p>
                                        <p>
                                    (4)	Alle 5starUnity-Webseiten verstehen sich als Online-Plattform, auf der Partnern die Möglichkeit gegeben wird, mittels Spenden Erfinder und Gründer in der StartUp-Phase und ggf. darüber hinaus finanziell zu unterstützen, um somit die Möglichkeit zu schaffen, Erfindungen, welche insbesondere der Allgemeinheit dienen, marktreif zu gestalten. Für jede Spende erhält der Partner automatisch 5starUnity-Taler (ein Taler entspricht einem gespendeten Euro) auf sein persönliches Partnerkonto gutgeschrieben und besitzt fortan die Möglichkeit, diese in der vereinseigenen Lottery of Things oder sonstigen Konzepten / Produkten einzutauschen. Eine Auszahlung dieser 5starUnity-Taler ist ausgeschlossen.
                                        </p>
                                    <strong>
                                        2 Anmeldung und Partnerkonto
                                    </strong>
                                    <p>
                                    (1)	Die Nutzung diverser Bereiche innerhalb der 5starUnity-Webseite setzt eine kostenfreie Anmeldung als Partner voraus. Ein erfolgreicher Anmeldeprozess bedarf u. a. der Zustimmung zu diesen AGB sowie der Bereitstellung benötigter Verifizierungsdateien. Mit der im Rahmen der Registrierung versendeten Bestätigungs-Mail sowie des Klicks auf den darin enthaltenen Aktivierungs-Link, kommt zwischen 5starUnity und dem Partner ein Vertrag über die Nutzung der 5starUnity-Webseiten zustande.
                                    </p>
                                    <p>
                                    (2)	Eine Anmeldung ist nur unbeschränkt geschäftsfähigen Personen erlaubt, welche insbesondere das 18. Lebensjahr vollendet haben und wahrheitsgemäße Angaben der abgefragten Daten vollständig übermitteln.
                                    </p>
                                    <p>
                                    (3)	Bei der Anmeldung dürfen nur einzelne Personen als Inhaber eines Partnerskonto angegeben werden (d. h. keine Ehepaare oder Familien); Mehrfachregistrierungen (auch durch vorgeschobene Dritte) sind untersagt – eine Übertragbarkeit ist ausgeschlossen.
                                    </p>
                                    <p>
                                    (4)	Alle Partner verpflichten sich, sämtliche angegebene Daten, welche sich nach der Anmeldung ändern, umgehend zu korrigieren und stets aktuell zu halten. Sollte eine selbstständige Abwandlung unmöglich sein, ist ein Änderungswunsch über die interne Mitteilungszentrale inkl. Begleitdokumente zu übermitteln.
                                    </p>
                                    <p>
                                    (5)	Der Partner ist für die Nutzung seines Accounts eigenständig verantwortlich und hat dafür Sorge zu tragen, dass das Passwort keinem Dritten zugänglich gemacht wird. Ferner trägt er die volle Verantwortung für alle Handlungen, welche über sein jeweiliges Profil auf den 5starUnity-Webseiten vorgenommen werden. Sollte der Partner eine unautorisierte oder missbräuchliche Nutzung seines Passworts oder seines Partnerskontos bemerken, ist er verpflichtet, dies 5starUnity unverzüglich mitzuteilen.
                                    </p>
                                    <p>
                                    (6)	5starUnity behält sich das Recht vor, Profile, die mit Einmal-Emailadressen (auch unter Wegwerf-Emailadressen bekannt) registriert wurden, sowie Partnerkonten von nicht vollständig durchgeführten Anmeldungen nach einer angemessenen Zeit zu löschen.
                                    </p>
                                    <p>
                                    (7)	Es besteht kein Anspruch auf Nutzung des und dem damit verbundenem Partnerkonto auf den 5starUnity-Webseiten. 5starUnity behält sich das Recht vor, selbst beim Vorliegen aller Voraussetzungen für eine Aufnahme,  Anmeldungsgesuche ohne Angabe von Gründen abzulehnen und bestätigt an dieser Stelle, dass alle bis zu diesem Zeitpunkt übermittelten Daten automatisch gelöscht werden.
                                    </p>
                                    <p>
                                        <strong>
                                    3 Nutzung, Verfügbarkeit und Systemintegrität der 5starUnity-Webseiten
                                        </strong>
                                    </p>
                                    <p>
                                    (1)	5starUnity stellt lediglich eine Plattform zur Verfügung, mittels derer Partner ein persönliches Nutzerkonto eröffnen und Spenden tätigen können. Für getätigte Unterstützungen, welche gem. § 2 Vereinssatzung verwendet werden, erhält der Partner 5starUnity-Taler und kann damit in der vereinseigenen Lotterie Preise gewinnen. Die Informationen / Detailbeschreibungen der Lotterie-Preise auf den 5starUnity-Webseiten werden ausschließlich ohne Gewähr zur Verfügung gestellt; 5starUnity steht daher nicht für die Richtigkeit und Vollständigkeit dieser Informationen ein.
                                    </p>
                                    <p>
                                    (2)	Alle Daten von Parterunternehmungen, Werbeträgern und sonstigen Unterstützern – sowohl im öffentlichen als auch im internen Nutzungsbereich – werden gem. separat vereinbarter Verträge proklamiert. 5starUnity übernimmt keine Verantwortung für Richtigkeit / Vollständigkeit und schließt hiermit etwaige Haftungsansprüche im Vorfeld aus. Sofern 5starUnity Links zu Webseiten Dritter veröffentlicht, wird für deren Inhalt keinerlei Haftung übernommen. Die Inhalte dieser Seiten unterliegen nicht dem Einfluss des Vereins oder der im Auftrag des Vereins handelnden Unternehmung.
                                    </p>
                                    <p>
                                    (3)	Sollten Informationen und Daten als „vertraulich“ gekennzeichnet werden (z. B. innerhalb eines Newsletters nach einer Unterstützung durch unseren Verein), sind alle Partner der Verschwiegenheit verpflichtet. Alle vertraulichen Informationen dürfen ausschließlich zum Zwecke einer (ggf. weiteren) Spendenentscheidung genutzt und müssen vertraulich behandelt werden. Eine Weitergabe an Dritte, Veröffentlichung oder Verbreitung darf ohne Genehmigung von 5starUnity in keiner Art oder Form stattfinden.
                                    </p>
                                    <p>
                                    (4)	Auf den von 5starUnity zur Verfügung gestellten Webseiten bestehen technische Möglichkeiten, selbst Inhalte bzw. Kommentare zu veröffentlichen. Diese veröffentlichten Inhalte werden von 5starUnity grundsätzlich nicht geprüft und stellen nicht die Meinung von 5starUnity dar.
                                    </p>
                                    <p>
                                    (5)	5starUnity ist ein freundlicher, sachlicher und fairer Umgangston wichtig. Deshalb behält sich der Vorstand bzw. die dafür zuständige Abteilung vor, Beiträge und Kommentare nicht zu veröffentlichen, zu löschen, zu bearbeiten, zu verschieben oder zu schließen, sofern ein intern definierter Verstoß vorliegt. 5starUnity wird Verhaltensregeln erstellen und diese im öffentlich zugänglichen Bereich hinterlegen.
                                    </p>
                                    <p>
                                    (6)	Es ist beabsichtigt, eine umfassende Verfügbarkeit der 5starUnity-Webseiten für den Partner zu ermöglichen; dennoch wird an dieser Stelle darauf hingewiesen, dass kein Anspruch auf eine solche Disponibilität besteht, da dieser aus technischen Gründen nicht gewährt werden kann. Ferner sind alle Beteiligten bestrebt, durch Erweiterungen oder Verbesserungen alle 5starUnity-Webseiten an sich, aber auch die allgemeine Sicherheit ständig weiterzuentwickeln – eine eingeschränkte Verfügbarkeit könnte als Folge eintreten. Wartungsarbeiten, die zu einer Einschränkung führen, werden den Partnern angezeigt. Zu entsprechenden Einschränkungen könnte ebenfalls mangelnde technische Ausstattung und / oder mangelnde Internet-Datenqualität beitragen. Letztendlich ist anzumerken, dass 5starUnity jederzeit berechtigt ist, alle Webseiten und deren Angebote vorübergehend einzuschränken, wenn dies aus Kapazitätsgründen, aus Gründen der Sicherheit oder zur Durchführung sonstiger technischer Maßnahmen von Nöten ist oder 5starUnity aus anderen Gründen sinnvoll erscheint. Für Datenverluste wird keine Haftung übernommen.
                                    </p>
                                    <strong>
                                    4 Spenden, Erhalt / Gebrauch von 5starUnity-Talern und Widerrufsrecht
                                    </strong>
                                    <p>
                                    (1)	Nach erfolgreicher Verifizierung stehen jedem Partner interne Bereiche auf der Plattform zur Verfügung. Aufgrund der vom Vorstand festgelegten Altersgrenze kann keine Spende davor getätigt werden. Zur Übermittlung einer Spende benutzt der Partner den im eigenen Hauptmenü vorhandenen Button und folgt den Schritten der Zahlungsabwickler, welche in § 5 näher beschrieben werden. Folgeschritte unterliegen den Bestimmungen der einzelnen Anbieter, 5starUnity übernimmt keine Haftung für diese Abwicklungen.
                                    </p>
                                    <p>
                                    (2)	Sollte ein Partner andenken, größere Beträge (ab 25.000.- Euro) für den ideelen Hauptzweck des Vereins zur Verfügung stellen zu wollen, könnten gesonderte Verträge mit eigenem Rechtsgebaren angefertigt werden. Hierzu bitten wir den Vorstand unter Spenden@5starUnity.com für weitere Vorgehensweisen zu kontaktieren. Bis zur Erstellung einer gesonderten Vereinbarung gelten diese AGB.
                                    </p>
                                    <p>
                                    (3)	Nach einem bestätigten Spendeneingang durch den Zahlungsabwickler an 5starUnity erhält der Partner im Verhältnis 1 Euro = 1 Taler vereinseigene 5starUnity-Taler zur freien Verfügung in sein Backoffice eingebucht. Diese Taler sind als freiwillge Gabe des Vereins für eine Unterstützung anzusehen und können weder ausbezahlt, umgetauscht, weitergegeben oder rückabgewickelt werden. Mit diesen Talern kann der Partner im internen Bereich Lose innerhalb der Lottery of Things sowie alle sonstig angebotenen Produkte / Konzepte erwerben. Es gelten hierbei die Verlosungsbedingungen auf den jeweilig angebotenen Preisen und / oder die Tauschbedingungen bei Produkten / Konzepten von externen Anbietern. 5starUnity übernimmt keine Haftung für Qualität, Herkunft, Vertragsbestimmungen oder sonstige Ungereimtheiten externer Produkte / Konzepte.
                                    </p>
                                    <p>
                                    (4)	Der Zeitpunkt einer Verlosung, die Austellung diverser Produkte, die Einteilung von sonstigen Konzepten / Gegebenheiten obliegt ausschließlich 5starUnity, es besteht kein Anspruch auf bestimmte Artikel. Sollte ein Artikel, der sich bereits in einer aktiven Verlosungsphase befindet und Partner Taler in Lose getauscht haben, zu deaktivieren sein bzw. findet – obgleich welchem Grund – eine Rückabwicklung statt, erhalten alle Partner die dementsprechend eingesetzten Taler gutgeschrieben. Es besteht in diesem Sonderfall kein Anspruch auf tatsächliche Verlosung wobei anzumerken ist, dass 5starUnity alle Möglichkeiten zur Vermeidung dieses Szenarios ausschöpft. Im Gegenzug besteht jederzeit die Chance, dass ein Produkt vor Ablauf der 100% Los-Vergabe verlost wird; die Entscheidung obliegt 5starUnity – in diesem Fall erhöht sich die theoretische Gewinnchance eines jeden Losbesitzers prozentual.
                                    </p>
                                    <p>
                                    (5)	Jede Ziehung findet unter Aufsicht eines Juristen und eines Vorstandes von 5starUnity statt; temporär ist es angedacht und möglich, dass sich ehemalige Gewinner freiwillig als Los-Fee beteiligen. Der Sieger wird max. 72 Stunden nach Bekanntgabe telefonisch und / oder schriftlich kontaktiert – eine Besitzübergabe findet gem. persönlicher Absprache statt, es fallen keine Versand- / Übergabekosten in den freigegebenen Ländern an. Sollte ein Gewinner weder telefonisch noch schriftlich erreichbar sein, wird das Objekt zwei Monate in den Räumlichkeiten von 5starUnity verwahrt. Nach Ablauf der zwei Monate ab Bekanntgabe erlischt für den rechtmäßig gezogenen Gewinner folgerichtiger Besitzanspruch und geht an 5starUnity über. Über eine weitere Mittelverwendung entscheidet der Vorstand einstimmig.
                                    </p>
                                    <p>
                                    (6)	Widerrufsrecht / Widerrufsbelehrung – Akzeptanz der unwiderruflichen Übertragung der Eigentumsrechte: Jede/r Pomotionsartikel / Sachspende wird unwiderruflich eingebracht; alle Eigentumsrechte gehen nach Annahme des Aufnahmeprotokolls durch ein amtierendes Vorstandsmitglied an den Verein über. Nach Übertragung der Rechte hat eine Aushändigung des Gegenstandes zu erfolgen, ein Widerruf ist unzulässig. Die angegebene natürliche / juristische Person bestätigt mit ihrer rechtskräftigen Unterschrift dies gelesen, verstanden und akzeptiert zu haben.
                                    </p>
                                    <strong>
                                     5 Zahlungsabwicklungen für Spenden
                                    </strong>
                                    <p>
                                    (1)	Die Zahlungsabwicklung für sämtliche auf den 5starUnity-Webseiten vorgenommenen Spenden wird ausschließlich von auf der Plattform näher beschriebenen Zahlungsdienstleistern mit der Erlaubnis zum Betreiben von Finanztransfergeschäften durchgeführt.
                                    </p>
                                    <p>
                                    (2)	Hinsichtlich der zur Verfügung gestellten Methoden (bspw: Kreditkarte, PayPal) gelten die jeweiligen Geschäftsbedingungen der einzelnen Anbieter, 5starUnity übernimmt keine Haftung für Vollständigkeit / Korrektheit der Angaben.
                                    </p>
                                    <p>
                                    (3)	Entsprechend anfallende Kosten für etwaige Kursschwankungen bei Fremdwährungen sind stets abzuwägen und beim Zahlungsabwickler im Vorfeld zu erfragen.
                                    </p>
                                    <strong>
                                    6 Gebühren, Kosten und Provisionen
                                    </strong>
                                    <p>
                                    (1)	Die Anmeldung als Partner, eine Teilnahme an der Lottery of Things (bei Verfügbarkeit von Talern) sowie der Erhalt von Preisen innerhalb der freigegebenen Länder ist kostenlos.
                                    </p>
                                    <p>
                                    (2)	Kommt es zu einer separaten Absprache, fällt ggf. eine Provision an, die von Projektpartnern zu begleichen ist. Einzelheiten regeln die von den Partnern bestätigten und unterzeichneten Verträge.
                                    </p>
                                    <p>
                                    (3)	Für angebotene Produkte / Konzepte im internen Bereich können Versandkosten, Nachnahmegebühren oder Ähnliches anfallen; eine genaue Auskunft zusätzlicher Gebühren regeln die jeweiligen Geschäfts- / Verkaufsbedingungen der Partner. 5starUnity übernimmt keine Haftung für die Kostenstrukturen oder sonstigen Gebühren externer Anbindungen.
                                    </p>
                                    <p>
                                    (4)	Mitunter kann es vorkommen, dass Zahlungsabwickler für Spenden eine Kostennote oder Ähnliches in Rechnung stellen. Wir weisen darauf hin, dass diese Kosten vom jeweiligen Spender zu tragen sind; 5starUnity übernimmt nur die mit dem Abwickler eingegangenen Vertragsgebühren.
                                    </p>
                                    <strong>
                                     7 Löschung des Profils / Beendigung und Einschränkung der Plattform-Nutzung
                                    </strong>
                                    <p>
                                    (1)	Die Nutzung für alle 5starUnity-Webseiten wird auf unbestimmte Zeit geschlossen und kann von 5starUnity sowie dem Partner jederzeit mit sofortiger Wirkung beendet werden. Eine Beendigung des Verhältnisses geht mit der unwiderruflichen Löschung des Benutzerprofils einher und muss 5starUnity per E-Mail an Service@5starUnity.com mitgeteilt werden. Löschungen können bis zu 4 Wochen Zeit beanspruchen und sind in Textform (bzw. über die technologischen Funktionen im internen Bereich) zu erklären.
                                    </p>
                                    <p>
                                    (2)	5starUnity ist berechtigt, Partner ohne Angabe von Gründen jederzeit von der Teilnahme an Foren, dem Kommentarsystem oder anderen angebotenen Bereichen, Dienstleistungen oder Systemen auszuschließen bzw. den Zugang teilweise oder in Gänze, zeitweise oder dauerhaft, zu beschränken.
                                    </p>
                                    <p>
                                    (3)	Das beiderseitige Recht zur Löschung aus wichtigem Grund bleibt unberührt.
                                    </p>
                                    <strong>
                                    8 Vertraulichkeit und Datenschutz
                                    </strong>
                                    <p>
                                    (4)	Alle Daten werden von 5starUnity ausschließlich zu den sich aus der Registrierung ergebenden Zwecken unter Beachtung der einschlägigen gesetzlichen Bestimmungen des Datenschutzes gespeichert und verarbeitet (siehe auch geltende Datenschutzerklärung).
                                    </p>
                                    <p>
                                    (5)	Der Nutzer stimmt zu, dass einige personenbezogene Daten des Nutzers an eigene Unternehmen übermittelt werden dürfen. Diese Zustimmung kann der Nutzer jederzeit per E-Mail an Service@5starUnity.com widerrufen.
                                    </p>
                                    <p>
                                     9 Änderungen der Allgemeinen Nutzungsbedingungen
                                    </p>
                                    <p>
                                    (1)	5starUnity ist jederzeit berechtigt, den Inhalt dieser Allgemeinen Nutzungsbedingungen zu ändern bzw. an zukünftige Gegebenheiten anzupassen.
                                    </p>
                                    <p>
                                    (2)	In diesem Fall wird 5starUnity Partnern den Änderungsvorschlag unter Benennung des Grundes und des konkreten Umfangs in Textform (z. B. per E-Mail) mitteilen. Die Änderungen gelten als vom Partner genehmigt, wenn er diesen nicht in mindestens Textform widerspricht. Wir werden den Partner auf diese Folge im Mitteilungsschreiben besonders hinweisen.
                                    </p>
                                    <p>
                                    (3)	Ein Widerspruch muss innerhalb von sechs Wochen nach Zugang der Mitteilung über die Änderung eingegangen sein; übt der Partner sein Widerspruchsrecht aus, gilt der Änderungswunsch als abgelehnt. Im Falle der Ablehnung muss der widersprechende Partner mit einer Beendigung oder Einschränkung der Plattform-Nutzung seitens 5starUnity i.S.d. § 7 rechnen.
                                    </p>
                                    <strong>
                                     10 Salvatorische Klausel
                                    </strong>
                                    <p>
                                    (1)	5starUnity versteht sich als Verein und erhält ausschließlich Spenden, welche nach geltender Satzung verwendet werden dürfen. Für alle Verkäufe, Veräußerungen oder sonstige Gegebenheiten, die ggf. im internen Bereich angeführt werden, ist ausschließlich das dort zu benennende Unternehmen zuständig.
                                    </p>
                                    <p>
                                    (2)	Für die Nutzung der 5starUnity-Webseiten gelten diese AGB; im Allgemeinen verweist der Vorstand von 5starUnity auf § 306 BGB, welcher die Funktionen der salvatorischen Klausel erörtert und beschreibt.
                                    </p>
                                    <strong>
                                     11 Anwendbares Recht, Gerichtsstand
                                    </strong>
                                    <p>
                                    (1)	Es gilt das Recht der Bundesrepublik Deutschland unter Ausschluss des UN-Kaufrechts (CISG), sofern dies für 5starUnity von Relevanz ist. Zwingende Bestimmungen des Staates, in dem der Partner seinen gewöhnlichen Aufenthalt hat, bleiben unberührt.
                                    </p>
                                    <p>
                                    (2)	Gerichtsstand für sämtliche Streitigkeiten aus und im Zusammenhang mit Verträgen ist, soweit gesetzlich zulässig, Stuttgart.
                                    </p>
                                    <strong>
                                    12 Schlussbestimmungen
                                    </strong>
                                    <p>
                                    (1)	Sämtliche Nebenabreden müssen schriftlich formuliert und stets beiderseits elektronisch oder persönlich bestätigt werden; es wird festgehalten, dass durch Bestätigung dieser AGB keine Nebenabreden getroffen wurden.
                                    </p>
                                    <p>
                                    (2)	Es wird ausdrücklich darauf hingewiesen, dass eine Nutzung der Plattformen, eine Partnerschaft in jedweder Form oder eine Teilnahme an der Lottery of Things kein Beitritt zum 5starUnity e.V. darstellt bzw. kein Beitritt ermöglicht.
                                    </p>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
            <input type="hidden" name="csToken" id="csToken" value="{{ csrf_token() }}">
        </div>
    </div>
<br />
<input type="hidden" id="newindex" name="">
@section('script')
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/jquery.validate.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/additional-methods.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/minimalist-picker/dobpicker.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery.pwstrength/jquery.pwstrength.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/js/main.js')}}"></script>
<script>
// $( document ).ready(function() {
//     $(".actions ul li:nth-child(2) a").css('display','none');
//     $(".actions ul li:nth-child(2) ").append('<a id="validation" href="#" onclick="check_email()">Next</a>');
// });
$(".form-control").on('focus',function(){
        $(".form-control").css('border','1px solid #ccc')
        var id = $(this).attr('id');
        $("#"+id).css('border','solid 1px green')
    }).focusout(function(){
        $(".form-control").css('border','1px solid #ccc')
    });
function check_email()
    {
        var email = $("#email").val();
        var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

        var emailFormat = re.test($("#email").val());// this return result in boolean type
        
        if (emailFormat===false) {
            $("#email").addClass('error');
            $("#email-error").css('display','block');
            $("#email-error").html('Invalid Email ');
            $(".actions ul li:nth-child(2) a").removeAttr('href');
            return false;
        }

        $("input").prop('disabled', true);
        $.ajax({
            method: "POST",
            url: "/check_email",
            data: { "_token":$("#csToken").val(),email: $("#email").val() }
        })
        .done(function( msg )
        {
            $("input").prop('disabled', false);
            if(msg=="error")
            {
                $("#email").addClass('error');
                $("#email-error").css('display','block');
                $("#email-error").html('email already register');
                $(".actions ul li:nth-child(2) a").removeAttr('href');
                return false;
            }
            else
            {
                $("#validation").remove();
                $(".actions ul li:nth-child(2) a").css({
                    'display': 'block',
                    'padding-top': '5px',
                    'text-align':'center'
                    });
                    $(".actions ul li:nth-child(2) a").attr('href','#next');
                $("#validation").removeAttr("onclick");
                setTimeout(function(){
                    $(".actions ul li:nth-child(2) a").click();

                },500);

                $("#email").removeClass('error')
            }
        });
    }
function getCountrySates()
{
    var country_id = $( "#country option:selected" ).attr('value');
    $.ajax({
        method: "POST",
        url: "ajax/states",
        data: { "_token": "{{ csrf_token() }}",country_id: country_id}
        })
        .done(function( msg ) {
           $("#state").html(msg);
        });
}
function calcAge()
{

    var dateOfBirth = $("#dob").val();
    dateOfBirth = dateOfBirth.split('.');
    // dateOfBirth[2],dateOfBirth[1],dateOfBirth[0]
    var age = calculateAge(dateOfBirth[1], dateOfBirth[0], dateOfBirth[2]);
    if(age<18)
    {
        setTimeout(function(){
            $("#dob").addClass('error');
            $("#dob-error").css('display','block');
            $("#dob-error").html('You must be 18+');
        },1000);
    }
    else
    {
        $("#dob-error").css('display','none');
        $("#dob-error").html(' ');
        $("#dob").removeClass('error');
    }
}
function calculateAge(birthMonth, birthDay, birthYear)
{
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();
    var currentDay = currentDate.getDate();
    var calculatedAge = currentYear - birthYear;

    if (currentMonth < birthMonth - 1)
    {
        calculatedAge--;
    }
    if (birthMonth - 1 == currentMonth && currentDay < birthDay)
    {
        calculatedAge--;
    }
        return calculatedAge;
}

</script>
@endsection
@endsection
