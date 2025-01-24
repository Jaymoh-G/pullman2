<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use Livewire\Component;
use Livewire\WithPagination;

class SubscriptionComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $subscriptionId;
    public function render()
    {
        $subscriptions = Subscription::paginate(5);
        return view('livewire.subscription-component', ['subscriptions' => $subscriptions])->layout('layouts.base');
    }
    public function confirmDelete($subscriptionId)
    {
        $this->showDeleteMessage = true;
        $this->subscriptionId = $subscriptionId;
    }
    public function deleteSubscription()
    {
        if (!empty($this->subscriptionId)) {
            Subscription::destroy($this->subscriptionId);
        }
        $this->subscriptionId = null;
        session()->flash('message', 'Subscription has been deleted successfully');
        $this->showDeleteMessage = false;
    }

    public function closeModal()
    {
        $this->showDeleteMessage = false;
    }
}
