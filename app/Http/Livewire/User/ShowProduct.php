<?php

namespace App\Http\Livewire\User;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $searchproduct;


    public function render()
    {
        $search_product = '%'.$this->searchproduct.'%';
        $products = product::where('product_name','LIKE',$search_product)->where('product_status',1)->paginate(12);
        return view('livewire.user.show-product',['products'=>$products]);
    }
}
