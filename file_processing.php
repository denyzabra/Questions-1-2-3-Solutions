<!DOCTYPE html>
<html>
<head>
    <title>Question 3</title>
</head>
<body>
    <h1>Question 3</h1>

    <?php
    // Function to read the text from the file and return an array without duplicate items
    function getUniqueWords() {
        $fileContent = file_get_contents('test-file.txt');
        $words = preg_split('/\s+/', $fileContent);
        $uniqueWords = array_unique($words);
        return $uniqueWords;
    }

    // Function to read the text from file and return an array with only punctuation marks
    function getPunctuationMarks() {
        $fileContent = file_get_contents('test-file.txt');
        preg_match_all('/[[:punct:]]/', $fileContent, $punctuationMarks);
        return $punctuationMarks[0];
    }

    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'unique_words') {
            $uniqueWords = getUniqueWords();
            echo "<h2>Unique Words</h2>";
            echo "<pre>" . implode(' ', $uniqueWords) . "</pre>";
        } elseif ($_POST['action'] === 'punctuation_marks') {
            $punctuationMarks = getPunctuationMarks();
            echo "<h2>Punctuation Marks</h2>";
            echo "<pre>" . implode(' ', $punctuationMarks) . "</pre>";
        }
    }
    ?>

    <form method="post">
        <label><input type="radio" name="action" value="unique_words"> Get Unique Words</label>
        <label><input type="radio" name="action" value="punctuation_marks"> Get Punctuation Marks</label>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
