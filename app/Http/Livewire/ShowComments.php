<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\post;


class ShowComments extends Component
{
    public $comment="";
    public $post;
    public $comments;
    protected $rules = [
        'comment'=>["required","min:10"]
    ];

    public function mount()

    {
        $this->comments=$this->post->comments;
    }
    public function updated()

    {

        $this->validate();

    }

    public function render()
    {

        return view('livewire.show-comments');
    }

    public function submitComment(){
        
        $this->validate();
        $this->comment=$this->post->comments()->create([
            "body"=>$this->comment
        ]);
        $this->comments->push($this->comment);
    }

    public function deleteComment($id){
        $this->post->comments->find($id)->delete();
        $this->post=post::find($this->post->id);
        $this->comments=$this->post->comments;
    }

}
