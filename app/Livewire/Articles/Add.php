<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    #[Rule('required|min:5')]
    public $title , $description , $body;

    #[Rule('required|mimes:jpeg,png,jpg,gif|max:2048')]
    public $image;

    public function render()
    {
        return view('livewire.articles.add');
    }

    public function save(){
        $validation = $this->validate();

        Article::query()->create([
            'user_id' => auth()->user()->id,
            'title' => $validation['title'],
            'description' => $validation['title'],
            'body' => $validation['title'],
            'image' => $this->image->store('photos')
        ]);

        $this->reset(['title', 'description', 'body', 'image']);

        $this->dispatch('save');
    }
}
