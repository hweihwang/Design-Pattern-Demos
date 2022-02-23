<?php

namespace DesignPattern;

abstract class Dialog
{
    abstract public function createButton();

    public function render(): string
    {
        $button = $this->createButton();

        return "Dialog: {$button->render()}";
    }
}

class WindowsDialog extends Dialog
{
    public function createButton()
    {
        return new WindowsButton();
    }
}

class WebDialog extends Dialog
{
    public function createButton()
    {
        return new WebButton();
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

class Factory
{
    public function __invoke()
    {
        $dialog = new WindowsDialog();
        echo $dialog->render();
        echo PHP_EOL;

        $dialog = new WebDialog();
        echo $dialog->render();
        echo PHP_EOL;
    }
}




