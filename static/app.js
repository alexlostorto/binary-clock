const clock = document.querySelector(".clock");
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
        clock.appendChild(div);
    }
}

function updateClock(binaryTime) {
    const gridElements = clock.querySelectorAll("div");

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
