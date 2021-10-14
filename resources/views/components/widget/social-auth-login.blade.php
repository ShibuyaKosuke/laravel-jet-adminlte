<div class="social-auth-links text-center mt-2 mb-3">
    @foreach (JetAdminLte::socialServices() as $social => $value)
        @if($value)
            <a href="{{ route('oauth', ['provider' => $social]) }}"
               class="btn btn-block btn-social btn-{{ $social }}">
                <i class="fab fa-{{ $social }} mr-2"></i> {{ __('jet-adminlte::adminlte.sign_in_using', ['provider' => ucfirst($social)]) }}
            </a>
        @endif
    @endforeach
</div>
