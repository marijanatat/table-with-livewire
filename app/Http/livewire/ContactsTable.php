<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ContactsTable extends Component
{
    use WithPagination; 
    public $search='';
    public $perPage=10;
    public $sortField='name';
    public $sortAsc=true;



    public function sortBy($field)
    {
        if($this->sortField===$field){
            $this->sortAsc=!$this->sortAsc;
        }
        else{
            $this->sortAsc=true;
        }
        $this->sortField=$field;
    }

    public function render()
    {
        return view('livewire.contacts-table', [
            'contacts' => \App\Contact::
                  search($this->search)
                ->orderBy($this->sortField,$this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }


   // public $search='';

/* render za search
  public function render()
    {
    return view('livewire.contacts-table',
        ['contacts'=>\App\Contact::search(
           $this->search)->get(),]);
  }

  public function clear()
  {
     $this->search='';
  }*/
}