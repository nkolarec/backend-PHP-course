<?php

require "htmllib.php";
require "quiz_score.php";

/**
 * Cita quiz_questions.txt file i radi 3 polja:
 * pitanje - točan odgovor (string - string)
 * točan odgovor - ponuđeni odgovori (string - array)
 * pitanje - tip pitanja (string - int)
 * @return array koji u sebi sadrži još tri array-a
 */
function questions_and_answers(): array
{
    if (file_exists('quiz_questions.txt')) {
        $file = fopen('quiz_questions.txt', 'r');
        $question_answer = array();
        $answer_answers = array();
        $question_type = array();
        while (!feof($file)) {
            $line = fgets($file);
            if ($line[0] === '#' or empty($line)) {
                continue;
            } else {
                $question_and_answer = str_getcsv($line, '}: ');
                $question_and_type = str_getcsv($question_and_answer[0] . rtrim(' '), '{');
                $question_type[$question_and_type[0] . rtrim(' ')] = intval($question_and_type[1]);
                $answers_and_correct_answer = str_getcsv($question_and_answer[1] . rtrim(' '), '=');
                $answer_answers[$answers_and_correct_answer[1] . rtrim('\n')] =
                    str_getcsv($answers_and_correct_answer[0] . rtrim(' '), ', ');
                $question_answer[$question_and_type[0] . rtrim(' ')] = $answers_and_correct_answer[1] . rtrim('\n');
            }
        }
        fclose($file);
        return ['type' => $question_type, 'questions' => $question_answer, 'answer' => $answer_answers];
    }
    else {
        return array();
    }
}
    
function generate_quiz($type_1, $type_2, $type_3): void {

    $quiz_questions = questions_and_answers();
    if (empty($quiz_questions)) {
        echo 'Invalid file.';
    }
    else {
        $question_type = $quiz_questions['type'];
        $question_answer = $quiz_questions['question'];
        $answer_answers = $quiz_questions['answer'];

        start_form('/quiz.php', 'get');
        $questions = array_keys($question_type, 1);
        foreach (array_rand($questions, $type_1) as $index) {
            echo create_element('label', true, ['contents' => [$questions[$index]]]);
        }

        $questions = array_keys($question_type, 2);
        foreach (array_rand($questions, $type_2) as $index) {
            echo create_element('label', true, ['contents' => [$questions[$index]]]);
        }

        $questions = array_keys($question_type, 3);
        foreach (array_rand($questions, $type_3) as $index) {
            echo create_element('label', true, ['contents' => [$questions[$index]]]);
        }
        echo create_button(['type' => 'button', 'onclick' => 'calculate_score()','contents' => ['Submit']]);
        end_form();
    }

}

create_doctype();
begin_html();
begin_head();
echo create_element('title', true, ['contents' => ['Quiz']]);
end_head();
begin_body
([
    'align' => 'center',
    'contents' => [create_element('h1', true, ['contents' => ['PHP quiz']])]
]);
generate_quiz(4,4,2);
end_body();
end_html();


