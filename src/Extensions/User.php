<?php

namespace BotMan\Drivers\Whatsapp\Extensions;

use BotMan\BotMan\Interfaces\UserInterface;
use BotMan\BotMan\Users\User as BotManUser;

class User extends BotManUser implements UserInterface
{
    /**
     * The member's phone in the chat.
     *
     * @return string|null
     */
    public function getPhone()
    {
        $id = explode('@', $this->getId());

        return $id[0] ?? '';
    }
    /**
     * @return bool
     */
    public function isMe()
    {
        return $this->getInfo()['fromMe'];
    }
}