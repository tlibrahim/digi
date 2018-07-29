<h1>Click the Link To Verify Your Email</h1>
<a href="{{url('/verifyemail/'.$user->confirmation_code)}}">Click this link to verify your email</a>
<p>Verification Code : <h3>{{ $user->verification_code }}</h3></p>