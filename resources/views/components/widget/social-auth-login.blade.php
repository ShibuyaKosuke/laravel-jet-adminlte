<div class="social-auth-links text-center mt-2 mb-3">
    @if(JetAdminLte::socialServices('apple'))
        <a href="{{ route('oauth', ['provider' => 'apple']) }}"
           class="btn btn-block btn-social btn-apple">
            <i class="fab fa-apple mr-2"></i> Sign in using Apple
        </a>
    @endif
    @if(JetAdminLte::socialServices('google'))
        <a href="{{ route('oauth', ['provider' => 'google']) }}"
           class="btn btn-block btn-social btn-google">
            <i class="fab fa-google mr-2"></i> Sign in using Google
        </a>
    @endif
    @if(JetAdminLte::socialServices('facebook'))
        <a href="{{ route('oauth', ['provider' => 'facebook']) }}"
           class="btn btn-block btn-social btn-facebook">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
    @endif
    @if(JetAdminLte::socialServices('instagram'))
        <a href="{{ route('oauth', ['provider' => 'instagram']) }}"
           class="btn btn-block btn-social btn-instagram">
            <i class="fab fa-instagram mr-2"></i> Sign in using Instagram
        </a>
    @endif
    @if(JetAdminLte::socialServices('github'))
        <a href="{{ route('oauth', ['provider' => 'github']) }}"
           class="btn btn-block btn-social btn-github">
            <i class="fab fa-github mr-2"></i> Sign in using Github
        </a>
    @endif
    @if(JetAdminLte::socialServices('twitter'))
        <a href="{{ route('oauth', ['provider' => 'twitter']) }}"
           class="btn btn-block btn-social btn-twitter">
            <i class="fab fa-twitter mr-2"></i> Sign in using Twitter
        </a>
    @endif
    @if(JetAdminLte::socialServices('microsoft'))
        <a href="{{ route('oauth', ['provider' => 'microsoft']) }}"
           class="btn btn-block btn-social btn-microsoft">
            <i class="fab fa-microsoft mr-2"></i> Sign in using Microsoft
        </a>
    @endif
    @if(JetAdminLte::socialServices('line'))
        <a href="{{ route('oauth', ['provider' => 'line']) }}"
           class="btn btn-block btn-social btn-line">
            <i class="fab fa-line mr-2"></i> Sign in using Line
        </a>
    @endif
</div>
