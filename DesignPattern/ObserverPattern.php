<?php

namespace DesignPattern;

abstract class Observer
{
    public function __construct(public Model $model)
    {
        $model->attach($this);
    }

    abstract public function update();
}

class SendEmails extends Observer
{
    public function __construct(public array $emails, public Model $model)
    {
        parent::__construct($model);
    }

    public function update(): void
    {
        foreach ($this->emails as $email) {
            echo "Send email to $email\n";
        }
    }
}

class Model
{
    public array $observers = [];

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void
    {
        $this->observers = array_filter($this->observers, static fn ($item) => get_class($item) !== get_class($observer));
    }

    public function save(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

class Post extends Model
{
    public string $title;

    public function save(): void
    {
        echo "Save post\n";

        parent::save();
    }
}

class ObserverPattern
{
    public function __invoke()
    {
        //Init post
        $post = new Post();

        //Register observer to post
        new SendEmails(['hoang1@gmail.com', 'hoang2@gmail.com'], $post);

        //Save model
        $post->save();
    }
}




