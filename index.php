<?php
// This is the secure, server-side code. It's not visible to the user's browser.

// The questions and answers are stored here, securely on the server.
$questions = [
    [
        'id' => 1,
        'type' => 'multiple',
        'q' => 'What is a correct syntax to output "Hi Programming 1" in C?',
        'choices' => [
            "A. cout << \"Hi Programming 1\";",
            "B. System.out.printline(\"Hi Programming 1\");",
            "C. printf(\"Hi Programming 1\");",
            "D. Console.WriteLine(\"Hi Programming 1\");"
        ],
        'answer' => 'C. printf("Hi Programming 1");'
    ],
    [
        'id' => 2,
        'type' => 'fill',
        'q' => 'How do you insert COMMENTS in C code?',
        'answer' => '//'
    ],
    [
        'id' => 3,
        'type' => 'truefalse',
        'q' => 'When a variable is created in C, a memory address is assigned to the variable.',
        'answer' => 'True'
    ],
    [
        'id' => 4,
        'type' => 'truefalse',
        'q' => 'In C, code statements must end with a semicolon (;)',
        'answer' => 'True'
    ],
    [
        'id' => 5,
        'type' => 'multiple',
        'q' => 'How can you create a variable with the numeric value 5?',
        'choices' => [
            "A. val num = 5;",
            "B. num = 5 int;",
            "C. num = 5;",
            "D. int num = 5;"
        ],
        'answer' => 'D. int num = 5;'
    ],
    [
        'id' => 6,
        'type' => 'multiple',
        'q' => 'How can you create a variable with the floating number 2.8?',
        'choices' => [
            "A. val num = 2.8;",
            "B. float num = 2.8;",
            "C. num = 2.8 double;",
            "D. num = 2.8 float;"
        ],
        'answer' => 'B. float num = 2.8;'
    ],
    [
        'id' => 7,
        'type' => 'multiple',
        'q' => 'Which operator is used to add together two values?',
        'choices' => [
            "A. The * sign",
            "B. The ADD keyword",
            "C. The & sign",
            "D. The + sign"
        ],
        'answer' => 'D. The + sign'
    ],
    [
        'id' => 8,
        'type' => 'multiple',
        'q' => 'Which function is often used to output values and display text?',
        'choices' => [
            "A. printf()",
            "B. output()",
            "C. printword()",
            "D. write()"
        ],
        'answer' => 'A. printf()'
    ],
    [
        'id' => 9,
        'type' => 'multiple',
        'q' => 'Which format specifier is often used to print integers?',
        'choices' => [
            "A. %s",
            "B. %c",
            "C. %d",
            "D. %f"
        ],
        'answer' => 'C. %d'
    ],
    [
        'id' => 10,
        'type' => 'multiple',
        'q' => 'Which operator can be used to compare two values?',
        'choices' => [
            "A. ==",
            "B. <>",
            "C. ><",
            "D. ="
        ],
        'answer' => 'A. =='
    ],
    [
        'id' => 11,
        'type' => 'multiple',
        'q' => 'Which operator can be used to find the memory size (in bytes) of a data type or variable?',
        'choices' => [
            "A. The length property",
            "B. The sizeof property",
            "C. The len property",
            "D. The sizer property"
        ],
        'answer' => 'B. The sizeof property'
    ],
    [
        'id' => 12,
        'type' => 'multiple',
        'q' => 'Which keyword can be used to make a variable unchangeable/read-only?',
        'choices' => [
            "A. const",
            "B. final",
            "C. constant",
            "D. readonly"
        ],
        'answer' => 'A. const'
    ],
    [
        'id' => 13,
        'type' => 'multiple',
        'q' => 'What do we call the following? int myNumbers[] = {25, 50, 75, 100};',
        'choices' => [
            "A. None of the above",
            "B. A class",
            "C. An array",
            "D. A pointer"
        ],
        'answer' => 'C. An array'
    ],
    [
        'id' => 14,
        'type' => 'multiple',
        'q' => 'Array indexes start with:',
        'choices' => [
            "A. 1",
            "B. 0",
            "C. -1",
            "D. 10"
        ],
        'answer' => 'B. 0'
    ],
    [
        'id' => 15,
        'type' => 'fill',
        'q' => 'Array indexes start with?',
        'answer' => '0'
    ],
    [
        'id' => 16,
        'type' => 'multiple',
        'q' => 'What does the \n character do in a C program?',
        'choices' => [
            "A. It creates a new line",
            "B. It creates a space",
            "C. It creates a tab",
            "D. It creates a backslash"
        ],
        'answer' => 'A. It creates a new line'
    ],
    [
        'id' => 17,
        'type' => 'fill',
        'q' => 'What is the code output?
        printf("Hello World! I am learning C.");',
        'answer' => 'Hello World! I am learning C.'
    ],
    [
        'id' => 18,
        'type' => 'multiple',
        'q' => 'Which data type is used to store integers (whole numbers) in C?',
        'choices' => [
            "A. char",
            "B. float",
            "C. int",
            "D. double"
        ],
        'answer' => 'C. int'
    ],
    [
        'id' => 19,
        'type' => 'fill',
        'q' => 'Use the correct format specifier to output the value of myNum: 
            int myNum = 15;
            printf(" ", myNum);',
        'answer' => '%d'
    ],
    [
        'id' => 20,
        'type' => 'fill',
        'q' => 'What is the following code output?
        int myNum = 15;
        printf("%d", myNum);',
        'answer' => '15'
    ],
    // Add more questions here. They will be safe on the server.
];

// Start a session to keep track of answered questions.
session_start();
header('Content-Type: text/html');

// Handle API requests from the JavaScript code
if (isset($_GET['action'])) {
    header('Content-Type: application/json');
    
    $action = $_GET['action'];
    $answered_count = $_SESSION['answered_count'] ?? 0;
    $total_questions = count($questions);

    switch ($action) {
        case 'start':
            $_SESSION['answered_count'] = 0;
            $_SESSION['shuffled_questions'] = $questions;
            shuffle($_SESSION['shuffled_questions']);
            echo json_encode(['status' => 'ok']);
            exit;

        case 'getQuestion':
            if ($answered_count >= $total_questions) {
                echo json_encode(['finished' => true, 'total_questions' => $total_questions]);
                session_destroy();
                exit;
            }

            $current = $_SESSION['shuffled_questions'][$answered_count];
            $question_data = [
                'id' => $current['id'],
                'type' => $current['type'],
                'q' => $current['q'],
                'choices' => $current['choices'] ?? [],
                'total_questions' => $total_questions
            ];
            echo json_encode($question_data);
            exit;

        case 'submitAnswer':
            $data = json_decode(file_get_contents('php://input'), true);
            $user_answer = $data['user_answer'];
            $question_id = $data['question_id'];
            
            $question = null;
            foreach ($questions as $q) {
                if ($q['id'] == $question_id) {
                    $question = $q;
                    break;
                }
            }

            if ($question) {
                $correct = false;
                if ($question['type'] === 'fill') {
                    $correct = (strtolower($question['answer']) === strtolower($user_answer));
                } elseif ($question['type'] === 'truefalse') {
                    $correct = (strtolower($question['answer']) === strtolower($user_answer));
                } else {
                    $correct = ($question['answer'] === $user_answer);
                }
                
                $_SESSION['answered_count'] = $answered_count + 1;
                echo json_encode([
                    'correct' => $correct,
                    'correct_answer' => $question['answer']
                ]);
            } else {
                echo json_encode(['error' => 'Question not found.']);
            }
            exit;

        case 'saveResult':
            // This is the action to save the quiz summary results
            $data = json_decode(file_get_contents('php://input'), true);
            $name = $data['name'] ?? 'Anonymous';
            $score = $data['score'] ?? 0;
            $total = $data['total'] ?? 0;
            $time = $data['time'] ?? 'N/A';
            $date = date('Y-m-d H:i:s');

            // Format the result string for the summary log
            $result_line = "Date: $date | Name: $name | Score: $score/$total | Time: $time\n";

            // Save the result to a file (quiz_results.txt)
            $file_path = 'quiz_results.txt';
            file_put_contents($file_path, $result_line, FILE_APPEND | LOCK_EX);

            echo json_encode(['status' => 'success', 'message' => 'Summary result saved successfully.']);
            exit;

        case 'saveStudentLog':
            // This is the new action to save the detailed student log
            $data = json_decode(file_get_contents('php://input'), true);
            $name = $data['name'] ?? 'Anonymous';
            $date = date('Y-m-d H:i:s');
            $incorrectAnswers = $data['incorrectAnswers'] ?? [];

            // Open the studentlogs.txt file for appending
            $log_file_path = 'studentlogs.txt';
            $log_handle = fopen($log_file_path, 'a');

            if ($log_handle) {
                // Write the header for the log entry
                fwrite($log_handle, "--- Student Log for $name on $date ---\n");
                
                // Log each incorrect answer
                if (count($incorrectAnswers) > 0) {
                    foreach ($incorrectAnswers as $q) {
                        $log_line = "Question ID: {$q['id']} | Question: {$q['q']} | Your Answer: {$q['userAnswer']} | Correct Answer: {$q['correctAnswer']}\n";
                        fwrite($log_handle, $log_line);
                    }
                } else {
                    fwrite($log_handle, "Student answered all questions correctly.\n");
                }
                
                fwrite($log_handle, "\n"); // Add a blank line for readability
                fclose($log_handle);

                echo json_encode(['status' => 'success', 'message' => 'Detailed log saved successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Could not open log file.']);
            }
            exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Mixed-Type Timed Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #c1d5e0);
            color: #333;
            margin: 0;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .container {
            width: 100%;
            max-width: 600px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #welcomeScreen, #quiz, #timer, #scoreboard {
            width: 100%;
        }

        #quiz, #timer {
            display: none;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        button, input[type="text"] {
            width: 100%;
            padding: 0.9rem 1.2rem;
            margin: 0.6rem 0;
            font-size: 1rem;
            border: 2px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input[type="text"] {
            border: 2px solid #ddd;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .primary-btn {
            background: #3498db;
            color: white;
            border: none;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
        }

        .primary-btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(52, 152, 219, 0.4);
        }
        
        .answer-btn {
            background: #ecf0f1;
            color: #2c3e50;
            font-weight: 400;
            text-align: left;
            border: 1px solid #bdc3c7;
            padding: 0.9rem 1.2rem;
        }
        
        .answer-btn:hover {
            background: #bdc3c7;
            transform: none;
            box-shadow: none;
        }

        .timer, .result, .scoreboard h2 {
            font-weight: 600;
            margin-top: 1.5rem;
            text-align: center;
        }

        .scoreboard h2 {
            font-size: 1.5rem;
            color: #2c3e50;
            margin-top: 2rem;
            border-bottom: 2px solid #bdc3c7;
            padding-bottom: 0.5rem;
        }
        
        ul {
            list-style-type: none;
            padding: 0;
            width: 100%;
        }

        ul li {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 0.8rem 1rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }
            .container {
                padding: 1.5rem;
                margin-top: 0;
                box-shadow: none;
                border-radius: 0;
            }
        }
    </style>
</head>
<body>
    <h1>🧠 Quiz</h1>

    <div class="container" id="quiz-app">
        <div id="welcomeScreen">
            <p>Please enter your name to start the quiz:</p>
            <input type="text" id="nameInput" placeholder="Enter your name" />
            <button id="startBtn" class="primary-btn">▶️ Start Quiz</button>
        </div>
        
        <div class="timer" id="timer">Time left: 60s</div>
        <div id="quiz">
            <p id="question"></p>
            <div id="choices"></div>
            <div id="result" class="result"></div>
        </div>
        
        <div class="scoreboard" id="scoreboard">
            <h2>📋 Scoreboard</h2>
            <ul id="scoreList"></ul>
        </div>
    </div>

    <script>
        let currentIndex = 0;
        let score = 0;
        let timeLeft = 60;
        let timerInterval;
        let studentName = "";
        let quizStartTime;
        let currentQuestion = null;
        // New array to store incorrect answers
        let incorrectAnswersLog = []; 

        const startBtn = document.getElementById('startBtn');
        const qEl = document.getElementById('question');
        const cEl = document.getElementById('choices');
        const rEl = document.getElementById('result');
        const tEl = document.getElementById('timer');
        const quizEl = document.getElementById('quiz');
        const scoreList = document.getElementById('scoreList');
        const nameInput = document.getElementById('nameInput');
        const welcomeScreen = document.getElementById('welcomeScreen');
        const scoreboard = document.getElementById('scoreboard');

        function loadScoreboard() {
            const scores = JSON.parse(localStorage.getItem('quizScores') || '[]');
            scoreList.innerHTML = scores.map(s => `<li>${s.name} on ${s.date} — ${s.score}/${s.total} - Time: ${s.time}</li>`).join('');
        }

        // This is now for local storage only, and no longer sends to the server.
        function saveScore(score, total, time) {
            const scores = JSON.parse(localStorage.getItem('quizScores') || '[]');
            const now = new Date().toLocaleString();
            scores.unshift({ date: now, name: studentName, score, total, time });
            localStorage.setItem('quizScores', JSON.stringify(scores.slice(0, 10)));
        }

        startBtn.addEventListener('click', () => {
            const name = nameInput.value.trim();
            if (name === "") {
                alert("Please enter your name to start.");
                return;
            }
            studentName = name;
            welcomeScreen.style.display = 'none';
            quizEl.style.display = 'block';
            tEl.style.display = 'block';
            currentIndex = 0;
            score = 0;
            incorrectAnswersLog = []; // Reset the log
            quizStartTime = new Date();
            fetch('?action=start').then(() => getNextQuestion());
        });

        async function getNextQuestion() {
            const response = await fetch('?action=getQuestion');
            const data = await response.json();

            if (data.finished) {
                endQuiz();
                return;
            }

            currentQuestion = data;
            showQuestion();
        }

        async function submitAnswer(answer) {
            clearInterval(timerInterval);
            
            const response = await fetch('?action=submitAnswer', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ question_id: currentQuestion.id, user_answer: answer })
            });
            const data = await response.json();

            if (data.correct) {
                score++;
                rEl.textContent = "✅ Correct!";
            } else {
                // Log the incorrect answer
                incorrectAnswersLog.push({
                    id: currentQuestion.id,
                    q: currentQuestion.q,
                    userAnswer: answer,
                    correctAnswer: data.correct_answer
                });
                rEl.textContent = `❌ Incorrect. Correct: ${data.correct_answer}`;
            }
            
            setTimeout(getNextQuestion, 1000);
        }
        
        function showQuestion() {
            timeLeft = 60;
            tEl.textContent = `Time left: ${timeLeft}s`;
            clearInterval(timerInterval);
            timerInterval = setInterval(() => {
                timeLeft--;
                tEl.textContent = `Time left: ${timeLeft}s`;
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    rEl.textContent = "⏱️ Time's up!";
                    setTimeout(getNextQuestion, 1000);
                }
            }, 1000);

            qEl.textContent = currentQuestion.q;
            cEl.innerHTML = "";
            rEl.textContent = "";

            if (currentQuestion.type === "multiple") {
                currentQuestion.choices.forEach((choice) => {
                    const btn = document.createElement('button');
                    btn.className = "answer-btn";
                    btn.textContent = choice;
                    btn.onclick = () => submitAnswer(choice);
                    cEl.appendChild(btn);
                });
            } else if (currentQuestion.type === "truefalse") {
                ["True", "False"].forEach((val) => {
                    const btn = document.createElement('button');
                    btn.className = "answer-btn";
                    btn.textContent = val;
                    btn.onclick = () => submitAnswer(val);
                    cEl.appendChild(btn);
                });
            } else if (currentQuestion.type === "fill") {
                const input = document.createElement('input');
                input.type = "text";
                input.placeholder = "Type your answer...";
                cEl.appendChild(input);

                const submitBtn = document.createElement('button');
                submitBtn.className = "primary-btn";
                submitBtn.textContent = "Submit";
                submitBtn.onclick = () => submitAnswer(input.value.trim());
                cEl.appendChild(submitBtn);
            }
        }

        function endQuiz() {
            clearInterval(timerInterval);
            const quizEndTime = new Date();
            const totalTimeInMs = quizEndTime - quizStartTime;
            const totalSeconds = Math.floor(totalTimeInMs / 1000);
            const minutes = Math.floor(totalSeconds / 60);
            const seconds = totalSeconds % 60;
            const formattedTime = `${minutes}m ${seconds}s`;

            qEl.textContent = "🎉 Quiz Complete!";
            cEl.innerHTML = "";
            rEl.innerHTML = `Your score: ${score} / ${currentQuestion.total_questions}<br>Total time: ${formattedTime}`;
            tEl.style.display = 'none';
            
            // Send the main quiz results to quiz_results.txt
            fetch('?action=saveResult', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name: studentName,
                    score: score,
                    total: currentQuestion.total_questions,
                    time: formattedTime
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Summary saved:', data);
            })
            .catch(error => {
                console.error('Error saving summary:', error);
            });

            // Send the detailed log of incorrect answers to studentlogs.txt
            fetch('?action=saveStudentLog', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name: studentName,
                    incorrectAnswers: incorrectAnswersLog
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Detailed log saved:', data);
            })
            .catch(error => {
                console.error('Error saving detailed log:', error);
            });

            // Save score to local storage for scoreboard display
            saveScore(score, currentQuestion.total_questions, formattedTime);
            loadScoreboard();
        }

        loadScoreboard();
    </script>
</body>
</html>
