resource "aws_ecs_cluster" "portfolio_cluster" {
  name = "portfolio-cluster"
  setting {
    name  = "containerInsights"
    value = "disabled"
  }
}

resource "aws_security_group" "portfolio_sg" {
  name   = "portfolio-sg"
  vpc_id = var.portfolio_vpc_id
}

resource "aws_security_group_rule" "ingress_http" {
  from_port         = "80"
  to_port           = "80"
  protocol          = "tcp"
  security_group_id = aws_security_group.portfolio_sg.id
  type              = "ingress"
  cidr_blocks       = ["0.0.0.0/0"]
}

resource "aws_security_group_rule" "ingress_https" {
  from_port         = "443"
  to_port           = "443"
  protocol          = "tcp"
  security_group_id = aws_security_group.portfolio_sg.id
  type              = "ingress"
  cidr_blocks       = ["0.0.0.0/0"]
}

resource "aws_security_group_rule" "ingress_mysql" {
  from_port         = "3306"
  to_port           = "3306"
  protocol          = "tcp"
  security_group_id = aws_security_group.portfolio_sg.id
  type              = "ingress"
  cidr_blocks       = ["0.0.0.0/0"]
}

resource "aws_security_group_rule" "egress_all" {
  from_port         = 0
  to_port           = 0
  protocol          = "-1"
  security_group_id = aws_security_group.portfolio_sg.id
  type              = "egress"
  cidr_blocks       = ["0.0.0.0/0"]
}

resource "aws_ecs_service" "portfolio_service" {
  name                   = "portfolio-service"
  cluster                = aws_ecs_cluster.portfolio_cluster.id
  task_definition        = aws_ecs_task_definition.portfolio_task.arn
  desired_count          = 0
  launch_type            = "FARGATE"
  enable_execute_command = true

  load_balancer {
    target_group_arn = var.portfolio_tg_arn
    container_name   = "nginx"
    container_port   = 80
  }

  network_configuration {
    subnets = [
      var.portfolio_subnet_1a_id,
      var.portfolio_subnet_1c_id
    ]
    security_groups = [
      aws_security_group.portfolio_sg.id
    ]
    assign_public_ip = true
  }
}

resource "aws_cloudwatch_log_group" "portfolio_log" {
  name              = "/ecs/portfolio_log"
  retention_in_days = 180
}

resource "aws_ecs_task_definition" "portfolio_task" {
  family                   = "portfolio_task"
  requires_compatibilities = ["FARGATE"]

  network_mode = "awsvpc"
  cpu          = 1024
  memory       = 3072
  container_definitions = jsonencode(
    [
      {
        cpu               = 256
        environment       = []
        essential         = true
        image             = var.ecr_repository_url_laravel
        memory            = 1024
        memoryReservation = 512
        environment = [
          {
            name  = "APP_ENV"
            value = "production"
          }
        ]
        mountPoints    = []
        name           = "laravel"
        portMappings   = []
        systemControls = []
        volumesFrom    = []
      },
      {
        cpu         = 256,
        environment = []
        essential   = true
        image       = var.ecr_repository_url_nginx
        logConfiguration = {
          logDriver = "awslogs"
          options = {
            awslogs-region        = "ap-northeast-1"
            awslogs-stream-prefix = "ecs"
            awslogs-group         = aws_cloudwatch_log_group.portfolio_log.name
          }
        }
        memory            = 1024
        memoryReservation = 512
        mountPoints       = []
        name              = "nginx"
        portMappings = [
          {
            appProtocol   = "http"
            containerPort = 80
            hostPort      = 80
            protocol      = "tcp"
          }
        ]
        systemControls = []
        volumesFrom    = []
      }
    ]
  )

  runtime_platform {
    cpu_architecture        = "ARM64"
    operating_system_family = "LINUX"
  }
  execution_role_arn = var.ecs_task_execution_role_arn
  task_role_arn      = var.ecs_task_execution_role_arn
}
