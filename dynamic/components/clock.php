<style>
    @import url('https://fonts.googleapis.com/css2?family=Jost&display=swap');

    * {
        font-family: 'Jost', sans-serif;
    }

    body {
        background-image: url('images/background.jpg');
        background-size: cover;
    }

    .binary-clock {
        backdrop-filter: blur(10px);
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5);
        padding: 1rem 2rem 0;
        border-radius: 2rem;
        width: min-content;
        height: min-content;
    }

    .binary-clock h1 {
        font-size: 5rem;
        padding-bottom: 1rem;
        animation: swipeDown 1s cubic-bezier(0, 0, 0.51, 1);
    }

    .binary-grid {
        width: min-content;
        height: min-content;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-template-rows: repeat(4, 1fr);
        padding-right: 3rem;
    }

    .clock {
        grid-column: 2/8;
        grid-row: 2/5;
        display: grid;
        width: 25rem;
        height: 12.5rem;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: repeat(3, 1fr);
        gap: 5px;
    }

    .clock div {
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid black;
        border-radius: 50%;
    }

    .clock div.coloured {
        background-color: black;
    }

    @keyframes swipeDown {
        0% {
            transform: translateY(-100%);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<section class="binary-clock d-flex flex-column align-items-center justify-content-center">
    <h1>Binary Clock</h1>
    <div class="binary-grid">
        <span></span>
        <span class="binary-unit d-flex align-self-end justify-content-center pb-3">32</span>
        <span class="binary-unit d-flex align-self-end justify-content-center pb-3">16</span>
        <span class="binary-unit d-flex align-self-end justify-content-center pb-3">8</span>
        <span class="binary-unit d-flex align-self-end justify-content-center pb-3">4</span>
        <span class="binary-unit d-flex align-self-end justify-content-center pb-3">2</span>
        <span class="binary-unit d-flex align-self-end justify-content-center pb-3">1</span>
        <div class="clock"></div>
        <span class="time-unit d-flex align-self-center justify-content-end pe-3">Hours</span>
        <span class="time-unit d-flex align-self-center justify-content-end pe-3">Minutes</span>
        <span class="time-unit d-flex align-self-center justify-content-end pe-3">Seconds</span>
    </div>
    
    <?php include('components/time.php'); ?>

</section>

<script>
    
const clockElement = document.querySelector(".clock");

const sleep = ms => {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function getCurrentTime() {
    const now = new Date();
    
    // Get time components
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    
    // Assemble the date-time string
    const timeString = [hours, minutes, seconds];
    
    return timeString;
}

function convertToBinary(decimal) {
    let binaryValue = [0, 0, 0, 0, 0, 0];
    let counter = 5;
    
    while (decimal > 0) {
        binaryValue[counter] = decimal % 2 == 1 ? 1 : 0;
        decimal = Math.floor(decimal / 2);
        counter --;
    }

    return binaryValue;
}

function initialiseCLock() {
    for (i=0; i<18; i++) {
        let div =  document.createElement("div");
        clockElement.appendChild(div);
    }
}

function updateClock(binaryTime) {
    const gridElements = clockElement.querySelectorAll("div");

    for (i=0; i<3; i++) {
        for (j=0; j<6; j++) {
            if (binaryTime[i][j] == 1) {
                gridElements[i*6+j].classList.add("coloured");
            } else {
                gridElements[i*6+j].classList.remove("coloured");
            }
        }
    }
}

async function clockLoop() {
    while (true) {
        const time = getCurrentTime();
        const binaryHours = convertToBinary(time[0]);
        const binaryMinutes = convertToBinary(time[1]);
        const binarySeconds = convertToBinary(time[2]);
        const binaryTime = [binaryHours, binaryMinutes, binarySeconds];
    
        updateClock(binaryTime);
    
        await sleep(1000);
    }
}

initialiseCLock();
clockLoop();

</script>