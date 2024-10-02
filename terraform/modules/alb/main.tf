resource "aws_lb_target_group" "iac-portfolio-tg" {
  name        = "iac-portfolio-tg"
  port        = 80
  protocol    = "HTTP"
  vpc_id      = var.iac-ecs-vpc-id
  target_type = "ip"
  health_check {
    enabled = true
    path    = "/"
  }
}

resource "aws_lb" "iac-ecs-alb" {
  name               = "iac-ecs-alb"
  internal           = false
  load_balancer_type = "application"
  security_groups    = [var.iac-sg-id]
  subnets            = [var.iac-ecs-subnet-1-id, var.iac-ecs-subnet-2-id]
}


resource "aws_lb_listener" "http" {
  load_balancer_arn = aws_lb.iac-ecs-alb.arn
  port              = "80"
  protocol          = "HTTP"

  default_action {
    type             = "forward"
    target_group_arn = aws_lb_target_group.iac-portfolio-tg.arn
  }
}

data "aws_acm_certificate" "existing" {
  domain      = "kazunori-moriya-portfolio.com"
  most_recent = true
  statuses    = ["ISSUED"]
}

resource "aws_lb_listener" "https" {
  load_balancer_arn = aws_lb.iac-ecs-alb.arn
  port              = "443"
  protocol          = "HTTPS"
  ssl_policy        = "ELBSecurityPolicy-2016-08"
  certificate_arn   = data.aws_acm_certificate.existing.arn

  default_action {
    type             = "forward"
    target_group_arn = aws_lb_target_group.iac-portfolio-tg.arn
  }
}
