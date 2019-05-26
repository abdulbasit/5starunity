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
}
label{
    width:180px !important
}
.actions ul li a
{
    border: solid 1px #000;
    color: black;
    border-radius: 100px;
    background: none
}
.actions ul li a:hover
{
    border: solid 1px #000;
    color: white;
    border-radius: 100px;
    background-color:black
}
label.error
{
    right:10px
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
.form-file
{
    width: 100%;
    margin-left:-6px
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
            <h2 class="text-center">{{ __('content.register_heading')}}  </h2>
            <br />
            <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data" action="{{ route('register.save') }}">
                @csrf
                <h3>
                    <span class="title_text">{{ __('content.accunt_information')}} </span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group">
                                <label for="fname" class="form-label">{{ __('lables.first_name')}} <font color="red"> *</font></label>
                                <input required="required" type="text" value="{{ old('fname') }}" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="lname" placeholder="First Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group">
                                <label for="mname" class="form-label">{{ __('lables.middle_name')}} </label>
                                <input type="text" value="{{ old('mname') }}" class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" id="mname" placeholder="Middle Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group">
                                <label for="lname" class="form-label">{{ __('lables.last_name')}} <font color="red"> *</font></label>
                                <input required="required" type="text" value="{{ old('lname') }}" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" id="lname" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group">
                                <label for="email" class="form-label">{{ __('lables.email')}} <font color="red"> *</font></label>
                                <label id="email-error" class="error" for="email" style="display: none;"></label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  id="email" placeholder="Your Email" />
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9 col-xs-12 form-group form-password">
                                <label for="password" class="form-label" style="margin-left:23px">{{ __('lables.password')}} <font color="red"> *</font></label>
                                <input required="required" type="password"  id="password" data-indicator="pwindicator" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" />
                                <div id="pwindicator">
                                    <div class="label"></div>
                                    <div class="bar-strength">
                                        <div class="bar-process">
                                            <div class="bar"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fieldset-footer">
                        &nbsp; {{-- <span>Step 1 of 2</span> --}}
                    </div>
                </fieldset>
                <h3>
                    <span class="title_text">{{ __('content.personal_information')}}</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="dob" class="form-label">{{ __('lables.dob')}} <font color="red"> *</font></label>
                                <label id="dob-error" class="error" for="dob" style="display: none;"></label>
                                <input onchange="calcAge()" required="required" type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth (DD.MM.YYYY)" />
                            </div>
                            <div class="error_msg" id="dobMsg"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="dob" class="form-label">{{ __('lables.country')}} <font color="red"> *</font></label>
                                <select name="country" id="country" onchange="getCountrySates()" class="form-control" required="required">
                                    <option >----Select Country----</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->country->id}}">{{$country->country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-select">
                                <label for="country" class="form-label" style="width:200px !important">{{ __('lables.city')}} / {{ __('lables.postal_code')}} <font color="red"> *</font></label>
                                <div class="row" style="width:100%">
                                    <div class="col-lg-5 col-xs-12 no-padding">
                                        <input required="required" type="text" class="form-control" name="city" id="city" placeholder="City" />
                                    </div>
                                    <div class="col-lg-4 col-xs-12 no-padding">
                                        <input required="required" type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="address" class="form-label">{{ __('lables.address')}} <font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="address" id="address" placeholder="Address" />
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="country" class="form-label">{{ __('lables.house_number')}}<font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="hnumber" id="hnumber" placeholder="Enter House Number" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="address" class="form-label">{{ __('lables.address2')}} </label>
                                <input  type="text" class="form-control" name="address2" id="address2" placeholder="Address" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-select">
                                <label for="country" class="form-label">{{ __('lables.phone_number')}} <font color="red"> *</font></label>
                                <input required="required" type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="profile_pic" class="form-label" style="width:130px">{{ __('lables.avatar')}} &nbsp; &nbsp;</label>
                                <div class="form-file" id="id_card">
                                    <input type="file" name="profile_pic" id="profile_pic" class="custom-file-input form-control" />
                                    <span id='val'></span>
                                    <span id='button'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="profile_pic" class="form-label" style="width:145px">{{ __('lables.identity_proof')}} <font color="red"> *</font></label>
                                <div class="form-file text-center" id="id_prrof">
                                    <input required="required" type="file" multiple="multiple" name="identity_card[]"  id="identity_card" class="custom-file-input form-control" />
                                    <span id='val2' class="idImg"></span>
                                    <span id='button2'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="profile_pic" class="form-label" style="width:145px">{{ __('lables.first_name')}} <font color="red"> *</font></label>
                                <div class="form-file text-center" id="id_prrof_front">
                                    <input required="required" type="file" name="identity_card_front"  id="identity_card_front" class="custom-file-input form-control" />
                                    <span id='val3' class="idImg1"></span>
                                    <span id='button2'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-xs-12 form-group">
                                <label for="profile_pic" class="form-label" style="width:145px">{{ __('lables.first_name')}}<font color="red"> *</font></label>
                                <div class="form-file text-center" id="id_prrof_bck">
                                    <input required="required" type="file" name="identity_card_back"  id="identity_card_back" class="custom-file-input form-control" />
                                    <span id='val4' class="idImg2"></span>
                                    <span id='button2'>{{ __('lables.select_file')}}</span>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="fieldset-footer">
                        &nbsp;
                        {{-- <span>Step 2 of 2</span> --}}
                    </div>
                </fieldset>
                <h3 style="display:none">
                    <span class="title_text">{{ __('content.terms_cond')}}</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="row">
                            <div class="col-xs-12 terms_cond" id="terms">
                                    Terms and Conditions
                                    (English Version)

                                    1.      General Provisions

                                    1.1.      These are the terms and conditions (hereafter "terms") for the use of the website "companisto.com" and all of its subdomains (hereafter "Companisto website") as well as for all business relations between Companisto GmbH, Köpenicker Str. 154, 10997 Berlin, Germany (hereafter "Companisto") and the members of Companisto (hereafter "Companist").

                                    1.2.      Companisto is the operator of the Companisto website and party to all contracts with the Companists.

                                    1.3.      The Companisto website is an online platform that enables Companists to participate directly or indirectly in young companies (hereafter "equity-based crowdfunding project") through borrowed capital, mezzanine capital, or equity (hereafter "participation"). For this purpose, the equity-based crowdfunding project publishes information on the Companisto website, and the Companists may send questions to the equity-based crowdfunding project. In case Companists acquire participations, Companisto does not become a contracting party itself. Participation or purchase contracts are concluded solely between the Companist and the equity-based crowdfunding project, another Companist, or the Companisto Venture Capital GmbH, or the Companisto Beteiligungs GmbH & Co. KG.

                                    1.4.      To all services provided by Companisto (hereafter "services"), the following terms apply exclusively. The terms are accepted by checking the respective box during the purchase of participations or during the registration as a Companist. The terms may be accessed, printed, or saved to a local device at http://www.companisto.com/business-terms at any time, and they are also emailed to the Companist during the purchase of participations.

                                    2.      Registration and Membership Account

                                    2.1.      Some sections of the Companisto website require users to register as Companists. Registration is free of charge. It is done by creating a membership account and agreeing, among other documents, to these terms. By registering, the Companist enters into a contract with Companisto on the use of the Companisto website. By purchasing a participation on the Companisto website, the purchaser simultaneously opens a free membership account.

                                    2.2.      Registration is limited to persons who have full capacity to contract. In particular, minors are not allowed to register on Companisto.

                                    2.3.      The data requested by Companisto during the registration process are to be provided completely and correctly. During the registration, only single persons may be entered as the owner of the membership account (i.e., no married couples or families).

                                    2.4.      Should the data provided during the registration change at a later point in time, the Companist is responsible for correcting the data in the membership account immediately.

                                    2.5.      The Companist is responsible for the use of the membership account and should ensure that the password remains secret. In case the Companist notices unauthorized use of the password or the membership account, Companisto must be notified of this fact.

                                    2.6.      A membership account is not transferable to another person. A person is not allowed to register more than once.

                                    2.7.      Companisto reserves the right to delete membership accounts created during incomplete registrations after a reasonable period of time.

                                    3.      Companisto Website

                                    3.1.      By means of the Companisto website, Companisto solely provides a platform on which Companists may invest in equity-based crowdfunding projects and on which equity-based crowdfunding projects may search for investors. The information on the equity-based crowdfunding projects published on the Companisto website is provided solely by the equity-based crowdfunding projects. Companisto does not check the profitability of the equity-based crowdfunding project. Therefore, Companisto does not guarantee that this information is correct or complete. Information and data marked as "confidential" on the Companisto website (hereafter "confidential information") must be kept confidential. Any confidential information may exclusively be used by the Companist to make an investment decision, and the Companist must keep this information confidential. The Companist must not relay the confidential information to third parties, publish it, or disseminate it in any way. Information that (i) was provided to the Companist by a third party without the breach of a confidentiality agreement and without any obligation to confidentiality; (ii) is already public or (iii) was released by Companisto for the purpose of distribution or publication is not considered confidential information.

                                    3.2.      The Companisto website provides Companists with the technical possibility of using the Companisto website to publish own contents within the framework provided by Companisto. In general, the contents published on the Companisto website by Companists are not checked by Companisto and do not reflect the opinion of Companisto.

                                    3.3.      A friendly, factual, and fair tone is important to the Companisto community. Consequently, Companisto reserves the right not to publish, to delete, to edit, to move, and to close posts that violate the Companisto netiquette. The latest version of netiquette may be accessed at www.companisto.com/netiquette.

                                    4.      Conclusion of a Contract

                                    4.1.      A contract on the purchase of a participation requires that the Companist fill out the payment processing form on the Companisto website and click on the button "Invest Now" or "Purchase Now" at the end of the payment processing form. This, however, does not constitute the conclusion of a contract; instead, the Companist thus makes an offer to purchase a participation under the conditions of the contracts accepted by the Companist in the payment processing form. The Companist concludes a contract with either the equity-based crowdfunding project, another Companist, Companisto Venture Capital GmbH, or Companisto Beteiligungs GmbH & Co. KG. Companisto does not become a contracting party itself. Details are regulated by the contracts accepted by the Companist during the purchase of participations.

                                    4.2.      The contract on the purchase of a participation is not concluded until Companisto confirms the purchase of the participation in an email (participation confirmation). The conclusion of a written contract in addition to the above procedure is not necessary. The Companist has no claim to the conclusion of a contract of participation.

                                    4.3.      The time during which the participations offered on the Companisto website may be purchased is limited. Companisto individually determines the duration of the offer for each equity-based crowdfunding project. Companisto is authorized to extend the duration as often and as much as it deems necessary.

                                    4.4.      If a contract is concluded via the Companisto website, Companisto will provide each of the contracting parties with the data necessary to establish contact with the other party on request.

                                    5.      Processing of Payments
                                    5.1.      The payments of all participation purchases on the Companisto website are processed solely by payment service providers with the authorization to operate financial transfers. Neither Companisto nor the payment service provider are contracting parties to the share purchase. Companisto is not entitled to obtain ownership or possession of the Companists' funds or securities.

                                    6.      SEPA Direct Debits

                                    6.1.      If a Companist pays for a participation by means of SEPA direct debit, the pre-notification period of the direct debit is reduced to 2 days.

                                    6.2.      In the case of a payment through SEPA direct debit, the Companist shall ensure the availability of sufficient funds on the bank account. Any costs that are due to the non-payment or reversal of a direct debit shall be covered by the Companist unless the non-payment or reversal is caused by Companisto.

                                    7.      Commissions, Premiums, Fees

                                    7.1.      Registration as a Companist is free of charge.

                                    7.2.      If a participation is purchased via the Companisto website, Companisto or Companisto Venture Capital GmbH may charge a commission that is payable by the equity-based crowdfunding project. Details are regulated by the contracts accepted by the Companist during the purchase of participations.

                                    7.3.      Companists may only offset commissions against claims to outstanding credits and against claims due and/or future claims if these claims are legally enforcible or uncontested.

                                    8.      Change or Cancellation of Services
                                    8.1.      Companisto is not obliged to provide its free services. Conversely, the Companist may stop using the services at any time.

                                    8.2.      The services of Companisto are constantly being redeveloped and may thus change from time to time. For instance, individual features may be added or removed. Companisto may also cancel a service temporarily or permanently, for example because of technical or legal reasons. If possible, particularly in case a service is permanently canceled because of economic reasons, Companisto will notify the Companist of the imminent cancellation within the framework of the respective service.

                                    9.      System Integrity

                                    9.1.      Companisto reserves the right to change, limit, or remove the contents and the functionalities of the website at any time. While Companisto aims to provide its service without any technical difficulties, maintenance work, redevelopment, and/or other issues may limit and/or temporarily prevent the use of the service. Under certain circumstances, this may also lead to data loss. Therefore, Companisto does not guarantee that the service is available or free of technical difficulties or data loss.

                                    10.      Profile Data/Taxes

                                    10.1.      If the Companist has stored data in his/her profile on the Companisto website or if Companisto receives data from financial authorities, Companisto is authorized to use these data and to make them available to those crowdfunding projects in which the Companist has invested as well as to these projects' service providers in order for payouts to the Companists resulting from the Companist's participations (e.g., interest payments or loan repayments) to be made and in order for the necessary declarations, particularly those related to capital gains tax, the German solidarity surcharge, and (if applicable) church tax, to be made to the responsible authorities by Companisto or the crowdfunding projects or these projects' service providers. This includes, but is not limited to, the Companist's first and last name, sex, address, investment amount, bank information, information on tax exemptions, and the Companist's tax identification number.

                                    10.2.      The Companist hereby agrees that Companisto, the crowdfunding projects, and these projects' service providers may request the Companist's church tax information from the German Federal Central Tax Office and any other responsible authority in order for church tax to be paid on behalf of the Companist. The Companist may restrict the submission of his data by the Federal Central Tax Office. In order to do so, the Companist must submit a declaration restricting the submission of his/her data to the Federal Central Tax Office. Once the Companist has restricted the submission of his/her data, this restriction will remain effective until the Companist notifies the Federal Central Tax Office that he/she no longer wishes to restrict the submission.

                                    10.3.      The Companist also agrees that Companisto may transfer the Companist's profile data (including data from the performance of adequacy tests) to Companisto's sister company Companisto Wertpapier GmbH, which operates the sister platform www.companisto-investments.de and will store and process the data in accordance with its privacy policy. The data transfer is carried out for the purpose of the registration on the sister platform and the possibility to invest in projects presented there.

                                    11.      Limitation of Liability

                                    Other legal preconditions for making a claim notwithstanding, the following exclusions and limitations of liability for damages apply to Companisto:

                                    11.1.      Companisto is liable if Companisto is guilty of gross negligence or intent. In the case of ordinary negligence, Companisto is only liable if it fails to fulfil a duty whose fulfillment is essential for the proper performance of the contract and on whose fulfillment the other contracting party may rely (so-called cardinal duty). In all other cases, the parties shall not be liable for damages of any kind, regardless of the subject matter of the claim and including the liability for fault at the conclusion of the contract.

                                    11.2.      If Companisto is liable for ordinary negligence according to point 11.1, the liability of Companisto is limited to the damage that Companisto typically had to expect based on the conditions known at the conclusion of the contract. If the purchase of a participation or a contract related to this purchase is null and void, potential claims of the Companist against Companisto resulting from this fact are limited to the refund of the amount paid for the purchase of the participation.

                                    11.3.      The above exclusions and limitations of liability do not apply to cases where Companisto guarantees the nature of the goods nor to damages payable according to product liability laws nor to damage resulting from loss of life, physical injury, or damage to health.

                                    11.4.      The above exclusions and limitations of liability also apply to the employees of Companisto, vicarious agents, and other third parties used by Companisto to fulfill the contract.

                                    12.      Termination of the User Relationship

                                    12.1.      The usage agreement for the Companisto website is made for an indefinite period and may be terminated with immediate effect by both Companisto and the Companist at any time. To terminate the usage agreement, the Companist has to send an email to service@companisto.com.

                                    12.2.      Companisto is authorized to exclude a Companist from forums, the comment system, other communication tools offered by Companisto, the Companisto Business Club, new investment opportunities on Companisto, and any other area, service, or system offered by Companisto at any time and without giving any reason or to partially or fully restrict a Companist's access to these areas, services, or systems for a limited or unlimited period.

                                    12.3.      Even in cases where the user relationship is terminated by Companisto and in cases where the Companist's access is restricted, Companisto provides Companists who are holding shares on Companisto with a way of managing their shares on Companisto (i.e., access to the share overview page, access to investor updates, submission of the information necessary for payouts and tax purposes, update of personal information, voting in the case of pooling votes). This, however, does not include usage of the comment system on Companisto or of any other Companisto services not strictly necessary to exercise the rights resulting from the shares.

                                    12.4.      The right to extraordinary termination for good cause remains unaffected.

                                    12.5.      Legal termination rights remain unaffected.

                                    13.      Risk Warning

                                    13.1.      Crowdfunding investments offer opportunities, but they are risk investments. In the worst case, the entire investment amount may be lost, so crowdfunding investments are unsuitable for retirement plans. However, there is no obligation to make further contributions. Investors can minimize the risk by splitting their investment amount between several equity-based crowdfunding projects rather than investing all of it in a single equity-based crowdfunding project. Professional investors often follow this strategy because it causes the risk to be distributed among several investments. In this way, successful investments can balance other less successful investments.

                                    13.2.      Companisto does not provide investment counseling or any other kind of counseling. No information or consultancy contract is concluded. Companisto is not obliged to provide information about ongoing developments within the equity-based crowdfunding project.

                                    13.3.      The majority of shares of the Companists are subordinated profit-participating loans ("partiarische Nachrangdarlehen"). Such loans are shares in a business with similar characteristics as equity. If the company becomes insolvent, the claims of the Companists – just like those of all other shareholders of the company – will be satisfied from the assets in the insolvency only after the claims of all other external creditors have been satisfied.

                                    13.4.      The information on the equity-based crowdfunding projects published on the Companisto website is provided solely by the equity-based crowdfunding projects. Companisto does not check the profitability of the equity-based crowdfunding project.

                                    13.5.      The information on the companies published on the Companisto website is provided solely by the companies. The projections made by the companies do not guarantee successful development of the company in the future. Consequently, crowdfunding investments are only suitable for investors who can cope with the risk of a total loss of the capital invested. All investors make their own independent investment decisions and bear any risks themselves.

                                    13.6.      There is only a limited market for participations in equity-based crowdfunding projects. Because of the lack of an appropriate market, the sale of participations in equity-based crowdfunding projects is possible only to a limited extent.

                                    13.7.      It is the responsibility solely of the Companist to decide whether to invest in equity-based crowdfunding projects by means of the Companisto website and in which equity-based crowdfunding project to invest. The information available on the Companisto website does not constitute a consultancy service of Companisto, and it cannot replace professional advice. Consequently, Companisto recommends that Companists inform themselves about the legal, economic, and tax-related consequences of purchasing a participation before the investment in an equity-based crowdfunding project and during the holding period if necessary. Each purchase of a participation may lead to the loss of the entire investment amount. Therefore, Companists should only invest money whose potential loss they can bear.

                                    14.      Assumption of Contracts

                                    14.1.      In case (i) Companisto files insolvency or (ii) if insolvency proceedings concerning the assets of Companisto have been legally opened or (iii) if the opening of such proceedings has been rejected because of a lack of assets or (iv) if Companisto is liquidated or (v) if Companisto discontinues its operations, Companisto Holding GmbH, registered in the commercial register of the local court (Amtsgericht) Charlottenburg under HRB 141442 B, as well as its subsidiaries are authorized in the context of a genuine contract for the benefit of third parties to maintain the business relationship with the Companist in lieu of Companisto. This includes, in particular, the management and usage of the customer profile and the customer data of the Companist.

                                    15.      Final Provisions

                                    15.1.      German law applies exclusively, excluding the UN Sales Convention (CISG). Venue for the settlement of disputes arising from and in relation to this contract shall be Berlin insofar as is permitted by law.

                                    15.2.      Should there be any contradictions between these terms and other provisions accepted by the Companist, the other provisions have priority. This applies to the contracts on the purchase of participations in particular.

                                    15.3.      Should any individual provision of these terms be or become entirely or partly void or illegal, the validity of the remaining provisions shall in no way be affected. In such case, the void or illegal provision or provisions shall be replaced by statutory law (§ 306 Abs.2 BGB). In all other cases, the contracting parties shall make a valid provision as similar as possible to the original provision in an economic sense unless any additional interpretation of the contract has a higher priority or is possible.

                                    15.4.      Companisto reserves the right to change these terms at any time and without giving reasons. The changed terms will be emailed to the Companists at least two weeks before they come into force. Unless a Companist objects to the new terms in writing or in text form directed toward Companisto within two weeks of receiving the email, the changed terms are considered accepted. Companisto will explicitly notify the Companists of the importance of the two-week period in the email containing the changed terms. The current terms and conditions may be accessed at www.companisto.com/business-terms. If Companists do not agree with the changed terms, they are required to stop using the services provided by Companisto.

                                    15.5.      These terms and conditions are issued in German and English; in the case of discrepancies between the two versions, the German version shall govern.

                                    Last Updated: 03 December 2018
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
            <input type="hidden" name="csToken" id="csToken" value="{{ csrf_token() }}">
        </div>
    </div>
<br />
@section('script')
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-validation/dist/additional-methods.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/minimalist-picker/dobpicker.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/vendor/jquery.pwstrength/jquery.pwstrength.js')}}"></script>
<script src="{{ asset('frontend/wizard-form/js/main.js')}}"></script>
<script>
$( document ).ready(function() {
    $(".actions ul li:nth-child(2) a").css('display','none');
    $(".actions ul li:nth-child(2) ").append('<a id="validation" href="#" onclick="check_email()">Next</a>');
});

function check_email()
    {
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
                $("#email-error").html('email already register')
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
function acceptTerms()
{
    if($("#terms_check").is(":checked")===true)
        {
            $(".actions ul li a").last().attr('href',"#finish");
            $("#termsCondTxt").css('color','black');
        }
    else
        {
            $( ".actions ul li a" ).last().attr('href',"");
            $("#termsCondTxt").css('color','red');
        }
}
</script>
@endsection
@endsection
