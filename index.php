<?php

require_once __DIR__ . "/vendor/autoload.php";


use Piash\DecoratorPattern\Interface\InputFormat;
use Piash\DecoratorPattern\ConcreteComponent\TextInput;
use Piash\DecoratorPattern\Decorator\PlainTextFilter;
use Piash\DecoratorPattern\Decorator\MarkdownFormat;
use Piash\DecoratorPattern\Decorator\DangerousHTMLTagsFilter;


/**
 * This code might be a part of a real site, which renders user-generated content.
 */
function displayAsText(InputFormat $format, string $text)
{
    echo $format->formatText($text);
}

/************* Normal rendering without decorator ******************************* */
echo "** Normal rendering without decorator **\n";

$htmlText = <<<HERE
Hello! Nice blog post!
Please visit my <a href='http://www.test.com'>site</a>.
<! -- comments -->
<script src="http://www.test.com/script.js">
  performXSSAttack();
</script>
HERE;

// Concrete component (which implements the interface  directly) (unsafe).
$input = new TextInput();
echo "Render text without filtering (unsafe):\n\n";
displayAsText($input, $htmlText);
echo "\n\n\n";

//  Filtered rendering (safe).
$filteredInput = new PlainTextFilter($input);
echo "Renders after stripping all tags (safe):\n\n";
displayAsText($filteredInput, $htmlText);
echo "\n\n\n";

/************* Rendering with decorator ******************************* */
echo "** Rendering with decorator **\n\n";
$anotherHtmlText = <<<HERE
# Welcome

This is my first post on this **test** forum text.
<!-- this is a comment -->
<script src="http://www.test.com/script.js">
  performXSSAttack();
</script>
HERE;


// rendering (unsafe, no formatting).
$input = new TextInput();
echo "Render text without filtering (unsafe, ugly):\n\n";
displayAsText($input, $anotherHtmlText);
echo "\n\n\n";

// Markdown formatter + filtering dangerous tags (safe, pretty). Used the decorator pattern here
$text = new TextInput();
$filteredInput = new MarkdownFormat($text); // add markdown html tag, such as **test** to <strong>test</strong>
$filteredInput = new DangerousHTMLTagsFilter($filteredInput); // this removed tags, like script and strong
$filteredInput = new PlainTextFilter($filteredInput); // remove the comment also
echo "Renders post after translating markdown markup and filtering some dangerous HTML tags and attributes (safe, pretty):\n";
displayAsText($filteredInput, $anotherHtmlText);
