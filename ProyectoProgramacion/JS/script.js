document.addEventListener("DOMContentLoaded", function() {
    const heartRateData = {
        labels: [],
        datasets: [{
            label: 'Ritmo Cardíaco (bpm)',
            data: [],
            borderColor: 'rgba(229, 9, 20, 1)',
            backgroundColor: 'rgba(229, 9, 20, 0.2)',
            borderWidth: 1,
            fill: true
        }]
    };

    const config = {
        type: 'line',
        data: heartRateData,
        options: {
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Tiempo'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'bpm'
                    },
                    suggestedMin: 50,
                    suggestedMax: 150
                }
            }
        }
    };

    const heartRateChart = new Chart(
        document.getElementById('heartRateChart'),
        config
    );

    setInterval(() => {
        let tempValue = (35 + Math.random() * 5).toFixed(1);
        let heartRateValue = (60 + Math.random() * 40).toFixed(0);

        document.getElementById("tempValue").textContent = `${tempValue} °C`;

        if (heartRateChart.data.labels.length >= 10) {
            heartRateChart.data.labels.shift();
            heartRateChart.data.datasets[0].data.shift();
        }

        heartRateChart.data.labels.push('');
        heartRateChart.data.datasets[0].data.push(heartRateValue);

        heartRateChart.update();

        let alertMessage = '';
        if (tempValue > 37.5) {
            alertMessage = 'Alerta: Fiebre detectada!';
        } else if (heartRateValue < 60 || heartRateValue > 100) {
            alertMessage = 'Alerta: Ritmo cardíaco anormal!';
        } else {
            alertMessage = 'No hay alertas en este momento.';
        }

        document.getElementById("alertMessage").textContent = alertMessage;
    }, 2000);
});
