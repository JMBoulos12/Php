



/**
  #Instructions
  Refactor a Markdown parser.

  The markdown exercise is a refactoring exercise. 
  There is code that parses a given string with Markdown syntax and returns the associated HTML for that string. 
  Even though this code is confusingly written and hard to follow, somehow it works and all the tests are passing! 
  Your challenge is to re-write this code to make it easier to read and maintain while still making sure that all the tests keep passing.

  It would be helpful if you made notes of what you did in your refactoring in comments so reviewers can see that, but it isn't strictly necessary. 
  The most important thing is to make the code better!
  
  08-May-2023
*/


<?php
function parseMarkdown($markdown)
{
    $lines = explode("\n", $markdown);
    foreach ($lines as &$line) {
        if (preg_match('/^(#{1,6})\s*(.*)/', $line, $matches)) {
            $n = strlen($matches[1]);
            $line = "<h$n>$matches[2]</h$n>";
        }
        $rules = [
            '/__(.*)__/U' => '<em>$1</em>',
            '/_(.*)_/U' => '<i>$1</i>',
            '/\*\s*(.*)/' => '<li>$1</li>',
            '/^(?!<h|<li|<ul)(.*)$/' => '<p>$1</p>',
            // this seems unncessary, html would be cleaner without
            '/(<li>)(?!<em|<i)(.*)(<\/li>)/' => '$1<p>$2</p>$3'
        ];
        $line = preg_replace(array_keys($rules), array_values($rules), $line);
    }
    return preg_replace('/(<li.*li>(\n|$))+/', '<ul>$0</ul>', join($lines));
}
