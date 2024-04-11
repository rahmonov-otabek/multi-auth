<h1>Client dashboard</h1>

@if (auth()->guard('client')->check()) 
    <h2>Client Authenticated</h2>
@endif