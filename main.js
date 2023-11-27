const canvas1 = document.getElementById('pieChart1');
const ctx1 = canvas1.getContext('2d');
const canvas2 = document.getElementById('pieChart2');
const ctx2 = canvas2.getContext('2d');
const canvas3 = document.getElementById('pieChart3');
const ctx3 = canvas3.getContext('2d');
const canvas4 = document.getElementById('pieChart4');
const ctx4 = canvas4.getContext('2d');

function updateCharts() {
    // Gunakan AJAX untuk mengambil suara dari server
    fetch('getData.php')
        .then(response => response.json())
        .then(suara => {
            // Gunakan fungsi createPieChart dengan data aktual
            pieChart1.data.labels = ['Paslon 1', 'Paslon 2', 'Paslon 3', 'Tidak Memilih'].map((label, index) => {
                return index < 3 ? `${label} (${suara[index]})` : `Tidak Memilih (${suara[9]})`;
            });            
            pieChart1.data.datasets[0].data = [suara[0], suara[1], suara[2], suara[9]];

            pieChart2.data.labels = ['Calon 1', 'Calon 2', 'Calon 3', 'Tidak Memilih'].map((label, index) => {
                return index < 3 ? `${label} (${suara[index + 3]})` : `Tidak Memilih (${suara[9]})`;
            });
            
            pieChart2.data.datasets[0].data = [suara[3], suara[4], suara[5], suara[9]];

            pieChart3.data.labels = ['Calon 1', 'Calon 2', 'Calon 3', 'Tidak Memilih'].map((label, index) => {
                return index < 3 ? `${label} (${suara[index + 6]})` : `Tidak Memilih (${suara[9]})`;
            });
            
            pieChart3.data.datasets[0].data = [suara[6], suara[7], suara[8], suara[9]];

            pieChart4.data.labels = ['Taruna Tidak Memilih', 'Taruna Memilih'].map((label, index) => {
                return `${label} (${suara[index + 9]})`;
            });

            pieChart4.data.datasets[0].data = [suara[9], suara[10]];


            // Gambar ulang grafik
            pieChart1.update();
            pieChart2.update();
            pieChart3.update();
            pieChart4.update();
            pieChart4.data.datasets[0].backgroundColor = ['#a4aba7', '#4caf50'];

        })
        .catch(error => console.error('Error:', error));
}

function createPieChart(ctx, suara, backgroundColor) {
    return new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: suara,
                backgroundColor: backgroundColor,
            }],
            labels: suara.map((jumlahSuara, index) => {
                return `Paslon ${index + 1} (${jumlahSuara})`;
            }),
        },
    });
}

function createPieChartt(ctx, suara, backgroundColor) {
    return new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: suara,
                backgroundColor: backgroundColor,
            }],
            labels: suara.map((jumlahSuara, index) => {
                return `Calon ${index + 1} (${jumlahSuara})`;
            }),
        },
    });
}

// Gunakan fungsi createPieChart dengan data awal
const pieChart1 = createPieChart(ctx1, [0, 0, 0, 0], ['red', 'yellow', 'green', 'gray']);
const pieChart2 = createPieChartt(ctx2, [0, 0, 0, 0], ['red', 'yellow', 'green', 'gray']);
const pieChart3 = createPieChartt(ctx3, [0, 0, 0, 0], ['red', 'yellow', 'green', 'gray']);

const pieChart4 = createPieChart(ctx4, [0, 0], ['#a4aba7', '#4caf50']);

// Jalankan update setiap detik
setInterval(updateCharts, 1000);
