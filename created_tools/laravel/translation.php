<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;

class translation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:translation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command finds any hard coded text on all the views';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start_time = microtime(true);
        
        // gets all the views
        $files = File::allFiles(resource_path('views'));
        foreach ($files as $file) {
            $basename = $file->getRelativePathName();
            $file_array[$basename] = [];
            $retrieved_file = File::get($file);
            
            $dom = new \DOMDocument;
            $removes_blade = $this->checkForCssOrJsOrPhp($retrieved_file);
            if (!empty($removes_blade)) {
                $dom->loadHTML($removes_blade, LIBXML_NOERROR | LIBXML_NOWARNING);
            }
            $dom_output = strip_tags($dom->saveHTML());
            $removes_blade_multiple_lines = $this->checkBladeOverMultipleLines($dom_output);
            $dom_array = explode("\n", $removes_blade_multiple_lines);
            $data_arrays = $this->getNotTranslatedText($dom_array);

            foreach ($data_arrays[0] as $line_number => $text) {
                array_push($file_array[$basename], $line_number . ': ' . $text);
            }
        }

        $total_complete = 0;
        $total_incomplete = 0;
        foreach ($file_array as $file => $file_content) {
            if (count($file_content) == 0) {
                $total_complete += 1;
                // $this->info($file . ' -> ' . '✅');
                // $this->newline();
            } else {
                $total_incomplete += 1;
                $this->error($file . ' -> ' . '❌');
                foreach($file_content as $content) {
                    $this->line(' - ' . $content);
                }
                $this->newline();
            }
        }
        $end_time = microtime(true);

        $total_time = number_format($end_time - $start_time,2);
        $total_views = $total_complete + $total_incomplete;
        $percentage_calculation = number_format(($total_complete / $total_views) * 100,2);
        if ($percentage_calculation == 100.00) {
            $this->line($percentage_calculation . '% 🥳🎉');
        } else {
            $this->line($percentage_calculation . '% ' . '(' . $total_complete . '/' . $total_views . ')' . ' of all files done');
        }
        
        if($total_time < 1.00) {
            $this->line($total_time . ' miliseconds');
        } elseif($total_time >= 1.00 && $total_time < 60.00) {
            $this->line($total_time . ' seconds');
        }
    }

    private function checkBladeOverMultipleLines(string $data)
    {
        // removes (), {}, {{}} and everything between them over multiple lines
        $single_paranthese = preg_replace('/(\(.*?\))/s', '', $data);
        $multiple_curly_brackets = preg_replace('/(\{.*\{.*\}.*?\})/s', '', $single_paranthese);
        $compiled = preg_replace('/(\{.*?\})/s', '', $multiple_curly_brackets);
        return $this->checkBladeRightParenthese($compiled);
    }

    private function checkBladeRightParenthese(string $data)
    {
        // removes )
        $compiled = preg_replace('/(\))/', '', $data);
        return $compiled;
    }

    private function getNotTranslatedText(array $dom_array) {
        $dom_data_array = [];

        foreach ($dom_array as $dom_key => $dom_value) {
            $dom_trimmed = trim($dom_value);
            if (!empty($dom_trimmed)) {
                $dom_data_array[$dom_key] = $dom_trimmed;
            }
        }

        return [$dom_data_array];
    }

    protected function checkForCssOrJsOrPhp(string $data)
    {
        // removes <style> also <script> also does it over multiple lines
        $style = preg_replace('/(\<style\>.*?\<\/style\>)/s', '', $data);
        $script = preg_replace('/(\<script\>.*?\<\/script\>)/s', '', $style);
        $compiled = preg_replace('/(\<\?php.*?\?\>)/s', '', $script);
        return $this->checkBladeOperators($compiled);
    }

    protected function checkBladeOperators(string $data)
    {
        // removes ==, !=, =>, >=, <=, && and everything after until )
        $removed_equal = preg_replace('/(==)/', '', $data);
        $removed_not_equal = preg_replace('/(!=)/', '', $removed_equal);
        $removed_array = preg_replace('/(=>)/', '', $removed_not_equal);
        $removed_bigger_or_equal = preg_replace('/(>=)/', '', $removed_array);
        $removed_smaller_or_equal = preg_replace('/(<=)/', '', $removed_bigger_or_equal);
        $compiled = preg_replace('/(\&\&)/', '', $removed_smaller_or_equal);
        return $this->checkBladeObjectOperator($compiled);
    }

    protected function checkBladeObjectOperator(string $data)
    {
        // removes word->
        $removed_word_and_operator = preg_replace('/(\b\w+\s*->\s*)/', '', $data);
        // this one removes ->word
        $compiled = preg_replace('/(\s*->\s*\w+\b)/', '', $removed_word_and_operator);
        return $this->checkBladeVariables($compiled);
    }

    protected function checkBladeVariables(string $data)
    {
        // removes $
        $compiled = preg_replace('/(\$)/', '', $data);
        return $this->removesWhiteSpaces($compiled);
    }

    protected function removesWhiteSpaces(string $data)
    {
        // removes \t, \r white spaces
        $removed_t = preg_replace('/(\t)/', '', $data);
        $compiled = preg_replace('/(\r)/', '', $removed_t);
        return $this->checkBladeSlashes($compiled);
    }

    protected function checkBladeSlashes(string $data)
    {
        // removes /
        $compiled = preg_replace('/(\/)/', '', $data);
        return $this->checkBladeOrOperator($compiled);
    }

    protected function checkBladeOrOperator(string $data)
    {
        // removes |
        $removed_double_or = preg_replace('/(\|\|)/', '', $data);
        $compiled = preg_replace('/(\|)/', '', $removed_double_or);
        return $this->checkForDigits($compiled);
    }

    protected function checkForDigits(string $data)
    {
        // removes 0-9
        $compiled = preg_replace('/(\d+)/', '', $data);
        return $this->checkForSymbols($compiled);
    }

    protected function checkForSymbols(string $data)
    {
        // removes symbols and with some symbols also removes everything in it
        $hashtag = preg_replace('/(\#)/', '', $data);
        $comment = preg_replace('/(<!--.*?-->)/', '', $hashtag);
        $dot = preg_replace('/(\.)/', '', $comment);
        $colon = preg_replace('/(\:)/', '', $dot);
        $comma = preg_replace('/(\,)/', '', $colon);
        $euro_sign = preg_replace('/(\€)/', '', $comma);
        $html_special = preg_replace('/(\&.*?\;)/', '', $euro_sign);
        $exclamation_mark = preg_replace('/(\!)/', '', $html_special);
        $percentage = preg_replace('/(\%)/', '', $exclamation_mark);
        $backslash = preg_replace('/(\\\\)/', '', $percentage);
        $brackets = preg_replace('/(\[.*?\])/', '', $backslash);
        $underscore = preg_replace('/(\_)/', '', $brackets);
        $hyphen = preg_replace('/(\-)/', '', $underscore);
        $question_mark = preg_replace('/(\?)/', '', $hyphen);
        $plus_sign = preg_replace('/(\+)/', '', $question_mark);
        $compiled = preg_replace('/(\*)/', '', $plus_sign);
        return $this->checkBladeFunctions($compiled);
    }

    protected function checkBladeFunctions(string $data)
    {
        // removes blade related data from the view like: @include, @if, @foreach
        $compiled = preg_replace('/(@\w+)/', '', $data);
        return $this->checkBladeCurlyBrackets($compiled);
    }

    protected function checkBladeCurlyBrackets(string $data)
    {
        // removes {{}} and everything in it
        $compiled = preg_replace('/(\{.*\{.*\}.*?\})/', '', $data);
        return $this->checkBladeUnescapedCharacters($compiled);
    }

    protected function checkBladeUnescapedCharacters(string $data)
    {
        // removes {!! !!} and everything in it
        $compiled = preg_replace('/(\{.*?\})/', '', $data);
        return $this->checkBladeParentheses($compiled);
    }

    protected function checkBladeParentheses(string $data)
    {
        // removes () and everything between in
        $multiple_parantheses = preg_replace('/(\(.*\(.*\).*?\))/', '', $data);
        $compiled = preg_replace('/(\(.*?\))/', '', $multiple_parantheses);
        return $this->checkForEmptyAngleBrackets($compiled);
    }

    protected function checkForEmptyAngleBrackets(string $data)
    {
        // removes <> if found and nothing in it
        $compiled = preg_replace('/(<\s*>)/', '', $data);
        return $compiled;
    }
}
