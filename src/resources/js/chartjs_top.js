import Chart from "chart.js/auto";

const front = document.getElementById("front_skill").getContext("2d");
const backend = document.getElementById("backend_skill").getContext("2d");
const dev = document.getElementById("dev_skill").getContext("2d");
const aws = document.getElementById("aws_skill").getContext("2d");

const front_data = {
    labels: [
        "Eating",
        "Drinking",
        "Sleeping",
        "Designing",
        "Coding",
        "Cycling",
        "Running",
    ],
    datasets: [
        {
            label: "front end",
            data: [1, 2, 4, 5, 1, 1, 2],
            fill: true,
            backgroundColor: "rgba(255, 99, 132, 0.2)",
            borderColor: "rgb(255, 99, 132)",
            pointBackgroundColor: "rgb(255, 99, 132)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgb(255, 99, 132)",
        },
    ],
};

const backend_data = {
    labels: [
        "Eating",
        "Drinking",
        "Sleeping",
        "Designing",
        "Coding",
        "Cycling",
        "Running",
    ],
    datasets: [
        {
            label: "back end",
            data: [1, 2, 4, 5, 1, 1, 2],
            fill: true,
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            borderColor: "rgb(75, 192, 192)",
            pointBackgroundColor: "rgb(75, 192, 192)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgb(75, 192, 192)",
        },
    ],
};

const dev_data = {
    labels: [
        "Eating",
        "Drinking",
        "Sleeping",
        "Designing",
        "Coding",
        "Cycling",
        "Running",
    ],
    datasets: [
        {
            label: "dev ops",
            data: [1, 2, 4, 5, 1, 1, 2],
            fill: true,
            backgroundColor: "rgba(255, 205, 86, 0.2)",
            borderColor: "rgb(255, 205, 86)",
            pointBackgroundColor: "rgb(255, 205, 86)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgb(255, 205, 86)",
        },
    ],
};

const aws_data = {
    labels: [
        "Eating",
        "Drinking",
        "Sleeping",
        "Designing",
        "Coding",
        "Cycling",
        "Running",
    ],
    datasets: [
        {
            label: "aws",
            data: [1, 2, 4, 5, 1, 1, 2],
            fill: true,
            backgroundColor: "rgba(54, 162, 235, 0.2)",
            borderColor: "rgb(54, 162, 235)",
            pointBackgroundColor: "rgb(54, 162, 235)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgb(54, 162, 235)",
        },
    ],
};

new Chart(front, {
    type: "radar",
    data: front_data,
    options: {
        elements: {
            line: {
                borderWidth: 3,
            },
        },
        scales: {
            r: {
                min: 0,
                ticks: {
                    stepSize: 1,
                },
            },
        },
    },
});

new Chart(backend, {
    type: "radar",
    data: backend_data,
    options: {
        elements: {
            line: {
                borderWidth: 3,
            },
        },
        scales: {
            r: {
                min: 0,
                ticks: {
                    stepSize: 1,
                },
            },
        },
    },
});

new Chart(dev, {
    type: "radar",
    data: dev_data,
    options: {
        elements: {
            line: {
                borderWidth: 3,
            },
        },
        scales: {
            r: {
                min: 0,
                ticks: {
                    stepSize: 1,
                },
            },
        },
    },
});

new Chart(aws, {
    type: "radar",
    data: aws_data,
    options: {
        elements: {
            line: {
                borderWidth: 3,
            },
        },
        scales: {
            r: {
                min: 0,
                ticks: {
                    stepSize: 1,
                },
            },
        },
    },
});
