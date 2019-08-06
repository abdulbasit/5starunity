@extends('layouts.app')
@section('content')
<div class="container">
    <div class="">
            <div class="section-title text-left font-48">
                <br />
                <br /><br /><br />
                Impressum & mehr
            </div>
            <div class="section-title  text-left">Angaben gemäß § 5 TMG</div>
            <div class="section-title  text-left">
                <br />
                Betreiber der Plattform und zustellfähige Anschrift
            </div>
            <div class="col-xs-12 no-padding" style="background-image:url({{ URL::to('/') }}/frontend/graphics/Impressum.jpg); background-size: contain; background-repeat: no-repeat; background-position: right;">
            <p>
                5starUnity e.V.<br />
                Karl-Schurz-Strasse 16<br />
                70190 Stuttgart<br />
                Deutschland<br />
            </p>
            <br />
            <p>
                E-Mail-Adresse: Service(at)5starUnity(dot)com <br />
                Eine Alternative besteht durch das öffentliche Kontaktformular<br />
                Telefonischer Support besteht limitiert nach einer schriftlichen Kontaktbitte<br />
            </p>
            <br />
            <p>
                Eingetragen beim Amtsgericht Stuttgart (Registergericht) <br />
                Vereinsregisternummer: VR111111XXX<br />
                Ust-IdNr. gemäß § 27a UStG: DE111111111<br />
            </p>
        </div>
        {{-- <div class="col-lg-6 col-xs-12">
            <br />
            <br />
            <img class="img-responsive" src="">

        </div> --}}
</div>
<br />
<div class="container no-padding">

    <div class="row profile">
            <br />
            <br />
            <div class="section-title text-left" style="float: left; width: 100%; margin-top: 40px;">
                Vertretigungsberechtigte Personen
            </div>
            <p>
                5starUnity e.V. wird gerichtlich und außergerichtlich gem. § 26 BGB vertreten durch: 
                Dirk Marras (Präsident), Silvia Palka (Vizepräsidentin), Alexander Müller (Vizepräsident) 
                {{-- <br /> --}}
                Für einzelne Beiträge sind, sofern diese von externen Quellen veröffentlicht werden sollten, die jeweiligen AutorInnen verantwortlich. Der
                {{-- <br /> --}}
                Verantwortungsbereich für angebotene Konzepte / Produkte, welche ggf. im internen Bereich proklamiert werden, liegt beim jeweiligen Unternehmen selbst.
                {{-- <br /> --}}
                5starUnity e.V. erteilt ausschließlich die Zustimmung zur Darstellung; es gelten die Allgemeinen Geschäftsbedingungen des jeweiligen externen Anbieters.
                {{-- <br /> --}}
            </p>
            
            <div class="section-title text-left" style="float: left; width: 100%; margin-top: 40px;">
                Inhaltliche Verantwortung nach § 55 RStV
            </div>
            <p>
                Für alle von 5starUnity e.V. eingepflegten Verlosungen der Lottery of Things ist der Präsident, Dirk Marras, verantwortlich und unter oben angezeigter Vereinsanschrift zu erreichen.
                Alle Anzeigen / Produkte / Konzepte oder Ähnliches, welche durch bzw. von externen Anbietern zu bedienen sind, stehen in der Verantwortung der jeweiligen Geschäftsführer
                bzw. durch die in deren Impressum benannten Verantwortlichkeiten. 5starUnity e.V. lehnt jedwede Verantwortung für fremde Texte / Angebote ab.
            </p>
            
            <div class="section-title text-left" style="float: left; width: 100%; margin-top: 40px;">
                Plattform der EU-Kommission
            </div>
            <p>
                Eine von der EU-Kommission im Internet bereitgestellte Plattform zur Online-Streitbeilegung finden Sie hier: <a href="https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home2.show&lng=DE">Online-Streitbeilegung</a> <br />
                5starUnity e.V. nimmt jedoch nicht an dem Verfahren zur alternativen Streitbeilegung teil, da es sich ausschließlich um eine spendenbasierende Plattform handelt.
                Wir weisen bei Angelegenheiten, welche Sie als Verbraucher zu klären wissen möchten, durch externe Angebote auf die jeweiligen Stellen des Anbieters hin.
            </p>
            
            <div class="section-title text-left" style="float: left; width: 100%; margin-top: 40px;">
                Haftungshinweis
            </div>
            <p>
                Trotz gebührender inhaltlicher Sorgfalt übernimmt 5starUnity e.V. oder deren Verantwortliche keine Haftung für Inhalte externer Links - bei verlinkten Seiten ist ausschließlich
                deren Betreiber verantwortlich. Diese Domain inkl. allen angeschlossenen Sub-Domains weisen mit Links auf andere Seiten (einschl. Produkte), weshalb folgendes gilt:
                5starUnity erklärt ausdrücklich, keinerlei Einfluss auf Gestaltung, Inhalt oder Zahlungsmodalitäten hat und distanziert sich von Inhalten aller verlinkten Seiten.
            </p>
            
            <div class="section-title text-left" style="float: left; width: 100%; margin-top: 40px;"s>
                    Copyright / Fotoquellen
            </div>
            <p>
                Die Rechte für Texte, Grafiken, Bilder sowie Ton- und/oder Videodokumente liegen, soweit nicht anders vermerkt, beim 5starUnity e.V. - Inhalte Dritter werden als solche
                gekennzeichnet. Eine Veröffentlichung, Vervielfältigung, Verbreitung, Bearbeitung oder sonstige Nutzung, auch auszugsweise, ist ohne schriftliche Zustimmung untersagt.
                Folgende Bildrechte wurden ordnungsgemäß erworben bzw. erstellt durch:<br />
                <br />
                (-) iStockphoto LP (@pinstock / @RichVintage / @level17 / @filipfoto)<br />
                (-) Dipl. Grafikdesigner Uwe Bareither<br />

            </p>
        </div>
    </div>
</div>
@endsection
