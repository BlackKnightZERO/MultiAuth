@if(Auth::guard('web')->check())
<p class="text-success">You are Logged in As <strong>User</strong></p>
@else
<p class="text-danger">Logged out As <strong>User</strong></p>
@endif

@if(Auth::guard('admin')->check())
<p class="text-success">You are Logged in As <strong>Admin</strong></p>
@else
<p class="text-danger">Logged out As <strong>Admin</strong></p>
@endif