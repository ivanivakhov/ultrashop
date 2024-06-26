<?php

declare(strict_types=1);

namespace App\Support\Flash;


use Illuminate\Contracts\Session\Session;

class Flash
{
    public const MESSAGE_KEY = 'shop_flash_message';
    public const MESSAGE_CLASS_KEY = 'shop_flash_class';

    public function __construct(protected Session $session)
    {

    }

    public function get(): ?FlashMessage
    {
        $message = $this->session->get(static::MESSAGE_KEY);

        if (empty($message)) {
            return null;
        }

        return new FlashMessage(
            $message,
            $this->session->get(static::MESSAGE_CLASS_KEY)
        );
    }
    public function info(string $message): void
    {
        $this->flash($message, 'info');
    }

    public function alert(string $message): void
    {
        $this->flash($message, 'alert');
    }

    private function flash(string $message, string $name): void
    {
        $this->session->flash(static::MESSAGE_KEY, $message);
        $this->session->flash(static::MESSAGE_CLASS_KEY, config('flash.'.$name));
    }
}
