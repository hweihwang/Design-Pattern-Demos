<?php

namespace DesignPattern;

use Support\Helper;

interface Dialog
{
    public function createButton();

    public function createText();
}

class WindowsDialog implements Dialog
{
    public function createButton()
    {
        return new WindowsButton();
    }

    public function createText()
    {
        return new WindowsText();
    }
}

class WebDialog implements Dialog
{
    public function createButton()
    {
        return new WebButton();
    }

    public function createText()
    {
        return new WebText();
    }
}

interface Button
{
    public function render(): string;
}

class WindowsButton implements Button
{
    public function render(): string
    {
        return 'Windows Button';
    }
}

class WebButton implements Button
{
    public function render(): string
    {
        return 'Web Button';
    }
}

interface Text
{
    public function render(): string;
}

class WindowsText implements Text
{
    public function render(): string
    {
        return 'Windows Text';
    }
}

class WebText implements Text
{
    public function render(): string
    {
        return 'Web Text';
    }
}

class AbstractFactory
{
    public function __invoke()
    {
        $windowsButton = (new WindowsDialog())->createButton();
        $windowsText = (new WindowsDialog())->createText();

        Helper::res($windowsButton->render(). ' '. $windowsText->render());

    }
}




