<?php

namespace App\Http\Controllers;

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
		$lesson = auth()->user()->lessons()->findOrFail($lesson_id);
		$this->docxToHtml($filename);
		foreach($this->htmlToArray($filename) as $test){
			$lesson->questions()
				->create($test['question'])
				->answers()
				->createMany($test['answers']);
		}
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
		for( $i = 0; $i < count($text); $i++ ){
			if( preg_match('/[0-9]+[.)]/', $text[$i]) ){
				yield [
					'question' => [
						'title' => $this->getFilterQuestion($text[$i])
					],
					'answers' => [
						[
							'title' => $this->getFilterAnswer($text[++$i]),
							'status' => true,
						],
						[
							'title' => $this->getFilterAnswer($text[++$i]),
						],
						[
							'title' => $this->getFilterAnswer($text[++$i]),
						],
						[
							'title' => $this->getFilterAnswer($text[++$i]),
						],
						[
							'title' => $this->getFilterAnswer($text[++$i]),
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
