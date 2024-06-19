const questions = [
    {
    question: "What is the largest planet in our solar system?",
    options: {
    A: "Mars",
    B: "Jupiter",
    C: "Earth",
    D: "Saturn"
    },
    correctAnswer: "B"
    },
    {
    question: "How many continents are there in the world?",
    options: {
    A: "4",
    B: "5",
    C: "6",
    D: "7"
    },
    correctAnswer: "D"
    },
    {
    question: "What is the longest river in the world?",
    options: {
    A: "Amazon River",
    B: "Nile",
    C: "Yangtze",
    D: "Mississippi"
    },
    correctAnswer: "B"
    },
    {
    question: "How many teeth does an adult human normally have?",
    options: {
    A: "28",
    B: "30",
    C: "32",
    D: "34"
    },
    correctAnswer: "C"
    },
    {
    question: "Who painted the Mona Lisa?",
    options: {
    A: "Vincent van Gogh",
    B: "Pablo Picasso",
    C: "Leonardo da Vinci",
    D: "Michelangelo"
    },
    correctAnswer: "C"
    },
    {
    question: "What is the fastest land animal in the world?",
    options: {
    A: "Cheetah",
    B: "Lion",
    C: "Leopard",
    D: "Giraffe"
    },
    correctAnswer: "A"
    },
    {
    question: "What is the name of Borussia Dortmund's stadium?",
    options: {
    A: "Cars Jeans Stadium",
    B: "Albarda Sports Association",
    C: "Dortmund Arena",
    D: "Signal Iduna Park"
    },
    correctAnswer: "D"
    },
    {
    question: "Who is the baldest of Mborijnland?",
    options: {
    A: "Mr. Ras",
    B: "Patrick",
    C: "Ras",
    D: "Arda Ilhan Zeeheldenkwartier 2007 April Elandplein"
    },
    correctAnswer: "D"
    },
    {
    question: "What will our grade be?",
    options: {
    A: "7",
    B: "8",
    C: "9",
    D: "10"
    },
    correctAnswer: "D"
    },
    {
    question: "What is the best club on earth?",
    options: {
    A: "Real Madrid",
    B: "Feyenoord",
    C: "Manchester City",
    D: "Besiktas"
    },
    correctAnswer: "D"
    },
    {
    question: "What is the capital of Australia?",
    options: {
    A: "Sydney",
    B: "Melbourne",
    C: "Canberra",
    D: "Brisbane"
    },
    correctAnswer: "C"
    },
    {
    question: "Which is the tallest mountain in the world?",
    options: {
    A: "Mount Everest",
    B: "K2",
    C: "Mount Kilimanjaro",
    D: "Mount McKinley (Denali)"
    },
    correctAnswer: "A"
    },
    {
    question: "Who wrote the novel 'Pride and Prejudice'?",
    options: {
    A: "Charles Dickens",
    B: "Jane Austen",
    C: "Leo Tolstoy",
    D: "Mark Twain"
    },
    correctAnswer: "B"
    },
    {
    question: "Which city hosted the 2016 Summer Olympics?",
    options: {
    A: "Tokyo",
    B: "Rio de Janeiro",
    C: "London",
    D: "Beijing"
    },
    correctAnswer: "B"
    },
    {
    question: "Which planet is known as the Red Planet?",
    options: {
    A: "Mars",
    B: "Venus",
    C: "Jupiter",
    D: "Saturn"
    },
    correctAnswer: "A"
    },
    {
    question: "Who painted the famous work 'The Starry Night'?",
    options: {
    A: "Vincent van Gogh",
    B: "Claude Monet",
    C: "Pablo Picasso",
    D: "Leonardo da Vinci"
    },
    correctAnswer: "A"
    },
    {
    question: "Which element has the chemical symbol 'Fe'?",
    options: {
    A: "Iron",
    B: "Gold",
    C: "Silver",
    D: "Zinc"
    },
    correctAnswer: "A"
    },
    {
    question: "Which animal is known as the 'King of the Jungle'?",
    options: {
    A: "Tiger",
    B: "Lion",
    C: "Leopard",
    D: "Panther"
    },
    correctAnswer: "B"
    },
    {
    question: "Which country is home to the famous Taj Mahal?",
    options: {
    A: "India",
    B: "China",
    C: "Egypt",
    D: "Italy"
    },
    correctAnswer: "A"
    },
    {
    question: "What is the longest bone in the human body?",
    options: {
    A: "Femur",
    B: "Humerus",
    C: "Tibia",
    D: "Fibula"
    },
    correctAnswer: "A"
    }
    ];
    
    let currentQuestionIndex = 0;
    let score = 0;
    
    function displayQuestion() {
    const currentQuestion = questions[currentQuestionIndex];
    const questionElement = document.getElementById("question");
    const optionsElement = document.getElementById("options");
    
    
    questionElement.textContent = currentQuestion.question;
    optionsElement.innerHTML = "";
    
    for (let option in currentQuestion.options) {
        if (currentQuestion.options.hasOwnProperty(option)) {
            const optionText = currentQuestion.options[option];
            const button = document.createElement("button");
            button.textContent = `${option}: ${optionText}`;
            button.className = "option";
            button.value = option;
            button.addEventListener("click", function() {
                checkAnswer(option);
            });
            optionsElement.appendChild(button);
        }
    }
    }
    
    function checkAnswer(selectedOption) {
    const currentQuestion = questions[currentQuestionIndex];
    const resultElement = document.getElementById("result");
    
    
    if (selectedOption === currentQuestion.correctAnswer) {
        resultElement.textContent = "Correct answer!";
        score++;
    } else {
        resultElement.textContent = `Incorrect answer. The correct answer was: ${currentQuestion.correctAnswer}`;
    }
    
    currentQuestionIndex++;
    
    
    if (currentQuestionIndex < questions.length) {
        displayQuestion();
    } else {
    
        const quizContainer = document.querySelector(".quiz-container");
        quizContainer.innerHTML += `<h3>Quiz completed</h3>
                                    <p>Your score is: ${score} out of ${questions.length}</p>`;
    
        saveScore(score);
    }
    }
    
    function openConfirmation(message, callback) {
    const confirmationBox = document.getElementById('confirmationTemplate');
    const messageElement = document.getElementById('message');
    const confirmButton = document.getElementById('confirm');
    const cancelButton = document.getElementById('cancel');
    const noButton = document.getElementById('no');
    
    
    messageElement.textContent = message;
    confirmationBox.style.display = 'block';
    
    
    confirmButton.addEventListener('click', function() {
        callback('OK');
        confirmationBox.style.display = 'none';
    });
    cancelButton.addEventListener('click', function() {
        callback('CANCEL');
        confirmationBox.style.display = 'none';
    });
    noButton.addEventListener('click', function() {
        callback('NO');
        confirmationBox.style.display = 'none';
    });
    }
    
    document.getElementById('openConfirmation').addEventListener('click', function() {
    openConfirmation('Are you sure you want to proceed?', function(response) {
    console.log('User selected:', response);
    });
    });
    
    function saveScore(score) {
    const savedScores = JSON.parse(localStorage.getItem('quizScores')) || [];
    savedScores.push(score);
    localStorage.setItem('quizScores', JSON.stringify(savedScores));
    displaySavedScores();
    }
    
    function displaySavedScores() {
    const savedScores = JSON.parse(localStorage.getItem('quizScores')) || [];
    const savedDataElement = document.getElementById('savedData');
    savedDataElement.innerHTML = '';
    savedScores.forEach((score, index) => {
    const listItem = document.createElement('li');
    
    savedDataElement.appendChild(listItem);
    });
    }
    
    window.onload = function() {
    displayQuestion();
    displaySavedScores();
    
    
    document.getElementById('openConfirmation').addEventListener('click', function() {
        openConfirmation('Are you sure you want to proceed?', function(response) {
            console.log('User selected:', response);
        });
    });
    };
    
    function displayQuestion() {
    const currentQuestion = questions[currentQuestionIndex];
    const questionElement = document.getElementById("question");
    const optionsElement = document.getElementById("options");
    
    
    questionElement.textContent = currentQuestion.question;
    optionsElement.innerHTML = "";
    
    for (let option in currentQuestion.options) {
        if (currentQuestion.options.hasOwnProperty(option)) {
            const optionText = currentQuestion.options[option];
            const button = document.createElement("button");
            button.textContent = `${option}: ${optionText}`;
            button.className = "option";
            button.value = option;
            button.addEventListener("click", function() {
                checkAnswer(option);
            });
            optionsElement.appendChild(button);
        }
    }
    }
    
    function checkAnswer(selectedOption) {
    const currentQuestion = questions[currentQuestionIndex];
    const resultElement = document.getElementById("result");
    
    
    if (selectedOption === currentQuestion.correctAnswer) {
        resultElement.textContent = "Correct answer!";
        score++;
    } else {
        resultElement.textContent = `Incorrect answer. The correct answer was: ${currentQuestion.correctAnswer}`;
    }
    
    currentQuestionIndex++;
    
    
    if (currentQuestionIndex < questions.length) {
        displayQuestion();
    } else {
    
        const quizContainer = document.querySelector(".quiz-container");
        quizContainer.innerHTML += `<h3>Quiz completed</h3>
                                    <p>Your score is: ${score} out of ${questions.length}</p>`;
    
        saveScore(score);
    }
    }
    
    function openConfirmation(message, callback) {
    const confirmationBox = document.getElementById('confirmationTemplate');
    const messageElement = document.getElementById('message');
    const confirmButton = document.getElementById('confirm');
    const cancelButton = document.getElementById('cancel');
    const noButton = document.getElementById('no');
    
    
    messageElement.textContent = message;
    confirmationBox.style.display = 'block';
    
    
    confirmButton.addEventListener('click', function() {
        callback('OK');
        confirmationBox.style.display = 'none';
    });
    cancelButton.addEventListener('click', function() {
        callback('CANCEL');
        confirmationBox.style.display = 'none';
    });
    noButton.addEventListener('click', function() {
        callback('NO');
        confirmationBox.style.display = 'none';
    });
    }
    
    function saveScore(score) {
    const savedScores = JSON.parse(localStorage.getItem('quizScores')) || [];
    savedScores.push(score);
    localStorage.setItem('quizScores', JSON.stringify(savedScores));
    displaySavedScores();
    }
    
    
    
    
    const newQuestions = [
    {
    question: "What is the capital of Brazil?",
    options: {
    A: "São Paulo",
    B: "Rio de Janeiro",
    C: "Brasília",
    D: "Salvador"
    },
    correctAnswer: "C"
    },
    {
    question: "Who discovered gravity?",
    options: {
    A: "Isaac Newton",
    B: "Albert Einstein",
    C: "Galileo Galilei",
    D: "Stephen Hawking"
    },
    correctAnswer: "A"
    },
    {
    question: "What is the largest ocean on Earth?",
    options: {
    A: "Atlantic Ocean",
    B: "Indian Ocean",
    C: "Arctic Ocean",
    D: "Pacific Ocean"
    },
    correctAnswer: "D"
    },
    {
    question: "Who wrote 'The Great Gatsby'?",
    options: {
    A: "F. Scott Fitzgerald",
    B: "Ernest Hemingway",
    C: "William Faulkner",
    D: "Mark Twain"
    },
    correctAnswer: "A"
    },
    {
    question: "What is the currency of Japan?",
    options: {
    A: "Yuan",
    B: "Yen",
    C: "Dollar",
    D: "Euro"
    },
    correctAnswer: "B"
    },
    {
    question: "Which planet is known as the 'Morning Star'?",
    options: {
    A: "Mars",
    B: "Venus",
    C: "Mercury",
    D: "Neptune"
    },
    correctAnswer: "B"
    },
    {
    question: "Who is the author of 'Harry Potter' series?",
    options: {
    A: "J.R.R. Tolkien",
    B: "J.K. Rowling",
    C: "George R.R. Martin",
    D: "C.S. Lewis"
    },
    correctAnswer: "B"
    },
    {
    question: "Which country is famous for its tulips?",
    options: {
    A: "France",
    B: "Netherlands",
    C: "Germany",
    D: "Italy"
    },
    correctAnswer: "B"
    },
    {
    question: "What is the largest desert in the world?",
    options: {
    A: "Sahara Desert",
    B: "Arabian Desert",
    C: "Gobi Desert",
    D: "Antarctica Desert"
    },
    correctAnswer: "A"
    },
    {
    question: "Who painted 'The Persistence of Memory'?",
    options: {
    A: "Salvador Dalí",
    B: "Pablo Picasso",
    C: "Vincent van Gogh",
    D: "Claude Monet"
    },
    correctAnswer: "A"
    }
    ];