<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Notification extends Component
{
    public $type;
    public $title;
    public $message;
    /**
     * Create a new component instance.
     */
    public function __construct($type,$title, $message)
    {
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notification');
    }
}
