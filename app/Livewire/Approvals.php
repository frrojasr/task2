<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cjmellor\Approval\Models\Approval;
use App\Models\Product;
use App\Livewire\Products;
use Livewire\Attributes\On; 

class Approvals extends Component
{
    
    public $approvals;
    public $approval;
    public $id;

    public $user;
    public $isOpen = 0;
   // protected $listeners = ['NewUpdateProduct' => 'render'];

   #[On('NewUpdateProduct')]
   public function render()
    {

        $this->approvals = Approval::where('state', 'pending')->get();

        // dd( $this->approvals);

        $this->user = Auth::user();

        // $can_list = $this->user->can('approval');

        // //dd( $this->team->userHasPermission($this->user, 'product:read'));
        // if ($can_list)
        return view('livewire.approvals');
        // else
        //     abort(403, 'Forbidden');

    }

    public function approve($id)
    {
        
       $approve =  Approval::where('id', $id)->first();
       $approve->state = 'approved';
       $approve->save();

     //  dd((array) $approve->new_data);

      $product = Product::where('id', $approve->approvalable_id)->update((array) $approve->new_data);

        $this->dispatch('productApproved')->to(Products::class);

        session()->flash('message','Product Updated Successfully!!');
       
        
    }


}