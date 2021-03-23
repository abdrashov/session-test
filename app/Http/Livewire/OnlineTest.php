<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class OnlineTest extends Component
{
  public $rating;
  public $answer_id;

	protected $rules = [
		'answer_id' => 'required'
	];

  public function mount($code)
  {
    $this->rating = auth()
								    ->user()
								    ->ratings()
								    ->where('code', $code)
								    ->whereHas('tests', function (Builder $query) {
								    		$query->whereNull('user_answer_id');
											})
								    ->first();
  }

  public function render()
  {
		return view('user.online-test');
	}

  public function update($test_id)
  {
  	$this->validate();
  	$this->rating->tests()->find($test_id)->update(['user_answer_id' => $this->answer_id]);
	}

}
