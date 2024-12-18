import Chart from "chart.js/auto";

const front = document.getElementById("front_skill").getContext("2d");
const backend = document.getElementById("backend_skill").getContext("2d");
const dev = document.getElementById("dev_skill").getContext("2d");
const aws = document.getElementById("aws_skill").getContext("2d");

const front_data = {
    labels: [
        "HTML/CSS",
        "JavaScript/TypeScript",
        "React.js",
        "Vue.js",
        "UI/UX設計",
        "WEBデザイン",
    ],
    datasets: [
        {
            label: "front end",
            data: [3, 3, 1, 3, 1, 1],
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
        "Python(Django)",
        "PHP(Laravel)",
        "TypeScript(Next.js/Nest.js/GraphQL)",
        "Go",
        "Java(Spring Boot)",
        "C++",
    ],
    datasets: [
        {
            label: "back end",
            data: [5, 2, 1, 3, 3, 3],
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
        "DB（MySQL, PostgreSQL）",
        "Docker",
        "CI/CD(GitHub Actions)",
        "Terraform",
        "VMware",
        "WindowsServer/RedHatEnterpriseLinux",
    ],
    datasets: [
        {
            label: "dev ops",
            data: [4, 4, 2, 2, 3, 3],
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
        "RDS/Redshift",
        "ECR/ECS/Fargate",
        "S3",
        "EC2",
        "Lambda/Glue",
        "VPC/ELB",
    ],
    datasets: [
        {
            label: "aws",
            data: [4, 2, 3, 3, 4, 4],
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

// radarの描写
const chart_id = [front, backend, dev, aws];
const chart_data = [front_data, backend_data, dev_data, aws_data];

for (let i = 0; i < chart_data.length; i++) {
    new Chart(chart_id[i], {
        type: "radar",
        data: chart_data[i],
        options: {
            elements: {
                line: {
                    borderWidth: 3,
                },
            },
            scales: {
                r: {
                    min: 0,
                    max: 5,
                    ticks: {
                        stepSize: 1,
                    },
                },
            },
        },
    });
}
