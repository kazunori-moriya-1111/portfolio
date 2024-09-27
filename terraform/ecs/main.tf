variable "iac-ecsTaskExecutionRole-arn" {
  type = string
}

variable "iac-ecs-subnet-1-id" {
  type = string
}

variable "iac-ecs-subnet-2-id" {
  type = string
}

variable "iac-ecs-vpc-id" {
  type = string
}

variable "ecr_repository_url_iac_laravel" {
  type = string
}

variable "ecr_repository_url_iac_nginx" {
  type = string
}

resource "aws_ecs_cluster" "iac-portfolio" {
  name = "iac-portfolio"
  setting  {
    name = "containerInsights"
    value = "disabled"
  }
}

resource "aws_security_group" "iac-portfolio-sg" {
  name = "iac-portfolio-sg"
  vpc_id = "${var.iac-ecs-vpc-id}"
}

resource "aws_security_group_rule" "iac-ingress-http" {
  from_port         = "80"
  to_port           = "80"
  protocol          = "tcp"
  security_group_id = aws_security_group.iac-portfolio-sg.id
  type              = "ingress"
  cidr_blocks       = ["0.0.0.0/0"]
}

resource "aws_security_group_rule" "iac-ingress-https" {
  from_port         = "443"
  to_port           = "443"
  protocol          = "tcp"
  security_group_id = aws_security_group.iac-portfolio-sg.id
  type              = "ingress"
  cidr_blocks       = ["0.0.0.0/0"]
}

resource "aws_security_group_rule" "iac-ingress-mysql" {
  from_port         = "3306"
  to_port           = "3306"
  protocol          = "tcp"
  security_group_id = aws_security_group.iac-portfolio-sg.id
  type              = "ingress"
  cidr_blocks       = ["0.0.0.0/0"]
}

resource "aws_security_group_rule" "egress_all" {
  from_port         = 0
  to_port           = 0
  protocol          = "-1"
  security_group_id = aws_security_group.iac-portfolio-sg.id
  type              = "egress"
  cidr_blocks       = ["0.0.0.0/0"]
}

resource "aws_ecs_service" "iac-alb-service" {
  name = "iac-alb-service"
  cluster = aws_ecs_cluster.iac-portfolio.id
  task_definition = aws_ecs_task_definition.iac-task-portfolio.arn
  desired_count = 0
  launch_type = "FARGATE"
  enable_execute_command = true
  network_configuration {
    subnets = [
      "${var.iac-ecs-subnet-1-id}",
      "${var.iac-ecs-subnet-2-id}"
    ]
    security_groups = [
      aws_security_group.iac-portfolio-sg.id
    ]
    assign_public_ip = true
  }
}

resource "aws_cloudwatch_log_group" "for_ecs" {
  name              = "/ecs/iac-portfolio"
  retention_in_days = 180
}

resource "aws_ecs_task_definition" "iac-task-portfolio" {
  family = "iac-task-portfolio"
  requires_compatibilities = ["FARGATE"]
  
  network_mode = "awsvpc"
  cpu = 1024
  memory = 3072
  container_definitions = jsonencode(
    [
      {
        cpu = 256
        environment =[]
        essential = true
        image = "${var.ecr_repository_url_iac_laravel}"
        memory = 1024
        memoryReservation = 512
        mountPoints = []
        name = "laravel"
        portMappings = []
        systemControls = []
        volumesFrom = []
      },
      {
        cpu = 256,
        environment = []
        essential = true
        image = "${var.ecr_repository_url_iac_nginx}"
        logConfiguration = {
          logDriver = "awslogs"
          options = {
            awslogs-region = "ap-northeast-1"
            awslogs-stream-prefix = "ecs"
            awslogs-group = aws_cloudwatch_log_group.for_ecs.name
          }
        }
        memory = 1024
        memoryReservation = 512
        mountPoints = []
        name = "nginx"
        portMappings = [
          {
            appProtocol = "http"
            containerPort = 80
            hostPort = 80
            protocol = "tcp"
          }
        ]
        systemControls = []
        volumesFrom = []
      }
    ]
  )
  
  runtime_platform {
    cpu_architecture = "ARM64"
    operating_system_family = "LINUX"
  }
  execution_role_arn = "${var.iac-ecsTaskExecutionRole-arn}"
  task_role_arn = "${var.iac-ecsTaskExecutionRole-arn}"
}

