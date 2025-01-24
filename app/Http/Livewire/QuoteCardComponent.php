<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\QuoteCard;

class QuoteCardComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $quoteCardId;
    public $publicationId;
    public $quoteCardName;

    public function mount(){
        $this->publicationId = request('id');
    }

    public function render(){
        $quoteCards = QuoteCard::where('publication_id', $this->publicationId)->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.quote-card-component', ['quoteCards'=>$quoteCards])->layout('layouts.base');
    }

    public function delete($quoteCardId){
        QuoteCard::where('id',$quoteCardId)->delete();
        session()->flash('message', 'Quote card deleted.');
        $this->showDeleteMessage = false;
        redirect()->to(route('admin.publications.quoteCard.list') . '?id=' . $this->publicationId);
    }

    public function showDeleteModal($quoteCardId, $quoteCardName){
        $this->showDeleteMessage = true;
        $this->quoteCardId = $quoteCardId;
        $this->quoteCardName = $quoteCardName;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
