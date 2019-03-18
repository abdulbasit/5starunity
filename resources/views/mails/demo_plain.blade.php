Hello {{ $email->receiver }},
This is a email email for testing purposes! Also, it's the HTML version.

email object values:

email One: {{ $email->demo_one }}
email Two: {{ $email->demo_one }}

Values passed by With method:

testVarOne: {{ $testVarOne }}
testVarOne: {{ $testVarOne }}

Thank You,
{{ $email->sender }}
