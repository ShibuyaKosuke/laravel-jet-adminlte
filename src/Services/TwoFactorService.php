<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Services;

use App\Models\User;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Contracts\Auth\Authenticatable;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorService
{
    /**
     * @var Authenticatable|User
     */
    private Authenticatable $user;

    /**
     * @var Google2FA
     */
    private Google2FA $google2fa;

    /**
     * @var string
     */
    private string $qrCode;

    /**
     * @param Authenticatable $user
     */
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
        $this->google2fa = new Google2FA();
    }

    /**
     * @return $this
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws InvalidCharactersException
     * @throws SecretKeyTooShortException
     */
    public function setSecretKey(): self
    {
        $key = $this->google2fa->generateSecretKey();
        $this->user->g2fa_key = $key;
        $this->user->save();
        return $this;
    }

    /**
     * @return string
     */
    public function getQrCode(): string
    {
        $this->qrCode = $this->google2fa->getQRCodeUrl(
            config('app.name'),
            $this->user->email,
            $this->user->g2fa_key
        );

        $writer = new Writer(
            new ImageRenderer(
                new RendererStyle(250),
                new ImagickImageBackEnd()
            )
        );
        $qrcode_image = base64_encode($writer->writeString($this->qrCode));
        return sprintf('data:image/png;base64, %s', $qrcode_image);
    }
}
