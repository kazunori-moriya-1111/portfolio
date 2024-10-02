resource "aws_lb_target_group" "portfolio_tg" {
  name        = "portfolio-tg"
  port        = 80
  protocol    = "HTTP"
  vpc_id      = var.portfolio_vpc_id
  target_type = "ip"
  health_check {
    enabled = true
    path    = "/"
  }
}

resource "aws_lb" "portfolio_alb" {
  name               = "portfolio-alb"
  internal           = false
  load_balancer_type = "application"
  security_groups    = [var.portfolio_sg_id]
  subnets            = [var.portfolio_subnet_1a_id, var.portfolio_subnet_1c_id]
}


resource "aws_lb_listener" "http" {
  load_balancer_arn = aws_lb.portfolio_alb.arn
  port              = "80"
  protocol          = "HTTP"

  default_action {
    type             = "forward"
    target_group_arn = aws_lb_target_group.portfolio_tg.arn
  }
}

data "aws_acm_certificate" "portfolio_acm" {
  domain      = "kazunori-moriya-portfolio.com"
  most_recent = true
  statuses    = ["ISSUED"]
}

resource "aws_lb_listener" "https" {
  load_balancer_arn = aws_lb.portfolio_alb.arn
  port              = "443"
  protocol          = "HTTPS"
  ssl_policy        = "ELBSecurityPolicy-2016-08"
  certificate_arn   = data.aws_acm_certificate.portfolio_acm.arn

  default_action {
    type             = "forward"
    target_group_arn = aws_lb_target_group.portfolio_tg.arn
  }
}
