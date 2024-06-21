const originalPlayers = [
    { name: "Lionel Messi", country: "Argentina", club: "Inter Miami", position: "Forward" },
    { name: "Cristiano Ronaldo", country: "Portugal", club: "Al-Nasser", position: "Forward" },
    { name: "Kylian Mbappe", country: "France", club: "Real Madrid", position: "Forward" },
    { name: "Robert Lewandowski", country: "Poland", club: "Barcelona", position: "Forward" },
    { name: "Kevin De Bruyne", country: "Belgium", club: "Manchester City", position: "Midfielder" },
    { name: "Sergio Ramos", country: "Spain", club: "Sevilla", position: "Defender" },
    { name: "Mohamed Salah", country: "Egypt", club: "Liverpool", position: "Forward" },
    { name: "Neymar Jr", country: "Brazil", club: "Al-Hilal", position: "Forward" },
    { name: "Virgil van Dijk", country: "Netherlands", club: "Liverpool", position: "Defender" },
    { name: "Harry Kane", country: "England", club: "Bayern Munich", position: "Forward" },
    { name: "Eden Hazard", country: "Belgium", club: "Retired", position: "Forward" },
    { name: "Antoine Griezmann", country: "France", club: "Atletico Madrid", position: "Forward" },
    { name: "Sadio Mane", country: "Senegal", club: "Al-Nasser", position: "Forward" },
    { name: "Raheem Sterling", country: "England", club: "Chelsea", position: "Forward" },
    { name: "Toni Kroos", country: "Germany", club: "Real Madrid", position: "Midfielder" },
    { name: "Jaden Sancho", country: "England", club: "Dortmund", position: "Forward" },
    { name: "Koulibaly", country: "Senegal", club: "Al-Hilal", position: "Defender" },
    { name: "Thiago Silva", country: "Brazil", club: "Chelsea", position: "Defender" },
    { name: "Bruno Fernandes", country: "Portugal", club: "Manchester United", position: "Midfielder" },
    { name: "Marc-Andre ter Stegen", country: "Germany", club: "Barcelona", position: "Goalkeeper" },
    { name: "Thomas Muller", country: "Germany", club: "Bayern Munich", position: "Forward" },
    { name: "Romelu Lukaku", country: "Belgium", club: "Roma", position: "Forward" },
    { name: "Luka Modric", country: "Croatia", club: "Real Madrid", position: "Midfielder" },
    { name: "Alphonso Davies", country: "Canada", club: "Bayern Munich", position: "Defender" },
    { name: "Son", country: "South Korea", club: "Tottenham Hotspur", position: "Forward" },
    { name: "Andrew Robertson", country: "Scotland", club: "Liverpool", position: "Defender" },
    { name: "Hakim Ziyech", country: "Morocco", club: "Galatasaray", position: "Midfielder" },
    { name: "Almir Maksuti", country: "Kosovo", club: "SC Remo", position: "Midfielder" },
    { name: "Karim Benzema", country: "France", club: "Al-Itihad", position: "Forward" },
    { name: "Ederson", country: "Brazil", club: "Manchester City", position: "Goalkeeper" },
    { name: "Joshua Kimmich", country: "Germany", club: "Bayern Munich", position: "Midfielder" },
    { name: "Frenkie de Jong", country: "Netherlands", club: "Barcelona", position: "Midfielder" },
    { name: "Joao Cancelo", country: "Portugal", club: "Barcelona", position: "Defender" },
    { name: "Jorginho", country: "Italy", club: "Arsenal", position: "Midfielder" },
    { name: "Leon Goretzka", country: "Germany", club: "Bayern Munich", position: "Midfielder" },
    { name: "Gianluigi Donnarumma", country: "Italy", club: "Paris Saint-Germain", position: "Goalkeeper" },
    { name: "Marquinhos", country: "Brazil", club: "Paris Saint-Germain", position: "Defender" },
    { name: "Marcus Rashford", country: "England", club: "Manchester United", position: "Forward" },
    { name: "David Alaba", country: "Austria", club: "Real Madrid", position: "Defender" },
    { name: "Angel Di Maria", country: "Argentina", club: "Benfica", position: "Forward" },
    { name: "Leroy Sane", country: "Germany", club: "Bayern Munich", position: "Forward" },
    { name: "Trent Alexander Arnold", country: "England", club: "Liverpool", position: "Defender" },
    { name: "Lucas Hernandez", country: "France", club: "Bayern Munich", position: "Defender" },
    { name: "Jack Grealish", country: "England", club: "Manchester City", position: "Forward" },
    { name: "Memphis Depay", country: "Netherlands", club: "Atletico Madrid", position: "Forward" },
    { name: "Kai Havertz", country: "Germany", club: "Arsenal", position: "Forward" },
    { name: "Rodri", country: "Spain", club: "Manchester City", position: "Midfielder" },
    { name: "Matthijs de Ligt", country: "Netherlands", club: "Bayren Munchen", position: "Defender" },
    { name: "Dani Carvajal", country: "Spain", club: "Real Madrid", position: "Defender" },
    { name: "Federico Chiesa", country: "Italy", club: "Juventus", position: "Forward" },
    { name: "Lautaro Martinez", country: "Argentina", club: "Inter Milan", position: "Forward" },
    { name: "Achraf Hakimi", country: "Morocco", club: "Paris Saint-Germain", position: "Defender" },
    { name: "Erling Haaland", country: "Norway", club: "Manchester City", position: "Forward" },
    { name: "Pedri", country: "Spain", club: "Barcelona", position: "Midfielder" },
    { name: "Nicolo Barella", country: "Italy", club: "InterMilan", position: "Midfielder" },
    { name: "Declan Rice", country: "England", club: "Arsenal", position: "Midfielder" },
    { name: "Serge Gnabry", country: "Germany", club: "Bayern Munich", position: "Forward"},
    { name: "Mo Bakar", country: "Kurdistan", club: "SC Remo", position: "Forward"},
];

let players = [...originalPlayers];
let highScore = 0;
let currentRandomIndex = -1;
let attempts = 0;
let currentScore = 0;

function pickRandomPlayer() {
    let newIndex;
    do {
        newIndex = Math.floor(Math.random() * players.length);
    } while (newIndex === currentRandomIndex);
    currentRandomIndex = newIndex;
    return currentRandomIndex;
}

function restartGame() {
    players = [...originalPlayers];
    currentRandomIndex = -1;
    attempts = 0;
    currentScore = 0;
    document.getElementById("currentScore").textContent = currentScore;
    document.getElementById("guessInput").value = "";
    document.getElementById("resultMessage").textContent = "";
    document.getElementById("hintMessage").textContent = "";
    pickRandomPlayer();
}

function checkGuess() {
    const guessInput = document.getElementById("guessInput");
    const guess = guessInput.value.trim();

    if (guess === "") {
        alert("Please enter a guess.");
        return;
    }

    let currentPlayerIndex = currentRandomIndex;
    if (currentPlayerIndex === -1 || attempts === 5) {
        currentPlayerIndex = pickRandomPlayer();
        attempts = 0;
    }
    const currentPlayer = players[currentPlayerIndex];

    if (guess.toLowerCase() === currentPlayer.name.toLowerCase()) {
        document.getElementById("resultMessage").textContent = `Correct! ${currentPlayer.name} is from ${currentPlayer.country}, plays for ${currentPlayer.club} as a ${currentPlayer.position}.`;

        const points = 5 - attempts;
        currentScore += points;
        document.getElementById("currentScore").textContent = currentScore;

        if (currentScore > highScore) {
            highScore = currentScore;
            document.getElementById("highScore").textContent = highScore;
        }

        players.splice(currentPlayerIndex, 1);
        currentRandomIndex = -1;
        attempts = 0;
        document.getElementById("hintMessage").textContent = "";
    } else {
        let hintMessage = "";
        switch (attempts) {
            case 0:
                hintMessage = `Incorrect guess. Here's a hint: This player is from ${currentPlayer.country}.`;
                break;
            case 1:
                hintMessage = `Incorrect guess. Here's another hint: This player plays for ${currentPlayer.club}.`;
                break;
            case 2:
                hintMessage = `Incorrect guess. Here's another hint: This player's position is ${currentPlayer.position}.`;
                break;
            case 3:
                hintMessage = `Incorrect guess. Here's another hint: The first letter of the player's last name is ${currentPlayer.name.split(" ")[1][0].toUpperCase()}.`;
                break;
            case 4:
                hintMessage = `Sorry, you've used all your attempts. The correct answer is ${currentPlayer.name}.`;
                currentScore = 0;
                document.getElementById("currentScore").textContent = currentScore;
                break;
        }
        document.getElementById("hintMessage").textContent = hintMessage;

        attempts++;

        if (attempts === 5) {
            currentRandomIndex = -1;
        }
    }

    guessInput.value = "";
}

document.getElementById("guessInput").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        checkGuess();
    }
});