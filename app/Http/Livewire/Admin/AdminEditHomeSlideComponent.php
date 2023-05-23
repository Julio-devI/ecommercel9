<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSlideComponent extends Component
{
    use WithFileUploads;

    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $status;
    public $image;
    public $link;
    public $slide_id;
    public $newimage;

    public function mount($slide_id)
    {
        $slide = HomeSlider::find($slide_id);
        
        $this->top_title = $slide->top_title;
        $this->title = $slide->title;      
        $this->sub_title = $slide->sub_title;        
        $this->offer = $slide->offer;
        $this->status = $slide->status;
        $this->link = $slide->link;
        $this->image = $slide->image;

        $this->slide_id = $slide->id;
    }

    public function updateSlide()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'status' => 'required',
            'link' => 'required'
        ]);

        $slide = HomeSlider::find($this->slide_id);
        $slide->top_title = $this->top_title;
        $slide->title = $this->title;
        $slide->sub_title = $this->sub_title;
        $slide->offer = $this->offer;
        $slide->status = $this->status;
        $slide->link = $this->link;

        if($this->newimage)
        {
            unlink('assets/imgs/slider/'.$slide->image);
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('slider',$imageName);
            $slide->image = $imageName;
        }

        $slide->save();
        session()->flash('message', 'Slide has beens updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slide-component');
    }
}
