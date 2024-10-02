output "iac-portfolio-tg-arn" {
  value = aws_lb_target_group.iac-portfolio-tg.arn
}

output "iac-ecs-alb-zone-id" {
  value = aws_lb.iac-ecs-alb.zone_id
}

output "iac-ecs-alb-dns-name" {
  value = aws_lb.iac-ecs-alb.dns_name
}