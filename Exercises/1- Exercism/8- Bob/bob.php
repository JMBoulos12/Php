



/*
  # Instructions  :
  Bob is a lackadaisical teenager. In conversation, his responses are very limited.

  Bob answers 'Sure.' if you ask him a question, such as "How are you?".

  He answers 'Whoa, chill out!' if you YELL AT HIM (in all capitals).

  He answers 'Calm down, I know what I'm doing!' if you yell a question at him.

  He says 'Fine. Be that way!' if you address him without actually saying anything.

  He answers 'Whatever.' to anything else.

  Bob's conversational partner is a purist when it comes to written communication and always follows normal rules regarding sentence punctuation in English.

  The commented tests at the bottom of the bob_test.php are Stretch Goals, they are optional. 
  They may be easier to solve if you are using the mb_string functions, which aren't installed by default with every version of PHP.

  29-March-2023
*/


<?php
class Bob
{
    public function respondTo(string $phrase): string
    {
        $phrase = trim($phrase, "\n\r \t\u{000b}\u{00a0}\u{2002}}");
        // Silence
        if (empty($phrase)) {
            return 'Fine. Be that way!';
        }
        // Shouting
        if (preg_match('/[A-Z]+/', $phrase) && !preg_match('/[a-z]+/', $phrase)) {
            if (str_ends_with($phrase, '?')) {
                return 'Calm down, I know what I\'m doing!';
            }
            return 'Whoa, chill out!';
        }
        // Question
        if (str_ends_with($phrase, '?')) {
            return 'Sure.';
        }
        return 'Whatever.';
    }
}
