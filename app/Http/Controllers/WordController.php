<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Shared\ZipArchive;

class WordController extends Controller
{
	public function index()
	{
	   $filename = "python.docx";
		$this->docxToHtml($filename);
		return dd( $this->htmlToArray($filename) );

	}

	private function docxToHtml($filename)
	{
		$file = public_path($filename);
		$phpWord = IOFactory::load($file);
		$phpWord->save($file.'.html', 'HTML');
	}

	private function htmlToArray($filename)
	{
		$myfile = fopen($filename.'.html', "r+");
		while (!feof($myfile)) {
			$buffer = fgets($myfile, 4096);
			if( strpos($buffer, '<p') !== false ){
				$buffer = str_replace('&nbsp;', '', $buffer);
				$mas[] = trim( strip_tags($buffer) );
			}
		}
		return $this->getFilterText($mas);
	}

	private function getFilterText($text)
	{
		$test = [];
		for( $i = 0; $i < count($text); $i++ ){
			if( preg_match("/[0-9]\)/s", substr($text[$i], 0, 3)) ){
				$test[] = [
					'question' => $text[$i],
					'answer1' => [
						'answer1' => $text[$i+1],
						'status' => true,
					],
					'answer2' => [
						'answer2' => $text[$i+2],
					],
					'answer3' => [
						'answer3' => $text[$i+3],
					],
					'answer4' => [
						'answer4' => $text[$i+4],
					],
					'answer5' => [
						'answer5' => $text[$i+5],
					]
				];
			}
		}
		dd($test);
		return $text;
	}

}
