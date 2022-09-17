<div class="partials-menu">
	<ul class="partials-ul">
		<li class="partials-li {{ (request()->is('admin/setting')) ? 'active' : '' }}"><a href="{{ route('admin.setting') }}">Genarel</a></li>
		<li class="partials-li {{ (request()->is('admin/setting/email')) ? 'active' : '' }}"><a href="{{ route('partials.email') }}">Email</a></li>
		<li class="partials-li {{ (request()->is('admin/setting/email-templete')) ? 'active' : '' }}"><a href="{{ route('partials.email-templete') }}">Email Templete</a></li>
		<li class="partials-li"><a href="#">Payment</a></li>
		<li class="partials-li"><a href="#">SMS</a></li>
		<li class="partials-li"><a href="#">Role</a></li>
	</ul>
</div>