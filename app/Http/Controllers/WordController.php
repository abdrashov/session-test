<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Shared\ZipArchive;

class WordController extends Controller
{
	public function index($lesson_id, $filename)
	{
		$answers = [];
		$lesson = auth()->user()->lessons()->findOrFail($lesson_id);
		$this->docxToHtml($filename);
		foreach($this->htmlToArray($filename) as $test){
			$questions[] = $test['question'];
			$answers = array_merge($answers, $test['answers']);
		}
		if (count($questions) * 5 != count($answers)) {
			throw new Exception("Error Processing", 1);
		}
		$lesson->questions()->createMany($questions);
		Answer::createMany($answers);

		// $lesson->questions()
		// 	->create($test['question'])
		// 	->answers()
		// 	->createMany($test['answers']);

		Storage::delete($filename);
		Storage::delete($filename.'.html');
	}

	private function docxToHtml($filename)
	{
		$file = Storage::path($filename);
		IOFactory::load($file)->save($file.'.html', 'HTML');
	}

	private function htmlToArray($filename)
	{
		// $myfile = Storage::get($filename.'.html');
		$myfile = Storage::readStream($filename.'.html');
		while (!feof($myfile)) {
			$buffer = fgets($myfile);
			if( strpos($buffer, '<p') !== false ){
				$buffer = str_replace('&nbsp;', '', $buffer);
				$mas[] = trim( strip_tags($buffer) );
			}
		}
		return $this->getFilterText($mas);
	}

	private function getFilterText($text)
	{
		$tests = [];
		$question_id = 0;
		$question_count = Question::count();
		for( $i = 0; $i < count($text); $i++ ){
			if( preg_match('/[0-9]+[.)]/', $text[$i]) ){
				$question_id++;
				yield [
					'question' => [
						'title' => $this->getFilterQuestion($text[$i])
					],
					'answers' => [
						[
							'title' => $this->getFilterAnswer($text[++$i]),
							'question_id' => $question_id + $question_count,
							'status' => true,
						],
						[
							'title' => $this->getFilterAnswer($text[++$i]),
							'question_id' => $question_id + $question_count,
						],
						[
							'title' => $this->getFilterAnswer($text[++$i]),
							'question_id' => $question_id + $question_count,
						],
						[
							'title' => $this->getFilterAnswer($text[++$i]),
							'question_id' => $question_id + $question_count,
						],
						[
							'title' => $this->getFilterAnswer($text[++$i]),
							'question_id' => $question_id + $question_count,
						]
					]
				];
			}
		}
	}

	private function getFilterAnswer($text)
	{
		return trim( preg_replace('/[a-fA-Fа-еА-Е]+[.)]/', '', $text) );
	}

	private function getFilterQuestion($text)
	{
		return trim( preg_replace('/[0-9]+[.)]/', '', $text) );
	}


}
