Hello <i>{{ $email->receiver }}</i>,
<p>This is a email email for testing purposes! Also, it's the HTML version.</p>

<p><u>email object values:</u></p>

<div>
<p><b>email One:</b>&nbsp;{{ $email->demo_one }}</p>
<p><b>Demo Two:</b>&nbsp;{{ $email->demo_two }}</p>
</div>

<p><u>Values passed by With method:</u></p>

<div>
<p><b>testVarOne:</b>&nbsp;{{ $testVarOne }}</p>
<p><b>testVarTwo:</b>&nbsp;{{ $testVarTwo }}</p>
</div>

Thank You,
<br/>
<i>{{ $email->sender }}</i>
