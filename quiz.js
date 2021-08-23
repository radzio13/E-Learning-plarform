
const start = document.getElementById("start");
const quiz = document.getElementById("quiz");
const question = document.getElementById("question");
const qImg = document.getElementById("qImg");
const choiceA = document.getElementById("A");
const choiceB = document.getElementById("B");
const choiceC = document.getElementById("C");
const counter = document.getElementById("counter");
const timeGauge = document.getElementById("timeGauge");
const progress = document.getElementById("progress");
const scoreDiv = document.getElementById("scoreContainer");


let questions = [
    {
        question : "Jeśli kupujesz nowe urządzenie gospodarstwa domowego, to:",
        imgSrc : "img/html.png",
        choiceA : "Bawisz się przyciskami   ",
        choiceB : "Rozmawiasz o tym z innymi",
        choiceC : "Czytasz o urządzeniu",
        correct : "C"


    },{
        question : "Przypominanie__________ jest zazwyczaj dla mnie najłatwiejsze:",
        imgSrc : "img/html.png",
        choiceA : "Twarzy ludzi",
        choiceB : "Doświadczeń",
        choiceC : "Imion ludzi",
        correct : "A"
    },{
        question : "W przypadku problemu z zakupionym przedmiotem najczęściej:",
        imgSrc : "img/html.png",
        choiceA : "Oddaję przedmiot",
        choiceB : "Piszę wiadomość do firy",
        choiceC : "Dzwonię do firmy",
        correct : "B"
    },{
        question : "Kiedy pokazujesz komuś innemu, jak wykonać nowe zadanie, zazwyczaj:",
        imgSrc : "img/html.png",
        choiceA : "Pokaujesz im, jak to zrobić",
        choiceB : "Piszesz wskazówki krok po kroku",
        choiceC : "Opowiadasz im jak to zrobić",
        correct : "B"
    },{
        question : "Podczas gotowania nowego rodzaju posiłku, wolisz:",
        imgSrc : "img/html.png",
        choiceA : "Zadzwonić do kogoś i spytać o przepis",
        choiceB : "Robisz zgodnie z przepisem",
        choiceC : "Robisz po swojemu na wyczucie",
        correct : "A"
    },{
        question : "Moje pierwsze wspomnienie dotyczy:",
        imgSrc : "img/html.png",
        choiceA : "Czegoś, co widziałem",
        choiceB : "Coś, co słyszałem",
        choiceC : "Coś, co zrobiłem",
        correct : "A"
    },{
        question : "Kiedy spotykam kogoś nowego, moje pierwsze wrażenie to:",
        imgSrc : "img/html.png",
        choiceA : "Skupiam się na tym, co mówią",
        choiceB : "Skupiam się na tym jak wygladają",
        choiceC : "Skupiam się na ich postawie",
        correct : "A"
    },{
        question : "Mówiąc, częściej mówisz:",
        imgSrc : "img/html.png",
        choiceA : "Słyszę",
        choiceB : "Widzę",
        choiceC : "Rozumiem",
        correct : "A"
    },{
        question : "Kiedy masz wolny czas, co jest Twoją silniejszą preferencją:",
        imgSrc : "img/html.png",
        choiceA : "Ogrodnictwo - działanie",
        choiceB : "Rozmawianie z innymi",
        choiceC : "Wychodzenie i zwiedzanie",
        correct : "C"
    },{
        question : "Jeśli miałbyś zamontować nową klamkę to: ?",
        imgSrc : "img/html.png",
        choiceA : "Zapytam jak to zrobić",
        choiceB : "Przeczytam wskazówki",
        choiceC : "Robię to po swojemu",
        correct : "B"
    },{
        question : "Jeśli uczestniczysz w wydarzeniu z muzyką na żywo, najczęściej:",
        imgSrc : "img/html.png",
        choiceA : "Ruszam się do muzyki",
        choiceB : "Wsłuchuję się w tekst",
        choiceC : "Oglądam wokalistów",
        correct : "B"
    },{
        question : "Jeśli coś Cię denerwuje, częściej:",
        imgSrc : "img/html.png",
        choiceA : "Nie możesz usiedzieć",
        choiceB : "Mówisz sam do siebie",
        choiceC : "Wyobrażasz sobie skutki",
        correct : "C"
    },{
        question : "Lubię spędzać wolny czas na:",
        imgSrc : "img/html.png",
        choiceA : "Rozmawianiu z kimś",
        choiceB : "Robieniu czegoś ",
        choiceC : "Oglądaniu telewizji",
        correct : "A"
    },{
        question : "Wybrałbym nową sofę, ponieważ podobało mi się:",
        imgSrc : "img/html.png",
        choiceA : "Jak wygląda, kolor",
        choiceB : "Jaka jest wygodna",
        choiceC : "Polecił mi sprzedawca",
        correct : "A"
    },{
        question : "Wybierając jedzenie z menu, wolę:",
        imgSrc : "img/html.png",
        choiceA : "Wyobrażam smak",
        choiceB : "Zadaję pytanie",
        choiceC : "Patrzę na obrazek",
        correct : "C"
    },{
        question : "Moje relacje z innymi są zależne przez to :",
        imgSrc : "img/html.png",
        choiceA : "Jak wygladają ",
        choiceB : "Co mówią do mnie",
        choiceC : "Jak się zachowują",
        correct : "A"
    },{
        question : "Najbardziej lubię:",
        imgSrc : "img/html.png",
        choiceA : "Rozmawiac przez telefon",
        choiceB : "Robić coś aktywnie",
        choiceC : "Oglądać seriale",
        correct : "C"
    },{
        question : "Kiedy budzę się ze szybko zanikającego snu, zwykle przypominam sobie:",
        imgSrc : "img/html.png",
        choiceA : "Obrazy i sceny",
        choiceB : "Rozmowy i dialogi",
        choiceC : "Jak się czułem",
        correct : "A"
    },{
        question : "Znajdując cel podróży, zazwyczaj:",
        imgSrc : "img/html.png",
        choiceA : "Pytam  o drogę ludzi",
        choiceB : "Patrze na mape dokladnie ",
        choiceC : "Podążam za instynktem",
        correct : "B"
    },{
        question : "Bardziej prawdopodobne jest, że poświęcę trochę czasu na:",
        imgSrc : "img/html.png",
        choiceA : "Oglądanie zachodu słońca",
        choiceB : "Słuchanie śpiewu ptaków ",
        choiceC : "Wąchanie kwiatów",
        correct : "B"
    }
	
];


const lastQuestion = questions.length - 1;
let runningQuestion = 0;
let count = 0;
const questionTime = 40; 
const gaugeWidth = 150; 
const gaugeUnit = gaugeWidth / questionTime;
let TIMER;
let score = 0;


function renderQuestion(){
    let q = questions[runningQuestion];
    
    question.innerHTML = "<p>"+ q.question +"</p>";
    qImg.innerHTML = "<img src="+ q.imgSrc +">";
    choiceA.innerHTML = q.choiceA;
    choiceB.innerHTML = q.choiceB;
    choiceC.innerHTML = q.choiceC;
}

start.addEventListener("click",startQuiz);


function startQuiz(){
    start.style.display = "none";
    renderQuestion();
    quiz.style.display = "block";
    renderProgress();
    renderCounter();
    TIMER = setInterval(renderCounter,1000); // 1000ms = 1s
}


function renderProgress(){
    for(let qIndex = 0; qIndex <= lastQuestion; qIndex++){
        progress.innerHTML += "<div class='prog' id="+ qIndex +"></div>";
    }
}


function renderCounter(){
    if(count <= questionTime){
        counter.innerHTML = count;
        timeGauge.style.width = count * gaugeUnit + "px";
        count++
    }else{
        count = 0;
        
        answerIsWrong();
        if(runningQuestion < lastQuestion){
            runningQuestion++;
            renderQuestion();
        }else{
            
            clearInterval(TIMER);
            scoreRender();
        }
    }
}


function checkAnswer(answer){
    if( answer == questions[runningQuestion].correct){
        
        score++;
        
        answerIsCorrect();
    }else{
        
        answerIsWrong();
    }
    count = 0;
    if(runningQuestion < lastQuestion){
        runningQuestion++;
        renderQuestion();
    }else{
        
        clearInterval(TIMER);
        scoreRender();
    }
}


function answerIsCorrect(){
    document.getElementById(runningQuestion).style.backgroundColor = "#FFFFFF";
}


function answerIsWrong(){
    document.getElementById(runningQuestion).style.backgroundColor = "#FFFFFF";
}


function scoreRender(){
    scoreDiv.style.display = "block";
    
    
    const scorePerCent = Math.round(100 * score/questions.length);
    
  
    let img = (scorePerCent >= 80) ? "img/3.png" :
              (scorePerCent >= 60) ? "img/3.png" :
              (scorePerCent >= 40) ? "img/3.png" :
              (scorePerCent >= 10) ? "img/2.png" :
              "img/1.png";
    
    scoreDiv.innerHTML = "<img src="+ img +">";
}





















