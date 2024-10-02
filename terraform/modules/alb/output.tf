output "portfolio_tg_arn" {
  value = aws_lb_target_group.portfolio_tg.arn
}

output "portfolio_alb_zone_id" {
  value = aws_lb.portfolio_alb.zone_id
}

output "portfolio_alb_dns_name" {
  value = aws_lb.portfolio_alb.dns_name
}