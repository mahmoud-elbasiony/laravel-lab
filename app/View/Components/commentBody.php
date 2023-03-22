<?php

namespace App\View\Components;
use App\Models\Comment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class commentBody extends Component
{
    /**
     * Create a new component instance.
     */
    
    public $comment;
    public function __construct($comment)
    {
        // dd($comment);
        $this->comment=$comment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment-body');
    }
}
