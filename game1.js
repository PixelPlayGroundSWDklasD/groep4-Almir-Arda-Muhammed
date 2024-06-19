const flags = [
    { country: "Germany", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png" },
    { country: "France", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/1200px-Flag_of_France.svg.png" },
    { country: "Spain", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Flag_of_Spain.svg/1200px-Flag_of_Spain.svg.png" },
    { country: "Italy", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/0/03/Flag_of_Italy.svg/1200px-Flag_of_Italy.svg.png" },
    { country: "United Kingdom", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1200px-Flag_of_the_United_Kingdom.svg.png" },
    { country: "United States", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1200px-Flag_of_the_United_States.svg.png" },
    { country: "Canada", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/c/cf/Flag_of_Canada.svg/1200px-Flag_of_Canada.svg.png" },
    { country: "Brazil", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/0/05/Flag_of_Brazil.svg/1200px-Flag_of_Brazil.svg.png" },
    { country: "China", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_the_People%27s_Republic_of_China.svg/1200px-Flag_of_the_People%27s_Republic_of_China.svg.png" },
    { country: "Japan", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/9/9e/Flag_of_Japan.svg/1200px-Flag_of_Japan.svg.png" },
    { country: "India", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/4/41/Flag_of_India.svg/1200px-Flag_of_India.svg.png" },
    { country: "Russia", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/f/f3/Flag_of_Russia.svg/1200px-Flag_of_Russia.svg.png" },
    { country: "Australia", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/b/b9/Flag_of_Australia.svg/1200px-Flag_of_Australia.svg.png" },
    { country: "South Korea", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_South_Korea.svg/1200px-Flag_of_South_Korea.svg.png" },
    { country: "Mexico", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Mexico.svg/1200px-Flag_of_Mexico.svg.png" },
    { country: "Argentina", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/1200px-Flag_of_Argentina.svg.png" },
    { country: "South Africa", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/Flag_of_South_Africa.svg/1200px-Flag_of_South_Africa.svg.png" },
    { country: "Saudi Arabia", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Flag_of_Saudi_Arabia.svg/1200px-Flag_of_Saudi_Arabia.svg.png" },
    { country: "Netherlands", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Flag_of_the_Netherlands.svg/1200px-Flag_of_the_Netherlands.svg.png" },
    { country: "Turkiye", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Turkey.svg/1200px-Flag_of_Turkey.svg.png" },
    { country: "Egypt", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/1200px-Flag_of_Egypt.svg.png" },
    { country: "Vietnam", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/1200px-Flag_of_Vietnam.svg.png" },
    { country: "Indonesia", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/1200px-Flag_of_Indonesia.svg.png" },
    { country: "Thailand", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Flag_of_Thailand.svg/1200px-Flag_of_Thailand.svg.png" },
    { country: "Greece", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Greece.svg/1200px-Flag_of_Greece.svg.png" },
    { country: "Portugal", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/1200px-Flag_of_Portugal.svg.png" },
    { country: "Sweden", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/4/4c/Flag_of_Sweden.svg/1200px-Flag_of_Sweden.svg.png" },
    { country: "Switzerland", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/1200px-Flag_of_Switzerland.svg.png" },
    { country: "Belgium", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Flag_of_Belgium.svg/1200px-Flag_of_Belgium.svg.png" },
    { country: "Austria", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Flag_of_Austria.svg/1200px-Flag_of_Austria.svg.png" },
    { country: "Norway", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/1200px-Flag_of_Norway.svg.png" },
    { country: "Denmark", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Flag_of_Denmark.svg/1200px-Flag_of_Denmark.svg.png" },
    { country: "Finland", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Finland.svg/1200px-Flag_of_Finland.svg.png" },
    { country: "Ireland", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Flag_of_Ireland.svg/1200px-Flag_of_Ireland.svg.png" },
    { country: "Poland", flagSrc: "https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Flag_of_Poland.svg/1200px-Flag_of_Poland.svg.png" },
    { country: "Ukraine", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Ukraine.svg/1200px-Flag_of_Ukraine.svg.png" },
    { country: "Romania", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flag_of_Romania.svg/1200px-Flag_of_Romania.svg.png" },
    { country: "Czech Republic", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Flag_of_the_Czech_Republic.svg/1200px-Flag_of_the_Czech_Republic.svg.png" },
    { country: "Hungary", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Flag_of_Hungary.svg/1200px-Flag_of_Hungary.svg.png" },
    { country: "Chile", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Flag_of_Chile.svg/1200px-Flag_of_Chile.svg.png" },
    { country: "Peru", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Flag_of_Peru.svg/1200px-Flag_of_Peru.svg.png" },
    { country: "Colombia", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/1200px-Flag_of_Colombia.svg.png" },
    { country: "Venezuela", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Flag_of_Venezuela.svg/1200px-Flag_of_Venezuela.svg.png" },
    { country: "Albania", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Flag_of_Albania.svg/1200px-Flag_of_Albania.svg.png" },
    { country: "Kosovo", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Flag_of_Kosovo.svg/1200px-Flag_of_Kosovo.svg.png" },
    { country: "Kurdistan", flagSrc: "https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Flag_of_Kurdistan.svg/1200px-Flag_of_Kurdistan.svg.png" }
];

let currentFlagIndex = 0;
let highScore = 0;

function shuffleFlags(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

function startGame() {
    shuffleFlags(flags);
    currentFlagIndex = 0;
    highScore = 0;
    updateHighScore();
    showFlag();
}

function showFlag() {
    const flagElement = document.getElementById('current-flag');
    flagElement.src = flags[currentFlagIndex].flagSrc;
}

function checkGuess() {
    const userGuess = document.getElementById('country-guess').value.trim().toLowerCase();
    const correctCountry = flags[currentFlagIndex].country.toLowerCase();

    if (userGuess === correctCountry) {
        document.getElementById('guess-result').textContent = "Correct!";
        highScore++;
        updateHighScore();
        setTimeout(nextFlag, 1000);
    } else {
        document.getElementById('guess-result').textContent = `Game Over. Your high score is ${highScore}.`;
    }
}

function updateHighScore() {
    document.getElementById('high-score-display').textContent = highScore;
}

function nextFlag() {
    currentFlagIndex++;
    if (currentFlagIndex >= flags.length) {
        currentFlagIndex = 0;
    }
    document.getElementById('country-guess').value = "";
    document.getElementById('guess-result').textContent = "";
    showFlag();
}

function restartGame() {
    startGame();
}

function handleKeyDown(event) {
    if (event.key === "Enter") {
        checkGuess();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    startGame();

    document.getElementById('check-button').addEventListener('click', checkGuess);
    document.getElementById('restart-button').addEventListener('click', restartGame);
    document.getElementById('country-guess').addEventListener('keydown', function(event) {
        if (event.key === "Enter") {
            checkGuess();
        }
    });
});