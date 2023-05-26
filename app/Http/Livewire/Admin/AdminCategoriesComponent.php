<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{
    public $category_id;

    use Withpagination;

    public function deleteCategory()
    {
        $category = Category::find($this->category_id);
        unlink('assets/imgs/categories/'.$category->newimage);
        $category->delete();
        session()->flash('message', 'Category has been deleted successfully!');
    }

    public function render()
    {
        $categories = Category::orderBy('name','ASC')->paginate(5);
        return view('livewire.admin.admin-categories-component', ['categories' => $categories]);
    }
}
