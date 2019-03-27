{{--
@extends('layouts.app')
@section('content')

<div class="container pageContent">
        <div class="row">
            <div class="col-md-8">
            <div class="">
                <h2>
                    {{$blogPostData->title}}
                </h2>
            </div>
            <div class="clear"></div>
                <div class="articleDetails">

                    <div class="dottedSpacer"></div>
                    <div class="row">
                        <div class="col-md-12" style="min-height: 42px;">
                            <span class="articleDate">{{\Carbon\Carbon::parse($blogPostData->created_at)->toFormattedDateString()}}</span>

                        </div>
                    </div>
                    <div class="dottedSpacer"></div>
                    <div class="inner-text news-inner-text">
                        {!! html_entity_decode($blogPostData->description) !!}
                    </div>
                </div>


    <br />
    <br />
    <h3>Kommentare</h3>

    <a name="commentspart"></a>
    <div class="row">
        <div class="col-sm-8">
            <p>Das Kommentieren ist nur für registrierte Companisten möglich. Bitte melden Sie sich an, um kommentieren zu können.</p>
        </div>
        <div class="col-sm-4 text-center">
            <a href="../login.html" class="btn btn-primary" style="margin-bottom: 5px;">Log In</a> &nbsp;
            <a href="../login.html" class="btn btn-primary" style="margin-bottom: 5px;">Registrieren</a>
        </div>
    </div>
    <div class="clearSpacer"></div>
    <div class="clearSpacer"></div>



    <div id="ww_search_main_block_wrap">
            <div id="ww_search_top">
            <div class="row">
                            <div class="col-xs-12 col-lg-9 form-inline pull-right">
                    <div class="input-group pull-right has-clear searchArea">

                        <div class="inner-addon left-addon searchAreablock2">

                            <input type="search" id="ww_search_keyword_inp" data-target="search" class="btn-default-new-layout-small btn-search-new-layout" placeholder="Suchwort" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Suchwort'" value="" autocorrect="off"/>
                            <!--
                            <i class="fa fa-search" aria-hidden="true"></i>
                            -->
                            <i class="Icon_new Icon_search"></i>
                        </div>

                    </div>
                    <div class="dropdown clearfix pull-right sortArea">


                        <button id="changeValOrder" class="btn btn-primary btn-sm dropdown-toggle sort-button" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Sortieren nach: <span id="searchVal">Datum</span> <span class="caret"></span>
                            <i class="Icon_new Icon_sort"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-left" id="ww_search_page_sort">
                            <li data-sortval="date" class="active"><a onclick="ww_search_page_sort('date'); return false;" href="#">Datum</a></li>
                            <li data-sortval="relevant comments"><a onclick="ww_search_page_sort('relevant comments'); return false;" href="#">Relevanteste Fragen</a></li>
                            <li data-sortval="helpful replies"><a onclick="ww_search_page_sort('helpful replies'); return false;" href="#">Hilfreichste Antworten</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="text-right"><ul class="pagination ww_search_pagination"></ul></nav>
            <div class="commentsBox" id="ww_search_comments"><img src="../../graphics/icons/socials-loading.gif" alt="..." class="img-responsive center-block"></div>
            <nav class="text-right"><ul class="pagination ww_search_pagination"></ul></nav>
        </div>
    <div class="warning">
    <div class="investmentWarning robots-nocontent">
    <p><p>Hinweis </p>
    <p>Investitionen in Startups und Wachstumsunternehmen bieten gro&szlig;e Chancen, sind jedoch Risikoinvestments. Im schlechtesten Fall besteht die Gefahr des Verlustes der gesamten Investition, daher sind Investitionen in Startups und Wachstumsunternehmen nicht zur Altersvorsorge geeignet. Eine Nachschusspflicht besteht jedoch nicht. Eine Minimierung des Risikos kann vorgenommen werden, indem der Investor seinen Investmentbetrag in Startups und Wachstumsunternehmen diversifiziert und nicht den gesamten Investmentbetrag in ein Startup oder Wachstumsunternehmen investiert. Diese Strategie wird h&auml;ufig von professionellen Anlegern angewandt, da so das Risiko auf mehrere Investments gestreut wird. So k&ouml;nnen erfolgreiche Investments andere, weniger erfolgreiche Investments ausgleichen.</p>
    <p>Bei den Beteiligungen der Investoren &uuml;ber Companisto handelt es sich um (partiarische) Nachrangdarlehen. Dies sind unternehmerische Beteiligungen mit eigenkapital&auml;hnlichen Eigenschaften. Im Falle einer Insolvenz oder einer Liquidation des Unternehmens werden die Investoren (Companisten) - genauso wie auch alle &uuml;brigen Gesellschafter des Unternehmens - erst nach allen anderen Fremdgl&auml;ubigern aus der Insolvenzmasse oder Liquidationsmasse bedient. Man wird also in einem etwaigen Insolvenz- oder Liquidationsverfahren so behandelt wie jeder andere Gesellschafter des Unternehmens auch.</p>
    <p>Die Informationen &uuml;ber die Unternehmen auf der Companisto-Website werden ausschlie&szlig;lich von den Unternehmen zur Verf&uuml;gung gestellt. Die von den Unternehmen gemachten Prognosen sind keine Garantie f&uuml;r die zuk&uuml;nftige Entwicklung des Unternehmens. Investitionen in Startups und Wachstumsunternehmen sind daher nur f&uuml;r Investoren geeignet, die das Risiko eines Totalausfalls des investierten Kapitals verkraften k&ouml;nnen. Die Entscheidung f&uuml;r ein Investment trifft jeder Investor unabh&auml;ngig und eigenverantwortlich.</p>
    <p>Anbieter und Emittent der Verm&ouml;gensanlagen sind die jeweiligen Unternehmen. Companisto ist weder Anbieter noch Emittent der Verm&ouml;gensanlage, sondern ist ausschlie&szlig;lich die Internet-Dienstleistungsplattform.</p></p>
    </div>
    <!--googleon: all-->            </div>
                        </div>
            <div class="col-md-4">
                <!-- startup logo -->
    <div class="sidebarBox graysidebarBox" id="startup-logo-box">
        <div class="body">
            <div class="investment-title-logo">
                <img class="img-responsive" src="../../assets/cache/1499688981_luudoo_logo_300_300.jpg" alt="Ludufactur" title="Ludufactur" />
            </div>
        </div>
    </div>
    <!-- /startup logo -->

        <div class="sidebarBox graysidebarBox" id="sidebar-invest-button-box">

            <div class="body text-center">
                <a href="../investments.html" class="btn current-investment-opportunities-button">Zu den aktuellen Investmentchancen</a>
                <p style="margin-top: 10px;">Investment abgeschlossen</p>
            </div>

        </div>
    <style>

        .full_startup_type{
            display: none;
        }

        .body:hover .small_startup_type{
            display: none;
        }

        .body:hover .full_startup_type{
            display: inline;
        }



    </style>

    <div class="sidebarBox graysidebarBox startup-info-box">
                                <div class="body">
                <span class="amount">
                    50.000 &euro;            </span>
            <p>Investiert
                    </p>
                </div>


                        <div class="body">
                <span class="amount">384</span>
                <p>Companisten</p>
            </div>


                    <div class="body">
            <div class="amount">7,14 %</div>
                        <p><span data-toggle="tooltip" data-placement="top" title="Bei dem Prozentwert handelt es sich um die Beteiligungsquote am Gewinn und Unternehmenswert von Ludufactur, die den Companisten bei Erreichen des Finanzierungsziels von 0 &euro; in dem Crowdinvesting angeboten wird. Wird mehr als das Finanzierungsziel eingesammelt, werden entsprechend weitere Anteile zur Verfügung gestellt.">Angebotene Beteiligung </span></p>
                </div>




    </div>
    <div id="sidebar_accordion_overview" class="accordion">




    </div>



    <div class="warning hidden-md hidden-lg">
    <!--googleoff: all-->
    <div class="investmentWarning robots-nocontent">
            <p><p>Hinweis </p>
    <p>Investitionen in Startups und Wachstumsunternehmen bieten gro&szlig;e Chancen, sind jedoch Risikoinvestments. Im schlechtesten Fall besteht die Gefahr des Verlustes der gesamten Investition, daher sind Investitionen in Startups und Wachstumsunternehmen nicht zur Altersvorsorge geeignet. Eine Nachschusspflicht besteht jedoch nicht. Eine Minimierung des Risikos kann vorgenommen werden, indem der Investor seinen Investmentbetrag in Startups und Wachstumsunternehmen diversifiziert und nicht den gesamten Investmentbetrag in ein Startup oder Wachstumsunternehmen investiert. Diese Strategie wird h&auml;ufig von professionellen Anlegern angewandt, da so das Risiko auf mehrere Investments gestreut wird. So k&ouml;nnen erfolgreiche Investments andere, weniger erfolgreiche Investments ausgleichen.</p>
    <p>Bei den Beteiligungen der Investoren &uuml;ber Companisto handelt es sich um (partiarische) Nachrangdarlehen. Dies sind unternehmerische Beteiligungen mit eigenkapital&auml;hnlichen Eigenschaften. Im Falle einer Insolvenz oder einer Liquidation des Unternehmens werden die Investoren (Companisten) - genauso wie auch alle &uuml;brigen Gesellschafter des Unternehmens - erst nach allen anderen Fremdgl&auml;ubigern aus der Insolvenzmasse oder Liquidationsmasse bedient. Man wird also in einem etwaigen Insolvenz- oder Liquidationsverfahren so behandelt wie jeder andere Gesellschafter des Unternehmens auch.</p>
    <p>Die Informationen &uuml;ber die Unternehmen auf der Companisto-Website werden ausschlie&szlig;lich von den Unternehmen zur Verf&uuml;gung gestellt. Die von den Unternehmen gemachten Prognosen sind keine Garantie f&uuml;r die zuk&uuml;nftige Entwicklung des Unternehmens. Investitionen in Startups und Wachstumsunternehmen sind daher nur f&uuml;r Investoren geeignet, die das Risiko eines Totalausfalls des investierten Kapitals verkraften k&ouml;nnen. Die Entscheidung f&uuml;r ein Investment trifft jeder Investor unabh&auml;ngig und eigenverantwortlich.</p>
    <p>Anbieter und Emittent der Verm&ouml;gensanlagen sind die jeweiligen Unternehmen. Companisto ist weder Anbieter noch Emittent der Verm&ouml;gensanlage, sondern ist ausschlie&szlig;lich die Internet-Dienstleistungsplattform.</p></p>
    </div>
    <!--googleon: all--></div>        </div>
        </div>
    </div>
@endsection --}}
