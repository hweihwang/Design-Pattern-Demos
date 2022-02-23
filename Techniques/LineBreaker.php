<?php

namespace Techniques;

enum TokenType
{
    case WORD;
    case BREAK;
    case END;
}

class Token
{
    private string $s;

    private TokenType $t;

    public function __construct()
    {

    }

    public function type(): TokenType
    {
        return $this->t;
    }

    public function word(): string
    {
        assert($this->type() === TokenType::WORD);
        return $this->s;
    }
}