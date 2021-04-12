<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class MyDisciplines extends Component
{
	public $modal = false;
	public $modalTest = false;
	public $title;
	public $code;

	protected $listeners = ['modal' => 'openModal', 'modalTest' => 'openModal'];

	protected $rules = [
		'title' => 'required|unique:lessons',
		'code' => 'required|unique:lessons',
	];

	public function openModal()
	{
		$this->modal
		? 'false'
		: 'true';
	}

	public function translitTitleOnCode($title) {
	   $s = (string) $title; // преобразуем в строковое значение
	   $s = strip_tags($s); // убираем HTML-теги
	   $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
	   $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
	   $s = trim($s); // убираем пробелы в начале и конце строки
	   $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
	   $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'\'','ө'=>'o\'','һ'=>'h\'','қ'=>'k\'','ү'=>'u\'\'','ұ'=>'u\'','ғ'=>'g\'','ң'=>'n\'','і'=>'i\'','ә'=>'a\''));
	   $s = preg_replace("/[^0-9a-z-'_ ]/i", "", $s); // очищаем строку от недопустимых символов
	   $code = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
	   return $code; // возвращаем результат
	}

	public function updatedTitle()
	{
		$this->code = $this->translitTitleOnCode($this->title);
	}

	public function render()
	{
		return view('livewire.my-disciplines', [
			'lessons' => auth()->user()->lessons()->with('questions')->get(),
		]);
	}

	public function store()
	{
		$this->validate();
		Lesson::create([
			'user_id' => auth()->id(),
			'code' => $this->code,
			'title' => $this->title,
		]);
		$this->code = '';
		$this->title = '';
		$this->modal = false;
	}
}
