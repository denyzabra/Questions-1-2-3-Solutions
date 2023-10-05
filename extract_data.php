<!DOCTYPE html>
<html>
<head>
    <title>Question 2</title>
</head>
<body>
    <h1>Data Extraction</h1>
    
    <?php
    // Function to extract the email address using regular expressions (regex)
    function getEmailUsingRegex($paragraph) {
        $pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/'; // Email regex pattern
        preg_match($pattern, $paragraph, $matches); 
        return $matches[0]; 
    }

    // Function to extract the phone number using regular expressions (regex)
    function getPhoneNumberUsingRegex($paragraph) {
        $pattern = '/\d{12}/'; // Phone number regex pattern (assumed 12 digits)
        preg_match($pattern, $paragraph, $matches); 
        return $matches[0]; 
    }

    // Function to extract the URL using regular expressions (regex)
    function getURLUsingRegex($paragraph) {
        $pattern = '/https?:\/\/[^\s]+/'; // URL regex pattern
        preg_match($pattern, $paragraph, $matches); 
        return $matches[0]; 
    }

    // Function to extract the email address without regular expressions (regex)
    function getEmailWithoutRegex($paragraph) {
        $words = explode(' ', $paragraph); 
        foreach ($words as $word) {
            if (filter_var($word, FILTER_VALIDATE_EMAIL)) {
                return $word; 
            }
        }
        return ''; 
    }

    // Function to extract the phone number without regular expressions (regex)
    function getPhoneNumberWithoutRegex($paragraph) {
        $number = preg_replace('/\D/', '', $paragraph); 
        if (strlen($number) == 12) {
            return $number; 
        }
        return ''; 
    }

    // Function to extract the URL without regular expressions (regex)
    function getURLWithoutRegex($paragraph) {
        $words = explode(' ', $paragraph); 
        foreach ($words as $word) {
            if (filter_var($word, FILTER_VALIDATE_URL)) {
                return $word; 
            }
        }
        return ''; 
    }

    // Sample paragraph containing email, phone number, and URL
    $paragraph = "This is a paragraph and it has to find 256781123456, testemail@gmail.com, and https://kanzucode.com/";

    // Extract data using regex functions
    $emailWithRegex = getEmailUsingRegex($paragraph);
    $phoneNumberWithRegex = getPhoneNumberUsingRegex($paragraph);
    $urlWithRegex = getURLUsingRegex($paragraph);

    // Extract data without regex functions
    $emailWithoutRegex = getEmailWithoutRegex($paragraph);
    $phoneNumberWithoutRegex = getPhoneNumberWithoutRegex($paragraph);
    $urlWithoutRegex = getURLWithoutRegex($paragraph);
    ?>

    <h2>Data Extracted Using Regular Expressions (Regex)</h2>
    <p>Email: <?php echo $emailWithRegex; ?></p>
    <p>Phone Number: <?php echo $phoneNumberWithRegex; ?></p>
    <p>URL: <?php echo $urlWithRegex; ?></p>

    <h2>Data Extracted Without Regular Expressions (Regex)</h2>
    <p>Email: <?php echo $emailWithoutRegex; ?></p>
    <p>Phone Number: <?php echo $phoneNumberWithoutRegex; ?></p>
    <p>URL: <?php echo $urlWithoutRegex; ?></p>
</body>
</html>



