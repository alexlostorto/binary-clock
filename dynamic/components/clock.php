<style>
    @import url('https://fonts.googleapis.com/css2?family=Itim&family=Inter&family=Jost&display=swap');

    * {
        /* font-family: 'Itim', cursive; */
        /* font-family: 'Jost', sans-serif; */
        font-family: 'Inter', sans-serif;
    }

    body {
        background-image: url('images/background.jpg');
        background-size: cover;
    }

    .binary-clock {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .binary-clock h1 {
        padding-bottom: 1rem;
    }

    .binary-grid {
        width: min-content;
        height: min-content;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-template-rows: repeat(4, 1fr);
        padding-right: 5rem;
    }

    .clock {
        grid-column: 2/8;
        grid-row: 2/5;
        display: grid;
        width: 20rem;
        height: 10rem;
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

    .binary-unit {
        display: flex;
        justify-content: center;
        align-self: end;
        padding-bottom: 1rem;
    }

    .time-unit {
        display: flex;
        justify-content: end;
        align-self: center;
        padding-right: 1rem;
    }

    .time {
        padding-top: 2rem;
    }
</style>

<section class="binary-clock">
    <h1>Binary Clock</h1>
    <div class="binary-grid">
        <span></span>
        <span class="binary-unit">32</span>
        <span class="binary-unit">16</span>
        <span class="binary-unit">8</span>
        <span class="binary-unit">4</span>
        <span class="binary-unit">2</span>
        <span class="binary-unit">1</span>
        <div class="clock"></div>
        <span class="time-unit">Hours</span>
        <span class="time-unit">Minutes</span>
        <span class="time-unit">Seconds</span>
    </div>
    
    <?php include('components/time.php'); ?>

</section>

<script>
    
const clockElement = document.querySelector(".clock");
const timeElement = document.querySelector(".time");

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

        timeElement.innerHTML = `${time[0]}:${time[1]}:${time[2]}`;
    
        updateClock(binaryTime);
    
        await sleep(1000);
    }
}

initialiseCLock();
clockLoop();

</script>