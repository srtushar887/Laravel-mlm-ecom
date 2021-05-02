<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{

    use WithPagination;

    public function render()
    {
        $blogs = \App\Models\blog::orderBy('id','desc')->paginate(10);
        return view('livewire.blog',['blogs'=>$blogs]);
    }
}
